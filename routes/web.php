<?php

use App\Models\Herosection;
use App\Models\SectionPromo;
use App\Models\SectionProduk;
use App\Models\SectionSosmed;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ProdukController; // Tambahkan produk controller jika diperlukan
use App\Models\Produk;

// Route untuk halaman utama
Route::get('/', [HomePageController::class, 'index'])->name('index');

// Route::get('/', function (Request $request) {
//     $search = $request->input('search'); // Ambil input dari query

//     // Contoh pencarian data di database
//     $products = Produk::query()
//         ->where('judul', 'nomor', "%{$search}%")
//         ->get();

//     return view('index', compact('products', 'search')); // Kirim data ke view
// })->name('index');
