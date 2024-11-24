<?php

namespace App\Admin\Controllers;

use App\Models\Orders;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class OrdersController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Orders';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Orders());

        $grid->column('id', __('Id'));
        $grid->column('quantity', __('Quantity'));
        $grid->column('total', __('Total'));
        $grid->column('status', __('Status'));
        $grid->column('product_id', __('Product id'));
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
        $show = new Show(Orders::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('quantity', __('Quantity'));
        $show->field('total', __('Total'));
        $show->field('status', __('Status'));
        $show->field('product_id', __('Product id'));
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
        $form = new Form(new Orders());

        $form->number('quantity', __('Quantity'));
        $form->number('total', __('Total'));
        $form->select('status', __('Status'))->options([
            'pending' => 'Pending',
            'processed' => 'Processed',
            'shipped' => 'Shipped',
            'paid' => 'Product Is Paid',
            'delivered' => 'Delivered',
            'cancelled' => 'Cancelled',
        ])->default('pending');
        $form->number('product_id', __('Product id'));
        $form->number('user_id', __('User id'));

        return $form;
    }
}
