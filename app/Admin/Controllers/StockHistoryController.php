<?php

namespace App\Admin\Controllers;

use App\Models\StockHistory;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class StockHistoryController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'StockHistory';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new StockHistory());

        $grid->column('id', __('Id'));
        $grid->column('stock_id', __('Stock id'));
        $grid->column('quantity', __('Quantity'));
        $grid->column('quantity_before_deduction', __('Quantity before deduction'));
        $grid->column('product_id', __('Product id'));
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
        $show = new Show(StockHistory::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('stock_id', __('Stock id'));
        $show->field('quantity', __('Quantity'));
        $show->field('quantity_before_deduction', __('Quantity before deduction'));
        $show->field('product_id', __('Product id'));
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
        $form = new Form(new StockHistory());

        $form->number('stock_id', __('Stock id'));
        $form->number('quantity', __('Quantity'));
        $form->number('quantity_before_deduction', __('Quantity before deduction'));
        $form->number('product_id', __('Product id'));

        return $form;
    }
}
