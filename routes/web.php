<?php

use App\Models\Internship;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WebinarController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\InternshipController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\PendaftaranWebinarController;
use App\Http\Controllers\PendaftaranInternshipController;

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

Route::post('/register', [AuthController::class, 'register'])->name('register'); /* */
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout'); 

Route::get('/', [HomeController::class, 'index'])->name('home'); 
Route::get('/internship', [InternshipController::class, 'index'])->name('internship');
Route::get('/webinar', [WebinarController::class, 'index'])->name('webinar');
Route::get('/contact-us', [ContactUsController::class, 'index'])->name('contact-us');

Route::get('webinar/pendaftaran/{id}', [PendaftaranWebinarController::class, 'create'])->name('webinar.pendaftaran.create');
Route::get('internship/pendaftaran/{id}', [PendaftaranInternshipController::class, 'create'])->name('internship.pendaftaran.create');

Route::middleware(['auth', 'ceklevel:admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
        Route::prefix('internship')->group(function () {
            Route::prefix('division')->group(function () {
                Route::get('/', [InternshipController::class, 'indexDivision'])->name('admin.internship.division');
                Route::post('/store', [InternshipController::class, 'storeDivision'])->name('admin.internship.division.store');
                Route::post('/{id}/update', [InternshipController::class, 'updateDivision'])->name('admin.internship.division.update');
                Route::get('/{id}/destroy', [InternshipController::class, 'destroyDivision'])->name('admin.internship.division.destroy');
            });
            Route::prefix('subdivision')->group(function () {
                Route::get('/', [InternshipController::class, 'indexSubdivision'])->name('admin.internship.subdivision');
                Route::post('/store', [InternshipController::class, 'storeSubdivision'])->name('admin.internship.subdivision.store');
                Route::post('/{id}/update', [InternshipController::class, 'updateSubdivision'])->name('admin.internship.subdivision.update');
                Route::get('/{id}/destroy', [InternshipController::class, 'destroySubdivision'])->name('admin.internship.subdivision.destroy');
            });
            Route::prefix('peserta')->group(function () {
                Route::get('/', [PendaftaranInternshipController::class, 'index'])->name('admin.internship.peserta');
                Route::get('/get/{cv}', [PendaftaranInternshipController::class, 'getCV'])->name('getCV');
                Route::get('/{motivational_letter}/get', [PendaftaranInternshipController::class, 'getML'])->name('getML');
                Route::get('/{id}/approve', [PendaftaranInternshipController::class, 'approve'])->name('admin.internship.peserta.approve');
                Route::get('/{id}/decline', [PendaftaranInternshipController::class, 'decline'])->name('admin.internship.peserta.decline');
                Route::get('/{id}/destroy', [PendaftaranInternshipController::class, 'destroy'])->name('admin.internship.peserta.destroy');
            });
        });
        Route::prefix('webinar')->group(function () {
            Route::prefix('peserta')->group(function () {
                Route::get('/', [PendaftaranWebinarController::class, 'index'])->name('admin.webinar.peserta');
                Route::get('/get/{bukti_follow}', [PendaftaranWebinarController::class, 'getBukti'])->name('getBukti');
                Route::get('/{id}/destroy', [PendaftaranWebinarController::class, 'destroy'])->name('admin.webinar.peserta.destroy');
            });
            Route::prefix('data')->group(function () {
                Route::get('/', [WebinarController::class, 'adminIndex'])->name('admin.webinar.data');
                Route::post('/store', [WebinarController::class, 'store'])->name('admin.webinar.data.store');
                Route::post('/{id}/update', [WebinarController::class, 'update'])->name('admin.webinar.data.update');
                Route::get('/{id}/destroy', [WebinarController::class, 'destroy'])->name('admin.webinar.data.destroy');
            });
        });
    });
});

Route::middleware(['auth', 'ceklevel:user'])->group(function () {
    Route::prefix('notifikasi')->group(function () {
        Route::get('/', [NotificationController::class, 'index'])->name('notifikasi');
        Route::get('/mark-as-read', [NotificationController::class, 'markAsRead'])->name('notifikasi.mark-as-read');
    });
    Route::prefix('webinar')->group(function () {
        Route::prefix('pendaftaran')->group(function () {
            Route::post('/', [PendaftaranWebinarController::class, 'store'])->name('webinar.pendaftaran.store');
        });
    });
    Route::prefix('internship')->group(function () {
        Route::prefix('pendaftaran')->group(function () {
            Route::post('/', [PendaftaranInternshipController::class, 'store'])->name('internship.pendaftaran.store');
        });
    });
});

Route::get('/peserta_intern', function () {
    return view('admin/peserta_intern');
});

Route::get('/peserta_webinar', function () {
    return view('admin/peserta_webinar');
});
