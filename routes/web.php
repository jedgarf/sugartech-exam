<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;
use App\Helpers\UserHelpers;
use App\Helpers\EmployeeHelpers;
use Illuminate\Support\Facades\Session;

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
    return view('login');
});

Route::post('/auth', [AuthController::class, 'login'])->name('auth');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {

    $user = UserHelpers::get(Session::get('user_id'));
    $gender_count = EmployeeHelpers::get_genderCount();
    $avgAge = EmployeeHelpers::get_avgAge();
    $sum_all_monthly_salary = EmployeeHelpers::get_allMonthlySalarySum();

    $data = ["page_name" => "Dashboard", 
            "user" => $user, 
            "gender_count" => $gender_count,
            "avgAge" => $avgAge,
            "sum_all_monthly_salary" => $sum_all_monthly_salary];
    return view('dashboard', $data);
})->middleware('validateLoginSession')->name('dashboard');

// Employees
Route::prefix('employees')->middleware('validateLoginSession')->group(function () {

    Route::get('/', function () {

        $employees = EmployeeHelpers::get();

        $data = ["page_name" => "Employees", 
                "employees" => $employees];
        return view('employees/main', $data);
    })->name('employees');

    Route::get('/add', function () {
        $data = ["page_name" => "Employees"];
        return view('employees/add', $data);
    })->name('add_employee');

    Route::get('/edit/{id}', function ($id) {

        $employee = EmployeeHelpers::get($id);
        if (!$employee) {
            return redirect('/employees');
        }

        $data = ["page_name" => "Employees",
                "employee" => $employee,
                "id" => $id];
        return view('employees/edit', $data);
    })->name('edit_employee');

    Route::post('/create', [EmployeeController::class, 'add'])->name('create_employee');
    Route::post('/update/{id}', [EmployeeController::class, 'edit'])->name('update_employee');
    Route::get('/delete/{id}', [EmployeeController::class, 'destroy'])->name('delete_employee');
});
