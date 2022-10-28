<?php

namespace App\Console\Commands;

use App\Models\FcVoteResult;
use Illuminate\Console\Command;

class RunLotteryResult extends Command
{
    public const WINNING_NUMBERS = [ 1,62,3,74,25,6,37,8,59,10,11,12,13 ];

    public const date = '2022-10-17';
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'run-lottery-result';

    /**
     * @return void
     */
    public function handle()
    {
        $todayHistory = (new FcVoteResult())->where('date', self::date)->get();
        foreach ($todayHistory as $lottery) {
            $userNums = [
                $lottery['vote_number_one'],
                $lottery['vote_number_two'],
                $lottery['vote_number_three'],
                $lottery['vote_number_four'],
            ];
            $winNum = array_intersect($userNums, self::WINNING_NUMBERS);
            $howMany = count($winNum);
            $winNumString = implode(',', $winNum);
            $lottery->update(['how_many' => $howMany, 'win_num' => $winNumString]);
            $this->info("已计算用户：{$lottery['mobile']}, 中奖号码数量：{$howMany}, 中奖号码是：{$winNumString}");
        }
        $total = $todayHistory->count();
        $this->info("中奖用户总数：{$total}");

    }
}
