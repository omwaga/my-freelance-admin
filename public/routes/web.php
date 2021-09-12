<?php

use App\Http\Controllers\EditQuestion;
use App\Http\Controllers\GrammarTestManagement;
use App\Http\Controllers\MoneyManagement;
use App\Http\Controllers\Orders;
use App\Http\Controllers\PostController;
use App\Http\Controllers\settings;
use App\Http\Controllers\UsersPage;
use App\Http\Controllers\Writers;
use App\Http\Controllers\WritersWaitingApproval;
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

Route::middleware(['auth:sanctum'])->get('/posts', [PostController::class, 'index'])
    ->name('posts');

Route::middleware(['auth:sanctum'])->get('post/create', [PostController::class, 'create'])
    ->name('post.create');

Route::middleware(['auth:sanctum'])->post('post/store', [PostController::class, 'store'])
    ->name('post.store');

Route::middleware(['auth:sanctum'])->get('post/read/{slug}', [PostController::class, 'show'])
    ->name('posts.show');

Route::middleware(['auth:sanctum'])->post('ckeditor/upload', [\App\Http\Controllers\CKEditorController::class, 'upload'])->name('ckeditor.image-upload');

Route::middleware(['auth:sanctum'])->get('post/edit/{slug}', [PostController::class, 'edit'])
    ->name('posts.edit');

Route::middleware(['auth:sanctum'])->post('post/update/', [PostController::class, 'update'])
    ->name('posts.update');

Route::middleware(['auth:sanctum'])->delete('post/destroy/{slug}', [PostController::class, 'destroy'])
    ->name('posts.destroy');


Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [WritersWaitingApproval::class, 'index'])->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/orders', [Orders::class, 'index'])->name('orders');

Route::middleware(['auth:sanctum', 'verified'])->get('/users',
    [UsersPage::class, 'index'])->name('users');

Route::middleware(['auth:sanctum', 'verified'])->get('/writers', [Writers::class, 'index'])->name('writers');

Route::middleware(['auth:sanctum', 'verified'])->get('/grammar-test-management', [GrammarTestManagement::class, 'index'])->name('grammar-test-management');

Route::middleware(['auth:sanctum', 'verified'])->get('/money-management', [MoneyManagement::class, 'index'])->name('money-management');

Route::middleware(['auth:sanctum', 'verified'])->get('/settings', [settings::class, 'index'])->name('settings');

Route::middleware(['auth:sanctum', 'verified'])->get('/money/management/{id}', function ($id) {
    return view('money-management.summary', ['id' => $id]);
})->name('transaction-summary');

Route::middleware(['auth:sanctum', 'verified'])->get('/question/add', function () {
    return view('grammar-questions.add-update');
})->name('add-question');

Route::middleware(['auth:sanctum', 'verified'])->get('/order/delete/{id}', function ($id) {
    \Illuminate\Support\Facades\DB::table('orders')->delete($id);
    return redirect()->action([Orders::class, 'index']);
})->name('delete-order');

Route::middleware(['auth:sanctum', 'verified'])->get('/question/edit/{id}', [EditQuestion::class, 'index'])->name('edit-question');

Route::middleware(['auth:sanctum', 'verified'])->get('/settings/type', [settings\disciplines::class, 'index'])->name('settings-type');
Route::middleware(['auth:sanctum', 'verified'])->get('/settings/degree', [settings\degree::class, 'index'])->name('settings-degree');
Route::middleware(['auth:sanctum', 'verified'])->get('/settings/citation', [settings\citation::class, 'index'])->name('settings-citation');
Route::middleware(['auth:sanctum', 'verified'])->get('/settings/subject', [settings\language::class, 'index'])->name('settings-subject');
Route::middleware(['auth:sanctum', 'verified'])->get('/settings/services', [settings\services::class, 'index'])->name('settings-services');

Route::middleware(['auth:sanctum', 'verified'])->get('/settings/subject/add', function () {
    return view('settings.languages.add');
})->name('add-subject');

// delete questions
Route::middleware(['auth:sanctum', 'verified'])->get('/settings/language/delete/{id}', function ($id) {
    \Illuminate\Support\Facades\DB::table('settings_languages')->delete($id);

    return redirect()->action([settings\language::class, 'index']);
})->name('delete-question');

// delete questions
Route::middleware(['auth:sanctum', 'verified'])->get('/settings/citations/delete/{id}', function ($id) {
    \Illuminate\Support\Facades\DB::table('settings_citations')->delete($id);

    return redirect()->action([settings\citation::class, 'index']);
})->name('delete-citation');

Route::middleware(['auth:sanctum', 'verified'])->get('/settings/type/delete/{id}', function ($id) {
    \Illuminate\Support\Facades\DB::table('settings_disciplines')->delete($id);

    return redirect()->action([settings\disciplines::class, 'index']);
})->name('delete-type');

Route::middleware(['auth:sanctum', 'verified'])->get('/settings/degrees/delete/{id}', function ($id) {
    \Illuminate\Support\Facades\DB::table('settings_degrees')->delete($id);

    return redirect()->action([settings\degree::class, 'index']);
})->name('delete-degree');

Route::middleware(['auth:sanctum', 'verified'])->get('/settings/services/add', function () {
    return view('settings.services.add');
})->name('add-service');

Route::middleware(['auth:sanctum', 'verified'])->get('/settings/services/delete/{id}', function ($id) {
    \Illuminate\Support\Facades\DB::table('settings_services')->delete($id);

    return redirect()->action([settings\services::class, 'index']);
})->name('delete-service');

Route::middleware(['auth:sanctum', 'verified'])->get('/settings/citations/add', function () {
    return view('settings.citations.add');
})->name('add-citation');

Route::middleware(['auth:sanctum', 'verified'])->get('/settings/degrees/add', function () {
    return view('settings.degrees.add');
})->name('add-degrees');

Route::middleware(['auth:sanctum', 'verified'])->get('/settings/type/add', function () {
    return view('settings.disciplines.add');
})->name('add-disciplines');
