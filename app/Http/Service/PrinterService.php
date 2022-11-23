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

    /**
     * @return string
     * @throws \Exception
     * @author p_luxinyao
     * @date 2022/11/5 20:23
     * @version 1.0
     */
    public static function __cateOneCupOfWater()
    {
        $sentenceArr = PrintMessage::sentenceArr();

        $content = '<CB>请来一杯水，谢谢</CB><BR>';
        $content .= '<C>----------------<BR><BR>';
        $content .= "{$sentenceArr[random_int(1,4)]}<BR>";
        return $content;
    }

    /**
     * @return string
     * @throws \Exception
     * @author p_luxinyao
     * @date 2022/11/5 20:23
     * @version 1.0
     */
    public static function __cateTakeAwayMyCup()
    {
        $sentenceArr = PrintMessage::sentenceArr();

        $content = '<CB>请帮我拿走水杯，谢谢</CB><BR>';
        $content .= '<C>----------------<BR><BR>';
        $content .= "{$sentenceArr[random_int(1,4)]}<BR>";
        return $content;
    }

    /**
     * 打印内容-三年级诗歌
     * @return string
     * @author imluxin
     * @date 2022/11/4 23:28
     * @version 1.0
     */
    public static function __gradeThreePoem(): string
    {
        $content = '<CB>三年级古诗词</CB><BR>';
        $content .= '<C>----------------<BR><BR>';
        $content .= '山行<BR>';
        $content .= '杜牧 〔唐代〕<BR>';
        $content .= '远上寒山石径斜，<BR>';
        $content .= '白云生处有人家。<BR>';
        $content .= '停车坐爱枫林晚，<BR>';
        $content .= '霜叶红于二月花。<BR>';
        $content .= '----------------<BR><BR>';
        $content .= '赠刘景文<BR>';
        $content .= '苏轼 〔宋代〕<BR>';
        $content .= '荷尽已无擎雨盖，<BR>';
        $content .= '菊残犹有傲霜枝。<BR>';
        $content .= '一年好景君须记，<BR>';
        $content .= '最是橙黄橘绿时。<BR>';
        $content .= '----------------<BR><BR>';
        $content .= '夜书所见<BR>';
        $content .= '叶绍翁 〔宋代〕<BR>';
        $content .= '萧萧梧叶送寒声，<BR>';
        $content .= '江上秋风动客情。<BR>';
        $content .= '知有儿童挑促织，<BR>';
        $content .= '夜深篱落一灯明。<BR>';
        $content .= '----------------<BR><BR>';
        $content .= '望天门山<BR>';
        $content .= '李白 〔唐代〕<BR>';
        $content .= '天门中断楚江开，<BR>';
        $content .= '碧水东流至此回。<BR>';
        $content .= '两岸青山相对出，<BR>';
        $content .= '孤帆一片日边来。<BR>';
        $content .= '----------------<BR><BR>';
        $content .= '饮湖上初晴后雨<BR>';
        $content .= '苏轼 〔宋代〕<BR>';
        $content .= '水光潋滟晴方好，<BR>';
        $content .= '山色空蒙雨亦奇。<BR>';
        $content .= '欲把西湖比西子，<BR>';
        $content .= '淡妆浓抹总相宜。<BR>';
        $content .= '----------------<BR><BR>';
        $content .= '望洞庭<BR>';
        $content .= '刘禹锡 〔唐代〕<BR>';
        $content .= '湖光秋月两相和，<BR>';
        $content .= '潭面无风镜未磨。<BR>';
        $content .= '遥望洞庭山水翠，<BR>';
        $content .= '白银盘里一青螺。<BR>';
        $content .= '----------------<BR><BR>';
        $content .= '司马光<BR>';
        $content .= '佚名 〔宋代〕<BR>';
        $content .= '群儿戏于庭，一儿登瓮，<BR>';
        $content .= '足跌没水中。<BR>';
        $content .= '众皆弃去，光持石击瓮破之，<BR>';
        $content .= '水迸，儿得活。<BR>';
        $content .= '----------------<BR><BR>';
        $content .= '所见<BR>';
        $content .= '袁枚 〔清代〕<BR>';
        $content .= '牧童骑黄牛，<BR>';
        $content .= '歌声振林樾。<BR>';
        $content .= '意欲捕鸣蝉，<BR>';
        $content .= '忽然闭口立。<BR>';
        $content .= '----------------<BR><BR>';
        $content .= '早发白帝城<BR>';
        $content .= '李白 〔唐代〕<BR>';
        $content .= '朝辞白帝彩云间，<BR>';
        $content .= '千里江陵一日还。<BR>';
        $content .= '两岸猿声啼不住，<BR>';
        $content .= '轻舟已过万重山。<BR>';
        $content .= '----------------<BR><BR>';
        $content .= '采莲曲<BR>';
        $content .= '王昌龄 〔唐代〕<BR>';
        $content .= '荷叶罗裙一色裁，<BR>';
        $content .= '芙蓉向脸两边开。<BR>';
        $content .= '乱入池中看不见，<BR>';
        $content .= '闻歌始觉有人来。<BR>';
        $content .= '----------------</C><BR><BR>';
        return $content;
    }
}
