<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\frontend\FrontendController;
use App\Http\Controllers\MultiImageController;
use App\Http\Controllers\ProtfolioController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserLogoutController;
use App\Models\User;
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
// Welcome Route Start
    Route::get('/welcome', function () {
        return view('welcome');
    })->name('dashboard'); 
// Welcome Route end


Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('user/logout', [UserLogoutController::class, 'logout'])->name('user.logout');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    // Admin Route Start
    Route::get('/admin', function () {
        $users = User::paginate(5);
        return view('admin.index', compact('users'));
    })->name('admin'); 
    // Admin Route end

    //  Category Routes Start
    Route::get('category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('trastIndex', [CategoryController::class, 'trastIndex'])->name('trash.index');
    Route::post('category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('category/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('category/{category}', [CategoryController::class, 'softDelete'])->name('category.softDelete');
    Route::get('category/restore/{category}', [CategoryController::class, 'restore'])->name('category.restore');
    Route::get('category/delete/{category}', [CategoryController::class, 'Delete'])->name('category.delete');
    // Category Routes End
    // Brand Routes Start
    Route::get('brand', [BrandController::class, 'index'])->name('brand.index');
    Route::post('brand', [BrandController::class, 'store'])->name('brand.store');
    Route::get('brand/{brand}/edit', [BrandController::class, 'edit'])->name('brand.edit');
    Route::post('brand/update/{id}', [BrandController::class, 'update'])->name('brand.update');
    Route::get('brand/{id}', [BrandController::class, 'delete'])->name('brand.delete');
    //brand Route End


    //multiple image start
    Route::get('multipleImage', [MultiImageController::class, 'index'])->name('multipleImage.index');
    Route::post('multipleImage', [MultiImageController::class, 'store'])->name('multipleImage.store');
    //multiple image End
    

    // Slider Route Start
    Route::get('slider', [SliderController::class, 'index'])->name('slider.index');
    Route::get('slider/create', [SliderController::class, 'create'])->name('slider.create');
    Route::post('slider', [SliderController::class, 'store'])->name('slider.store');
    Route::get('slider/{slider}/edit', [SliderController::class, 'edit'])->name('slider.edit');
    Route::post('slider/update/{id}', [SliderController::class, 'update'])->name('slider.update');
    Route::get('slider/delete/{id}', [SliderController::class, 'delete'])->name('slider.delete');
    // Slider Route End

    // About Route Start
    Route::get('about/index', [AboutController::class, 'index'])->name('about.index');
    Route::get('about/create', [AboutController::class, 'create'])->name('about.create');
    Route::post('about/store', [AboutController::class, 'store'])->name('about.store');
    Route::get('about/{about}/edit', [AboutController::class, 'edit'])->name('about.edit');
    Route::post('about/update/{id}', [AboutController::class, 'update'])->name('about.update');
    Route::get('about/delete/{id}', [AboutController::class, 'delete'])->name('about.delete');
    // About Route End

    // Services Route Start
    Route::get('service/index', [ServiceController::class, 'index'])->name('service.index');
    Route::get('service/create', [ServiceController::class, 'create'])->name('service.create');
    Route::post('service/store', [ServiceController::class, 'store'])->name('service.store');
    Route::get('service/{service}/edit', [ServiceController::class, 'edit'])->name('service.edit');
    Route::post('service/update/{id}', [ServiceController::class, 'update'])->name('service.update');
    Route::get('service/delete/{id}', [ServiceController::class, 'destroy'])->name('service.destroy');
    // Services Route End

    // features Route Start
    Route::get('feature/index', [FeatureController::class, 'index'])->name('feature.index');
    Route::get('feature/create', [FeatureController::class, 'create'])->name('feature.create');
    Route::post('feature/store', [FeatureController::class, 'store'])->name('feature.store');
    Route::get('feature/{feature}/edit', [FeatureController::class, 'edit'])->name('feature.edit');
    Route::post('feature/update/{id}', [FeatureController::class, 'update'])->name('feature.update');
    Route::get('feature/delete/{id}', [FeatureController::class, 'destroy'])->name('feature.destroy');
    // features Route End

    // teams Route Start
    Route::get('team/index', [TeamController::class, 'index'])->name('team.index');
    Route::get('team/create', [TeamController::class, 'create'])->name('team.create');
    Route::post('team/store', [TeamController::class, 'store'])->name('team.store');
    Route::get('team/{team}/edit', [TeamController::class, 'edit'])->name('team.edit');
    Route::post('team/update/{id}', [TeamController::class, 'update'])->name('team.update');
    Route::get('team/delete/{id}', [TeamController::class, 'destroy'])->name('team.destroy');
    // teams Route End

    // Blog Route Start
    Route::get('blog/index', [BlogController::class, 'index'])->name('blog.index');
    Route::get('blog/create', [BlogController::class, 'create'])->name('blog.create');
    Route::post('blog/store', [BlogController::class, 'store'])->name('blog.store');
    Route::get('blog/{blog}/edit', [BlogController::class, 'edit'])->name('blog.edit');
    Route::post('blog/update/{id}', [BlogController::class, 'update'])->name('blog.update');
    Route::get('blog/delete/{id}', [BlogController::class, 'delete'])->name('blog.delete');
    // Blog Route End

    // contact Route Start
    Route::get('contact/index', [ContactController::class, 'index'])->name('contact.index');
    Route::get('contact/create', [ContactController::class, 'create'])->name('contact.create');
    Route::post('contact/store', [ContactController::class, 'store'])->name('contact.store');
    Route::get('contact/{contact}/edit', [ContactController::class, 'edit'])->name('contact.edit');
    Route::post('contact/update/{id}', [ContactController::class, 'update'])->name('contact.update');
    Route::get('contact/delete/{id}', [ContactController::class, 'delete'])->name('contact.delete');
    // contact Route End

    // Message Route 

    Route::get('message', [ContactFormController::class, 'index'])->name('message.index');
    Route::get('message/delete/{id}', [ContactFormController::class, 'delete'])->name('message.delete');


        
    });

    //Frontend Route Start
    Route::get('/', [FrontendController::class, 'index'])->name('home');
    Route::get('protfolio',[FrontendController::class, 'protfolio'])->name('protfolio');
    Route::get('service',[FrontendController::class, 'service'])->name('service');
    Route::get('about',[FrontendController::class, 'about'])->name('about');
    Route::get('team',[FrontendController::class, 'team'])->name('team');
    Route::get('testimonial',[FrontendController::class, 'testimonial'])->name('testimonial');
    Route::get('blog',[FrontendController::class, 'blog'])->name('blog');
    Route::get('blog/details/{id}',[FrontendController::class, 'blogDetails'])->name('blog.details');
    Route::get('contact', [FrontendController::class, 'contact'])->name('contact');
    Route::post('contact/store', [FrontendController::class, 'store'])->name('contact.store');
    Route::get('pricing', [FrontendController::class, 'pricing'])->name('pricing');