<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ChangePass;
use App\Models\User;
use App\Models\Multipic;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $brands = DB::table('brands')->get();
    $images = DB::table('multipics')->get();
    return view('home', compact('brands','images'));
});

//Contacto Controller
Route::get('/contacto/all',[ContactController::class,'AllContacto'])->name('contacto');
Route::get('/contacto/add',[ContactController::class,'AddContacto'])->name('add.contacto');
Route::post('/store/contacto',[ContactController::class,'StoreContacto'])->name('store.contacto');
Route::get('/contacto/edit/{id}',[ContactController::class,'EditContacto']);
Route::post('/contacto/update/{id}',[ContactController::class,'UpdateContacto']);

Route::post('/contacto/form',[ContactController::class,'ContactForm'])->name('contact.form');
Route::get('/message',[ContactController::class,'MessageContact'])->name('message');
Route::get('/message/delete/{id}',[ContactController::class,'DeleteMessage']);

//Category Controller
Route::get('/category/all',[CategoryController::class,'AllCat'])->name('all.category');
Route::post('/category/add',[CategoryController::class,'AddCate'])->name('store.category');
Route::get('/category/edit/{id}',[CategoryController::class,'EditCate']);
Route::post('/category/update/{id}',[CategoryController::class,'UpdateCate']);
Route::get('/softdelete/category/{id}',[CategoryController::class,'SoftDelete']);
Route::get('/category/restore/{id}',[CategoryController::class,'RestoreCat']);
Route::get('/pdelete/category/{id}',[CategoryController::class,'PdeleteCat']);

//Brand Controller
Route::get('/brand/all',[BrandController::class,'AllBrand'])->name('brand');
Route::post('/brand/add',[BrandController::class,'StoreBrand'])->name('store.brand');
Route::get('/brand/edit/{id}',[BrandController::class,'EditBrand']);
Route::post('/brand/update/{id}',[BrandController::class,'UpdateBrand']);
Route::get('/brand/delete/{id}',[BrandController::class,'DeleteBrand']);

//Image Controller
Route::get('/image/all',[BrandController::class,'MultiImage'])->name('images');
Route::post('/image/add',[BrandController::class,'StoreImage'])->name('store.image');

//Admin All route
Route::get('/home/slider',[HomeController::class,'HomeSlider'])->name('slider');
Route::get('/add/slider',[HomeController::class,'AddSlider'])->name('add.slider');
Route::post('/store/slider',[HomeController::class,'StoreSlider'])->name('store.slider');

//Home About All Route
Route::get('/home/about',[AboutController::class,'HomeAbout'])->name('home.about');
Route::get('/add/about',[AboutController::class,'AddAbout'])->name('add.about');
Route::post('/store/about',[AboutController::class,'StoreAbout'])->name('store.about');
Route::get('/about/edit/{id}',[AboutController::class,'EditAbout']);
Route::post('/about/update/{id}',[AboutController::class,'UpdateAbout']);
Route::get('/about/delete/{id}',[AboutController::class,'DeleteAbout']);


//PORTAFOLIO Page
Route::get('/portafolio',[HomeController::class,'Portafolio'])->name('portafolio');


//Contacto Page
Route::get('/contacto',[HomeController::class,'Contacto'])->name('contact');



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    //$users = User::all();
    return view('admin.index');
})->name('dashboard');

Route::get('/user/logout',[BrandController::class,'Logout'])->name('user.logout');


//Change Password and user profile route
Route::get('/user/password',[ChangePass::class,'CPassword'])->name('change.password');
Route::post('/password/update',[ChangePass::class,'PasswordUpdate'])->name('password.update');


//User Profile
Route::get('/user/profile',[ChangePass::class,'Pupdate'])->name('profile.update');
Route::post('/user/profile/update',[ChangePass::class,'UpdateProfile'])->name('update.user.profile');