<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

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
Auth::routes();
Route::get('/', function () {
    return redirect('/login');
});
//Route::get('/urlchange',[App\Http\Controllers\TestController::class, 'changeUrl'])->name('changeUrl');
//Route::get('/', [App\Http\Controllers\HomeController::class, 'homePage'])->name('homePage');
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/menu', [App\Http\Controllers\MenuController::class, 'menuList'])->name('menulist');
Route::get('/addmenu', [App\Http\Controllers\MenuController::class, 'addMenu'])->name('addMenu');
Route::post('/menuadd', [App\Http\Controllers\MenuController::class,'menuAdd'])->name('menuAdd');
Route::get('/editmenu/{id}', [App\Http\Controllers\MenuController::class,'editmenu'])->name('editmenu');
Route::post('/menuedit/{id}', [App\Http\Controllers\MenuController::class,'menuedit'])->name('menuedit');
Route::prefix('/course')->group(function () {
    Route::get('/', [App\Http\Controllers\CourseController::class, 'index'])->name('CourseList');
    Route::get('/add', [App\Http\Controllers\CourseController::class, 'add'])->name('addCourse');
    Route::post('/add', [App\Http\Controllers\CourseController::class, 'save'])->name('SaveCourse');
    Route::get('/edit/{id}', [App\Http\Controllers\CourseController::class, 'edit'])->name('EditCourse');
    Route::post('/edit/{id}', [App\Http\Controllers\CourseController::class, 'saveEdit'])->name('SaveEditCourse');
});
Route::prefix('/batch')->group(function () {
    Route::get('/', [App\Http\Controllers\BatchController::class, 'index'])->name('BatchList');
    Route::get('/add', [App\Http\Controllers\BatchController::class, 'add'])->name('addBatch');
    Route::post('/add', [App\Http\Controllers\BatchController::class, 'save'])->name('SaveBatch');
    Route::get('/edit/{id}', [App\Http\Controllers\BatchController::class, 'edit'])->name('EditBatch');
    Route::post('/edit/{id}', [App\Http\Controllers\BatchController::class, 'saveEdit'])->name('SaveEditBatch');
});
Route::prefix('/subject')->group(function () {
    Route::get('/', [App\Http\Controllers\SubjectController::class, 'index'])->name('SubjectList');
    Route::get('/add', [App\Http\Controllers\SubjectController::class, 'add'])->name('addSubject');
    Route::post('/add', [App\Http\Controllers\SubjectController::class, 'save'])->name('SaveSubject');
    Route::get('/edit/{id}', [App\Http\Controllers\SubjectController::class, 'edit'])->name('EditSubject');
    Route::post('/edit/{id}', [App\Http\Controllers\SubjectController::class, 'saveEdit'])->name('SaveEditSubject');
});
Route::prefix('/student')->group(function () {
    Route::get('/', [App\Http\Controllers\StudentController::class, 'index'])->name('StudentList');
    Route::get('/add', [App\Http\Controllers\StudentController::class, 'add'])->name('addStudent');
    Route::post('/add', [App\Http\Controllers\StudentController::class, 'save'])->name('SaveStudent');
    Route::get('/edit/{id}', [App\Http\Controllers\StudentController::class, 'edit'])->name('EditStudent');
    Route::post('/edit/{id}', [App\Http\Controllers\StudentController::class, 'saveEdit'])->name('SaveEditStudent');
});
Route::prefix('/teacher')->group(function () {
    Route::get('/', [App\Http\Controllers\TeacherController::class, 'index'])->name('TeacherList');
    Route::get('/add', [App\Http\Controllers\TeacherController::class, 'add'])->name('addTeacher');
    Route::post('/add', [App\Http\Controllers\TeacherController::class, 'save'])->name('SaveTeacher');
    Route::get('/edit/{id}', [App\Http\Controllers\TeacherController::class, 'edit'])->name('EditTeacher');
    Route::post('/edit/{id}', [App\Http\Controllers\TeacherController::class, 'saveEdit'])->name('SaveEditTeacher');
});
Route::prefix('roles')->group(function () {
    Route::get('/', [App\Http\Controllers\RoleController::class, 'index'])->name('RoleList');
    Route::get('/add', [App\Http\Controllers\RoleController::class, 'add'])->name('addRole');
    Route::post('/add', [App\Http\Controllers\RoleController::class, 'save'])->name('roleAdd');
    Route::get('edit/{id}', [App\Http\Controllers\RoleController::class, 'edit'])->name('editRole');
    Route::post('edit/{id}', [App\Http\Controllers\RoleController::class, 'editSave'])->name('editSave');
});
Route::prefix('users')->group(function () {
    Route::get('/', [App\Http\Controllers\UsersController::class, 'index'])->name('UserList');
    Route::get('/add', [App\Http\Controllers\UsersController::class, 'add'])->name('addUser');
    Route::post('/add', [App\Http\Controllers\UsersController::class, 'save'])->name('userAdd');
    Route::get('edit/{id}', [App\Http\Controllers\UsersController::class, 'edit'])->name('editUser');
    Route::post('edit/{id}', [App\Http\Controllers\UsersController::class, 'editSave'])->name('userSave');
});
Route::get('author/{name}', [App\Http\Controllers\StoryController::class, 'author'])->name('author');
Route::get('state/{name}', [App\Http\Controllers\StoryController::class, 'state'])->name('state');
Route::get('/about', [App\Http\Controllers\StoryController::class, 'about'])->name('about');
Route::get('/search', [App\Http\Controllers\StoryController::class, 'search'])->name('search');
Route::get('/privacy', [App\Http\Controllers\StoryController::class, 'privacy'])->name('privacy');
Route::get('/disclaimer', [App\Http\Controllers\StoryController::class, 'disclaimer'])->name('disclaimer');
Route::get('/contact', [App\Http\Controllers\StoryController::class, 'contact'])->name('contact');
Route::get('/{cat_name}/{name}', [App\Http\Controllers\StoryController::class, 'showStory'])->name('showStory');
Route::get('/{cat_name}',[App\Http\Controllers\StoryController::class, 'category'])->name('category');
// Route::get('detail', function () {
//     return view('detail');
// });