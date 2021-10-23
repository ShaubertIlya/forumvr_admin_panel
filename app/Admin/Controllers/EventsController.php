<?php

namespace App\Admin\Controllers;

use App\Event;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class EventsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Event';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Event());

        $grid->column('id', __('Id'));
        $grid->column('is_active', __('Is active'))->switch();
        $grid->column('type', __('Type'))->radio(array_merge(Event::TYPES, [null => Event::TYPE_OPENED]));
//        $grid->column('icon', __('Icon'));
//        $grid->column('project_name_en', __('Project name en'));
        $grid->column('project_name_ru', __('Project name ru'));
//        $grid->column('project_name_kz', __('Project name kz'));
//        $grid->column('brief_description_en', __('Brief description en'));
//        $grid->column('brief_description_ru', __('Brief description ru'));
//        $grid->column('brief_description_kz', __('Brief description kz'));
//        $grid->column('description_en', __('Description en'));
//        $grid->column('description_ru', __('Description ru'));
//        $grid->column('description_kz', __('Description kz'));
//        $grid->column('speakers_en', __('Speakers en'));
//        $grid->column('speakers_ru', __('Speakers ru'));
//        $grid->column('speakers_kz', __('Speakers kz'));
//        $grid->column('project_bundle', __('Project bundle'));
        $grid->column('start_date', __('Start date'));
        $grid->column('end_date', __('End date'));
//        $grid->column('event_ip', __('Event ip'));
//        $grid->column('event_port', __('Event port'));
//        $grid->column('created_at', __('Created at'));
//        $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(Event::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('icon', __('Icon'));
        $show->field('project_name_en', __('Project name en'));
        $show->field('project_name_ru', __('Project name ru'));
        $show->field('project_name_kz', __('Project name kz'));
        $show->field('brief_description_en', __('Brief description en'));
        $show->field('brief_description_ru', __('Brief description ru'));
        $show->field('brief_description_kz', __('Brief description kz'));
        $show->field('description_en', __('Description en'));
        $show->field('description_ru', __('Description ru'));
        $show->field('description_kz', __('Description kz'));
        $show->field('speakers_en', __('Speakers en'));
        $show->field('speakers_ru', __('Speakers ru'));
        $show->field('speakers_kz', __('Speakers kz'));
        $show->field('project_bundle', __('Project bundle'));
        $show->field('start_date', __('Start date'));
        $show->field('end_date', __('End date'));
        $show->field('event_ip', __('Event ip'));
        $show->field('event_port', __('Event port'));
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
        $form = new Form(new Event());

        $form->radio('type', 'Event Type')->values(Event::TYPES)->default(Event::TYPE_OPENED)->required();

        $form->switch('is_active', __('Is active'));
        $form->image('icon', __('Icon'));
        $form->text('project_name_en', __('Project name en'))->required();
        $form->text('project_name_ru', __('Project name ru'))->required();
        $form->text('project_name_kz', __('Project name kz'))->required();
        $form->textarea('brief_description_en', __('Brief description en'))->required();
        $form->textarea('brief_description_ru', __('Brief description ru'))->required();
        $form->textarea('brief_description_kz', __('Brief description kz'))->required();
        $form->textarea('description_en', __('Description en'))->required();
        $form->textarea('description_ru', __('Description ru'))->required();
        $form->textarea('description_kz', __('Description kz'))->required();
        $form->textarea('speakers_en', __('Speakers en'))->required();
        $form->textarea('speakers_ru', __('Speakers ru'))->required();
        $form->textarea('speakers_kz', __('Speakers kz'))->required();
        $form->url('project_bundle', __('Project bundle'))->required();
        $form->datetime('start_date', __('Start date'))->default(date('Y-m-d H:i:s'))->required();
        $form->datetime('end_date', __('End date'))->default(date('Y-m-d H:i:s'))->required();
        $form->text('event_ip', __('Event ip'));
        $form->text('event_port', __('Event port'));

        return $form;
    }
}
