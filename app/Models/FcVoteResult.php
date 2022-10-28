<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class FcVoteResult extends Model
{

    use SoftDeletes;

    protected $table = 'fc_vote_result';
    protected $guarded = [];

}
