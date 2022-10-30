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
        $content = '家长课下课了！';
        $content = '<CB>测试打印</CB><BR>';
        $content .= '名称　　　　　 单价  数量 金额<BR>';
        $content .= '--------------------------------<BR>';
        $content .= '饭　　　　　 　10.0   10  100.0<BR>';
        $content .= '炒饭　　　　　 10.0   10  100.0<BR>';
        $content .= '蛋炒饭　　　　 10.0   10  100.0<BR>';
        $content .= '鸡蛋炒饭　　　 10.0   10  100.0<BR>';
        $content .= '西红柿炒饭　　 10.0   10  100.0<BR>';
        $response = (new PrinterService())->printMsg($content);
//        $response = (new PrinterService())->queryPrinterStatus();
        return $this->showMessage($response);
    }

    public function printerStatus()
    {
        $response = (new PrinterService())->queryPrinterStatus();
        return $this->showMessage($response);
    }
}
