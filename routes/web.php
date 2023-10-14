<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\admin\gererapprenantcontroller;
use App\Http\Controllers\admin\apprenantcontroller;
use App\Http\Controllers\admin\coursecontroller;
use App\Http\Controllers\admin\videocontroller;
use App\Http\Controllers\admin\testcontroller;
use App\Http\Controllers\admin\certificatcontroller;
use App\Http\Controllers\admin\profcontroller;
use App\Http\Controllers\admin\groupcontroller;
use App\Http\Controllers\admin\categocontroller;

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

Route::get('/', 'App\Http\Controllers\homepagecontroller@index');

Auth::routes(['verify' => true]);

Route::get('/apprenant', [App\Http\Controllers\ApprenantController::class, 'index'])
    ->name('apprenant')
    ->middleware('verified');

Route::get('/','App\Http\Controllers\homepagecontroller@index')->name('index');





Route::prefix('geadmin')->group(function () {
    Route::get('/', [\App\Http\Controllers\admin\adminController::class, 'index'])->name('admin.geadmin.index');
    Route::get('/create', [\App\Http\Controllers\admin\adminController::class, 'create'])->name('admin.geadmin.create');
    Route::get('/cancel', [\App\Http\Controllers\admin\adminController::class, 'cancel'])->name('admin.geadmin.cancel');
    Route::post('/', [\App\Http\Controllers\admin\adminController::class, 'store'])->name('admin.geadmin.store');
    Route::get('/{admin}/edit', [\App\Http\Controllers\admin\adminController::class, 'edit'])->name('admin.geadmin.edit');
    Route::put('/{apprenant}', [\App\Http\Controllers\admin\adminController::class, 'update'])->name('admin.geadmin.update');
    Route::put('/{admin}', [\App\Http\Controllers\admin\adminController::class, 'addcourses'])->name('admin.geadmin.addcourses');
    Route::post('/{admin}', [\App\Http\Controllers\admin\adminController::class, 'addstudd'])->name('admin.geadmin.addstudd');
    Route::post('/delete/{id}', [\App\Http\Controllers\admin\admincontroller::class, 'delete'])->name('admin.geadmin.delete');
    Route::get('/{admin}', [\App\Http\Controllers\admin\adminController::class, 'show'])->name('admin.geadmin.show');
    Route::get('/search', [\App\Http\Controllers\admin\adminController::class, 'search'])->name('admin.geadmin.search');

});
Route::prefix('apprenant')->group(function () {
    Route::get('/', [\App\Http\Controllers\admin\apprenantController::class, 'index'])->name('admin.apprenant.index');
    Route::get('/create', [\App\Http\Controllers\admin\apprenantController::class, 'create'])->name('admin.apprenant.create');
    Route::get('/cancel', [\App\Http\Controllers\admin\apprenantController::class, 'cancel'])->name('admin.apprenant.cancel');
    Route::post('/', [\App\Http\Controllers\admin\apprenantController::class, 'store'])->name('admin.apprenant.store');
    Route::get('/{apprenant}/edit', [\App\Http\Controllers\admin\apprenantController::class, 'edit'])->name('admin.apprenant.edit');
    Route::put('/{apprenant}', [\App\Http\Controllers\admin\apprenantController::class, 'update'])->name('admin.apprenant.update');
    Route::put('/courseupdate/{apprenant}', [\App\Http\Controllers\admin\apprenantController::class, 'courseupdate'])->name('admin.apprenant.courseupdate');
    Route::post('/delete/{id}', [\App\Http\Controllers\admin\apprenantcontroller::class, 'delete'])->name('admin.apprenant.delete');
    Route::get('/{apprenant}', [\App\Http\Controllers\admin\apprenantController::class, 'show'])->name('admin.apprenant.show');
    Route::get('/search', [\App\Http\Controllers\admin\apprenantController::class, 'search'])->name('admin.apprenant.search');

});

Route::prefix('catego')->group(function () {
    Route::get('/', [\App\Http\Controllers\admin\categoController::class, 'index'])->name('admin.catego.index');
    Route::get('/create', [\App\Http\Controllers\admin\categoController::class, 'create'])->name('admin.catego.create');
    Route::get('/cancel', [\App\Http\Controllers\admin\categoController::class, 'cancel'])->name('admin.catego.cancel');
    Route::post('/', [\App\Http\Controllers\admin\categoController::class, 'store'])->name('admin.catego.store');
    Route::get('/{catego}/edit', [\App\Http\Controllers\admin\categocontroller::class, 'edit'])->name('admin.catego.edit');
    Route::put('/{categos}', [\App\Http\Controllers\admin\categoController::class, 'update'])->name('admin.catego.update');
    Route::post('/delete/{id}', [\App\Http\Controllers\admin\categocontroller::class, 'delete'])->name('admin.catego.delete');
    Route::get('/search', [\App\Http\Controllers\admin\categoController::class, 'search'])->name('admin.catego.search');

});

Route::prefix('course')->group(function () {
    Route::get('/', [\App\Http\Controllers\admin\courseController::class, 'index'])->name('admin.course.index');
    Route::get('/create', [\App\Http\Controllers\admin\courseController::class, 'create'])->name('admin.course.create');
    Route::get('/cancel', [\App\Http\Controllers\admin\courseController::class, 'cancel'])->name('admin.course.cancel');
    Route::post('/', [\App\Http\Controllers\admin\courseController::class, 'store'])->name('admin.course.store');
    Route::get('/{course}/edit', [\App\Http\Controllers\admin\courseController::class, 'edit'])->name('admin.course.edit');
    Route::put('/{course}', [\App\Http\Controllers\admin\courseController::class, 'update'])->name('admin.course.update');
    Route::post('/delete/{id}', [\App\Http\Controllers\admin\coursecontroller::class, 'delete'])->name('admin.course.delete');
    Route::get('/{course}', [\App\Http\Controllers\admin\courseController::class, 'show'])->name('admin.course.show');
    Route::get('/search', [\App\Http\Controllers\admin\courseController::class, 'search'])->name('admin.course.search');

});
Route::prefix('group')->group(function () {
    Route::get('/', [\App\Http\Controllers\admin\groupController::class, 'index'])->name('admin.group.index');
    Route::get('/create', [\App\Http\Controllers\admin\groupController::class, 'create'])->name('admin.group.create');
    Route::get('/cancel', [\App\Http\Controllers\admin\groupController::class, 'cancel'])->name('admin.group.cancel');
    Route::post('/', [\App\Http\Controllers\admin\groupController::class, 'store'])->name('admin.group.store');
    Route::get('/{group}/edit', [\App\Http\Controllers\admin\groupController::class, 'edit'])->name('admin.group.edit');
    Route::get('/{group}/addprof', [\App\Http\Controllers\admin\groupController::class, 'addprof'])->name('admin.group.addprof');
    Route::get('/{group}/addstud', [\App\Http\Controllers\admin\groupController::class, 'addstud'])->name('admin.group.addstud');
    Route::get('/{group}/addcourse', [\App\Http\Controllers\admin\groupController::class, 'addcourse'])->name('admin.group.addcourse');
    Route::post('/group/{groupes}/addstudd', [\App\Http\Controllers\admin\groupController::class, 'addstudd'])->name('admin.group.addstudd');
    Route::post('/group/{groupes}/updatee', [\App\Http\Controllers\admin\groupController::class, 'updatee'])->name('admin.group.updatee');
    Route::post('/group/{groupes}/addcourses', [\App\Http\Controllers\admin\groupController::class, 'addcourses'])->name('admin.group.addcourses');
    Route::delete('/group/deletee/{id}', [\App\Http\Controllers\admin\groupcontroller::class, 'deletee'])->name('admin.group.deletee');

    Route::put('/{group}', [\App\Http\Controllers\admin\groupController::class, 'update'])->name('admin.group.update');
    Route::delete('/group/delete/{id}', [GroupController::class, 'delete'])->name('admin.group.delete');
    Route::get('/{group}', [\App\Http\Controllers\admin\groupController::class, 'show'])->name('admin.group.show');
    Route::get('/search', [\App\Http\Controllers\admin\groupController::class, 'search'])->name('admin.group.search');

});

Route::prefix('gerer')->group(function () {
    Route::get('/', [\App\Http\Controllers\apprenant\gererapprenantController::class, 'index'])->name('apprenant.gerer.index');
    Route::get('/examen', [\App\Http\Controllers\apprenant\gererapprenantController::class, 'inndex'])->name('apprenant.gerer.inndex');
    Route::get('/create', [\App\Http\Controllers\apprenant\gererapprenantController::class, 'create'])->name('apprenant.gerer.create');
    Route::get('/cancel', [\App\Http\Controllers\apprenant\gererapprenantController::class, 'cancel'])->name('apprenant.gerer.cancel');
    Route::post('/', [\App\Http\Controllers\apprenant\gererapprenantController::class, 'store'])->name('apprenant.gerer.store');
    Route::get('/addcourse', [\App\Http\Controllers\apprenant\gererapprenantController::class, 'addcourse'])->name('apprenant.gerer.addcourse');
    Route::get('/courses', [\App\Http\Controllers\apprenant\gererapprenantController::class, 'courses'])->name('apprenant.gerer.courses');
    Route::get('/{apprenant}/edit', [\App\Http\Controllers\apprenant\gererapprenantController::class, 'edit'])->name('apprenant.gerer.edit');
    Route::put('/{apprenant}', [\App\Http\Controllers\apprenant\gererapprenantController::class, 'update'])->name('apprenant.gerer.update');
    Route::post('/delete/{id}', [\App\Http\Controllers\apprenant\gererapprenantcontroller::class, 'delete'])->name('apprenant.gerer.delete');
    Route::post('/addcourse/leson/send/{id}', [\App\Http\Controllers\apprenant\gererapprenantcontroller::class, 'send'])->name('apprenant.gerer.send');
    Route::get('/addcourse/{apprenant}', [\App\Http\Controllers\apprenant\gererapprenantController::class, 'show'])->name('apprenant.gerer.show');
    Route::get('/addcourse/{course}/leson', [\App\Http\Controllers\apprenant\gererapprenantController::class, 'leson'])->name('apprenant.gerer.leson');
    Route::get('/addcourse/leson/examan/{course}', [\App\Http\Controllers\apprenant\gererapprenantController::class, 'examan'])->name('apprenant.gerer.examan');
    Route::get('/addcourse/leson/{id}', [\App\Http\Controllers\apprenant\gererapprenantController::class, 'watch_video'])->name('apprenant.gerer.watch-video');

    Route::get('/{apprenant}', [\App\Http\Controllers\apprenant\gererapprenantController::class, 'video'])->name('apprenant.gerer.video');
    Route::get('/search', [\App\Http\Controllers\apprenant\gererapprenantController::class, 'search'])->name('admin.gerer.search');

});
// Login Routes for Apprenants


Route::post('/login', [\App\Http\Controllers\apprenant\gererapprenantController::class, 'login'])->name('apprenant.gerer.login');

Route::post('/login', [\App\Http\Controllers\apprenant\gererapprenantController::class, 'login1'])->name('apprenant.gerer.login1');

Route::prefix('video')->group(function () {
    Route::get('/', [\App\Http\Controllers\admin\videoController::class, 'index'])->name('admin.video.index');
    Route::get('/create', [\App\Http\Controllers\admin\videoController::class, 'create'])->name('admin.video.create');
    Route::get('/cancel', [\App\Http\Controllers\admin\videoController::class, 'cancel'])->name('admin.video.cancel');
    Route::post('/', [\App\Http\Controllers\admin\videoController::class, 'store'])->name('admin.video.store');
    Route::get('/{course}/edit', [\App\Http\Controllers\admin\videoController::class, 'edit'])->name('admin.video.edit');
    Route::put('/{course}', [\App\Http\Controllers\admin\videoController::class, 'update'])->name('admin.video.update');
    Route::post('/delete/{id}', [\App\Http\Controllers\admin\videocontroller::class, 'delete'])->name('admin.video.delete');
    Route::get('/{course}', [\App\Http\Controllers\admin\videoController::class, 'show'])->name('admin.video.show');
    Route::get('/search', [\App\Http\Controllers\admin\videoController::class, 'search'])->name('admin.video.search');

});
Route::prefix('prof')->group(function () {
    Route::get('/', [\App\Http\Controllers\admin\profController::class, 'index'])->name('admin.prof.index');
    Route::get('/create', [\App\Http\Controllers\admin\profController::class, 'create'])->name('admin.prof.create');
    Route::get('/cancel', [\App\Http\Controllers\admin\profController::class, 'cancel'])->name('admin.prof.cancel');
    Route::post('/', [\App\Http\Controllers\admin\profController::class, 'store'])->name('admin.prof.store');
    Route::get('/{apprenant}/edit', [\App\Http\Controllers\admin\profController::class, 'edit'])->name('admin.prof.edit');
    Route::put('/{apprenant}', [\App\Http\Controllers\admin\profcontroller::class, 'update'])->name('admin.prof.update');
    Route::post('/delete/{id}', [\App\Http\Controllers\admin\profcontroller::class, 'delete'])->name('admin.prof.delete');
    Route::get('/search', [\App\Http\Controllers\admin\profController::class, 'search'])->name('admin.prof.search');

});

Route::prefix('test')->group(function () {
    Route::get('/', [\App\Http\Controllers\admin\testController::class, 'index'])->name('admin.test.index');
    Route::get('/create', [\App\Http\Controllers\admin\testController::class, 'create'])->name('admin.test.create');
    Route::get('/cancel', [\App\Http\Controllers\admin\testController::class, 'cancel'])->name('admin.test.cancel');
    Route::post('/', [\App\Http\Controllers\admin\testController::class, 'store'])->name('admin.test.store');
    Route::get('/{course}/edit', [\App\Http\Controllers\admin\testController::class, 'edit'])->name('admin.test.edit');
    Route::put('/{test}', [\App\Http\Controllers\admin\testController::class, 'update'])->name('admin.test.update');
    Route::post('/delete/{id}', [\App\Http\Controllers\admin\testcontroller::class, 'delete'])->name('admin.test.delete');
    Route::get('/{course}', [\App\Http\Controllers\admin\testController::class, 'show'])->name('admin.test.show');
    Route::get('/search', [\App\Http\Controllers\admin\testController::class, 'search'])->name('admin.test.search');

});
Route::prefix('certificat')->group(function () {
    Route::get('/', [\App\Http\Controllers\admin\certificatController::class, 'index'])->name('admin.certificat.index');
    Route::get('/create', [\App\Http\Controllers\admin\certificatController::class, 'create'])->name('admin.certificat.create');
    Route::get('/cancel', [\App\Http\Controllers\admin\certificatController::class, 'cancel'])->name('admin.certificat.cancel');
    Route::post('/', [\App\Http\Controllers\admin\certificatController::class, 'store'])->name('admin.certificat.store');
    Route::get('/{course}/edit', [\App\Http\Controllers\admin\certificatController::class, 'edit'])->name('admin.certificat.edit');
    Route::put('/{certificate}', [\App\Http\Controllers\admin\certificatController::class, 'update'])->name('admin.certificat.update');
    Route::post('/delete/{id}', [\App\Http\Controllers\admin\certificatcontroller::class, 'delete'])->name('admin.certificat.delete');
    Route::get('/{course}', [\App\Http\Controllers\admin\certificatController::class, 'show'])->name('admin.certificat.show');
    Route::get('/search', [\App\Http\Controllers\admin\certificatController::class, 'search'])->name('admin.certificat.search');

});

