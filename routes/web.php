<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\EkskulController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\postController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('landingpage.index');
// });

Route::get('/', [EkskulController::class, 'index'])->name('landingpage.index');
Route::get('/ekskul/{name}', [EkskulController::class, 'show'])->name('ekskul.show');
Route::get('/ekskul/{name}/postingan', [EkskulController::class, 'post'])->name('ekskul.post');
Route::get('/ekskul_semua', [EkskulController::class, 'LSE'])->name('ekskul.lihatekskul');
Route::get('/Post_semua', [EkskulController::class, 'LSP'])->name('ekskul.lihatpost');

Route::get('/login', [loginController::class, 'index'])->name('login');
Route::post('/admin-login', [loginController::class, 'admin_login'])->name('admin-login');
Route::get('/logout', [loginController::class, 'logout'])->name('logout');
Route::resource('dashboard', postController::class);

Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::get('/dashboard/{id}/edit', [PostController::class, 'edit'])->name('dashboard.edit');
    Route::patch('/dashboard/{id}', [PostController::class, 'update'])->name('dashboard.update');
    Route::get('/filter-posts', [PostController::class, 'filter'])->name('posts.filter');
    Route::get('/register', [loginController::class, 'daftar'])->name('register');
    Route::post('/register', [loginController::class, 'register'])->name('register.submit');
    Route::get('/admin/edit-password/{id}', [AdminDashboardController::class, 'editPassword'])->name('admin.edit_password');
    Route::put('/admin/update-password/{id}', [AdminDashboardController::class, 'updatePassword'])->name('admin.update_password');
    Route::delete('/admin/delete-account/{id}', [AdminDashboardController::class, 'deleteAccount'])->name('admin.delete_account');
});

Route::group(['middleware' => ['auth', 'role:user']], function () {
    Route::get('/users', [ProfileController::class, 'index'])->name('user.index');
    Route::get('/profile/create', [ProfileController::class, 'create'])->name('profile.create');
    Route::post('/profile/store', [ProfileController::class, 'store'])->name('profile.store');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/show', [ProfileController::class, 'show'])->name('profile.show');
    Route::delete('/profile/delete', [ProfileController::class, 'delete'])->name('profile.delete');
});
