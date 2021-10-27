<?php

namespace App\Admin\Controllers;

use App\BusinessInformation;
use App\ForumParticipant;
use App\Profile;
use App\Project;
use App\UserEvent;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ForumParticipantController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Участники форума';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new ForumParticipant());

        $grid->column('id', __('Id'));
        $grid->column('is_active', __('Is active'));
        $grid->column('can_access_forum', __('Can access forum'));
        $grid->column('profile_id', __('Profile id'));
        $grid->column('business_information_id', __('Business information id'));
        $grid->column('user_event_id', __('User event id'));
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
        $show = new Show(ForumParticipant::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('is_active', __('Is active'));
        $show->field('can_access_forum', __('Can access forum'));
        $show->field('profile_id', __('Profile id'));
        $show->field('business_information_id', __('Business information id'));
        $show->field('user_event_id', __('User event id'));
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
        $form = new Form(new ForumParticipant());

        $form->switch('is_active', __('Is active'))->required();
        $form->switch('can_access_forum', __('Can access forum'))->required();
        $form->select('profile_id', __('Profile id'))->options(Profile::with('user')->get()->pluck('user.name','id'))->required();
        $form->select('business_information_id', __('Business information id'))->options(BusinessInformation::all()->pluck('id','id'))->required();
        $form->select('user_event_id', __('User event id'))->options(UserEvent::with('event')->get()->pluck('event.project_name_ru','id'))->required();

        return $form;
    }
}
