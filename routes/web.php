<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\AboutController;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\Home\PortfolioController;
use App\Http\Controllers\Home\BlogCategoryController;
use App\Http\Controllers\Home\BlogController;
use App\Http\Controllers\Home\ContactController;
use App\Http\Controllers\Home\CommentController;
use App\Http\Controllers\Home\ServiceController;
use App\Http\Controllers\Home\PartnerController;
use App\Http\Controllers\Home\TestimonialController;
use App\Http\Controllers\Home\FooterController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Home\ResumeController;
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



Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified', 'check.admin'])->name('dashboard');

//any admin route pasted here would hit a 404 error if session has expired because of the middleware('auth') method
Route::middleware('auth', 'verified', 'check.admin')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Admin All Route
    Route::controller(AdminController::class)->group(function () {
        Route::get('/admin/logout', 'destroy')->name('admin.logout');
        Route::get('/admin/profile', 'Profile')->name('admin.profile');
        Route::get('/edit/profile', 'EditProfile')->name('edit.profile');
        Route::post('/store/profile', 'StoreProfile')->name('store.profile');
        Route::get('/change/password', 'ChangePassword')->name('change.password');
        Route::post('/update/password', 'UpdatePassword')->name('update.password');
    });

    //Home Slide All Route
    Route::controller(HomeSliderController::class)->group(function () {
        Route::get('/home/slide', 'HomeSlider')->name('home.slide');
        Route::post('/update/slider', 'UpdateSlider')->name('update.slider');
    });

    //About Page All Route
    Route::controller(AboutController::class)->group(function () {
        Route::get('/about/page', 'AboutPage')->name('about.page');
        Route::post('/update/about', 'UpdateAbout')->name('update.about');
        Route::get('/about/multi', 'AboutMultiImage')->name('about.multi.image');
        Route::post('/store/multi/image', 'StoreMultiImage')->name('store.multi.image');
        Route::get('/all/multi/image', 'AllMultiImage')->name('all.multi.image');
        Route::get('/edit/multi/image/{id}', 'EditMultiImage')->name('edit.multi.image');
        Route::post('/update/multi/image', 'UpdateMultiImage')->name('update.multi.image');
        Route::get('/delete/multi/image/{id}', 'DeleteMultiImage')->name('delete.multi.image');
    });

    //Portfolio All Route
    Route::controller(PortfolioController::class)->group(function () {
        Route::get('/all/portfolio', 'AllPortfolio')->name('all.portfolio');
        Route::get('/add/portfolio', 'AddPortfolio')->name('add.portfolio');
        Route::post('/store/portfolio', 'StorePortfolio')->name('store.portfolio');
        Route::get('/edit/portfolio/{id}', 'EditPortfolio')->name('edit.portfolio');
        Route::post('/update/portfolio', 'UpdatePortfolio')->name('update.portfolio');
        Route::get('/delete/portfolio/{id}', 'DeletePortfolio')->name('delete.portfolio');
    });

    //Blog Category All Route
    Route::controller(BlogCategoryController::class)->group(function () {
        Route::get('/all/blog/category', 'AllBlogCategory')->name('all.blog.category');
        Route::get('/add/blog/category', 'AddBlogCategory')->name('add.blog.category');
        Route::post('/store/blog/category', 'StoreBlogCategory')->name('store.blog.category');
        Route::get('/edit/blog/category/{id}', 'EditBlogCategory')->name('edit.blog.category');
        Route::post('/update/blog/category/{id}', 'UpdateBlogCategory')->name('update.blog.category');
        Route::get('/delete/blog/category/{id}', 'DeleteBlogCategory')->name('delete.blog.category');
    });

    //Blog All Route
    Route::controller(BlogController::class)->group(function () {
        Route::get('/all/blog', 'AllBlog')->name('all.blog');
        Route::get('/add/blog', 'AddBlog')->name('add.blog');
        Route::post('/store/blog', 'StoreBlog')->name('store.blog');
        Route::get('/edit/blog/{id}', 'EditBlog')->name('edit.blog');
        Route::post('/update/blog', 'UpdateBlog')->name('update.blog');
        Route::get('/delete/blog/{id}', 'DeleteBlog')->name('delete.blog');
    });

    //Service All Route
    Route::controller(ServiceController::class)->group(function () {
        Route::get('/all/service', 'AllService')->name('all.service');
        Route::get('/add/service', 'AddService')->name('add.service');
        Route::post('/store/service', 'StoreService')->name('store.service');
        Route::get('/edit/service/{id}', 'EditService')->name('edit.service');
        Route::post('/update/service', 'UpdateService')->name('update.service');
        Route::get('/delete/service/{id}', 'DeleteService')->name('delete.service');
    });

    //Partner All Route
    Route::controller(PartnerController::class)->group(function () {
        Route::get('/partner/Page', 'PartnerPage')->name('partner.page');
        Route::post('/update/partner', 'UpdatePartner')->name('update.partner');
        Route::get('/partner/multi', 'PartnerMultiImage')->name('partner.multi.image');
        Route::post('/partner/store/multi/image', 'StorePartnerMultiImage')->name('store.partner.multi.image');
        Route::get('/all/partner/multi/image', 'AllPartnerMultiImage')->name('all.partner.multi.image');
        Route::get('/edit/partner/multi/image/{id}', 'EditPartnerMultiImage')->name('edit.partner.multi.image');
        Route::post('/update/partner/multi/image', 'UpdatePartnerMultiImage')->name('update.partner.multi.image');
        Route::get('/delete/partner/multi/image/{id}', 'DeletePartnerMultiImage')->name('delete.partner.multi.image');
    });

    //Testimonial All Route
    Route::controller(TestimonialController::class)->group(function () {
        Route::get('/all/testimonial', 'AllTestimonial')->name('all.testimonial');
        Route::get('/add/testimonial', 'AddTestimonial')->name('add.testimonial');
        Route::post('/store/testimonial', 'StoreTestimonial')->name('store.testimonial');
        Route::get('/edit/testimonial/{id}', 'EditTestimonial')->name('edit.testimonial');
        Route::post('/update/testimonial', 'UpdateTestimonial')->name('update.testimonial');
        Route::get('/delete/testimonial/{id}', 'DeleteTestimonial')->name('delete.testimonial');
    });

    //Footer All Route
    Route::controller(FooterController::class)->group(function () {
        Route::get('/footer/setup', 'FooterSetup')->name('footer.setup');
        Route::post('/update/footer', 'UpdateFooter')->name('update.footer');
    });

    //Contact All Route
    Route::controller(ContactController::class)->group(function () {
        Route::get('/contact/message', 'ContactMessage')->name('contact.message');
        Route::get('/delete/message/{id}', 'DeleteMessage')->name('delete.message');
    });

    //Comment All Route
    Route::controller(CommentController::class)->group(function () {
        Route::get('/comment/message', 'CommentMessage')->name('comment.message');
        Route::get('/delete/comment/{id}', 'DeleteComment')->name('delete.comment');
    });
});

// Routes accessible to all users (excluding auth middleware)
Route::get('/about', [AboutController::class, 'HomeAbout'])->name('home.about'); // User view
Route::get('/portfolio', [PortfolioController::class, 'HomePortfolio'])->name('home.portfolio'); // User view
Route::get('/portfolio/details/{id}', [PortfolioController::class, 'PortfolioDetails'])->name('portfolio.details'); // User view
Route::get('/blog/details/{id}', [BlogController::class, 'BlogDetails'])->name('blog.details'); // User view
Route::get('/category/blog/{id}', [BlogController::class, 'CategoryBlog'])->name('category.blog'); // User view
Route::get('/blog', [BlogController::class, 'HomeBlog'])->name('home.blog'); // User view
Route::get('/service/details/{id}', [ServiceController::class, 'ServiceDetails'])->name('service.details'); // User view
Route::get('/services', [ServiceController::class, 'HomeServices'])->name('home.services'); // User view
Route::get('/contact', [ContactController::class, 'Contact'])->name('contact.me'); // User view
Route::post('/store/message', [ContactController::class, 'StoreMessage'])->name('store.message'); // User view
Route::get('/', [HomeController::class, 'HomeMain'])->name('home'); // User view
Route::post('/store/comment', [CommentController::class, 'StoreComment'])->name('store.comment'); // User view
Route::get('/download-resume', [ResumeController::class, 'downloadResume'])->name('download.resume'); // User view

require __DIR__ . '/auth.php';
