<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\FcVoteResult;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class FcVoteResultController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new FcVoteResult(), function (Grid $grid) {
//            $grid->column('id')->sortable();
            $grid->column('number')->sortable();
            $grid->column('start_time');
            $grid->column('end_time')->sortable();
            $grid->column('win_num', '中奖号码');
            $grid->column('how_many', '中胆数量');
//            $grid->column('name');
            $grid->column('mobile');
            $grid->column('vote_number_one');
            $grid->column('vote_number_two');
            $grid->column('vote_number_three');
            $grid->column('vote_number_four');
            $grid->column('date')->sortable();
//            $grid->column('created_at');
//            $grid->column('updated_at')->sortable();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');
                $filter->equal('date')->date();
                $filter->like('mobile');
            });

            $grid->disableActions();

            $grid->model()->orderByDesc('how_many')->orderByDesc('date')->orderByDesc('end_time');
        });
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     *
     * @return Show
     */
    protected function detail($id)
    {
        return Show::make($id, new FcVoteResult(), function (Show $show) {
            $show->field('id');
            $show->field('number');
            $show->field('start_time');
            $show->field('end_time');
            $show->field('name');
            $show->field('mobile');
            $show->field('vote_number');
            $show->field('vote_number_one');
            $show->field('vote_number_two');
            $show->field('vote_number_three');
            $show->field('vote_number_four');
            $show->field('win_num');
            $show->field('date');
            $show->field('created_at');
            $show->field('updated_at');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new FcVoteResult(), function (Form $form) {
            $form->display('id');
            $form->text('number');
            $form->text('start_time');
            $form->text('end_time');
            $form->text('name');
            $form->text('mobile');
            $form->text('vote_number');
            $form->text('vote_number_one');
            $form->text('vote_number_two');
            $form->text('vote_number_three');
            $form->text('vote_number_four');
            $form->text('win_num');
            $form->text('date');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
