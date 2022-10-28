<?php

namespace App\Http\Service;

use Carbon\Carbon;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;


class PrinterService
{
    public const USER = '43660254@qq.com'; // 飞鹅云后台注册账号
    public const UKEY = ''; // 飞鹅云后台注册账号后生成的UKEY 【备注：这不是填打印机的KEY】
    public const SN = '915500556'; // 打印机编号，必须要在管理后台里添加打印机或调用API接口添加之后，才能调用API

    //以下参数不需要修改
    public const IP = 'api.feieyun.cn';      //接口IP或域名
    public const PORT = 80;            //接口IP端口
    public const PATH = 'http://api.feieyun.cn/Api/Open/';    //接口路径


    /**
     * [signature 生成签名]
     * @param  [string] $time [当前UNIX时间戳，10位，精确到秒]
     * @return string [string]       [接口返回值]
     */
    function signature($time): string
    {
        return sha1(self::USER . self::UKEY . $time);//公共参数，请求公钥
    }


    /**
     * @param $content //打印内容
     * @param $times // 打印联数
     * @return array|void
     * @author Lux
     * @date 2022/10/26 10:41
     * @version
     */
    public function printMsg($content, $times = 1)
    {
        $time = Carbon::now()->timestamp;         //请求时间
        $msgInfo = array(
            'user' => USER,
            'stime' => $time,
            'sig' => signature($time),
            'apiname' => 'Open_printMsg',
            'sn' => self::SN,
            'content' => $content,
            'times' => $times//打印次数
        );
        try {
            $response = (new Client())->post(self::PATH, $msgInfo);
            dd($response);
        } catch (GuzzleException $e) {
            return ['result' => false, 'msg' => $e->getMessage()];
        }
    }
}
