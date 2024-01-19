<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(): View
    {
        $data   = Kategori::all();

        return view('admin.kategori.index', compact('data'));
    }

    public function show(string $id): View
    {
        $kategori = Kategori::findOrFail($id);
        $Kate = Kategori::with('katego')->where('id', $id)->first();
        $Produk = Produk::all();

        return view('admin.kategori.show', compact([
            'kategori',
            'Kate',
            'Produk'
        ]));
    }

    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'name'         => 'required',
        ]);

        //create Transaksi
        Kategori::create([
            'name'         => $request->name,
        ]);

        //redirect to index
        return redirect()->route('kategori.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'name'         => 'required',
        ]);
        
        //get transaksi by ID
        $kategori = Kategori::findOrFail($id);

        //updated
        $kategori->update([
            'name'         => $request->name,
        ]);

        //redirect to index
        return redirect()->route('kategori.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    
    public function destroy($id): RedirectResponse
    {
        //get transaksi by ID
        $kategori = Kategori::findOrFail($id);

        //delete transaksi
        $kategori->delete();

        //redirect to index
        return redirect()->route('kategori.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
