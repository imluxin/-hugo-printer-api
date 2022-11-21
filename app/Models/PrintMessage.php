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

A组赛程：

11月21日0点，卡塔尔vs厄瓜多尔

11月22日0点，塞内加尔vs荷兰

11月25日18点，荷兰ws厄瓜多尔

11月25日21点，卡塔尔vs塞内加尔

11月30日3点，荷兰vs卡塔尔

11月30日3点，厄瓜多尔vs塞内加尔

B组赛程：

11月21日21点，英格兰vs伊朗

11月22日3点，美国vs咸尔士

11月26日0点，威尔士vs伊朗

11月26日3点，英格兰vs美国

11月29日23点，威尔士vs英格兰

11月29日23点，伊朗Vs美国

C组赛程：

11月23日0点：墨西哥vs波兰

11月23日3点：阿根廷vs沙特

11月26日18点：波兰vs沙特

11月26日21点：阿根廷Vs墨西哥

12月1日3点：沙特vs墨西哥

12月1日3点：波兰vs阿根廷

D组赛程：

11月22日18点：丹麦vs突尼斯

11月22日21点：法国vs澳大利亚

11月27日0点：突尼斯vs澳大利亚

11月27日3点：法国vs丹麦

11月30日23点：突尼斯vs法国

11月30日23点：澳大利亚vs丹麦

E组赛程：

11月24日0点，德国vs日本

11月24日3点，西班牙vs哥斯达黎加

11月27日18点，日本Vs哥斯达黎加

11月27日21点，西班牙vs德国

12月2日3点，日本vs西班牙

12月2日3点，哥斯达黎加vs德国

F组赛程：

11月23日18点，摩洛哥vs克罗地亚

11月23日21点，比利时vs加拿大

11月28日0点，克罗地亚vs加拿大

11月28日3点，比利时vs摩洛哥

12月1日23点，克罗地亚vs比利时

12月1日23点，加拿大vs摩洛哥

G组赛程：

11月25日0点，瑞士vs喀麦隆

11月25日3点，巴西vs塞尔维亚

11月28日18点，喀麦隆vs塞尔维亚

11月28日21点，巴西vs瑞士

12月3日3点，塞尔维亚vs瑞士

12月3日3点，喀麦隆vs巴西

H组赛程：

11月24日18点，乌拉圭vs韩国

11月24日21点，葡萄牙vs加纳

11月29日0点，韩国vs加纳

11月29日3点，葡萄牙vs乌拉圭

12月2日23点，韩国vs葡萄牙

12月2日23点，加纳vs乌拉圭";
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
