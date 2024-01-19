<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\KategoriProduk;
use App\Models\Produk;
use App\Models\Setting;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(): View
    {
        $produk = Produk::with('kategoris')
                        ->orderBy('created_at', 'desc')
                        ->get();

        return view('admin.produk.index', compact('produk'));
    }

    public function create(): View
    {
        $kategori = Kategori::all();

        return view('admin.produk.create', compact('kategori'));
    }

    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'image'     => 'required|image|mimes:jpeg,jpg,png',
            'judul'     => 'required',
            'harga'     => 'required',
            'detail'    => 'required',
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/produk', $image->hashName());

        //create post
        $produk = Produk::create([
            'image'     => $image->hashName(),
            'judul'     => $request->judul,
            'harga'     => $request->harga,
            'diskon'    => $request->diskon,
            'detail'    => $request->detail,
        ]);
        $produk->kategoris()->attach($request->kategori);
        

        //redirect to index
        return redirect()->route('produk.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function show(string $id): View
    {
        $produk = Produk::findOrFail($id);

        $diskon = (($produk->harga*$produk->diskon)/100);
        $hasil = (($produk->harga)-$diskon);
        $setting = Setting::where('id', '1')
        ->get();

        return view('admin.produk.show', compact([
            'produk', 
            'diskon', 
            'hasil',
            'setting',
        ]));
    }

    public function edit(string $id): View
    {
        $produk = Produk::findOrFail($id);
        $kategori = Kategori::all();
        $kato = KategoriProduk::where('produk_id', $id)
                                 ->orderBy('kategori_id')
                                 ->get();
        
        return view('admin.produk.edit', compact([
            'produk',
            'kategori',
            'kato'
        ]));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'judul'     => 'required',
            'harga'     => 'required',
            'detail'    => 'required',
        ]);

        $produk = Produk::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //validate form image
            $this->validate($request, [
                'image'     => 'required|image|mimes:jpeg,jpg,png',
            ]);
            
            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/produk', $image->hashName());

            //delete old image
            Storage::delete('public/produk/'.$produk->image);

            //update post with new image
            $produk->update([
                'image'     => $image->hashName(),
                'judul'     => $request->judul,
                'harga'     => $request->harga,
                'diskon'    => $request->diskon,
                'detail'    => $request->detail,
            ]);

        } else {

            //update post without image
            $produk->update([
                'judul'     => $request->judul,
                'harga'     => $request->harga,
                'diskon'    => $request->diskon,
                'detail'    => $request->detail,
            ]);
        }
        $produk->kategoris()->sync($request->kategori);

        //redirect to index
        return redirect()->route('produk.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    
    public function destroy($id): RedirectResponse
    {
        //get transaksi by ID
        $produk = Produk::findOrFail($id);

        //delete old image
        Storage::delete('public/produk/'.$produk->image);

        //delete transaksi
        $produk->delete();

        //redirect to index
        return redirect()->route('produk.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

}
