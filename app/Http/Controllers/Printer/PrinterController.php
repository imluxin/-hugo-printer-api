<?php

namespace App\Http\Controllers\Printer;

use App\Http\Controllers\BaseController;
use App\Http\Service\PrinterService;
use Illuminate\Http\Request;
use PHPUnit\Util\Printer;

class PrinterController extends BaseController
{
    public const SURVEY_ID=10954300; // 问卷ID

    /**
     * @param Request $request
     * @return void
     * @author Lux
     * @date 2022/10/26 10:40
     * @version 1.0
     */
    public function custom(Request $request)
    {
        $title = $request->post('title');
        $content = $request->post('content');
        if (empty($content)){
            $this->showMessage(false, 201, '请填写要打印的内容');
        }
        $msg = isset($title) ? "<CB>{$title}</CB><BR>" : '';
        $msg .= $content;
        $response = (new PrinterService())->printMsg($msg);
//        $response = (new PrinterService())->queryPrinterStatus();
        return $this->showMessage($response);
    }

    public function printerStatus()
    {
        $response = (new PrinterService())->queryPrinterStatus();
        return $this->showMessage($response);
    }
}
