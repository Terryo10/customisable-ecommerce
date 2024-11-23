<?php

namespace App\Admin\Controllers;

use App\Models\Transaction;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class TransactionsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Transaction';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Transaction());

        $grid->column('id', __('Id'));
        $grid->column('type', __('Type'));
        $grid->column('isPaid', __('IsPaid'));
        $grid->column('total', __('Total'));
        $grid->column('order_id', __('Order id'));
        $grid->column('user_id', __('User id'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Transaction::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('type', __('Type'));
        $show->field('isPaid', __('IsPaid'));
        $show->field('total', __('Total'));
        $show->field('order_id', __('Order id'));
        $show->field('user_id', __('User id'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Transaction());

        $form->textarea('type', __('Type'));
        $form->switch('isPaid', __('IsPaid'));
        $form->number('total', __('Total'));
        $form->number('order_id', __('Order id'));
        $form->number('user_id', __('User id'));

        return $form;
    }
}
