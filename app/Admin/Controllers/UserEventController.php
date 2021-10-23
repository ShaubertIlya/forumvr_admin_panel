<?php

namespace App\Admin\Controllers;

use App\UserEvent;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class UserEventController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'UserEvent';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new UserEvent());

        $grid->column('id', __('Id'));
        $grid->column('is_active', __('Is active'));
        $grid->column('user_id', __('User id'));
        $grid->column('available_event_id', __('Available event id'));
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
        $show = new Show(UserEvent::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('is_active', __('Is active'));
        $show->field('user_id', __('User id'));
        $show->field('available_event_id', __('Available event id'));
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
        $form = new Form(new UserEvent());

        $form->switch('is_active', __('Is active'));
        $form->number('user_id', __('User id'));
        $form->number('available_event_id', __('Available event id'));

        return $form;
    }
}
