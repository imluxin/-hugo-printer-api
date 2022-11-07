<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class PrintMessage extends Model
{

    use SoftDeletes;

    protected $table = 'fc_vote_result';
    protected $guarded = [];

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
}
