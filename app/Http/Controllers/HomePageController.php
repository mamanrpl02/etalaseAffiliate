<?php

namespace App\Http\Controllers;

use App\Models\Sosmed;
use App\Models\Herosection;
use App\Models\SectionPromo;
use Illuminate\Http\Request;
use App\Models\SectionProduk;
use App\Models\SectionSosmed;
use App\Models\Produk;
use App\Models\Promo;

class HomePageController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search'); // Ambil input dari form pencarian

        $content = Herosection::where('is_active', true)->first();
        $socialMedia = SectionSosmed::where('is_active', true)->first();
        $promo = SectionPromo::where('is_active', true)->first();
        $produk = SectionProduk::where('is_active', true)->first();
        $sosmed = Sosmed::all();
        $promoCard = Promo::all();

        // Query untuk mencari produk berdasarkan judul atau nomor
        $produkCard = Produk::query()
            ->when($search, function ($query, $search) {
                $query->where('judul', 'like', "%{$search}%") // Cari berdasarkan judul
                    ->orWhere('nomor', 'like', "%{$search}%"); // Cari berdasarkan nomor
            })
            ->get();

        return view('index', compact(
            'content',
            'socialMedia',
            'promo',
            'produk',
            'sosmed',
            'promoCard',
            'produkCard',
            'search'
        ));
    }
}
