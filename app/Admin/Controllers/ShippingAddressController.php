<?php

namespace App\Admin\Controllers;

use App\Models\ShippingAddress;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ShippingAddressController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'ShippingAddress';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new ShippingAddress());

        $grid->column('id', __('Id'));
        $grid->column('address', __('Address'));
        $grid->column('company', __('Company'));
        $grid->column('phone', __('Phone'));
        $grid->column('first_name', __('First name'));
        $grid->column('last_name', __('Last name'));
        $grid->column('city', __('City'));
        $grid->column('state', __('State'));
        $grid->column('transaction_ref', __('Transaction ref'));
        $grid->column('country', __('Country'));
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
        $show = new Show(ShippingAddress::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('address', __('Address'));
        $show->field('company', __('Company'));
        $show->field('phone', __('Phone'));
        $show->field('first_name', __('First name'));
        $show->field('last_name', __('Last name'));
        $show->field('city', __('City'));
        $show->field('state', __('State'));
        $show->field('transaction_ref', __('Transaction ref'));
        $show->field('country', __('Country'));
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
        $form = new Form(new ShippingAddress());

        $form->text('address', __('Address'));
        $form->text('company', __('Company'));
        $form->mobile('phone', __('Phone'));
        $form->text('first_name', __('First name'));
        $form->text('last_name', __('Last name'));
        $form->text('city', __('City'));
        $form->text('state', __('State'));
        $form->text('transaction_ref', __('Transaction ref'));
        $form->text('country', __('Country'));
        $form->number('user_id', __('User id'));

        return $form;
    }
}
