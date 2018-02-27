<?php
require 'define.php';

Route::get('lang/{lang}', ['as'=>'lang.switch', 'uses'=>'LanguageController@switchLang']);
Route::get('/403',function(){ return view('errors.403');})->name('unauthorised');
Route::group(['middleware'=>['guest']],function(){
    //site routes   
});
Route::get('/',['uses'=>'HomeController@index','as'=>'getFrontHome']);
Route::get('/slider/{sliderId}/{sliderName}',['uses'=>'SliderController@show','as'=>'getFrontSliderById']);
Route::get('/services',['uses'=>'ServiceController@indexFront','as'=>'getFrontServices']);
Route::get('/service/{serviceId}/{serviceName}',['uses'=>'ServiceController@show','as'=>'getFrontServiceById']);
Route::match(['get','post'],'/search',['uses'=>'ServiceController@searchByKeyword','as'=>'getKeyword']);
Route::get('/clients',['uses'=>'ClientController@indexFront','as'=>'getFrontClients']);
Route::get('/photos',['uses'=>'PhotoController@indexFront','as'=>'getFrontPhotos']);
Route::get('/blog',['uses'=>'BlogController@indexFront','as'=>'getFrontBlog']);
Route::get('/blog/{blogId}',['uses'=>'BlogController@show','as'=>'getFrontBlogById']);

Route::get('/blog-by-categoyry-id/{categoryId}/{categoryName}',['uses'=>'BlogController@indexFrontByCategoryId','as'=>'getFrontBlogByCategoryId']);

Route::get('/page/{pageId}/{title}',['uses'=>'PageController@show','as'=>'getFrontPageById']);
Route::get('/contactus',['uses'=>'ContactController@indexFront','as'=>'getContacts']);
Route::post('/contactus',['uses'=>'ContactController@store','as'=>'postAddContact']);

Route::group(['prefix' => 'admin'],function ()
{
    Auth::routes();
});

Route::group(['prefix' => 'admin', 'middleware'=>['auth','access','laguageChooser']],function ()
{
    Route::get('/',function(){ return view('backend.layouts.statistics_layout');})->name('getBackendHome');
    Route::group(['prefix'=>'backend-users'],function (){
        //Users
        Route::get('/',['uses'=>'UserController@index','as'=>'getAllUsers']);
        Route::get('/add-user',['uses'=>'UserController@create','as'=>'getAddUser']);
        Route::post('/add-user',['uses'=>'UserController@store','as'=>'postAddUser']);
        Route::get('/user/{userId}',['uses'=>'UserController@edit','as'=>'getUserById']);
        Route::put('/user/{userId}',['uses'=>'UserController@update','as'=>'updateUserById']);
        Route::post('/user/{userId}',['uses'=>'UserController@delete','as'=>'deleteUserById']);
    });
    Route::group(['prefix'=>'backend-pages'],function (){
        //Pages
        Route::get('/',['uses'=>'PageController@index','as'=>'getAllPages']);
        Route::get('/add-page',['uses'=>'PageController@create','as'=>'getAddPage']);
        Route::post('/add-page',['uses'=>'PageController@store','as'=>'postAddPage']);
        Route::get('/page/{pageId}',['uses'=>'PageController@edit','as'=>'getPageById']);
        Route::put('/page/{pageId}',['uses'=>'PageController@update','as'=>'updatePageById']);
        Route::post('/page/{pageId}',['uses'=>'PageController@delete','as'=>'deletePageById']);
    });
    Route::group(['prefix'=>'backend-services'],function (){
        //Services
        Route::get('/',['uses'=>'ServiceController@index','as'=>'getAllServices']);
        Route::get('/add-service',['uses'=>'ServiceController@create','as'=>'getAddService']);
        Route::post('/add-service',['uses'=>'ServiceController@store','as'=>'postAddService']);
        Route::get('/service/{serviceId}',['uses'=>'ServiceController@edit','as'=>'getServiceById']);
        Route::put('/service/{serviceId}',['uses'=>'ServiceController@update','as'=>'updateServiceById']);
        Route::post('/service/{serviceId}',['uses'=>'ServiceController@delete','as'=>'deleteServiceById']);
        //Sections of services
        Route::get('/sections',['uses'=>'ServiceSectionController@index','as'=>'getAllServiceSections']);
        Route::get('/add-section',['uses'=>'ServiceSectionController@create','as'=>'getAddServiceSection']);
        Route::post('/add-section',['uses'=>'ServiceSectionController@store','as'=>'postAddServiceSection']);
        Route::get('/section/{sectionId}',['uses'=>'ServiceSectionController@edit','as'=>'getServiceSectionById']);
        Route::put('/section/{sectionId}',['uses'=>'ServiceSectionController@update','as'=>'updateServiceSectionById']);
        Route::post('/section/{sectionId}',['uses'=>'ServiceSectionController@delete','as'=>'deleteServiceSectionById']);
    });
    Route::group(['prefix'=>'backend-clients'],function (){
        //Clients
        Route::get('/',['uses'=>'ClientController@index','as'=>'getAllClients']);
        Route::get('/add-client',['uses'=>'ClientController@create','as'=>'getAddClient']);
        Route::post('/add-client',['uses'=>'ClientController@store','as'=>'postAddClient']);
        Route::get('/client/{clientId}',['uses'=>'ClientController@edit','as'=>'getClientById']);
        Route::put('/client/{clientId}',['uses'=>'ClientController@update','as'=>'updateClientById']);
        Route::post('/client/{clientId}',['uses'=>'ClientController@delete','as'=>'deleteClientById']);
    });
    Route::group(['prefix'=>'backend-blogs'],function (){
        // Blogs
        Route::get('/',['uses'=>'BlogController@index','as'=>'getAllBlogs']);
        Route::get('/add-blog',['uses'=>'BlogController@create','as'=>'getAddBlog']);
        Route::post('/add-blog',['uses'=>'BlogController@store','as'=>'postAddBlog']);
        Route::get('/blog/{blogId}',['uses'=>'BlogController@edit','as'=>'getBlogById']);
        Route::put('/blog/{blogId}',['uses'=>'BlogController@update','as'=>'updateBlogById']);
        Route::post('/blog/{blogId}',['uses'=>'BlogController@delete','as'=>'deleteBlogById']);

        //Categories of Blogs

        Route::get('/backend-categories',['uses'=>'BlogCategoryController@index','as'=>'getAllBlogCategories']);
        Route::get('/add-blog-category',['uses'=>'BlogCategoryController@create','as'=>'getAddBlogCategory']);
        Route::post('/add-blog-category',['uses'=>'BlogCategoryController@store','as'=>'postAddBlogCategory']);
        Route::get('/category/{categoryId}',['uses'=>'BlogCategoryController@edit','as'=>'getBlogCategoryById']);
        Route::put('/category/{categoryId}',['uses'=>'BlogCategoryController@update','as'=>'updateBlogCategoryById']);
        Route::post('/category/{categoryId}',['uses'=>'BlogCategoryController@delete','as'=>'deleteBlogCategoryById']);
    });
    Route::group(['prefix'=>'backend-sliders'],function (){
        // Sliders
        Route::get('/',['uses'=>'SliderController@index','as'=>'getAllSliders']);
        Route::get('/add-slider',['uses'=>'SliderController@create','as'=>'getAddSlider']);
        Route::post('/add-slider',['uses'=>'SliderController@store','as'=>'postAddSlider']);
        Route::get('/slider/{sliderId}',['uses'=>'SliderController@edit','as'=>'getSliderById']);
        Route::put('/slider/{sliderId}',['uses'=>'SliderController@update','as'=>'updateSliderById']);
        Route::post('/slider/{sliderId}',['uses'=>'SliderController@delete','as'=>'deleteSliderById']);
    });

    Route::group(['prefix'=>'backend-links'],function (){
        // Links
        Route::get('/',['uses'=>'LinkController@index','as'=>'getAllLinks']);
        Route::get('/add-link',['uses'=>'LinkController@create','as'=>'getAddLink']);
        Route::post('/add-link',['uses'=>'LinkController@store','as'=>'postAddLink']);
        Route::get('/link/{linkId}',['uses'=>'LinkController@edit','as'=>'getLinkById']);
        Route::put('/link/{linkId}',['uses'=>'LinkController@update','as'=>'updateLinkById']);
        Route::post('/link/{linkId}',['uses'=>'LinkController@delete','as'=>'deleteLinkById']);
    });

    Route::group(['prefix'=>'contacts'],function (){
        // Links
        Route::get('/contactus',['uses'=>'ContactController@index','as'=>'getAllContacts']);
        Route::get('/contact/{contactId}',['uses'=>'ContactController@show','as'=>'getContactById']);
        Route::post('/contact/{contactId}',['uses'=>'ContactController@delete','as'=>'deleteContactById']);
    });

    Route::group(['prefix'=>'settings'],function (){
        // Settings
        Route::get('/',['uses'=>'SettingController@index','as'=>'getAllSettings']);
        Route::get('/setting/{settingId}',['uses'=>'SettingController@edit','as'=>'getSettingById']);
        Route::put('/setting/{settingId}',['uses'=>'SettingController@update','as'=>'updateSettingById']);
    });
});

