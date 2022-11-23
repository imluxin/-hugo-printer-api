<?php

namespace App\Http\Service;

use App\Models\PrintMessage;
use Carbon\Carbon;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;


class PrinterService
{
    public const USER = '43660254@qq.com'; // 飞鹅云后台注册账号
    public const UKEY = 'GFZmdHI2k4Wc2JDz'; // 飞鹅云后台注册账号后生成的UKEY 【备注：这不是填打印机的KEY】
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
    public function signature($time): string
    {
        $user = self::USER;
        $key = self::UKEY;
        return sha1($user.$key. $time);//公共参数，请求公钥
    }

    /**
     * @param $formParams
     * @return mixed
     * @throws GuzzleException
     * @author p_luxinyao
     * @date 2022/10/28 23:14
     * @version 1.0
     */
    public function postRequest($formParams)
    {
        $config = ['headers' => ['Content-Type'=>'application/x-www-form-urlencoded'], 'form_params'=>$formParams];
        $response = (new Client())->post(self::PATH, $config);

        $body = $response->getBody();
        $json = $body->getContents();
        return json_decode($json, true);
    }

    /**
     * @param $apiName
     * @param string $content
     * @param int $times
     * @return array
     * @author p_luxinyao
     * @date 2022/10/28 23:16
     * @version 1.0
     */
    private function formatData($apiName, string $content='雨果真棒！', int $times=1): array
    {
        $time = Carbon::now()->timestamp;         //请求时间
        return array(
            'user' => self::USER,
            'stime' => $time,
            'sig' => $this->signature($time),
            'apiname' => $apiName,
            'sn' => self::SN,
            'content' => $content,
            'times' => $times//打印次数
        );
    }


    /**
     * 小票机打印
     * @param $content //打印内容
     * @param $times // 打印联数
     * @return array|void
     * @author Lux
     * @date 2022/10/26 10:41
     * @version 1.0
     */
    public function printMsg($content, $times=1)
    {
        try {
            $formParams = $this->formatData('Open_printMsg', $content, $times);
            return $this->postRequest($formParams);
        } catch (GuzzleException $e) {
            return ['result' => false, 'msg' => $e->getMessage()];
        }
    }

    /**
     * 查询打印机状态
     * @return array|mixed
     * @author p_luxinyao
     * @date 2022/10/28 23:19
     * @version 1.0
     */
    public function queryPrinterStatus()
    {
        try {
            $formParams = $this->formatData('Open_queryPrinterStatus');
            return $this->postRequest($formParams);
        } catch (GuzzleException $e) {
            return ['result' => false, 'msg' => $e->getMessage()];
        }
    }
}
