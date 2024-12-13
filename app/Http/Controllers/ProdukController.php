<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index(Request $request)
    {
        // Mengambil input pencarian
        $search = $request->input('search');

        // Menyaring produk berdasarkan pencarian
        if ($search) {
            $produkCard = Produk::where('judul', 'like', "%$search%")
                                ->orWhere('deskripsi', 'like', "%$search%")
                                ->get();
        } else {
            // Jika tidak ada pencarian, ambil semua produk
            $produkCard = Produk::all();
        }

        // Mengirim data produk ke tampilan
        return view('produk.index', compact('produkCard'));
    }

}
