<?php

namespace App\Admin\Controllers;

use App\Admin\FormField\KeyValue;
use App\Event;
use App\Project;
use App\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\TariffPlan;

class UserController extends AdminController
{
    public function __construct()
    {
        User::$allowPasswordAutoHash = true;
    }

    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'User';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new User());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('email', __('Email'));
//        $grid->column('project_id', __('Project id'));
//        $grid->column('business_information_id', __('Business information id'));
//        $grid->column('user_projects', __('User projects'));
//        $grid->column('email_verified_at', __('Email verified at'));
        // $grid->column('password', __('Password'));
        // $grid->column('remember_token', __('Remember token'));

//        $grid->column('profile.company_name', __('Company name'));
//        $grid->column('profile.bin', __('Bin'));
//        $grid->column('profile.address', __('Address'));
//        $grid->column('profile.phone_number', __('Phone number'));
//        $grid->column('profile.website', __('Website'));
//        $grid->column('profile.description', __('Description'));
//        $grid->column('profile.company_logo', __('Company logo'));

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
        $show = new Show(User::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('email', __('Email'));
//        $show->field('user_projects', __('User projects'));
//        $show->field('email_verified_at', __('Email verified at'));

        $show->field('profile.company_name', __('Company name'));
        $show->field('profile.bin', __('Bin'));
        $show->field('profile.address', __('Address'));
        $show->field('profile.phone_number', __('Phone number'));
        $show->field('profile.website', __('Website'));
        $show->field('profile.description', __('Description'));
        $show->field('profile.company_logo', __('Company logo'));

        $show->field('business_information.main_presentation_link', __('Main presentation link'));
        $show->field('business_information.additional_presentation_links', __('Additional presentation links'))->json();
        $show->field('business_information.videoclip_links', __('Videoclip links'))->json();
        $show->field('business_information.gallery_links', __('Gallery links'))->json();
        $show->field('business_information.company_visitcard', __('Company visitcard'));
        $show->field('business_information.model3d_link', __('Model3D link'));
        $show->field('business_information.gallery_link', __('Gallery link'));

        $show->field('events', __('Events'))->json();

        // $show->field('password', __('Password'));
        // $show->field('remember_token', __('Remember token'));
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
        $form = new Form(new User());

        Form::extend('keyValue', KeyValue::class);

        $form->tab('User Details', function (Form $form) {
            $form->text('name', __('Name'))->required();
            $form->email('email', __('Email'))->required();
            // $form->select('business_information_id', __('Business information id'))->options(BusinessInformation::all()->pluck('id','id'));
            // $form->text('user_projects', __('User projects'));
//            $form->datetime('email_verified_at', __('Email verified at'))->default(date('Y-m-d H:i:s'));
            $form->text('profile.company_name', __('Company name'))->required();
            $form->text('profile.bin', __('Bin'))->rules('required|numeric|digits:12');
            $form->text('profile.address', __('Address'))->required();
            $form->mobile('profile.phone_number', __('Phone number'))->options(['mask' => '999 9999 9999'])->required();
            $form->url('profile.website', __('Website'));
            $form->textarea('profile.description', __('Description'));
            $form->image('profile.company_logo', __('Company logo'));
            $form->password('password', __('Password'));
            // $form->text('remember_token', __('Remember token'));
        })->tab('Business Information', function (Form $form) {
            $form->text('business_information.main_presentation_link', __('Main presentation link'));
            $form->keyValue('business_information.additional_presentation_links', __('Additional presentation links'));
            $form->keyValue('business_information.videoclip_links', __('Videoclip links'));
            $form->keyValue('business_information.gallery_links', __('Gallery links'));
            $form->text('business_information.company_visitcard', __('Company visitcard'));
            $form->text('business_information.model3d_link', __('Model3D link'));
            $form->text('business_information.gallery_link', __('Gallery link'));
        })->tab('Event', function (Form $form) {
            $form->hasMany('attached_events', 'Events',  function(Form\NestedForm $form) {
                $form->select('event_id', 'Event')->options(Event::all()->pluck('project_name_ru', 'id')->toArray())->load('stand_id', '/api/admin/stands-by-event')->required();
                $form->select('stand_id', 'Stand')->required()->use(function() {
                    dd($this);
                });
                $form->select('tariff_id', 'Tariff')->options(TariffPlan::all()->pluck('tarifplan_name_ru', 'id')->toArray())->required();
            });
        });

        return $form;
    }
}
