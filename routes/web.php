<?php

use App\Http\Controllers\Admin\BackupController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\InicioController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Blog\PostController;
use App\Http\Controllers\EvoFruitController;
use App\Http\Controllers\SimposioController;
use App\Http\Controllers\ThemeProaniController;
use Illuminate\Support\Facades\Artisan;
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
/** ejecutar comando artisan */

// Route::get('artisan-cammand', function(){
//     Artisan::call('storage:link');
// });

// Route::get('/', [InicioController::class, "inicio"])->name('inicio');

require __DIR__.'/auth.php';

Route::get('panel', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('panel.index');

/*** rutas para actualizar datos de perfil de usuario */
Route::get('perfil', [UserController::class, 'profile'])->middleware(['auth','verified'])->name('user.profile');
Route::post('avatar/update', [UserController::class, 'avatarUpdate'])->middleware(['auth','verified'])->name('avatar.update');
Route::post('password/update', [UserController::class, 'updatePassword'])->middleware(['auth','verified'])->name('mypassword.update');

/***
 * backups routes
 */
Route::group([
    'middleware' => ['auth', 'web'],
], function () {
    Route::get('backup', [BackupController::class, 'index'])->name('admin.backup.index');
    Route::put('backup/create', [BackupController::class, 'create'])->name('admin.backup.create');
    Route::get('backup/download/{file_name?}', [BackupController::class, 'download'])->name('admin.backup.download');
    Route::delete('backup/delete', [BackupController::class, 'delete'])->name('admin.backup.delete');
});

/** rutas para el theme rbjevo*/
Route::get('/', [EvoFruitController::class, 'index'])->name('inicio');
Route::get('comunidades/{alcaldia}', [EvoFruitController::class, 'alcaldias'])->name('alcaldia.show');


//Routes para el blog vista web//
Route::group([
    'middleware' => ['web'],
], function () {
    Route::get('posts', [PostController::class, 'index'])->name('web.post.index');
    Route::get('posts/{post}', [PostController::class, 'show'])->name('web.post.show');
    Route::get('category/{category}', [PostController::class, 'category'])->name('web.post.category');
    Route::get('tag/{tag}', [PostController::class, 'tag'])->name('web.post.tag');
});
