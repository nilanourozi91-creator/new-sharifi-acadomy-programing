<?php

use App\Livewire\Admin\CreateAdminGenerate;
use App\Livewire\Admin\editadmin;
use App\Livewire\Admin\ListAdmins;
use App\Livewire\Chat;
use App\Livewire\Chattt;
use App\Livewire\Payment\editpyment;
use App\Livewire\Payment\ListPayments;
use App\Livewire\Salary\editsalary;
use App\Livewire\Salary\ListSalaries;
use App\Livewire\Sinf\editesinf;
use App\Livewire\Sinf\editsalaries;
use App\Livewire\Sinf\ListSinfs;
use App\Livewire\Student\CreateStudent;
use App\Livewire\Student\editstudent;
use App\Livewire\Student\ListStudents;
use App\Livewire\Teacher\CreateTeacher;
use App\Livewire\Teacher\editteacher;
use App\Livewire\Teacher\ListTeachers;
use App\Livewire\Users\CreateUserGenerate;
use App\Livewire\Users\editUser;
use App\Livewire\Users\ListUsers;
use App\View\Components\chatform;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});
Route::middleware(['auth'])->group(function (){
    Route::get('/manage-users',ListUsers::class)->name('users.index');
    Route::get('/create-user',CreateUserGenerate::class)->name('user.create');
    Route::get('/manage-users{record}',editUser::class)->name('users.edit');
    Route::get('/manage-teachers',ListTeachers::class)->name('teachers.index');
    Route::get('/create-teacher',CreateTeacher::class)->name('teacher.create');
    Route::get('/manage-teachers{record}',editteacher::class)->name('teachers.edit');
    Route::get('/manage-students',ListStudents::class)->name('students.index');
    Route::get('/create-student',CreateStudent::class)->name('students.create');
    Route::get('/manage-students/{record}',editstudent::class)->name('students.edit');
    Route::get('/admin',ListAdmins::class)->name('admin.index');
    Route::get('/create-admin',CreateAdminGenerate::class)->name('admin.create');
    Route::get('/admin/{record}',editadmin::class)->name('admin.edit');
    Route::get('/manage-classes',ListSinfs::class)->name('classes.index'); 
    Route::get('/edit-class/{record}',editesinf::class)->name('class.edit'); 
    route::get('/manage-payments',ListPayments::class)->name('payments.index');
    route::get('/manage-payments/{record}',editpyment::class)->name('payments.edite');
    route::get('/manage-salaries',ListSalaries::class)->name('salaries.index');
    route::get('/manage-salaries/{record}',editsalary::class)->name('salaries.edit');
});

require __DIR__.'/auth.php';
