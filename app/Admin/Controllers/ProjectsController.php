<?php

namespace App\Admin\Controllers;

use App\Project;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ProjectsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Project';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Project());

        $grid->column('id', __('Id'));
        $grid->column('is_active', __('Is active'))->switch();
        $grid->column('project_name', __('Project name'));
        $grid->column('project_bundle', __('Project bundle'));
        $grid->column('accessible_from', __('Accessible from'));
        $grid->column('accessible_to', __('Accessible to'));
        //$grid->column('stands', __('Stands'));
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
        $show = new Show(Project::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('is_active', __('Is active'));
        $show->field('project_name', __('Project name'));
        $show->field('project_bundle', __('Project bundle'));
        $show->field('accessible_from', __('Accessible from'));
        $show->field('accessible_to', __('Accessible to'));
        $show->field('stands', __('Stands'));
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
        $form = new Form(new Project());

        $form->switch('is_active', __('Is active'));
        $form->text('project_name', __('Project name'))->required();
        $form->text('project_bundle', __('Project bundle'))->required();
        $form->datetime('accessible_from', __('Accessible from'))->default(date('Y-m-d H:i:s'));
        $form->datetime('accessible_to', __('Accessible to'))->default(date('Y-m-d H:i:s'));
        $form->keyValue('stands', __('Stands'));

        return $form;
    }
}
