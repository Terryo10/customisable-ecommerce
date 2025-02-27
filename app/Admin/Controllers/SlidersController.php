<?php

namespace App\Admin\Controllers;

use App\Models\Products;
use App\Models\Sliders;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class SlidersController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Sliders';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Sliders());

        $grid->column('id', __('Id'));
        $grid->column('image', __('Image'))->image();
        $grid->column('title', __('Title'));
        $grid->column('description', __('Description'));
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
        $show = new Show(Sliders::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('image', __('Image'))->image();
        $show->field('title', __('Title'));
        $show->field('description', __('Description'));
        $show->field('product_id', __('Product'))->as(function ($productId) {
            $product = Products::findOrFail($productId);
            return $product ? $product->name : __('Unknown Product');
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
        $form = new Form(new Sliders());

        $form->image('image', __('Image'))->required();
        $form->textarea('title', __('Title'))->required();
        $form->textarea('description', __('Description'))->required();
            // Load products into a dropdown
            $form->select('product_id', __('Link Product to this slider'))
            ->options(Products::all()->pluck('name', 'id'))
            ->rules('required')
            ->placeholder('Select a product');

        return $form;
    }
}
