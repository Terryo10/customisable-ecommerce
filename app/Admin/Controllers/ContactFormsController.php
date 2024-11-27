<?php

namespace App\Admin\Controllers;

use App\Models\ContactForm;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ContactFormsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'ContactForm';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new ContactForm());

        $grid->column('id', __('Id'));
        $grid->column('title', __('Title'));
        $grid->column('subject', __('Subject'));
        $grid->column('email', __('Email'));
        $grid->column('phone', __('Phone'));
        $grid->column('message', __('Message'));
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
        $show = new Show(ContactForm::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('subject', __('Subject'));
        $show->field('email', __('Email'));
        $show->field('phone', __('Phone'));
        $show->field('message', __('Message'));
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
        $form = new Form(new ContactForm());

        $form->text('title', __('Title'));
        $form->text('subject', __('Subject'));
        $form->email('email', __('Email'));
        $form->mobile('phone', __('Phone'));
        $form->textarea('message', __('Message'));

        return $form;
    }
}
