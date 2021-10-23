<?php

namespace App\Admin\Controllers;

use App\TariffPlan;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class TariffPlanController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'TariffPlan';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new TariffPlan());

        $grid->column('id', __('Id'));
//        $grid->column('tarifplan_name_en', __('Tarifplan name en'));
        $grid->column('tarifplan_name_ru', __('Tarifplan name ru'));
//        $grid->column('tarifplan_name_kz', __('Tarifplan name kz'));
        $grid->column('managers_count', __('Managers count'));
//        $grid->column('videoclip_links_count', __('Videoclip links count'));
//        $grid->column('additional_presentation_links_count', __('Additional presentation links count'));
//        $grid->column('model3D_links', __('Model3D links'));
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
        $show = new Show(TariffPlan::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('tarifplan_name_en', __('Tarifplan name en'));
        $show->field('tarifplan_name_ru', __('Tarifplan name ru'));
        $show->field('tarifplan_name_kz', __('Tarifplan name kz'));
        $show->field('managers_count', __('Managers count'));
        $show->field('videoclip_links_count', __('Videoclip links count'));
        $show->field('additional_presentation_links_count', __('Additional presentation links count'));
        $show->field('model3D_links', __('Model3D links'));
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
        $form = new Form(new TariffPlan());

        $form->text('tarifplan_name_en', __('Tarifplan name en'))->required();
        $form->text('tarifplan_name_ru', __('Tarifplan name ru'))->required();
        $form->text('tarifplan_name_kz', __('Tarifplan name kz'))->required();
        $form->number('managers_count', __('Managers count'))->required();
        $form->number('videoclip_links_count', __('Videoclip links count'))->required();
        $form->number('additional_presentation_links_count', __('Additional presentation links count'))->required();
        $form->switch('model3D_links', __('Model3D links'))->required();

        return $form;
    }
}
