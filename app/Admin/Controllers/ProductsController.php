<?php

namespace App\Admin\Controllers;

use App\Models\Orders;
use App\Models\Products;
use App\Models\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ProductsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Products';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Products());

        $grid->filter(function ($filter) {
            $filter->disableIdFilter();
            $filter->like('name', 'Search By Product Name');
            $filter->like('barcode', 'Search By Product BarCode');
            $filter->like('price', 'Search By Product Price');
        });

        $grid->column('id', __('Id'));
        $grid->column('feature_image', __('Feature image'))->image();
        $grid->column('name', __('Name'));
        $grid->column('barcode', __('Bar Code'));
        $grid->column('description')->display(function ($value) {
            return substr(strip_tags($value), 0, 100);
        });
        $grid->column('quantity', __('Quantity'));
        $grid->column('price', __('Price'));
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
        $show = new Show(Products::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('feature_image', __('Feature image'))->image();
        $show->field('name', __('Name'));
        $show->field('barcode', __('Bar Code'));

        $show->field('description', __('Description'));
        $show->field('quantity', __('Quantity'));
        $show->field('price', __('Price'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        $show->orders('Product Orders', function ($fields) {
            $fields->resource('/admin/orders');
            $fields->total();
            $fields->status();
            $fields->fields();
            $fields->user_id('Customer')->display(function ($use_id) {
                $user = User::findOrFail($use_id);
                return "<span >{$user->name}</span>";
            });
            $fields->id('Download')->display(function ($orderId) {
                $order = Orders::findOrFail($orderId);

                $downloadLink = $order->status === 'paid' ? admin_url("download-receipt/"
                    . $order->id) : admin_url("download-invoice/"
                    . $order->id);
                $adminBtnClasses = $order->status === "paid" ? "btn btn-success text-white" : "btn btn-warning text-white";
                $adminBtnName = $order->status === "paid" ? "Download Receipt" : "Download Invoice";
                $button = "<button type='submit' class='$adminBtnClasses'> $adminBtnName </button>";
                return "<form method='GET' action='$downloadLink'>{$button}</form>";
            });

            $fields->created_at();
            $fields->updated_at();
        });
        // $show->fields('Product Fields', function ($fields) {


        // });
        $show->reviews('Product Reviews', function ($fields) {

            $fields->resource('/admin/product-reviews');
            $fields->id();
            $fields->rating();
            $fields->review();
            $fields->user_id('Customer')->display(function ($use_id) {
                $user = User::findOrFail($use_id);
                return "<span >{$user->name}</span>";
            });
            $fields->created_at();
            $fields->updated_at();
        });


        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Products());

        $form->image('feature_image', __('Feature image'))->required();
        $form->textarea('name', __('Name'))->required();
        $form->text('barcode', __('Bar Code'));
        $form->multipleImage('images', __('Images'));
        $form->textarea('description', __('Description'))->required();
        $form->hidden('quantity', __('Quantity'));
        $form->number('price', __('Price'))->required();

        return $form;
    }
}
