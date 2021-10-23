<?php

namespace App\Admin\Controllers;

use App\Event;
use App\Stand;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class StandsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Stand';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Stand());

        $grid->column('id', __('Id'));
        $grid->column('is_active', __('Is active'))->switch();
        $grid->column('stand_name_en', __('Stand name en'));
        $grid->column('event_id', __('Event id'));
//        $grid->column('project_id', __('Project id'));
//        $grid->column('stand_name_ru', __('Stand name ru'));
//        $grid->column('stand_name_kz', __('Stand name kz'));
//        $grid->column('created_at', __('Created at'));
//        $grid->column('updated_at', __('Updated at'));
//        $grid->column('is_free', __('icon'));
//        $grid->column('icon', __('Is free'));
//        $grid->column('brief_description_en', __('Brief description en'));
//        $grid->column('brief_description_ru', __('Brief description ru'));
//        $grid->column('brief_description_kz', __('Brief description kz'));
//        $grid->column('description_en', __('Description en'));
//        $grid->column('description_ru', __('Description ru'));
//        $grid->column('description_kz', __('Description kz'));
//        $grid->column('bundle', __('Bundle'));
//        $grid->column('speakers', __('Speakers'));
//        $grid->column('video_urls', __('Video urls'));

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
        $show = new Show(Stand::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('is_active', __('Is active'));
        //$show->field('project_id', __('Project id'));
        $show->field('stand_name_en', __('Stand name en'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('event_id', __('Event id'));
        $show->field('icon', __('Icon'));
        $show->field('stand_name_ru', __('Stand name ru'));
        $show->field('stand_name_kz', __('Stand name kz'));
        $show->field('brief_description_en', __('Brief description en'));
        $show->field('brief_description_ru', __('Brief description ru'));
        $show->field('brief_description_kz', __('Brief description kz'));
        $show->field('description_en', __('Description en'));
        $show->field('description_ru', __('Description ru'));
        $show->field('description_kz', __('Description kz'));
        $show->field('bundle', __('Bundle'));
//        $show->field('speakers', __('Speakers'));
//        $show->field('video_urls', __('Video urls'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Stand());

        $form->switch('is_active', __('Is active'));
        $form->switch('is_free', __('Is free'));
        $form->text('stand_name_en', __('Stand name en'))->required();
        $form->text('stand_name_ru', __('Stand name ru'))->required();
        $form->text('stand_name_kz', __('Stand name kz'))->required();
        // $form->select('project_id', __('Project id'))->options(Project::all()->pluck('project_name', 'id'))->required();
        $form->select('event_id', __('Event id'))->options(Event::all()->pluck('project_name_en', 'id'))->required();
        $form->image('icon', __('Icon'))->required();
        $form->textarea('brief_description_en', __('Brief description en'))->required();
        $form->textarea('brief_description_ru', __('Brief description ru'))->required();
        $form->textarea('brief_description_kz', __('Brief description kz'))->required();
        $form->textarea('description_en', __('Description en'))->required();
        $form->textarea('description_ru', __('Description ru'))->required();
        $form->textarea('description_kz', __('Description kz'))->required();
        $form->text('bundle', __('Bundle'))->required();
        $form->text('speaker_en', __('Speaker en'))->placeholder('Field is optional.');
        $form->text('speaker_ru', __('Speaker ru'))->placeholder('Field is optional.');
        $form->text('speaker_kz', __('Speaker kz'))->placeholder('Field is optional.');
        $form->keyValue('video_urls', __('Video urls'))->placeholder('Field is optional.');

        return $form;
    }
}
