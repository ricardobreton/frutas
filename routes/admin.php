<?php
/** rutas para el administrador y el supervisor */

use App\Http\Controllers\Admin\AlcaldiasController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ClienteAdminController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\EventoInfoController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\SeccionController;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;

Route::resource('usuario', UserController::class)->except('show')->names('admin.user');
Route::post('usuario/habilitar/{user}', [UserController::class, 'habilitarUser'])->name('admin.user.habilitar');
/** rutas para administrar clientes */
Route::prefix('admin')->name('admin.cliente.')->group(function(){
    Route::get('clientes', [ClienteAdminController::class, 'index'])->name('index');
    Route::get('ver/cliente/{cliente}', [ClienteAdminController::class, 'verCliente'])->name('ver.cliente');
});

Route::prefix('admin')->name('admin.catergoria.producto.')->group(function(){
    Route::view('categoria_productos', 'livewire.categoria_productos.index')->middleware('auth')->name('index');
});

Route::prefix('admin')->name('admin.producto.')->group(function(){
    Route::view('productos', 'livewire.productos.index')->middleware('auth')->name('index');
});

Route::prefix('admin')->name('admin.evento.')->group(function(){
    Route::view('evento_info', 'livewire.evento_info.index')->middleware('auth')->name('info.index');
    Route::get('evento/edit/info/{evento}',[EventoInfoController::class,'editinfo'])->middleware('auth')->name('info');
    Route::post('evento/edit/info/{eventoinfo}',[EventoInfoController::class,'storeinfo'])->middleware('auth')->name('storeinfo');
    Route::view('eventos', 'livewire.eventos.index')->middleware('auth')->name('index');
});

Route::prefix('admin')->name('admin.sucursal.')->group(function(){
    Route::view('sucursales', 'livewire.sucursales.index')->middleware('auth')->name('index');
});

Route::prefix('admin')->name('admin.especie.')->group(function(){
    Route::view('especies', 'livewire.especies.index')->middleware('auth')->name('index');
});

Route::prefix('admin')->name('admin.pages.')->group(function(){
    Route::view('theme_imgs', 'livewire.theme-imgs.index')->middleware('auth')->name('index');
});
Route::prefix('admin')->name('admin.videos.')->group(function(){
    Route::view('videos', 'livewire.videos.index')->middleware('auth')->name('index');
});

Route::prefix('admin')->name('admin.carrusel.')->group(function(){
    Route::view('carrusel', 'livewire.carrusels.index')->middleware('auth')->name('index');
});

//routes para blog
Route::prefix('admin')->middleware('auth')->group(function(){
    Route::resource('categories', CategoryController::class)->names('admin.categories');
    Route::resource('tags', TagController::class)->names('admin.tags');
    Route::resource('posts', PostController::class)->names('admin.posts');
});
/** rutas para ingresar alcaldias */
Route::prefix('admin')->name('admin.alcaldia.')->group(function(){
    Route::view('alcaldias', 'livewire.alcaldias.index')->middleware('auth')->name('index');
    Route::get('alcaldias/secciones/{alcaldia}', [AlcaldiasController::class,'alcaldiasSecciones'])->middleware('auth')->name('secciones.index');
    Route::get('alcaldias/{alcaldia}/imagenes', [AlcaldiasController::class,'alcaldiasImagenes'])->middleware('auth')->name('image');
});
//secciones
Route::prefix('admin')->name('admin.alcaldia.secciones.')->middleware('auth')->group(function(){
    Route::get('/secciones/create/{alcaldia}', [SeccionController::class, 'create'])->name('create');
    Route::post('/secciones/create', [SeccionController::class, 'store'])->name('store');
    Route::get('/secciones/{seccion}/edit', [SeccionController::class, 'edit'])->name('edit');
    Route::put('/secciones/{seccion}', [SeccionController::class, 'update'])->name('update');
});
/**rutas para controlar datos */
Route::prefix('admin')->middleware('auth')->group(function(){
    Route::view('datos', 'livewire.datos.index')->name('admin.datos');
});

