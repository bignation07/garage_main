<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;  // Middleware ko direct import kiya
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VehicleCheckinController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerComplaintController;
use App\Http\Controllers\JobCardController;
use App\Http\Controllers\EstimatedInspectionController;
use App\Http\Controllers\DrawbackListController;
use App\Http\Controllers\DrawbackPartController;
use App\Http\Controllers\WorkStartController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\VendorPaymentController;
use App\Http\Controllers\ProfitReportController;
use App\Http\Controllers\SettingsController;

use App\Http\Controllers\FinalBillController;
use App\Http\Controllers\VehicleChecklistController;


use App\Http\Controllers\InspectionController;
use App\Http\Controllers\WorkAssignmentController;

use App\Http\Controllers\EmployeeController;

use App\Http\Controllers\PurchaseController;

use App\Http\Controllers\UserController;






Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);
    Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
});

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');






    // Route::get('/', function () {
    //     return redirect()->route('dashboard');
    // });
    Route::get('/', function () {
        // Check if the user is authenticated
        if (auth()->check()) {
            // If the user is logged in, redirect to the dashboard
            return redirect()->route('dashboard');
        } else {
            // If the user is not logged in, redirect to the login page
            return redirect()->route('login');
        }
    });
    
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

 


// Admin Routes (Full Access)
    Route::middleware(['auth', RoleMiddleware::class . ':admin'])->group(function () {
        Route::resource('work-starts', WorkStartController::class);
        Route::resource('drawback-parts', DrawbackPartController::class);
        Route::resource('drawbacks', DrawbackListController::class);
        Route::resource('estimated-inspections', EstimatedInspectionController::class);
        Route::resource('job-cards', JobCardController::class);
        Route::resource('customer-complaints', CustomerComplaintController::class);
        Route::resource('inspections', InspectionController::class);
    
        Route::resource('employees', EmployeeController::class);
         Route::resource('purchases', PurchaseController::class);
         Route::get('/customer-complaints/download-customer/{checkinId}', [CustomerComplaintController::class, 'downloadCustomerChecklist'])
            ->name('complaints.download-customer');
         Route::get('/inspections/download-customer/{checkinId}', [InspectionController::class, 'downloadCustomerinspection'])
           ->name('inspections.download-customer');
         Route::put('/work_assignments/update/{checkinId}', [WorkAssignmentController::class, 'update'])->name('work_assignments.update');
         Route::resource('work_assignments', WorkAssignmentController::class);

         Route::get('/work_assignments/download-customer/{checkinId}', [WorkAssignmentController::class, 'downloadworkassignments'])
                ->name('work_assignments.download-customer');
        
         Route::resource('vehicle-checkin', VehicleCheckinController::class);
        // Route::resource('vehicle-checklist', VehicleCheckinController::class);
         Route::resource('vehicle-checklist', VehicleChecklistController::class);
         Route::get('/attendance', [AttendanceController::class, 'index'])->name('attendance.index');
         Route::post('/attendance', [AttendanceController::class, 'store'])->name('attendance.store');
         Route::get('vehicle-checklist/customer/{checkinId}', [VehicleChecklistController::class, 'showChecklistsByCustomer'])
            ->name('vehicle-checklist.customer.checklists');
         Route::get('/vehicle-checklist/download-customer/{checkinId}', [VehicleChecklistController::class, 'downloadCustomerChecklist'])->name('vehicle-checklist.download-customer');

        Route::get('final-bills/{id}/edit', [FinalBillController::class, 'edit'])->name('final-bills.edit');
        Route::delete('final-bills/{id}', [FinalBillController::class, 'destroy'])->name('final-bills.destroy');



        Route::get('/leave', [LeaveController::class, 'index'])->name('leave.index');
        Route::post('/leave', [LeaveController::class, 'store'])->name('leave.store');
        Route::post('/leave/{id}/update', [LeaveController::class, 'update'])->name('leave.update');

        Route::resource('salaries', SalaryController::class);
        Route::get('/salaries/download/{id}', [SalaryController::class, 'downloadSalarySlip'])->name('salaries.download');
        
        
        Route::get('/vendors', [VendorPaymentController::class, 'index']);
        Route::post('/vendors', [VendorPaymentController::class, 'store']);
        
        
        
        Route::resource('final-bills', FinalBillController::class);
        Route::get('/final-bills/download/{id}', [FinalBillController::class, 'downloadSalarySlip'])->name('final-bills.download');
        Route::get('sendSalary-whatsapp/{id}', [FinalBillController::class, 'sendSalarySlipWhatsApp'])->name('final-bills.sendSalary-whatsapp');
        
        
        Route::resource('profit-reports', ProfitReportController::class);
        
        
                // Show the form to create a new user
        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
        
        // Handle the form submission to store the user
        Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
                
        // Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
        // Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');


       Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
Route::post('/settings', [SettingsController::class, 'store'])->name('settings.store');
Route::post('/settings/{setting}', [SettingsController::class, 'update'])->name('settings.update');
Route::delete('/settings/{setting}', [SettingsController::class, 'destroy'])->name('settings.destroy');
Route::put('/settings/{setting}', [SettingsController::class, 'update'])->name('settings.update');


});

// User Routes (Limited Access)
Route::middleware(['auth', RoleMiddleware::class . ':user'])->group(function () {
    Route::resource('customer-complaints', CustomerComplaintController::class)->only(['index', 'create', 'store', 'show']);
    Route::resource('vehicle-checkin', VehicleCheckinController::class)->only(['index', 'create', 'store', 'show']);
     Route::get('/attendance', [AttendanceController::class, 'index'])->name('attendance.index');
    Route::post('/attendance', [AttendanceController::class, 'store'])->name('attendance.store');
    Route::get('/leave', [LeaveController::class, 'index'])->name('leave.index');
Route::post('/leave', [LeaveController::class, 'store'])->name('leave.store');
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        // Route for GET request to show password update form
    Route::get('/profile/password', [ProfileController::class, 'showPasswordForm'])->name('password.form');
    
    Route::put('/password', [ProfileController::class, 'updatePassword'])->name('password.update');
});

require __DIR__.'/auth.php';

