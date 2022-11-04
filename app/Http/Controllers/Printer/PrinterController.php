<?php

namespace App\Http\Controllers\Printer;

use App\Http\Controllers\BaseController;
use App\Http\Service\PrinterService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PHPUnit\Util\Printer;

class PrinterController extends BaseController
{
    public const SURVEY_ID = 10954300; // 问卷ID

    /**
     * @param Request $request
     * @return void
     * @author Lux
     * @date 2022/10/26 10:40
     * @version 1.0
     */
    public function print(Request $request)
    {
        $code = $request->post('code');
        $serverCode = date('md'); //Carbon::now()->format('md');
        if ($code != $serverCode) {
            return $this->showMessage($serverCode, 201, 'code错误，请重试。');
        }
        $title = $request->post('title');
        $content = $request->post('content');
        if (empty($content) || empty($title)) {
            return $this->showMessage(false, 201, '请填写标题和打印内容');
        }
        $msg = isset($title) ? "<CB>{$title}</CB><BR>" : '';
        $msg .= $content;
        $response = (new PrinterService())->printMsg($msg);
        return $this->showMessage($response, 200, '打印成功，快去打印机看看吧。');
    }

    /**
     * 获取打印机状态
     * @return mixed
     * @author imluxin
     * @date 2022/11/4 20:34
     * @version 1.0
     */
    public function printerStatus(Request $request)
    {
        $response = (new PrinterService())->queryPrinterStatus();
        return $this->showMessage($response);
    }

    /**
     * 打印三年级唐诗
     * @return mixed
     * @author imluxin
     * @date 2022/11/4 20:52
     * @version 1.0
     */
    public function printerGradeThreePoem(Request $request)
    {
        $code = $request->post('code');
        $printerCategory = $request->post('printerCategory');
        $serverCode = date('md'); //Carbon::now()->format('md');
        if ($code != $serverCode) {
            return $this->showMessage($serverCode, 201, 'code错误，请重试。');
        }
        switch ($printerCategory) {
            case 1:
                $content = PrinterService::__gradeThreePoem();
                break;
        }

        $response = (new PrinterService())->printMsg($content);
        return $this->showMessage($response, 200, '打印成功，快去打印机看看吧。');
    }
}
