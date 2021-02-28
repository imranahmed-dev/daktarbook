<?php

use Illuminate\Support\Facades\Route;

//Clear Cache
Route::get('clear', function () {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    $exitCode = Artisan::call('storage:link');
    return 'Cache Cleared Successfully'; //Return anything
});

/////////////////////////Frontend routes////////////////////////////////
Route::group(['namespace' => 'Frontend'], function () {

    Route::get('/', 'FrontendController@index');
    Route::get('/all/doctor', 'FrontendController@all_doctor')->name('all.doctor');
    Route::get('/doctor/details/{id}', 'FrontendController@doctor_details')->name('doctor.details');
    Route::get('/blog/details/{id}', 'FrontendController@blog_details')->name('blog.details');
    Route::get('/all/specialist', 'FrontendController@all_specialist')->name('all.specialist');
    Route::get('/all/blog', 'FrontendController@all_blog')->name('all.blog');
    Route::get('/specialist/doctor/{id}', 'FrontendController@specialist_doctor')->name('specialist.doctor');
    Route::get('/doctors/search/result', 'FrontendController@search_doctor')->name('search.doctor');
    Route::get('/advance/search/result', 'FrontendController@advance_search')->name('advance.search');
    Route::get('/district/doctor/{id}', 'FrontendController@district_doctor')->name('district.doctor');

    Route::get('/privacy-policy', 'FrontendController@privacy_policy')->name('privacy.policy');
    Route::get('/terms-and-condition', 'FrontendController@terms_condition')->name('terms.condition');
    Route::get('/about-us', 'FrontendController@about_us')->name('about.us');
    Route::get('/contact', 'FrontendController@contact_us')->name('contact.us');

    Route::get('/user/login', 'FrontendController@userLogin')->name('user.login');
    Route::get('/doctor/register', 'FrontendController@doctor_register')->name('doctor.register');
    Route::get('/user/register', 'FrontendController@user_register')->name('user.register');

    Route::post('/user/register/store', 'RegisterController@user_register_store')->name('user.register.store');

    Route::post('/doctor/register/store', 'RegisterController@doctor_register_store')->name('doctor.register.store');


    Route::get('/favourite/store/{id}', 'FrontendController@favourite_store')->name('favourite.store');
});

/*User dashboard*/
Route::group(['prefix' => '/user', 'namespace' => 'Frontend', 'middleware' => ['auth', 'user']], function () {

    //User profile
    Route::get('/profile', 'DashboardController@user_profile')->name('user.profile');
    Route::get('edit/profile', 'DashboardController@user_edit_profile')->name('user.edit.profile');
    Route::post('update/profile/{id}', 'DashboardController@user_update_profile')->name('user.update.profile');
    Route::get('/change/password', 'DashboardController@user_change_password')->name('user.change.password');
    Route::post('/update/password', 'DashboardController@user_update_password')->name('user.update.password');

    // favourite list
    Route::get('/favourite/doctor', 'DashboardController@favourite_doctor')->name('user.favourite.doctor');
    Route::get('/favourite/destroy/{id}', 'DashboardController@favourite_destroy')->name('favourite.destroy');

    // doctor
    Route::post('/doctor/update/profile/{id}', 'DashboardController@doctor_update_profile')->name('doctor.update.profile');

    Route::post('/doctor/change/email/{id}', 'DashboardController@doctor_change_email')->name('doctor.change.email');




});

//Auth route
Auth::routes();

/////////////////////////Default routes////////////////////////////////

//Get data
Route::group(['namespace' => 'DefaultController'], function () {

    Route::get('/get/division/{id}', 'DefaultController@get_district')->name('get.district');
});


/////////////////////////Backend routes////////////////////////////////
Route::group(['prefix' => '/admin', 'middleware' => ['auth', 'admin']], function () {

    Route::get('/dashboard', 'Backend\DashboardController@admin_dashboard')->name('home');

    //Admin
    Route::group(['as' => 'admin.', 'prefix' => '/admin', 'namespace' => 'Backend'], function () {

        Route::get('/index', 'AdminController@index')->name('index');
        Route::get('/create', 'AdminController@create')->name('create');
        Route::post('/store', 'AdminController@store')->name('store');
        Route::get('/edit/{id}', 'AdminController@edit')->name('edit');
        Route::post('/update/{id}', 'AdminController@update')->name('update');
        Route::get('/destroy/{id}', 'AdminController@destroy')->name('destroy');
    });

    //Admin Profile
    Route::group(['as' => 'admin.profile.', 'prefix' => '/admin/profile', 'namespace' => 'Backend'], function () {

        Route::get('/index', 'ProfileController@index')->name('index');
        Route::get('/edit', 'ProfileController@edit')->name('edit');
        Route::post('/update', 'ProfileController@update')->name('update');
        Route::get('/edit/password', 'ProfileController@editPassword')->name('ep');
        Route::post('/update/password', 'ProfileController@updatePassword')->name('up');
    });

    //Division
    Route::group(['as' => 'division.', 'prefix' => '/division', 'namespace' => 'Backend'], function () {
        Route::get('/index', 'DivisionController@index')->name('index');
        Route::get('/create', 'DivisionController@create')->name('create');
        Route::post('/store', 'DivisionController@store')->name('store');
        Route::get('/edit/{id}', 'DivisionController@edit')->name('edit');
        Route::post('/update/{id}', 'DivisionController@update')->name('update');
        Route::get('/destroy/{id}', 'DivisionController@destroy')->name('destroy');
    });

    //District
    Route::group(['as' => 'district.', 'prefix' => '/district', 'namespace' => 'Backend'], function () {
        Route::get('/index', 'DistrictController@index')->name('index');
        Route::get('/create', 'DistrictController@create')->name('create');
        Route::post('/store', 'DistrictController@store')->name('store');
        Route::get('/edit/{id}', 'DistrictController@edit')->name('edit');
        Route::post('/update/{id}', 'DistrictController@update')->name('update');
        Route::get('/destroy/{id}', 'DistrictController@destroy')->name('destroy');
    });

    //Specialist
    Route::group(['as' => 'specialist.', 'prefix' => '/specialist', 'namespace' => 'Backend'], function () {
        Route::get('/index', 'SpecialistController@index')->name('index');
        Route::get('/create', 'SpecialistController@create')->name('create');
        Route::post('/store', 'SpecialistController@store')->name('store');
        Route::get('/edit/{id}', 'SpecialistController@edit')->name('edit');
        Route::post('/update/{id}', 'SpecialistController@update')->name('update');
        Route::get('/destroy/{id}', 'SpecialistController@destroy')->name('destroy');
    });

    //Doctor
    Route::group(['as' => 'doctor.', 'prefix' => '/doctor', 'namespace' => 'Backend'], function () {
        Route::get('/index', 'DoctorController@index')->name('index');
        Route::get('/create', 'DoctorController@create')->name('create');
        Route::post('/store', 'DoctorController@store')->name('store');
        Route::get('/show/{id}', 'DoctorController@show')->name('show');
        Route::get('/edit/{id}', 'DoctorController@edit')->name('edit');
        Route::post('/update/{id}', 'DoctorController@update')->name('update');

        Route::get('/pending', 'DoctorController@pending')->name('pending');
        Route::get('/approved', 'DoctorController@approved')->name('approved');

        Route::get('/trash/{id}', 'DoctorController@soft_delete')->name('trash');
        Route::get('/trashed/index', 'DoctorController@trashed_index')->name('trashed.index');
        Route::get('/doctor/restore/{id}', 'DoctorController@doctor_restore')->name('restore');
        Route::get('/destroy/{id}', 'DoctorController@destroy')->name('destroy');
        Route::post('/status/{id}', 'DoctorController@doctor_status')->name('status');
    });

    //Blog
    Route::group(['as' => 'blog.', 'prefix' => '/blog', 'namespace' => 'Backend'], function () {
        Route::get('/index', 'BlogController@index')->name('index');
        Route::get('/create', 'BlogController@create')->name('create');
        Route::post('/store', 'BlogController@store')->name('store');
        Route::get('/show/{id}', 'BlogController@show')->name('show');
        Route::get('/edit/{id}', 'BlogController@edit')->name('edit');
        Route::post('/update/{id}', 'BlogController@update')->name('update');
        Route::get('/destroy/{id}', 'BlogController@destroy')->name('destroy');
        Route::post('/status/{id}', 'BlogController@blog_status')->name('status');
    });

    //Setting
    Route::group(['as' => 'setting.', 'prefix' => '/setting', 'namespace' => 'Backend'], function () {
        Route::get('/index', 'SettingController@index')->name('index');
        Route::post('/update/{id}', 'SettingController@update')->name('update');
    });    
    
    //Setting
    Route::group(['as' => 'normal.user.', 'prefix' => '/normal/user', 'namespace' => 'Backend'], function () {
        Route::get('/index', 'NormaluserController@index')->name('index');
        Route::post('/show/{id}', 'NormaluserController@show')->name('show');
        Route::get('/destroy/{id}', 'NormaluserController@destroy')->name('destroy');
    });
});
