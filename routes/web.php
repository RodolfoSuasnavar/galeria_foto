<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use app\Http\Controllers\AdminController;
use App\Http\Controllers\PerfilController;

use App\Http\Controllers\FotoController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\PortafolioController;
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
Route::get('/', function () {
    return view('home.home');
})->name('home');
Route::get('/nosotros', function () {
    return view('home.nosotros');
})->name('nosotros');

//despues de iniciar sesión
Route::get('/inicio', [PortafolioController::class, 'index'])->name('principal');



Route::get('/vista/foto/{id}', [PortafolioController::class, 'show'])->name('welcome');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');


//Fotos
Route::group(['prefix' => 'fotos', 'middleware' => 'auth'], function () {
Route::get('fotos/create', [FotoController::class, 'create'])->name('fotos.create');
Route::post('fotos', [FotoController::class, 'store'])->name('fotos.store');
Route::get('fotos', [FotoController::class, 'index'])->name('fotos.index');
Route::get('/fotos/vista/{id}', [FotoController::class, 'show'])->name('fotos.show');

});

Route::group(['prefix' => 'perfil', 'middleware' => 'auth'], function () {
    Route::get('user/perfil', [PerfilController::class, 'index'])->name('perfil.index');
    Route::get('user/configuraciones', function () {
        return view('perfil.config');
    })->name('config');

Route::put('/configuracion/foto/{id}', [RegisterController::class, 'updateFoto'])->middleware('auth')->name('update.foto');
Route::put('/configuracion/informacion', [RegisterController::class, 'updateDatos'])->middleware('auth')->name('update.informacion');
Route::put('/configuracion/contrasena', [RegisterController::class, 'updatePassword'])->middleware('auth')->name('update.contrasena');

});

//albums
Route::group(['prefix' => 'albums', 'middleware' => 'auth'], function () {

Route::get('/albums', [AlbumController::class, 'index'])->name('albums.index');
// Route::resource('albums', AlbumController::class);
Route::get('/albums/create', [AlbumController::class, 'create'])->name('albums.create');
Route::get('/albums/creacion', [AlbumController::class, 'store'])->name('albums.store');
Route::get('/albums/vista/{id}', [AlbumController::class, 'show'])->name('albums.show');
Route::post('/fotos/{foto}/asignar-album', [FotoController::class, 'asignarAlbum'])->name('fotos.asignarAlbum');

});



// Route::group(['middleware' => ['auth', 'auth.user']], function () {
    // Route::get('/user/productos', [ProductoController::class, 'index'])->name('producto.index');
    // Route::get('/user/producto/create', [ProductoController::class, 'create'])->name('producto.crear');
    // Route::post('/user/producto', [ProductoController::class, 'store'])->name('producto.store');

    // Route::get('/user/producto/show/{id}', [ProductoController::class, 'show'])->name('producto.show');
    // Route::get('/user/producto/edit/{id}', [ProductoController::class, 'edit'])->name('producto.edit');
    // Route::put('/user/producto/update/{id}', [ProductoController::class, 'update'])->name('producto.update');
    // Route::delete('/user/producto/destroy/{id}', [ProductoController::class, 'destroy'])->name('producto.destroy');

    //contacto
    // Route::post('/contacto', [ContactoController::class, 'index'])->name('contacto.index');
    // Route::get('/contacto/create', [ContactoController::class, 'create'])->name('contacto.crear');
    // Route::post('/contacto', [ContactoController::class, 'store'])->name('contacto.store');


    // });
