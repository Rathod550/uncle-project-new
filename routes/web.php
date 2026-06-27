<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\Front\HomeController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Route::get('/contact-us', App\Livewire\Front\ContactUs\ContactUsCreate::class);

Route::get('/test-summernote', function () {
    return view('test-summernote');
});

// FrontTheme
Route::get('/contact-us-create', App\Livewire\Front\ContactUs\ContactUsCreate::class)->name('front.home.contact-us-create');
Route::get('/', [HomeController::class, 'home'])->name('front.home');
Route::get('/smart-tools', [HomeController::class, 'smartTools'])->name('smart.tools');
Route::get('/smart-tools-calculator', App\Livewire\Front\SmartTools\SmartTools::class)->name('smart.tools.calculator');

// AdminTheme
Route::middleware(['auth'])->prefix('admin')->group(function () {

    Route::get('dashboard', App\Livewire\Dashboard::class)->name('dashboard');

    Route::redirect('settings', 'settings/profile');

    Route::get('/users', App\Livewire\Users\UserIndex::class)->name('users.index');
    Route::get('/users/create', App\Livewire\Users\UserCreate::class)->name('users.create');
    Route::get('/users/{id}/edit', \App\Livewire\Users\UserEdit::class)->name('users.edit');

    Route::get('/site-setting', App\Livewire\Setting\SiteSettingUpdate::class)->name('site-setting.index');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');

    Route::get('/contact-us', App\Livewire\ContactUs\ContactUsIndex::class)->name('contact-us.index');
    Route::get('/contact-us/{id}/view', App\Livewire\ContactUs\ContactUsView::class)->name('contact-us.view');

    Route::get('/contact-us-categories', App\Livewire\ContactUsCategories\ContactUsCategoriesIndex::class)->name('contactUs.categorys.index');
    Route::get('/contact-us-categories/create', App\Livewire\ContactUsCategories\ContactUsCategoriesCreate::class)->name('contactUs.categorys.create');
    Route::get('/contact-us-categories/{id}/edit', \App\Livewire\ContactUsCategories\ContactUsCategoriesEdit::class)->name('contactUs.categorys.edit');  

    Route::get('/our-team', App\Livewire\OurTeam\OurTeamIndex::class)->name('our-team.index');
    Route::get('/our-team/create', App\Livewire\OurTeam\OurTeamCreate::class)->name('our-team.create');
    Route::get('/our-team/{id}/edit', \App\Livewire\OurTeam\OurTeamEdit::class)->name('our-team.edit');

    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');

    Route::get('/calculator', App\Livewire\MortgageCalculator\MortgageCalculatorIndex::class)->name('calculator');

    Route::get('/free-consultation', App\Livewire\FreeConsultation\FreeConsultationIndex::class)->name('free-consultation.index');

});

require __DIR__.'/auth.php';
