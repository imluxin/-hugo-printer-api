<?php

namespace App\Http\Controllers\Lottery;

use App\Http\Controllers\Controller;
use App\Models\FcVoteResult;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public const SURVEY_ID=10954300; // 问卷ID

    public function store(Request $request): JsonResponse
    {
        $payLoad = $request->post('payload');
        $answer = $payLoad['answer'][0]['questions'];
        $surveyId = $payLoad['survey_id'] ?? '';
        if ($surveyId != self::SURVEY_ID) {
            return response()->json(['code' => 0, 'data' => $surveyId, 'msg' => '问卷ID错误'], 200, [], JSON_UNESCAPED_UNICODE);
        }
        $wechatInfo = $payLoad['weixin_openi2d'] ?? '';
        $wechatInfo = explode('___', $wechatInfo);
        $openid = $wechatInfo[0] ?? null;
        $date = Carbon::parse($payLoad['ended_at'])->toDateString();
        // 检查是否重复
        if (!empty($openid)){
            $check = (new FcVoteResult())->where('date', $date)->where('openid', $openid)->first();
        } else {
            $check =  (new FcVoteResult())->where('date', $date)->where('mobile', $answer[0]['text'])->first();
        }
        if ($check){
            $return = [
                'code' => 0,
                'msg' => '[记录保存失败] 今日该openid或手机号已参与活动，无法再次参与',
                'data' => $check
            ];
            return response()->json($return, 200, [], JSON_UNESCAPED_UNICODE);
        }
        $model = new FcVoteResult();
        $data = [
            'number' => $payLoad['answer_id'] ?? 0,
            'start_time' => $payLoad['started_at'],
            'end_time' => $payLoad['ended_at'],
//            'name' => $answer[0]['text'] ?? '',
            'mobile' => $answer[0]['text'] ?? '',
            'vote_number_one' => $answer[1]['options'][0]['text'],
            'vote_number_two' => $answer[1]['options'][1]['text'],
            'vote_number_three' => $answer[1]['options'][2]['text'],
            'vote_number_four' => $answer[1]['options'][3]['text'],
            'date' => $date,
            'openid' => $wechatInfo[0] ?? null,
            'nickname' => $wechatInfo[1] ?? null
        ];
        try {
            foreach ($data as $key => $value){
                $model->$key = $value;
            }
            $model->save();
            $return = [
                'code' => 1,
                'msg' => '[记录保存成功] ',
                'data' => $model['id'],
            ];
            return response()->json($return, 200, [], JSON_UNESCAPED_UNICODE);
        } catch (\Exception $e){
            $return = [
                'code' => 0,
                'msg' => '[记录保存失败] '.$e->getMessage(),
                'data' => $data
            ];
            return response()->json($return, 200, [], JSON_UNESCAPED_UNICODE);
        }

    }
}
