<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {
    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('forum-users', 'UserController');
    $router->resource('profiles', 'ProfileController');
    $router->resource('tariff-plans', 'TariffPlanController');
    $router->resource('business-information', 'BusinessInformationController');
    $router->resource('forum-managers', 'ForumManagerController');
    $router->resource('projects', 'ProjectsController');
    $router->resource('user-projects', 'UserProjectsController');
    $router->resource('stands', 'StandsController');
    $router->resource('request-for-confirmations', 'RequestsForConfirmationController');
    $router->resource('events', 'EventsController');
    $router->resource('event-statuses', 'EventStatusController');
    $router->resource('countries', 'CountryController');
    $router->resource('available-events', 'AvailableEventController');
    $router->resource('user-events', 'UserEventController');
    $router->resource('forum-participants', 'ForumParticipantController');
});
