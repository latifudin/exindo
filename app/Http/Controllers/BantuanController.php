<?php

namespace App\Http\Controllers;

use App\Models\Bantu;
use App\Models\BantuItem;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BantuanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(): View
    {
        $kategori   = Bantu::all();
        $bantuan   = BantuItem::all();
        
        return view('admin.bantuan.index', compact('kategori', 'bantuan'));
    }

    public function create1(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'bantukat'     => 'required',
        ]);

        //create
        Bantu::create([
            'bantukat'    => $request->bantukat,
        ]);

        //redirect to index
        return redirect('admin/bantuan')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function create2(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'bantu_id'      => 'required',
            'judul'         => 'required',
            'isi'           => 'required',
        ]);

        //create
        BantuItem::create([
            'bantu_id'      => $request->bantu_id,
            'judul'         => $request->judul,
            'isi'           => $request->isi,
        ]);

        //redirect to index
        return redirect('admin/bantuan')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function update1(Request $request, $id): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'bantukat'     => 'required',
        ]);
        
        //get transaksi by ID
        $Bantu = Bantu::findOrFail($id);

        //updated
        $Bantu->update([
            'bantukat'    => $request->bantukat,
        ]);

        //redirect to index
        return redirect('admin/bantuan')->with(['success' => 'Data Berhasil di Update!']);
    }

    public function update2(Request $request, $id): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'bantu_id'      => 'required',
            'judul'         => 'required',
            'isi'           => 'required',
        ]);
        
        //get transaksi by ID
        $BantuItem = BantuItem::findOrFail($id);

        //updated
        $BantuItem->update([
            'bantu_id'      => $request->bantu_id,
            'judul'         => $request->judul,
            'isi'           => $request->isi,
        ]);

        //redirect to index
        return redirect('admin/bantuan')->with(['success' => 'Data Berhasil di Update!']);
    }
    
    public function destroy1($id): RedirectResponse
    {
        $kategori = Bantu::findOrFail($id);
                            
        $kategori->delete();

        //redirect to index
        return redirect('admin/bantuan')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function destroy2($id): RedirectResponse
    {
        $bantuan = BantuItem::findOrFail($id);
                            
        $bantuan->delete();

        //redirect to index
        return redirect('admin/bantuan')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
