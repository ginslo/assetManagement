<?php
Route::auth();

    Route::get('/', function () {
      return view('home');
    });

    Route::get('about', function () {
      return view('about');
    });

    Route::group(['prefix' => 'categories'], function() {
      Route::resource('category', 'CategoryController');
      Route::resource('/', 'CategoryController');
      Route::patch('category/{category}/update', 'CategoryController@update');
      Route::resource('category/{id}/destroy', 'CategoryController@destroy');
    });

    Route::group(['prefix' => 'companies'], function() {
      Route::resource('my_company', 'My_CompanyController');
      Route::resource('company', 'CompanyController');
      Route::resource('/', 'CompanyController');
      Route::patch('company/{company}/update', 'CompanyController@update');
      Route::resource('company/{id}/destroy', 'CompanyController@destroy');
    });

    Route::group(['prefix' => 'contact'], function() {
      Route::resource('/', 'ContactController');
      Route::resource('/meeting-scheduler', 'ContactController@meeting');
    });

    Route::group(['prefix' => 'data_centers'], function() {
      Route::resource('data_center_info', 'Data_center_InfoController');
      Route::resource('data_center', 'Data_centerController');
      Route::resource('/', 'Data_centerController');
      Route::patch('data_center/{data_center}/update', 'Data_centerController@update');
      Route::resource('data_center/{id}/destroy', 'Data_centerController@destroy');
    });

    Route::group(['prefix' => 'distributions'], function() {
      Route::resource('distribution', 'DistributionController');
      Route::resource('/', 'DistributionController');
      Route::patch('distribution/{distribution}/update', 'DistributionController@update');
      Route::resource('distribution/{id}/destroy', 'DistributionController@destroy');
    });

    Route::group(['prefix' => 'domain_names'], function() {
      Route::resource('my_domain_name', 'My_Domain_nameController');
      Route::resource('domain_name', 'Domain_nameController');
      Route::resource('/', 'Domain_nameController');
      Route::patch('domain_name/{domain_name}/update', 'Domain_nameController@update');
      Route::resource('domain_name/{id}/destroy', 'Domain_nameController@destroy');
    });

    Route::group(['prefix' => 'invoices'], function() {
      Route::resource('my_invoice', 'My_InvoiceController');
      Route::resource('invoice', 'InvoiceController');
      Route::resource('/', 'InvoiceController');
      Route::patch('invoice/{invoice}/update', 'InvoiceController@update');
      Route::resource('invoice/{id}/destroy', 'InvoiceController@destroy');
    });

    Route::group(['prefix' => 'orders'], function() {
      Route::resource('order', 'OrderController');
      Route::resource('/', 'OrderController');
      Route::patch('order/{order}/update', 'OrderController@update');
      Route::resource('order/{id}/destroy', 'OrderController@destroy');
    });

    Route::group(['prefix' => 'overview'], function() {
      Route::resource('/', 'OverviewController');
      Route::resource('overview/', 'OverviewController@byuser');
      Route::resource('/base', 'OverviewController@base');
    });

    Route::group(['prefix' => 'products'], function() {
      Route::resource('product_info', 'Product_InfoController');
      Route::resource('product', 'ProductController');
      Route::resource('/', 'ProductController');
      Route::patch('product/{product}/update', 'ProductController@update');
      Route::resource('product/{id}/destroy', 'ProductController@destroy');
    });

    Route::group(['prefix' => 'profile'], function() {
      Route::resource('/', 'ProfileController@profile');
      Route::post('/', 'ProfileController@update_avatar');
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

    Route::group(['prefix' => 'search'], function() {
      Route::resource('/', 'SearchController');
    });

    Route::group(['prefix' => 'servers'], function() {
      Route::resource('my_server', 'My_ServerController');
      Route::resource('server', 'ServerController');
      Route::resource('/', 'ServerController');
      Route::patch('server/{server}/update', 'ServerController@update');
      Route::resource('server/{id}/destroy', 'ServerController@destroy');
    });

    Route::get('services/', 'ServiceController@index');
    Route::get('services/{category_id}', 'ServiceController@prodid');
    Route::get('services/{category_slug}', 'ServiceController@category');
    Route::get('services/{category_slug}/{service_slug}', 'ServiceController@service');


    Route::get('store', function () {
      return redirect('https://store.westlinks.com');
    });

    Route::group(['prefix' => 'subscriptions'], function() {
      Route::resource('subscription', 'SubscriptionController');
      Route::resource('my_subscription', 'My_SubscriptionController@show');
      Route::resource('my_subscriptions', 'My_SubscriptionController');
      Route::resource('/', 'SubscriptionController');
      Route::patch('subscription/{subscription}/update', 'SubscriptionController@update');
      Route::resource('subscription/{id}/destroy', 'SubscriptionController@destroy');
    });

    Route::group(['prefix' => 'transactions'], function() {
      Route::resource('transaction', 'TransactionController');
      Route::resource('my_transaction', 'My_TransactionController@show');
      Route::resource('my_transactions', 'My_TransactionController');
      Route::resource('/', 'TransactionController');
      Route::patch('transaction/{transaction}/update', 'TransactionController@update');
      Route::resource('transaction/{id}/destroy', 'TransactionController@destroy');
    });

    Route::group(['prefix' => 'users'], function() {
      Route::resource('/user', 'UserController');
      Route::resource('/', 'UserController');
      Route::patch('user/{user}/update', 'UserController@update');
      Route::resource('user/{id}/destroy', 'UserController@destroy');
    });

    Route::group(['prefix' => 'versions'], function() {
      Route::resource('version', 'VersionController');
      Route::resource('/', 'VersionController');
      Route::patch('version/{version}/update', 'VersionController@update');
      Route::resource('version/{id}/destroy', 'VersionController@destroy');
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
