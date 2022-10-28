<?php

namespace App\Admin\Repositories;

use App\Models\FcVoteResult as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class FcVoteResult extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
