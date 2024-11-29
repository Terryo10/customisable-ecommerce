<?php

namespace App\Admin\Controllers;

use App\Models\Orders;
use App\Models\Products;
use App\Models\User;
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

        $grid->filter(function ($filter) {
            // Remove the default id filter
            $filter->disableIdFilter();
            // Add a column filter
            $filter->like('name', 'Search By Name');
            $filter->equal('status', 'By Status')->select([
                'pending' => 'Pending',
                'processed' => 'Processed',
                'shipped' => 'Shipped',
                'paid' => 'Product Is Paid',
                'delivered' => 'Delivered',
                'cancelled' => 'Cancelled',
            ]);
        });


        $grid->column('id', __('Id'));
        $grid->column('quantity', __('Quantity'));
        $grid->column('total', __('Total'));
        $grid->column('status', __('Status'));
        // Display product name
        $grid->column('product.name', __('Product'))->sortable()->filter();

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
        $show = new Show(Orders::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('quantity', __('Quantity'));
        $show->field('total', __('Total'));
        $show->field('status', __('Status'));
        $show->field('product_id', __('Product'))->as(function ($productId) {
            $product = Products::find($productId);
            return $product ? $product->name : __('Unknown Prpduct');
        });
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
        $form = new Form(new Orders());

        $form->number('quantity', __('Quantity'))->rules('required|integer|min:1');
        $form->currency('total', __('Total'))->symbol('$')->rules('required|numeric|min:0');
        $form->select('status', __('Status'))->options([
            'pending' => 'Pending',
            'processed' => 'Processed',
            'shipped' => 'Shipped',
            'paid' => 'Product Is Paid',
            'delivered' => 'Delivered',
            'cancelled' => 'Cancelled',
        ])->default('pending')->rules('required');

        // Load products into a dropdown
        $form->select('product_id', __('Product'))
            ->options(Products::all()->pluck('name', 'id'))
            ->rules('required')
            ->placeholder('Select a product');

        // Load users into a dropdown
        $form->select('user_id', __('User'))
            ->options(User::all()->pluck('name', 'id'))
            ->rules('required')
            ->placeholder('Select a user');

        return $form;
    }
}
