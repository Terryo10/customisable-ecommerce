<?php

namespace App\Admin\Controllers;

use App\Models\Branches;
use App\Models\Products;
use App\Models\ProductStock;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ProductStocksController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'ProductStock';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new ProductStock());

        $grid->column('id', __('Id'));
        $grid->column('code', __('Code'));
        $grid->column('product_id', __('Product'))->display(function ($productId) {
            $product = Products::findOrFail($productId);
            return $product ? $product->name : __('Unknown Product');
        });
        $grid->column('branch_id', __('Selected Branch'))->display(function ($branchId) {
            $branch = Branches::findOrFail($branchId);
            return $branch ? $branch->name : __('Unknown branch');
        });
        $grid->column('quantity_initial', __('Quantity initial'));
        $grid->column('quantity', __('Quantity'));
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
        $show = new Show(ProductStock::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('code', __('Code'));
        $show->field('branch_id', __('Branch'))->as(function ($branchId) {
            $branch = Branches::findOrFail($branchId);
            return $branch ? $branch->name : __('Unknown Branch');
        });
        $show->field('product_id', __('Product'))->as(function ($productId) {
            $product = Products::findOrFail($productId);
            return $product ? $product->name : __('Unknown Product');
        });
        $show->field('quantity_initial', __('Quantity initial'));
        $show->field('quantity', __('Quantity'));
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
        $form = new Form(new ProductStock());

        $form->text('code', __('Unique Code'))->rules('required');
        $form->select('branch_id', __('Select Branch to link to this stock'))
            ->options(Branches::all()->pluck('name', 'id'))
            ->rules('required')
            ->placeholder('Select branch');
        $form->select('product_id', __('Link Product to this order'))
            ->options(Products::all()->pluck('name', 'id'))
            ->rules('required')
            ->placeholder('Select a product');
        $form->number('quantity_initial', __('Stock Initial Value'))
            ->default(0)
            ->rules('required')
            ->attribute(['id' => 'quantity_initial']);
        $form->number('quantity', __('Stock Number Should be the same as initial stock'))
            ->default(0)
            ->rules('required')
            ->attribute(['id' => 'quantity']);

        // Add JavaScript to handle the copying of values
        $form->html('<script>
       
        document.querySelectorAll("#quantity_initial").forEach((input)=>{
           
            input.addEventListener("input", function() {
            document.querySelectorAll("#quantity").forEach((input)=>{
           
            input.value = this.value;
    });
        });
    });
    </script>');

        return $form;
    }
}
