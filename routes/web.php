<?php

use App\Http\Controllers\DownloadPdfController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/download-pdf/{record}', [DownloadPdfController::class, 'downloadPDF'])->name('student.pdf.download');