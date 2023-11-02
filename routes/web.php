<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;

use App\Http\Controllers\Admin\DistrictMasterController;
use App\Http\Controllers\Admin\TalukaMasterController;

use App\Http\Controllers\Admin\DepartmentMasterController;

use App\Http\Controllers\Admin\MeatTypeMasterController;

use App\Http\Controllers\Admin\ColdStorageListController;  

use App\Http\Controllers\Admin\ColdStorageRenewalListController; 

use App\Http\Controllers\Admin\Coldstorage_ReporController;  

use App\Http\Controllers\Admin\Coldstorage_RenewalReporController;

use App\Http\Controllers\User\DogRegistrationController;


use App\Http\Controllers\User\ColdStorageRegistrationController;

use App\Http\Controllers\User\ColdStorageRegistrationRenewalController;

use App\Http\Controllers\Hod\HodColdStorageListController;

use App\Http\Controllers\Hod\HodColdStorageRenewalListController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function () {
    return view('user.home');
});

Auth::routes();

// ======================= Admin Register
Route::get('/admin/register', [App\Http\Controllers\Admin\Auth\RegisterController::class, 'register'])->name('admin.register');
Route::post('/admin/register', [App\Http\Controllers\Admin\Auth\RegisterController::class, 'store'])->name('admin.register.store');

// ======================= Admin Login/Logout
Route::get('/admin/login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'login'])->name('login');// Very imp line for session expire after 2hrs 
Route::post('/admin/login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'authenticate'])->name('admin.login.store');
Route::post('/admin/logout', [App\Http\Controllers\Admin\Auth\LoginController::class, 'logout'])->name('admin.logout');

// ======================= HOD Login/Logout
// Route::get('/hod/login', [App\Http\Controllers\Hod\Auth\LoginController::class, 'login'])->name('login');// Very imp line for session expire after 2hrs 
// Route::post('/hod/login', [App\Http\Controllers\Hod\Auth\LoginController::class, 'authenticate'])->name('hod.login.store');
// Route::post('/hod/logout', [App\Http\Controllers\Hod\Auth\LoginController::class, 'hodlogout'])->name('hod.logout');

// ======================= Admin Dashboard
    Route::group(['middleware' => ['auth:web']], function () {
    
    Route::get('/admin/dashboard', [App\Http\Controllers\Admin\HomeController::class, 'Admin_Home'])->name('admin.dashboard');
    
    Route::get('/hod/dashboard', [App\Http\Controllers\Hod\HomeController::class, 'Admin_Home'])->name('hod.dashboard');

    // ========= District Master
    Route::resource('/district_master', DistrictMasterController::class);

    // ========= Taluka Master
    Route::resource('/taluka_master', TalukaMasterController::class);
    
    // ========= Ward Master
    Route::resource('/ward_master', WardMasterController::class);
    
    // ========= Department Master
    Route::resource('/department_master', DepartmentMasterController::class);
    
    // ========= Meat Type Master
    Route::resource('/meat_type_master', MeatTypeMasterController::class);
    
    


// ----------------------********************* New Begining=====================


    // ========= Cold Storage Admin panel Form 
    Route::get('/cold_storage_list/{status}', [ColdStorageListController::class, 'ColdStorageRegistrationList'])->name('cold_storage_list');

    Route::get('/cold_storage_view/{id}/{status}', [ColdStorageListController::class, 'ColdStorageView'])->name('cold_storage_view');

    Route::post('/approve_cold_registration/{id}', [ColdStorageListController::class, 'ApproveColdStorageRegistration'])->name('admin.approve_cold_registration');

    Route::post('/reject_cold_registration/{id}', [ColdStorageListController::class, 'RejectColdStorageRegistration'])->name('admin.reject_cold_registration');
    
    Route::get('/generate_english_coldstorage_registration_pdf/{id}/{status}', [ColdStorageListController::class, 'EnglishGenerateColdStorageRegistration'])->name('admin.generate_english_coldstorage_registration_pdf');
    
    Route::get('/generate_marathi_coldstorage_registration_pdf/{id}/{status}', [ColdStorageListController::class, 'MarathiGenerateColdStorageRegistration'])->name('admin.generate_marathi_coldstorage_registration_pdf');


    Route::get('/generate_affidavit_pdf/{id}/{status}', [ColdStorageListController::class, 'GenerateaffidavitPdf'])->name('admin.generate_affidavit_pdf');

// ========= Cold Storage Hod Aprove,reject list hod pannel 
    Route::get('/cold_storage_lists/{status}', [HodColdStorageListController::class, 'ColdStorageRegistrationList'])->name('cold_storage_lists');

    Route::get('/cold_storage_views/{id}/{status}', [HodColdStorageListController::class, 'ColdStorageView'])->name('cold_storage_views');

    Route::get('/approve_cold_registration_by_hod/{id}', [HodColdStorageListController::class, 'ApproveColdStorageRegistrations'])->name('hod.approve_cold_registration');

    Route::post('/reject_cold_registration_by_hod/{id}', [HodColdStorageListController::class, 'RejectColdStorageRegistration'])->name('hod.reject_cold_registration');

   
 // ========= Cold Storage Renewal Hod Aprove,reject list hod pannel 

    Route::get('/hod_cold_storage_renewal_list/{status}', [HodColdStorageRenewalListController::class, 'ColdStorageRenewalLists'])->name('hod.cold_storage_renewal_list');

    Route::get('/hod_cold_storage_renewal_view/{id}/{status}', [HodColdStorageRenewalListController::class, 'ColdStorageView'])->name('hod.cold_storage_renewal_view');

    Route::get('/approve_coldStorage_renewal_by_hod/{id}', [HodColdStorageRenewalListController::class, 'ApproveColdStoragerenewal'])->name('hod.approve_coldStorage_renewal');

    Route::post('/reject_coldStorage_renewal_by_hod/{id}', [HodColdStorageRenewalListController::class, 'RejectColdStoragerenewal'])->name('hod.reject_coldStorage_renewal');

     // ============== final approve by hod ================

     Route::get('/admin_approve_list/{status}', [HodColdStorageListController::class, 'FinalApprovedbyAdminList'])->name('admin_approve_list');

     Route::get('/final_approve_view/{id}/{status}', [HodColdStorageListController::class, 'FinalApproveView'])->name('final_approve_view');

     Route::post('/final_approve_cold_registration/{id}', [HodColdStorageListController::class, 'ApprovebyHodRegistration'])->name('hod.final_approve_coldstorage_registration');

     Route::post('/final_reject_cold_registration/{id}', [HodColdStorageListController::class, 'RejectByHodRegistration'])->name('hod.reject_coldstorage_registration');

     Route::get('/admin_rejected_list/{status}', [HodColdStorageListController::class, 'adminRejectedList'])->name('admin_rejected_list');

     Route::get('/generate_english_cold_registration_pdf/{id}/{status}', [HodColdStorageListController::class, 'EnglishGenerateColdStorageRegistration'])->name('hod.generate_english_cold_registration_pdf');

     Route::get('/generate_marathi_cold_registration_pdf/{id}/{status}', [HodColdStorageListController::class, 'MarathiGenerateColdStorageRegistration'])->name('hod.generate_marathi_cold_registration_pdf');
    
     //=========== Report =======================
     Route::get('/hod_cold_Report_List', [HodColdStorageListController::class, 'cold_storage_Report_List'])->name('hod.cold_Report_List');

     Route::post('/search_cold_Report_List', [HodColdStorageListController::class, 'cold_storage_SearchReport'])->name('hod.search_cold_Report_List');

     Route::get('/hod_cold_Report_view/{id}', [HodColdStorageListController::class, 'report_view'])->name('hod.cold_Report_view');
    
    // ============== renewal final approve by hod ================
    Route::get('/admin_approve_list_renewal/{status}', [HodColdStorageRenewalListController::class, 'FinalApprovedbyAdminListrenewal'])->name('admin_approve_list_renewal');

    Route::get('/final_approve_view_renewal/{id}/{status}', [HodColdStorageRenewalListController::class, 'FinalApproveRenewalView'])->name('final_approve_view_renewal');

    Route::post('/final_approve_cold_renewal/{id}', [HodColdStorageRenewalListController::class, 'ApprovebyHodRenewal'])->name('hod.final_approve_coldstorage_renewal');

    Route::post('/final_reject_cold_renewal/{id}', [HodColdStorageRenewalListController::class, 'RejectByHodRenewal'])->name('hod.final_reject_coldstorage_renewal');

    Route::get('/generate_english_cold_renewal_pdf/{id}/{status}', [HodColdStorageRenewalListController::class, 'EnglishGenerateColdStoragerenewal'])->name('hod.generate_english_cold_renewal_pdf');

    Route::get('/generate_marathi_cold_renewal_pdf/{id}/{status}', [HodColdStorageRenewalListController::class, 'MarathiGenerateColdStoragerenewal'])->name('hod.generate_marathi_cold_renewal_pdf');

    Route::get('/admin_rejected_list_renewal/{status}', [HodColdStorageRenewalListController::class, 'adminRejectedListRenewal'])->name('admin_rejected_list_renewal');

    Route::get('/hod_cold_renewal_Report_view/{id}', [HodColdStorageRenewalListController::class, 'renewal_report_view'])->name('hod.cold_renewal_Report_view');

    // ============== Renewal Report ====================

    Route::get('/hod_cold_renewal_Report', [HodColdStorageRenewalListController::class, 'cold_storage_renewal_Report_List'])->name('hod.hod_cold_renewal_Report');

     Route::post('/search_cold_renewal_Report', [HodColdStorageRenewalListController::class, 'cold_storage_renewalSearchReport'])->name('hod.search_cold_renewal_Report');


    // ------ cold storage renewal admin panel list ------------------

     Route::get('/cold_storage_renewal_list/{status}', [ColdStorageRenewalListController::class, 'ColdStorageRenewalList'])->name('cold_storage_renewal_list');

     Route::get('/cold_storage_renewal_view/{id}/{status}', [ColdStorageRenewalListController::class, 'ColdStorageView'])->name('cold_storage_renewal_view');

     Route::post('/approve_coldStorage_renewal/{id}', [ColdStorageRenewalListController::class, 'ApproveColdStoragerenewal'])->name('admin.approve_coldStorage_renewal');

     Route::post('/reject_coldStorage_renewal/{id}', [ColdStorageRenewalListController::class, 'RejectColdStoragerenewal'])->name('admin.reject_coldStorage_renewal');
    
     Route::get('/generate_english_coldstorage_renewal_pdf/{id}/{status}', [ColdStorageRenewalListController::class, 'EnglishGenerateColdStoragerenewal'])->name('admin.generate_english_coldstorage_renewal_pdf');
    
     Route::get('/generate_marathi_coldstorage_renewal_pdf/{id}/{status}', [ColdStorageRenewalListController::class, 'MarathiGenerateColdStoragerenewal'])->name('admin.generate_marathi_coldstorage_renewal_pdf');


     Route::get('/generate_renewal_affidavit_pdf/{id}/{status}', [ColdStorageRenewalListController::class, 'GeneraterenewalaffidavitPdf'])->name('admin.generate_renewal_affidavit_pdf');


// ----------------- Report -------------------------------

    Route::get('/all_register_coldstorage', [Coldstorage_ReporController::class, 'Coldstorage_Report_List'])->name('admin.all_register_coldstorage');
    
    Route::post('/search_all_coldstorage_list', [Coldstorage_ReporController::class, 'Coldstorage_SearchReport_List'])->name('admin.search_all_coldstorage_list');


    Route::get('/all_coldstorage_renewal_report', [Coldstorage_RenewalReporController::class, 'Coldstorage_renewal_Report_List'])->name('admin.all_coldstorage_renewal_report');
    
    Route::post('/search_coldstorage_renewal_list', [Coldstorage_RenewalReporController::class, 'Coldstorage_renewalSearchReport_List'])->name('admin.search_coldstorage_renewal_list');
    
    
});


// ======================= Cold Storage Terms & Conditions

Route::get('/user/cold_storage_terms', [ColdStorageRegistrationController::class, 'Terms_Conditions'])->name('user.cold_storage_terms');


Route::post('/taluka_list', [ColdStorageRegistrationController::class, 'Taluka_List'])->name('taluka_list');


// ======================= User Login
    Route::get('/user/login', [App\Http\Controllers\User\Auth\LoginController::class, 'User_Login_Form'])->name('user.login');
    Route::post('/user/login', [App\Http\Controllers\User\Auth\LoginController::class, 'User_Authenticate'])->name('user.login.store');
    Route::post('/user/logout', [App\Http\Controllers\User\Auth\LoginController::class, 'User_Logout'])->name('user.logout');

// ======================= User Register 
    Route::get('/user/register', [App\Http\Controllers\User\Auth\RegisterController::class, 'User_Register_Form'])->name('user.register');

    Route::post('/user/register', [App\Http\Controllers\User\Auth\RegisterController::class, 'Store_User_Register_Form'])->name('user.register.store');


    // =======================  Cold Storage Registration Form

    Route::get('/user/cold_storage_registration', [ColdStorageRegistrationController::class, 'create'])->name('user.cold_storage_registration');
    
    Route::post('/user/cold_storage_registration', [ColdStorageRegistrationController::class, 'store'])->name('user.cold_storage_registration.store');




    Route::get('/user/self_decleration', [ColdStorageRegistrationController::class, 'self_decleration_view'])->name('user.self_decleration');
    
    Route::get('/user/accept_self_declaration/{id}', [ColdStorageRegistrationController::class, 'self_decleration_accept'])->name('user.accept_self_declaration');





// ======================= Cold Storage Search
Route::post('/check-application-status', [ColdStorageRegistrationController::class, 'check_application_status'])->name('check-application-status');


// ======================= User Dashboard for Cold Storage
    Route::group(['middleware' => ['auth:meatregistereduser']], function () {
    
    Route::get('/user/appli_form', [ColdStorageRegistrationController::class, 'User_ApplicationForm'])->name('user.appli_form');

    Route::get('/user/appli_form/View/{application_no}/{user_type}', [ColdStorageRegistrationController::class, 'User_ApplicationForm_View'])->name('user.appli_form.view');
    
    Route::get('/user/appli_form/View_coldstorage/{application_no}/{user_type}', [ColdStorageRegistrationController::class, 'ApplicationForm_View'])->name('user.appli_form.View_coldstorage');


    Route::post('/user/update_cold_storage/{id}', [ColdStorageRegistrationController::class, 'updateColdStorage'])->name('user.update_cold_storage');



   Route::get('/user/self_affadevit_pdf/{id}', [ColdStorageRegistrationController::class, 'self_affadevit_pdf'])->name('user.self_affadevit_pdf');
   
   Route::get('/user/generate_english_coldstorage_license_pdf/{id}', [ColdStorageRegistrationController::class, 'GenerateenglishLicensepdf'])->name('user.generate_english_coldstorage_license_pdf');
    
   Route::get('/user/generate_marathi_coldstorage_license_pdf/{id}', [ColdStorageRegistrationController::class, 'GenerateMarathiLicensepdf'])->name('user.generate_marathi_coldstorage_license_pdf');
   
   


// ======================= Cold Storage Renewal Form =========================


Route::get('/user/cold_storage_renewal_form', [ColdStorageRegistrationRenewalController::class, 'create'])->name('user.cold_storage_renewal_form');

Route::post('/user/cold_storage_renewal_form', [ColdStorageRegistrationRenewalController::class, 'store'])->name('user.cold_storage_renewal_form.store');

Route::get('/user/appli_form/View_renewal/{application_no}/{user_type}', [ColdStorageRegistrationRenewalController::class, 'User_coldStorageRenewalForm_View'])->name('user.appli_form.View_renewal');


Route::post('/user/update_coldStorage_renewal_form/{id}', [ColdStorageRegistrationRenewalController::class, 'UpdateColdStorageRenewal'])->name('user.update_coldStorage_renewal_form');

    
Route::get('/user/self_affadevit_renewal_pdf/{id}', [ColdStorageRegistrationRenewalController::class, 'self_affadevit_renewal_pdf'])->name('user.self_affadevit_renewal_pdf');
 
Route::get('/user/generate_english_coldstorage_renewal_license_pdf/{id}', [ColdStorageRegistrationRenewalController::class, 'GenerateenglishrenewalLicensepdf'])->name('user.generate_english_coldstorage_renewal_license_pdf');
    
Route::get('/user/generate_marathi_coldstorage_renewal_license_pdf/{id}', [ColdStorageRegistrationRenewalController::class, 'GenerateMarathirenewalLicensepdf'])->name('user.generate_marathi_coldstorage_renewal_license_pdf');
   
Route::get('/user/appli_form/View_renewal_coldstorage/{application_no}/{user_type}', [ColdStorageRegistrationRenewalController::class, 'coldStorageRenewalForm_View'])->name('user.appli_form.View_renewal_coldstorage');


    
});



Route::get('/clear', function() {

    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:clear');

    return "Cleared!";

});

// =========  Task schedule for
Route::get('/coldstorage_renewal_schedule', function() {
     $exitCode = Artisan::call('renew-coldstorage-license:check');
     dd(Artisan::output());
 });



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
