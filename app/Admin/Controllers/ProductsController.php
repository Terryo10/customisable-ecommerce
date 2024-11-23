<?php

namespace App\Admin\Controllers;

use App\Models\Products;
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

        $grid->column('id', __('Id'));
        $grid->column('feature_image', __('Feature image'))->image();
        $grid->column('name', __('Name'));
        $grid->column('images', __('Images'))->display(function ($value) {
            return json_encode($value);
        });
        $grid->column('description', __('Description'));
        $grid->column('short_description', __('Short description'));
        $grid->column('location', __('Location'));
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
        // $show->field('images', __('Images'))->display(function ($value) {
        //     return json_encode($value);
        // });
        $show->field('description', __('Description'));
        $show->field('short_description', __('Short description'));
        $show->field('location', __('Location'));
        $show->field('quantity', __('Quantity'));
        $show->field('price', __('Price'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        $show->fieldss('Product Fields', function ($fields) {

            $fields->resource('/admin/fields');
            $fields->id();
            $fields->fields();
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

        $form->image('feature_image', __('Feature image'));
        $form->textarea('name', __('Name'));
        $form->multipleImage('images', __('Images'));
        $form->textarea('description', __('Description'));
        $form->textarea('short_description', __('Short description'));
        $form->textarea('location', __('Location'));
        $form->number('quantity', __('Quantity'));
        $form->number('price', __('Price'));

        return $form;
    }
}
