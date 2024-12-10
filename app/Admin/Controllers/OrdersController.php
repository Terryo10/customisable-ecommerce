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
    protected $title = 'Orders Management Where You Download Customers Invoice & Receipt';

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


        $grid->column('quantity', __('Quantity'));
        $grid->column('total', __('Total ($)'));
        $grid->column('id', __('Status'))->display(function ($orderId) {
            $order = Orders::findOrFail($orderId);
            $url = admin_url('change-order-status');
            $form = "
         <form method='POST' action='$url'>
         <input type='hidden' name='order_id' value='$orderId' />
            <select name='status' class='form-control'>
            <option value='$order->status'>$order->status</option>
             <option value='paid'>Paid</option>
             <option value='pending'>Pending</option>
             <option value='delivered'>Delivered</option>
             <option value='cancelled'>Cancelled</option>
            </select>
            <button type='submit' class='btn btn-warning form-control'>Change Status</button>
         </form>
         ";

            return $form;
        });
        // Display product name
        $grid->column('product.name', __('Product'))->sortable()->filter();

        // Display user name
        $grid->column('user.name', __('Customer'))->sortable()->filter();
        // $grid->column('id', __('Download'))->display(function ($orderId) {
        //     $order = Orders::findOrFail($orderId);

        //     $downloadLink = $order->status === 'paid' ? admin_url("download-receipt/"
        //         . $order->id) : admin_url("download-invoice/"
        //         . $order->id);
        //     $adminBtnClasses = $order->status === "paid" ? "btn btn-success text-white" : "btn btn-warning text-white";
        //     $adminBtnName = $order->status === "paid" ? "Download Receipt" : "Download Invoice";
        //     $button = "<button type='submit' class='$adminBtnClasses'> $adminBtnName </button>";
        //     return "<form method='GET' action='$downloadLink'>{$button}</form>";
        // });
        $grid->column('fields', __('Customised Options'))->display(function ($fields) {
            $items = json_decode(json_decode($fields));
            $sentence = "";

            if (is_array($items)) {
                foreach ($items as $item) {
                    $sentence .= $item->name . ': ' . $item->value . '; ';
                }
                $sentence = rtrim($sentence, '; ');
            }

            return $sentence;
        });

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
            $product = Products::findOrFail($productId);
            return $product ? $product->name : __('Unknown Product');
        });
        $show->field('user_id', __('Customer'))->as(function ($userId) {
            $user = User::findOrFail($userId);
            return $user ? $user->name : __('Unknown Customer');
        });
        $show->field('id', __('Download'))->as(function ($orderId) {
            $order = Orders::findOrFail($orderId);
            $downloadLink = $order->status === 'paid' ? admin_url("download-receipt/"
                . $order->id) : admin_url("download-invoice/"
                . $order->id);
            $adminBtnClasses = $order->status === "paid" ? "btn btn-success text-white" : "btn btn-warning text-white";
            $adminBtnName = $order->status === "paid" ? "Download Receipt" : "Download Invoice";
            $button = "<button type='submit' class='$adminBtnClasses'> $adminBtnName </button>";
            return "<form method='GET' action='$downloadLink'>{$button}</form>";
        });
        //        $show->field('fields', __('Customised Options'));
        $show->field('fields')->display(function ($value) {
            // Decode the JSON string
            $data = json_decode($value, true);

            // Check if the JSON is valid and has the desired structure
            if (is_array($data) && isset($data[0]['value'])) {
                // Extract the 'value' field
                return substr(strip_tags($data[0]['value']), 0, 100);
            }

            // Return a default value if the JSON is invalid or missing the expected structure
            return '-';
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
        $form->text('address', __('Enter Shipping Address'))->rules('required|min:1');
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
        $form->select('product_id', __('Link Product to this order'))
            ->options(Products::all()->pluck('name', 'id'))
            ->rules('required')
            ->placeholder('Select a product');

        // Load users into a dropdown
        $form->select('user_id', __('Link Customer to this order'))
            ->options(User::all()->pluck('name', 'id'))
            ->rules('required')
            ->placeholder('Select a customer');

        return $form;
    }
}
