<?php

namespace App\Http\Controllers;

use App\Models\Bantu;
use App\Models\BantuItem;
use App\Models\Kategori;
use App\Models\Carousel;
use App\Models\Produk;
use App\Models\Setting;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class UIController extends Controller
{
    public function index(): View
    {
        $kategori   = Kategori::all();
        $carousel   = Carousel::all();
        $produk     = Produk::orderBy('created_at', 'desc')
                            ->paginate(8);
        $tampilan   = Setting::where('id', '1')
            ->get();

        return view('UI.index', compact([
            'kategori',
            'produk',
            'tampilan',
            'carousel',
        ]));
    }

    public function all(): View
    {
        $kategori   = Kategori::all();
        $produk     = Produk::orderBy('created_at', 'desc')
                            ->paginate(12);
        $tampilan   = Setting::where('id', '1')
            ->get();

        return view('UI.produk-all', compact([
            'kategori',
            'produk',
            'tampilan',
        ]));
    }

    public function detail(string $id): View
    {
        $produk = Produk::findOrFail($id);

        $diskon = (($produk->harga * $produk->diskon) / 100);
        $hasil = (($produk->harga) - $diskon);
        $tampilan   = Setting::where('id', '1')
            ->get();

        return view('UI.produk-detail', compact([
            'produk',
            'diskon',
            'hasil',
            'tampilan',
        ]));
    }

    public function cari1(Request $request)
    {
    // Menangkap data pencarian
    $cari = $request->cari;

    // Memisahkan kata kunci menjadi array
    $kata_kunci = explode(' ', $cari);

    // Mengambil data dengan pencarian
    $produkQuery = Produk::query();
    foreach ($kata_kunci as $kunci) {
        $produkQuery->where('judul', 'like', "%$kunci%");
    }
    $produk = $produkQuery->paginate();

    $kategori = Kategori::all();
    $tampilan = Setting::where('id', '1')->get();

    // Mengirim data
    return view('UI.index', compact('kategori', 'produk', 'tampilan', 'kata_kunci'));
    }


    public function cari2(Request $request)
    {
    // Menangkap data pencarian
    $cari = $request->cari;

    // Memisahkan kata kunci menjadi array
    $kata_kunci = explode(' ', $cari);

    // Mengambil data dengan pencarian
    $produkQuery = Produk::query();
    foreach ($kata_kunci as $kunci) {
        $produkQuery->where('judul', 'like', "%$kunci%");
    }
    $produk = $produkQuery->paginate();

    $kategori = Kategori::all();
    $tampilan = Setting::where('id', '1')->get();

    // Mengirim data
    return view('UI.index', compact('kategori', 'produk', 'tampilan', 'kata_kunci'));
    }


    public function bantu(): View
    {
        $kategori   = Bantu::all();
        $bantuan    = BantuItem::all();
        $tampilan   = Setting::where('id', '1')
            ->get();
        
        return view('UI.bantuan', compact([
            'kategori',
            'bantuan',
            'tampilan',
        ]));
    }

}
