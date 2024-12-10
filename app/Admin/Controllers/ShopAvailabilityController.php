<?php

namespace App\Admin\Controllers;

use App\Models\ShopAvailability;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ShopAvailabilityController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'ShopAvailability';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new ShopAvailability());

        $grid->column('id', __('Id'));
        $grid->column('isOpen', __('Shop Availability'))->display(function ($isopen) {

            return $isopen === 1 ? "Shop is open" : "Shop is Closed";
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
        $show = new Show(ShopAvailability::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('isOpen', __('Shop Availability'))->as(function ($isopen) {

            return $isopen === 1 ? "Shop is open" : "Shop is Closed";
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
        $form = new Form(new ShopAvailability());

        $form->switch('isOpen', __('IsOpen'))->default(1);

        return $form;
    }
}
