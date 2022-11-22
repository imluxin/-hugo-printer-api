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
}
