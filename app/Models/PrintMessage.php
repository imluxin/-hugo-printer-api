<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class PrintMessage extends Model
{

    use SoftDeletes;

    protected $table = 'fc_vote_result';
    protected $guarded = [];

    public const CATEGORY_GRADE_THREE_POEM = 1;
    public const CATEGORY_A_CUP_WATER = 2;
    public const CATEGORY_TAKE_AWAY_CUP = 3;
    public const CATEGORY_WORLD_CUP_2022 = 4;
    public const CATEGORY_WORLD_CUP_2022_FOCUS = 5;
    public const CATEGORY_SCHEDULE_GRADE_THREE = 6;

    public const SENTENCE_1 = '真诚祝福传递你，愿你开心永如意，生日快乐歌一曲，愿你幸福没问题，每年这天祝福你，望你健康又美丽，幸运永远追随你！';
    public const SENTENCE_2 = '洪亮的钟声荡气回荡，璀璨的烟花美丽绽放，潺潺的溪水叮咚回生日的歌曲为你歌唱。人生路上平安吉祥，好运永远伴你身旁！';
    public const SENTENCE_3 = '愿每一刻都有快乐与你相伴，愿每一天都有美好与你相随，愿你的心愿都能实现，愿你的生活色彩斑斓！';
    public const SENTENCE_4 = '加油努力，拉屎要用力！拉不出来没关系，至少放个屁！';

    public static function sentenceArr($sentence = [])
    {
        $sentence[1] = self::SENTENCE_1;
        $sentence[2] = self::SENTENCE_2;
        $sentence[3] = self::SENTENCE_3;
        $sentence[4] = self::SENTENCE_4;
        return $sentence;
    }

    /**
     * 2022世界杯小组赛程
     * @author p_luxinyao
     * @date 2022/11/18 20:37
     */
    public static function worldCup2022()
    {
        return "
<CB>2022世界杯赛程</CB>
A组：

11月21日00:00 卡塔尔VS厄瓜多尔

11月22日00:00 塞内加尔VS荷兰

11月25日21:00 卡塔尔VS塞内加尔

11月26日00:00 荷兰VS厄瓜多尔

11月29日23:00 荷兰VS卡塔尔

11月29日23:00 厄瓜多尔VS塞内加尔

B组：

11月21日21:00 英格兰VS伊朗

11月22日03:00 美国VS威尔士

11月25日18:00 威尔士VS伊朗

11月26日03:00 英格兰VS美国

11月30日03:00 威尔士VS英格兰

11月30日03:00 伊朗VS美国

C组：

11月22日18:00 阿根廷VS沙特阿拉伯

11月23日00:00 墨西哥VS波兰

11月26日21:00 波兰VS沙特阿拉伯

11月27日03:00 阿根廷VS墨西哥

12月01日03:00 波兰VS阿根廷

12月01日03:00 沙特阿拉伯VS墨西哥

D组：

11月22日21:00 丹麦VS突尼斯

11月23日03:00 法国VS澳大利亚

11月26日18:00 突尼斯VS澳大利亚

11月27日00:00 法国VS丹麦

11月30日23:00 突尼斯VS法国

11月30日23:00 澳大利亚VS丹麦

E组：

11月23日21:00 德国VS日本

11月24日00:00 西班牙VS哥斯达黎加

11月27日18:00 日本VS哥斯达黎加

11月28日03:00 西班牙VS德国

12月02日03:00 日本VS西班牙

12月02日03:00 哥斯达黎加VS德国

F组：

11月23日18:00 摩洛哥VS克罗地亚

11月24日03:00 比利时VS加拿大

11月27日21:00 比利时VS摩洛哥

11月28日00:00 克罗地亚VS加拿大

12月01日23:00 克罗地亚VS比利时

12月01日23:00 加拿大VS摩洛哥

G组：

11月24日18:00 瑞士VS喀麦隆

11月25日03:00 巴西VS塞尔维亚

11月28日18:00 喀麦隆VS塞尔维亚

11月29日00:00 巴西VS瑞士

12月03日03:00 喀麦隆VS巴西

12月03日03:00 塞尔维亚VS瑞士

H组：

11月24日21:00 乌拉圭VS韩国

11月25日00:00 葡萄牙VS加纳

11月28日21:00 韩国VS加纳

11月29日03:00 葡萄牙VS乌拉圭

12月02日23:00 韩国VS葡萄牙

12月02日23:00 加纳VS乌拉圭

-------";
    }

    public static function worldCup2022Focus(): string
    {
        return "
        <CB>2022世界杯小组赛焦点战</CB>

11月24日3点：比利时vs加拿大

看点：欧洲劲旅对阵世界杯新军

11月25日0点：葡萄牙vs加纳

看点：C罗本届世界杯首次亮相

11月25日3点：巴西vs塞尔维亚

看点：夺冠热门对阵欧洲劲旅

11月27日0点：法国vs丹麦

看点：夺冠热门对阵传统欧洲劲旅

11月28日3点，西班牙vs德国

看点：必看

11月29日23点：荷兰vs卡塔尔

看点：老牌劲旅对阵东道主

11月30日3点：伊朗vs美国

看点：两国恩怨

12月1日23点：克罗地亚vs比利时

看点：欧洲强强对话

12月1日3点：波兰vs阿根廷

看点：莱万VS梅西，两位足球先生的对决
        ";
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


    public static function scheduleForGradeThree(): string
    {
        return "
        <CB>三年级课表</CB>
<B>星期一</B>
1.班会
2.语文
3.外语
4.体育
5.语文
6.科学
7.综合实践活动
----------------<BR>
<B>星期二</B>
1.数学
2.语文
3.音乐
4.书法
5.道德与法治
6.体育
----------------<BR>
<B>星期三</B>
1.数学
2.美术
3.语文
4.体育
5.音乐
6.校本心理
----------------<BR>
<B>星期四</B>
1.外语
2.数学
3.语文
4.信息科技
5.美术
6.劳动
----------------<BR>
<B>星期五</B>
1.数学
2.外语
3.语文
4.道德与法治
5.科学
6.地方课程
<CB>-------</CB>
        ";
    }
}
