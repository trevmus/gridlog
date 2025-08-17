<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;


// Public route
Route::get('/', [HomeController::class, 'homepage'])->name('home');

Route::get('/about', function () {
        return view('home.about');
    })->name('about');

Route::get('/blogsection', [HomeController::class, 'blogsection']);

Route::get('/post_details/{id}',[HomeController::class, 'post_details']);

Route::get('/search', [HomeController::class, 'search']);


    // Route::get('/home', [HomeController::class, 'home'])->name('homepage');

// Protected routes with authentication
Route::middleware(['auth'])->group(function () {
    // User dashboard
    Route::get('/home', [HomeController::class, 'index'])->name('user.homepage');

    Route::post('/user_post',[HomeController::class, 'user_post']);
    Route::get('/my_post',[HomeController::class, 'my_post']);
    Route::get('/my_post_del/{id}',[HomeController::class, 'my_post_del']);
    Route::get('/post_update_page/{id}',[HomeController::class, 'post_update_page']);
    Route::post('/update_post_data/{id}',[HomeController::class, 'update_post_data']);
    Route::get('/create_post',[HomeController::class, 'create_post']);



    
    // Admin dashboard
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

    Route::get('/post_page',[AdminController::class, 'post_page']);

    Route::post('/add_post',[AdminController::class, 'add_post']);

    Route::get('/show_post',[AdminController::class, 'show_post']);

    Route::get('/delete_post/{id}',[AdminController::class, 'delete_post']);

    Route::get('/edit_page/{id}',[AdminController::class, 'edit_page']);

    Route::post('/update_post/{id}',[AdminController::class, 'update_post'])->name('update_post'); // Update post route why use post method because we are sending data to the server

    Route::get('/accept_post/{id}',[AdminController::class, 'accept_post']);

    Route::get('/reject_post/{id}',[AdminController::class, 'reject_post']);

    Route::get('/add_category',[AdminController::class, 'add_category'])->name('admin.add_category');

    Route::post('/store_category',[AdminController::class, 'store_category'])->name('admin.store_category');

    Route::get('/destroy_category/{id}',[AdminController::class, 'destroy_category']);


});
// Route::get('/homepage', function () {
//     return view('home.homepage');
// })->middleware(['auth', 'verified'])->name('index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
