<?php

namespace App\Admin\Controllers;

use App\Project;
use App\RequestForConfirmation;
use App\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class RequestsForConfirmationController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'RequestForConfirmation';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new RequestForConfirmation());

        $grid->column('id', __('Id'));
        $grid->column('status', __('Status'));
        $grid->column('comment', __('Comment'));
        $grid->column('user_id', __('User id'));
        $grid->column('project_id', __('Project id'));
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
        $show = new Show(RequestForConfirmation::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('status', __('Status'));
        $show->field('comment', __('Comment'));
        $show->field('user_id', __('User id'));
        $show->field('project_id', __('Project id'));
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
        $form = new Form(new RequestForConfirmation());

        $form->switch('status', __('Status'));
        $form->text('comment', __('Comment'));
        $form->select('user_id', __('User id'))->options(User::all()->pluck('name', 'id'))->required();
        $form->select('project_id', __('Project id'))->options(Project::all()->pluck('project_name', 'id'))->required();


        return $form;
    }
}
