<?php

namespace App\Http\Controllers\Printer;

use App\Http\Controllers\BaseController;
use App\Http\Service\PrinterService;
use Illuminate\Http\Request;

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
        $content = '123';
        (new PrinterService())->printMsg($content);
    }
}
