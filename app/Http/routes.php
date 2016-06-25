<?php
Route::auth();

    Route::get('/', function () {
      return view('welcome');
    });


    Route::group(['prefix' => 'home'], function() {
      Route::resource('/', 'HomeController');
      Route::resource('/base', 'HomeController@base');
    });

    Route::group(['prefix' => 'accounts'], function() {
      Route::resource('my_account', 'My_AccountController');
      Route::resource('account', 'AccountController');
      Route::resource('/', 'AccountController');
      Route::patch('account/{account}/update', 'AccountController@update');
      Route::resource('account/{id}/destroy', 'AccountController@destroy');
    });

    Route::group(['prefix' => 'applications'], function() {
      Route::resource('application_info', 'Application_InfoController');
      Route::resource('application', 'ApplicationController');
      Route::resource('/', 'ApplicationController');
      Route::patch('application/{application}/update', 'ApplicationController@update');
      Route::resource('application/{id}/destroy', 'ApplicationController@destroy');
    });

    Route::group(['prefix' => 'data_centers'], function() {
      Route::resource('data_center_info', 'Data_center_InfoController');
      Route::resource('data_center', 'Data_centerController');
      Route::resource('/', 'Data_centerController');
      Route::patch('data_center/{data_center}/update', 'Data_centerController@update');
      Route::resource('data_center/{id}/destroy', 'Data_centerController@destroy');
    });

    Route::group(['prefix' => 'domain_names'], function() {
      Route::resource('my_domain_name', 'My_Domain_nameController');
      Route::resource('domain_name', 'Domain_nameController');
      Route::resource('/', 'Domain_nameController');
      Route::patch('domain_name/{domain_name}/update', 'Domain_nameController@update');
      Route::resource('domain_name/{id}/destroy', 'Domain_nameController@destroy');
    });

    Route::group(['prefix' => 'distributions'], function() {
      Route::resource('distribution', 'DistributionController');
      Route::resource('/', 'DistributionController');
      Route::patch('distribution/{distribution}/update', 'DistributionController@update');
      Route::resource('distribution/{id}/destroy', 'DistributionController@destroy');
    });

    Route::group(['prefix' => 'distribution_versions'], function() {
      Route::resource('distribution_version', 'Distribution_versionController');
      Route::resource('/', 'Distribution_versionController');
      Route::patch('distribution_version/{distribution_version}/update', 'Distribution_versionController@update');
      Route::resource('distribution_version/{id}/destroy', 'Distribution_versionController@destroy');
    });

    Route::group(['prefix' => 'providers'], function() {
      Route::resource('provider_info', 'Provider_InfoController');
      Route::resource('provider', 'ProviderController');
      // Route::resource('provider/{crmid}', 'ProviderController@showcrm');
      Route::resource('/', 'ProviderController');
      Route::patch('provider/{provider}/update', 'ProviderController@update');
      Route::resource('provider/{id}/destroy', 'ProviderController@destroy');
    });

    Route::group(['prefix' => 'purposes'], function() {
      Route::resource('purpose', 'PurposeController');
      Route::resource('/', 'PurposeController');
      Route::patch('purpose/{purpose}/update', 'PurposeController@update');
      Route::resource('purpose/{id}/destroy', 'PurposeController@destroy');
    });

    Route::group(['prefix' => 'registrars'], function() {
      Route::resource('registrar_info', 'Registrar_InfoController');
      Route::resource('registrar', 'RegistrarController');
      Route::resource('/', 'RegistrarController');
      Route::patch('registrar/{registrar}/update', 'RegistrarController@update');
      Route::resource('registrar/{id}/destroy', 'RegistrarController@destroy');
    });

    Route::group(['prefix' => 'servers'], function() {
      Route::resource('/my_server', 'My_ServerController');
      Route::resource('/server', 'ServerController');
      Route::resource('/', 'ServerController');
      Route::patch('server/{server}/update', 'ServerController@update');
      Route::resource('server/{id}/destroy', 'ServerController@destroy');
    });

    Route::group(['prefix' => 'users'], function() {
      Route::resource('/user', 'UserController');
      Route::resource('/', 'UserController');
      Route::patch('user/{user}/update', 'UserController@update');
      Route::resource('user/{id}/destroy', 'UserController@destroy');
    });

    Route::group(['prefix' => 'profile'], function() {
      Route::resource('/', 'ProfileController@profile');
      Route::post('/', 'ProfileController@update_avatar');
    });

    Route::group(['prefix' => 'websites'], function() {
      Route::resource('/', 'WebsiteController');
      Route::resource('my_website', 'My_WebsiteController');
      Route::resource('website', 'WebsiteController');
      Route::patch('website/{website}/update', 'WebsiteController@update');
      Route::resource('website/{id}/destroy', 'WebsiteController@destroy');
    });
    Route::get('websites/name/{name}', 'WebsiteController@name');
    Route::get('websites/blog/{websiteid}/{year}/{month}/{day}', 'WebsiteController@blog');
