<?php

/**
 * 基础类
 * @date 2019.02.18
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class BaseController extends Controller
{
    protected $module = '';
    protected $modelName = '';
    protected $args = [];
    protected $controller = '';
    protected $method = '';
    protected $pageSize = 10;

    public function __construct(Request $request)
    {
        if (method_exists($this, 'init')) {
            $this->init();
        }
        //获取全部参数（get，post，files...）
        $this->args = $request->all();
        //xss过滤
        if (!empty($this->args)) {
            foreach ($this->args as &$v) {
                clean_xss($v, true);
            }
        }

        $this->getAction();
    }

    /**
     * 获取输入参数
     * @param string $key 参数名称
     * @param string $dValue 默认值
     * @date   2016年10月23日 20:39:25
     * @return mixed
     * @author Chengcheng
     */
    protected function input($key, $dValue=null)
    {
        $value = Input::get($key, $dValue);
        if (isset($value)) {
            clean_xss($value, true);
        }

        if ((isset($_GET[$key]) || isset($_POST[$key])) && $value === null) {
            $value = '';
        }

        return $value;
    }

    private function getAction()
    {
        if (Route::current()) {
            $action = Route::current()->getActionName();
            list($class, $method) = explode('@', $action);
            $this->controller = strtolower(substr(strrchr($class, '\\'), 1, -10));
            $this->method = strtolower($method);
        }
    }

    /**
     * Ajax方式返回数据到客户端
     * @access protected
     * @param mixed $data 要返回的数据
     * @param String $type AJAX返回数据格式
     * @return mixed
     */
    protected function ajaxReturn($data, $type='JSON')
    {
        switch (strtoupper($type)) {
            case 'JSON' :
            case 'JSON_FORCE_OBJECT' :
                //跨域操作在中间件中实现
                if ($type == 'JSON_FORCE_OBJECT') {
                    return response()->json($data, 200, [], JSON_UNESCAPED_UNICODE | JSON_FORCE_OBJECT);
                }

                return response()->json($data, 200, [], JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    /**
     * @param array $data
     * @param null|int $code
     * @param string $message
     * @param bool $isPage
     * @return mixed
     */
    protected function showMessage($data=[], $code=200, $message=null, $isPage=false)
    {
        if (empty($message)) {
            $callback = config('returnCode.callback');
            $message = isset($callback[$code]) ? $callback[$code] : null;
        }

        //返回结果
        $return = array(
            'code' => $code,
            'msg' => $message,
            'data' => $data
        );

        if ($isPage) {
            return view('error', $return);
        } else {
            return $this->ajaxReturn($return);
        }
    }

    /**
     * 顶级错误showmessage并存贮日志
     * @param $e
     * @return void
     * @date 2022/8/30 12:04
     * @author p_andysliu
     */
    protected function showMessageWithThrowableError($e,$code=5000,$msg='网络繁忙，请稍后再试~(BASE-90009)')
    {
            $request = request();
        if(isset($request->wechat_user)) {
            $wechatUser = $request->wechat_user;
        }else {
            $wechatUser = [];
        }
        $info = [
            'msg'=>$e->getMessage(),
            'line'=>$e->getLine(),
            'file'=>$e->getFile(),
            'request'=>$request->all(),
            'wechat_user'=>$wechatUser,
            'method'=>$request->method(),
            'url'=>$request->fullUrl()
        ];
        $errorJson = json_encode($info, JSON_UNESCAPED_UNICODE);
        //企微告警群报错通知
        $text = request()->path().'接口：ThrowableError';
        $text .= PHP_EOL;
        $text .= $errorJson;
        (new WechatRobotMessengerService())->sendTextMsg($text);
        \Log::error($errorJson);
        return $this->showMessage([], $code,$msg);
    }
}
