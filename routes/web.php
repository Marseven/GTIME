<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\SecurityObjectController;
use App\Http\Controllers\Admin\SecurityPermissionController;
use App\Http\Controllers\Admin\SecurityRoleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\ExportController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\StructureController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\TicketController;
use App\Models\User;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
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

// visitor or prospect

//home
Route::get('/', [WelcomeController::class, 'index'])->name('home');
Route::get('/home', [WelcomeController::class, 'index']);

//form contact classic

Route::post('/contact', [WelcomeController::class, 'contact'])->name('contact');

//form contact classic
Route::get('/rating/{ticket}', [NoteController::class, 'index'])->name('rating');
Route::post('/rating/{ticket}', [NoteController::class, 'add'])->name('rating');

//form contact classic
Route::get('/print/{ticket}', [TicketController::class, 'print'])->name('ticket');
Route::post('/printer/{ticket}', [ExportController::class, 'generate'])->name('generate');
Route::post('/view/{ticket}', [TicketController::class, 'index'])->name('ticket');

Auth::routes();

Route::get('logout', [LoginController::class, 'logout']);
Route::get('503', function () {
    return 'Accès non autorisé';
});
Route::get('404', function () {
    return 'Page non trouvée';
});

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/profil');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/email/verify', function () {
    return redirect('/profil')->with('error', "Vous devez verifier votre email pour accéder à cette page.");
})->middleware('auth')->name('verification.notice');

Route::get('/email/verification-notification', function () {
    $user = User::find(auth()->user()->id);
    $user->sendEmailVerificationNotification();

    return back()->with('success', 'Le lien de vérification a été envoyé. Consultez votre boîte mail (les spams également) pour valider votre email.');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

// users connect

Route::middleware('auth')->group(function () {
});


/*
| Backend
*/
Route::prefix('admin')->namespace('Admin')->middleware('admin')->group(function () {

    Route::get('security-role', [SecurityRoleController::class, 'index']);
    Route::get('security-role/delete/{_id}', [SecurityRoleController::class, 'delete']);
    Route::post('security-role', [SecurityRoleController::class, 'save']);
    Route::get('security-role/edit/{_id}', [SecurityRoleController::class, 'edit']);

    Route::get('security-object', [SecurityObjectController::class, 'index']);
    Route::get('security-object/delete/{_id}', [SecurityObjectController::class, 'delete']);
    Route::post('security-object', [SecurityObjectController::class, 'save']);
    Route::get('security-object/edit/{_id}', [SecurityObjectController::class, 'edit']);

    Route::get('security-permission', [SecurityPermissionController::class, 'index']);
    Route::get('security-permission/delete/{_id}', [SecurityPermissionController::class, 'delete']);
    Route::post('security-permission', [SecurityPermissionController::class, 'save']);
    Route::post('security-permission/edit/{_id}', [SecurityRoleController::class, 'permission']);


    Route::get('/', [AdminController::class, 'index'])->name('admin');

    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin-dashboard');
    Route::get('/agent', [TicketController::class, 'agent'])->name('admin-agent');

    //Admin
    Route::get('/list-tickets/{day}', [AdminController::class, 'listTickets'])->name('admin-list-tickets');
    Route::get('/list-structures', [AdminController::class, 'listStructures'])->name('admin-list-structures');
    Route::get('/list-services', [AdminController::class, 'listServices'])->name('admin-list-services');
    Route::get('/list-notes/{day}', [AdminController::class, 'listNotes'])->name('admin-list-notes');

    //Service
    Route::get('/service', [AdminController::class, 'add'])->name('admin-service');
    Route::post('/service', [ServiceController::class, 'create']);

    Route::get('/service/{service}', [ServiceController::class, 'edit']);
    Route::post('/service/{service}', [ServiceController::class, 'update']);

    //Structure
    Route::get('/structure', [StructureController::class, 'add'])->name('admin-structure');
    Route::post('/struture', [StructureController::class, 'create']);

    Route::get('/struture/{struture}', [StructureController::class, 'edit']);
    Route::post('/struture/{struture}', [StructureController::class, 'update']);


    //user
    Route::get('/admin-profil', [AdminUserController::class, 'profil'])->name('admin-profil');
    Route::get('/list-users', [AdminUserController::class, 'list']);
    Route::get('/register', [AdminUserController::class, 'register'])->name('admin-register');
    Route::post('/register', [AdminUserController::class, 'create'])->name('admin-create');
    Route::post('/admin-user/{user}', [AdminUserController::class, 'update']);
    Route::post('/admin-userpassword/{user}', [AdminUserController::class, 'updatePassword']);
    Route::post('/admin-userrole/{user}', [AdminUserController::class, 'updateRole']);

    //export
    Route::post('/export', [ExportController::class, 'index'])->name('export');
});
