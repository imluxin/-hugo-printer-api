<?php

namespace App\Http\Controllers\Printer;

use App\Http\Controllers\BaseController;
use App\Http\Service\PrinterService;
use App\Models\PrintMessage;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PrinterController extends BaseController
{
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
        $content = $request->post('content', '');
        if (empty($title)) {
            return $this->showMessage(false, 201, '请填写标题');
        }
        $msg = "<CB>{$title}</CB><BR>";
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
     * 获取预设消息列表
     * @param Request $request
     * @return JsonResponse
     * @author p_luxinyao
     * @date 2022/11/8 22:59
     * @version 2.8.0
     */
    public function listCategory(Request $request): JsonResponse
    {
        $array = [
            [
                'text' => '三年级诗词',
                'value' => PrintMessage::CATEGORY_GRADE_THREE_POEM
            ],
            [
                'text' => '请给我来一杯水',
                'value' => PrintMessage::CATEGORY_A_CUP_WATER
            ],
            [
                'text' => '请帮我拿走水杯',
                'value' => PrintMessage::CATEGORY_TAKE_AWAY_CUP
            ]
        ];
        return response()->json($array);
    }

    /**
     * 打印三年级唐诗
     * @return mixed
     * @author imluxin
     * @date 2022/11/4 20:52
     * @version 1.0
     */
    public function printerCategory(Request $request)
    {
        $code = $request->post('code');
        $printerCategory = $request->post('printerCategory');
        $serverCode = Carbon::now()->format('md');
        if ($code != $serverCode) {
            return $this->showMessage($serverCode, 201, 'code错误，请重试。');
        }
        switch ($printerCategory) {
            case PrintMessage::CATEGORY_GRADE_THREE_POEM:
                $content = PrinterService::__gradeThreePoem();
                break;
            case PrintMessage::CATEGORY_A_CUP_WATER:
                $content = PrinterService::__cateOneCupOfWater();
                break;
            case PrintMessage::CATEGORY_TAKE_AWAY_CUP:
                $content = PrinterService::__cateTakeAwayMyCup();
                break;
        }

        $response = (new PrinterService())->printMsg($content);
        return $this->showMessage($response, 200, '打印成功，快去打印机看看吧。');
    }
}
