<?php

namespace App\Admin\Controllers;

use App\AvailableEvent;
use App\Event;
use App\TariffPlan;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class AvailableEventController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'AvailableEvent';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new AvailableEvent());

        $grid->column('id', __('Id'));
        $grid->column('tariff_plan_id', __('Tariff plan id'));
        $grid->column('event_id', __('Event id'));
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
        $show = new Show(AvailableEvent::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('tariff_plan_id', __('Tariff plan id'));
        $show->field('event_id', __('Event id'));
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
        $form = new Form(new AvailableEvent());

        $form->select('tariff_plan_id', __('Tariff plan id'))->options(TariffPlan::all()->pluck('tarifplan_name_ru', 'id'))->required();
        $form->select('event_id', __('Event id'))->options(Event::all()->pluck('project_name_ru', 'id'))->required();

        return $form;
    }
}
