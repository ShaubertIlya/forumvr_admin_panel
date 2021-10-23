<?php

namespace App\Admin\Controllers;

use App\ForumManager;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ForumManagerController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'ForumManager';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new ForumManager());

        $grid->column('id', __('Id'));
        $grid->column('is_active', __('Is active'))->switch();
        $grid->column('phone_number', __('Phone number'));
        $grid->column('email', __('Email'));
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
        $show = new Show(ForumManager::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('is_active', __('Is active'));
        $show->field('phone_number', __('Phone number'));
        $show->field('email', __('Email'));
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
        $form = new Form(new ForumManager());

        $form->switch('is_active', __('Is active'));
        $form->text('phone_number', __('Phone number'))->required();
        $form->email('email', __('Email'))->required();

        return $form;
    }
}
