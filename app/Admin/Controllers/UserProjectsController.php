<?php

namespace App\Admin\Controllers;

use App\Project;
use App\TariffPlan;
use App\UserProject;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class UserProjectsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'UserProject';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new UserProject());

        $grid->column('id', __('Id'));
        $grid->column('is_active', __('Is active'))->switch();
        $grid->column('tariff_plan_id', __('Tariff plan id'));
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
        $show = new Show(UserProject::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('is_active', __('Is active'));
        $show->field('tariff_plan_id', __('Tariff plan id'));
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
        $form = new Form(new UserProject());

        $form->switch('is_active', __('Is active'));
        $form->select('tariff_plan_id', __('Tariff plan id'))->options(TariffPlan::all()->pluck('tarifplan_name', 'id'))->required();
        $form->select('project_id', __('Project id'))->options(Project::all()->pluck('project_name', 'id'))->required();

        return $form;
    }
}
