<?php

namespace App\Admin\Controllers;

use App\BusinessInformation;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class BusinessInformationController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'BusinessInformation';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new BusinessInformation());

        $grid->column('id', __('Id'));
//        $grid->column('main_presentation_link', __('Main presentation link'));
//        $grid->column('additional_presentation_links', __('Additional presentation links'));
//        $grid->column('videoclip_links', __('Videoclip links'));
//        $grid->column('gallery_links', __('Gallery links'));
        $grid->column('company_visitcard', __('Company visitcard'));
        $grid->column('model3D_link', __('Model3D link'));
        $grid->column('gallery_link', __('Gallery link'));
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
        $show = new Show(BusinessInformation::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('main_presentation_link', __('Main presentation link'));
        $show->field('additional_presentation_links', __('Additional presentation links'));
        $show->field('videoclip_links', __('Videoclip links'));
        $show->field('gallery_links', __('Gallery links'));
        $show->field('company_visitcard', __('Company visitcard'));
        $show->field('model3D_link', __('Model3D link'));
        $show->field('gallery_link', __('Gallery link'));
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
        $form = new Form(new BusinessInformation());

        $form->text('main_presentation_link', __('Main presentation link'))->required();
        $form->keyValue('additional_presentation_links', __('Additional presentation links'));
        $form->keyValue('videoclip_links', __('Videoclip links'));
        $form->keyValue('gallery_links', __('Gallery links'));
        $form->text('company_visitcard', __('Company visitcard'));
        $form->text('model3D_link', __('Model3D link'));
        $form->text('gallery_link', __('Gallery link'));

        return $form;
    }
}
