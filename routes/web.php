<?php

use App\Http\Controllers\DownloadPdfController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


//Route::get('/download-pdf/{record}', [DownloadPdfController::class, 'download'])->name('student.pdf.download');
Route::get('/download-pdf/{record}', [DownloadPdfController::class, 'download'])->name('student.pdf.download');