<?php

namespace App\Admin\Controllers;

use App\Models\Orders;
use App\Models\Transaction;
use App\Models\User;
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
        // Display product name
        $grid->column('order_id', __('Order ID'))->sortable()->filter();

        // Display user name
        $grid->column('user.name', __('User'))->sortable()->filter();
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
        // $show->field('order_id', __('Order id'));
        $show->field('order_id', __('Order'));
        $show->field('user_id', __('User'))->as(function ($userId) {
            $user = User::find($userId);
            return $user ? $user->name : __('Unknown User');
        });
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
        // Load products into a dropdown
        $form->select('order_id', __('Link Order To this transaction'))
            ->options(Orders::all()->pluck('id', 'id'))
            ->rules('required')
            ->placeholder('Select a order to link');
        // Load users into a dropdown
        $form->select('user_id', __('Link User To this transaction'))
            ->options(User::all()->pluck('name', 'id'))
            ->rules('required')
            ->placeholder('Select a user');

        return $form;
    }
}
