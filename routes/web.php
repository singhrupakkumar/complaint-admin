<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DestinationsController;
use App\Http\Controllers\Admin\TourCustomizationsController;
use App\Http\Controllers\Admin\ToursController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\Admin\{UsersController, CategoriesController, DepartmentsController, ProfilesController, SettingsController, ChangePasswordController, TanksController,CustcodesController,ComplainsController};
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
Route::get('/clear', function () {
 Artisan::call('optimize:clear');
 $rrrr = Artisan::call('storage:link');
 dd($rrrr);
});
Route::get('/sendmail', function () {
$userEmail = 'replytorupak@gmail.com';
$to = "replytorupak@gmail.com";
$subject = "New Gravure Internal Complain.";

$message = '<!doctypehtml><html xmlns=http://www.w3.org/1999/xhtml><meta content="text/html; charset=utf-8"http-equiv=Content-Type><meta content="IE=edge"http-equiv=X-UA-Compatible><meta content="width=device-width,initial-scale=1"name=viewport><title>CAPITOL GRAVURE CYLINDER SDN. BHD.</title><style></style><body style="background-color:#f2f2f2;margin:0;padding:40px 0;color:#484848;font-size:15px;font-weight:400"><table border=0 cellpadding=0 cellspacing=0 style=width:100%><tr><td><table border=0 cellpadding=0 cellspacing=0 style="max-width:600px;width:100%;margin:0 auto;background-color:#fff"><tr><td style=background-color:#0179ff;text-align:center><a href=#><img src=https://dev.twentyfirstgen.com/complaint-admin/public/attachments/1686849010capitol_gravure_logo.jpg width=120></a><tr><td style=padding-left:24px;padding-right:24px;padding-bottom:10px><p><span style=font-weight:600>Hello (Customer First Name),</span><h3 style=text-align:center>New Gravure Internal Complain.</h3><p>Title: <span style=font-weight:400;color:#0179ff>xxxxx</span><p>Orginator Name: <span style=font-weight:400;color:#0179ff>xxxxx</span><p>Complain Date: <span style=font-weight:400;color:#0179ff>xxxxx</span><p>Prod Date: <span style=font-weight:400;color:#0179ff>xxxxx</span><p>Rej.Dept: <span style=font-weight:400;color:#0179ff>xxxxx</span><p>Title: <span style=font-weight:400;color:#0179ff>xxxxx</span><tr><td style=padding:24px;text-align:right><p style=font-weight:600;text-align:right;margin:0>Regards<p style=text-align:right;margin:0>Gravure Internal Complain<tr><td style=padding:24px;background-color:#0179ff><p style=text-align:center;color:#fff;font-size:12px>2023 © CAPITOL GRAVURE CYLINDER SDN. BHD.</table></table>';

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <webmaster@example.com>' . "\r\n";
$headers .= 'Cc: rupak.bca111@gmail.com' . "\r\n";

mail($to,$subject,$message,$headers); 
exit;
	 $mm = Mail::raw('Rupak Singup Test', function ($message)use ($userEmail) {
                    $message->to($userEmail)
                            ->from('support@autodextrade.com')
                            ->subject('Rk Singup Test');
                });
				
				dd($mm );
});
// Admin Route
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    Route::get('generate-pdf', [PDFController::class, 'generatePDF'])->name('generatePDF');

	Route::any('/reports', [DashboardController::class, 'reports'])->name('admin.reports');
	Route::get('/settings', [DashboardController::class, 'settings'])->name('admin.settings');

    //Dashboard Route
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
	
	//Complains Route
    Route::get('/complains', [ComplainsController::class, 'index'])->name('admin.complains.index');
    Route::get('/complains/add-complains', [ComplainsController::class, 'create'])->name('admin.complains.add');
    Route::post('/complains/store-complains', [ComplainsController::class, 'store'])->name('admin.complains.store');
    Route::get('/complains/edit/{id?}', [ComplainsController::class, 'edit'])->name('admin.complains.edit');
    Route::post('/complains/update/{id?}', [ComplainsController::class, 'update'])->name('admin.complains.update');
    Route::get('/complains/{id?}', [ComplainsController::class, 'show'])->name('admin.complains.show');
    Route::any('/complains/delete/{id}', [ComplainsController::class, 'deleteTank'])->name('admin.complains.delete');  
    
    //Category Route
    Route::get('/category', [CategoriesController::class, 'index'])->name('admin.category.index');
    Route::get('/category/add-category', [CategoriesController::class, 'create'])->name('admin.category.add');
    Route::post('/category/store-tour', [CategoriesController::class, 'store'])->name('admin.category.store');
    Route::get('/category/edit/{id?}', [CategoriesController::class, 'edit'])->name('admin.category.edit');
    Route::post('/category/update/{id?}', [CategoriesController::class, 'update'])->name('admin.category.update');
    Route::get('/category/{id?}', [CategoriesController::class, 'show'])->name('admin.category.show');
    Route::post('/category/destroy/', [CategoriesController::class, 'destroy'])->name('admin.category.destroy');
    //Deaprtment Route
    Route::get('/departments', [DepartmentsController::class, 'index'])->name('admin.departments.index');
    Route::get('/departments/add-product', [DepartmentsController::class, 'create'])->name('admin.departments.add');
    Route::post('/departments/store-tour', [DepartmentsController::class, 'store'])->name('admin.departments.store');
    Route::get('/departments/edit/{id?}', [DepartmentsController::class, 'edit'])->name('admin.departments.edit');
    Route::post('/departments/update/{id?}', [DepartmentsController::class, 'update'])->name('admin.departments.update');
    Route::get('/departments/{id?}', [DepartmentsController::class, 'show'])->name('admin.departments.show');
    Route::any('/departments/delete/{id}', [DepartmentsController::class, 'deleteDepartment'])->name('admin.departments.delete');
	Route::any('/departmentscategories', [DepartmentsController::class, 'getDepartmentCat'])->name('admin.getDepartmentCat');
	
	    //Tank Route
    Route::get('/tanks', [TanksController::class, 'index'])->name('admin.tanks.index');
    Route::get('/tanks/add-product', [TanksController::class, 'create'])->name('admin.tanks.add');
    Route::post('/tanks/store-tour', [TanksController::class, 'store'])->name('admin.tanks.store');
    Route::get('/tanks/edit/{id?}', [TanksController::class, 'edit'])->name('admin.tanks.edit');
    Route::post('/tanks/update/{id?}', [TanksController::class, 'update'])->name('admin.tanks.update');
    Route::get('/tanks/{id?}', [TanksController::class, 'show'])->name('admin.tanks.show');
    Route::any('/tanks/delete/{id}', [TanksController::class, 'deleteTank'])->name('admin.tanks.delete');  
	
		    //Cust Code Route
    Route::get('/custcodes', [CustcodesController::class, 'index'])->name('admin.custcodes.index');
    Route::get('/custcodes/add-product', [CustcodesController::class, 'create'])->name('admin.custcodes.add');
    Route::post('/custcodes/store-tour', [CustcodesController::class, 'store'])->name('admin.custcodes.store');
    Route::get('/custcodes/edit/{id?}', [CustcodesController::class, 'edit'])->name('admin.custcodes.edit');
    Route::post('/custcodes/update/{id?}', [CustcodesController::class, 'update'])->name('admin.custcodes.update');
    Route::get('/custcodes/{id?}', [CustcodesController::class, 'show'])->name('admin.custcodes.show');
    Route::any('/custcodes/delete/{id}', [CustcodesController::class, 'deleteTank'])->name('admin.custcodes.delete');  
	
	//Product Route
    Route::get('/users', [UsersController::class, 'index'])->name('admin.users.index');
    Route::get('/users/add-product', [UsersController::class, 'create'])->name('admin.users.add');
    Route::post('/users/store-tour', [UsersController::class, 'store'])->name('admin.users.store');
    Route::get('/users/edit/{id?}', [UsersController::class, 'edit'])->name('admin.users.edit');
    Route::post('/users/update/{id?}', [UsersController::class, 'update'])->name('admin.users.update');
    Route::get('/users/{id?}', [UsersController::class, 'show'])->name('admin.users.show');
    Route::post('/users/delete/', [UsersController::class, 'deleteProductItem'])->name('admin.users.delete');
  
    // Route::get('change-password', 'ChangePasswordController@changePassword');
    // Route::post('change-password', 'ChangePasswordController@storeChangePassword')->name('change.password');
   
    Route::get('/change-password', [ChangePasswordController::class, 'index'])->name('admin.changepassword');
    Route::post('/change-password', [ChangePasswordController::class, 'store'])->name('admin.change.password');
    
    //Setting Route
    Route::get('/setting', [SettingsController::class, 'index'])->name('admin.setting');
    Route::post('/setting/store', [SettingsController::class, 'store'])->name('admin.setting.store');
	Route::post('/setting/dbBackup', [SettingsController::class, 'dbBackup'])->name('admin.dbBackup');
    //Profile Route
    Route::get('/profile', [ProfilesController::class, 'index'])->name('admin.profile');
    Route::post('/profile/store', [ProfilesController::class, 'store'])->name('admin.profile.store');

    // Other routes for user management
});




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';