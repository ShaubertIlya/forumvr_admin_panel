<?php

namespace App\Admin\Controllers;

use App\Event;
use App\EventStatus;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class EventStatusController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'EventStatus';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new EventStatus());

        $grid->column('id', __('Id'));
        $grid->column('name_en', __('Name en'));
        $grid->column('name_ru', __('Name ru'));
        $grid->column('name_kz', __('Name kz'));

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
        $show = new Show(EventStatus::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name_en', __('Name en'));
        $show->field('name_ru', __('Name ru'));
        $show->field('name_kz', __('Name kz'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new EventStatus());

        $form->select('event_id', __('Event'))->options(Event::all()->pluck('id', 'name_en'))->required();
        $form->text('name_en', __('Name en'))->required();
        $form->text('name_ru', __('Name ru'))->required();
        $form->text('name_kz', __('Name kz'))->required();

        return $form;
    }
}
