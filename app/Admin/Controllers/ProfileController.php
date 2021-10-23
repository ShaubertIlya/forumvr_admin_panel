<?php

namespace App\Admin\Controllers;

use App\Profile;
use App\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ProfileController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Profile';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Profile());

        $grid->column('id', __('Id'));
        $grid->column('user_id', __('User id'));
        $grid->column('company_name', __('Company name'));
        $grid->column('bin', __('Bin'));
        $grid->column('address', __('Address'));
        $grid->column('phone_number', __('Phone number'));
        $grid->column('website', __('Website'));
        $grid->column('description', __('Description'));
        $grid->column('company_logo', __('Company logo'));
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
        $show = new Show(Profile::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('user_id', __('User id'));
        $show->field('company_name', __('Company name'));
        $show->field('bin', __('Bin'));
        $show->field('address', __('Address'));
        $show->field('phone_number', __('Phone number'));
        $show->field('website', __('Website'));
        $show->field('description', __('Description'));
        $show->field('company_logo', __('Company logo'));
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
        $form = new Form(new Profile());

        $form->select('user_id', __('User Id'))->options(User::all()->pluck('name', 'id'))->required();
        $form->text('company_name', __('Company name'))->required();
        $form->text('bin', __('Bin'));
        $form->text('address', __('Address'))->required();
        $form->text('phone_number', __('Phone number'))->required();
        $form->text('website', __('Website'));
        $form->textarea('description', __('Description'));
        $form->text('company_logo', __('Company logo'));

        return $form;
    }
}
