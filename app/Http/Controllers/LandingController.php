    <?php

    // namespace App\Http\Controllers;
    use App\Models\Herosection;
    use App\Models\SectionPromo;
    use Illuminate\Http\Request;
    use App\Models\SectionProduk;
    use App\Models\SectionSosmed;
    use App\Http\Controllers\Controller;
    use App\Models\Sosmed;

    class LandingController extends Controller
    {
        public function index()
        {
            $content = Herosection::where('is_active', true)->first();
            $socialMedia = SectionSosmed::where('is_active', true)->get();
            $promo = SectionPromo::where('is_active', true)->get();
            $produk = SectionProduk::where('is_active', true)->get();
            $sosmed = Sosmed::all();
            return view('index', compact('content', 'socialMedia', 'promo', 'produk', 'sosmed' ));
        }
    }
