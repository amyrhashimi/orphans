<?php

use App\Http\Livewire\Admin\Attributes\Attributes;
use App\Http\Livewire\Admin\Attributes\Create as AttributesCreate;
use App\Http\Livewire\Admin\Attributes\Edit as AttributesEdit;
use App\Http\Livewire\Admin\Categories\Categories;
use App\Http\Livewire\Admin\Categories\Create as CategoriesCreate;
use App\Http\Livewire\Admin\Categories\Edit as CategoriesEdit;
use App\Http\Livewire\Admin\Dashbord;
use App\Http\Livewire\Admin\Users\Children;
use App\Http\Livewire\Admin\Users\Create;
use App\Http\Livewire\Admin\Users\Edit;
use App\Http\Livewire\Admin\Users\Users;
use App\Http\Livewire\Home;
use App\Http\Livewire\Login;
use App\Http\Livewire\Register;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;
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

Route::get('/', Home::class)->name('home');

Route::get('/clear' , function(){
    Artisan::call('optimize:clear');
    Artisan::call('view:clear');


    echo 'Config Clear';
});


// ->middleware(['isLogin','isAdmin'])
Route::prefix('admin')->middleware(['isLogin','isAdmin'])->group(function (){
    Route::get('/', Dashbord::class)->name('admin');

    Route::get('/users', Users::class)->name('users');
    Route::get('/users/edit/{user}', Edit::class)->name('users.edit');
    Route::get('/users/create', Create::class)->name('users.create');
    Route::get('/users/children', Children::class)->name('users.children');

    Route::get('/categories', Categories::class)->name('categories');
    Route::get('/categories/edit/{category}', CategoriesEdit::class)->name('categories.edit');
    Route::get('/categories/create', CategoriesCreate::class)->name('categories.create');

    Route::get('/attributes', Attributes::class)->name('attributes');
    Route::get('/attributes/edit/{attribute}', AttributesEdit::class)->name('attributes.edit');
    Route::get('/attributes/create', AttributesCreate::class)->name('attributes.create');

});

Route::middleware('guest')->group(function() {
    Route::get('/login',Login::class)->name('login');
    Route::get('/register' , Register::class)->name('register');

});


