<?php

namespace App\Admin\Controllers;

use App\Models\ProductReviews;
use App\Models\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ProductReviewsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'ProductReviews';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new ProductReviews());

        $grid->column('id', __('Id'));
        $grid->column('isBlocked', __('IsBlocked'));
        $grid->column('rating', __('Rating'));
        $grid->column('review', __('Review'));
        $grid->column('product_id', __('Product id'));
        $grid->column('user_id', __('Customer id'));
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
        $show = new Show(ProductReviews::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('isBlocked', __('IsBlocked'));
        $show->field('rating', __('Rating'));
        $show->field('review', __('Review'));
        $show->field('product_id', __('Product id'));
        $show->field('user_id', __('Customer'))->as(function ($userId) {
            $user = User::find($userId);
            return $user ? $user->name : __('Unknown Customer');
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
        $form = new Form(new ProductReviews());

        $form->switch('isBlocked', __('IsBlocked'));
        $form->text('rating', __('Rating'));
        $form->textarea('review', __('Review'));
        $form->number('product_id', __('Product id'));
        $form->number('user_id', __('Customer id'));

        return $form;
    }
}
