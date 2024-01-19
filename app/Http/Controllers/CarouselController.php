<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarouselController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(): View
    {

        $carousel = Carousel::all();
        return view('admin.carousel.index', compact('carousel'));
    }
    public function create(): View
    {
        $carousel = Carousel::all();

        return view('admin.carousel.create', compact('carousel'));
    }
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'image'     => 'required|image|mimes:jpeg,jpg,png',
            'deskripsi'    => 'required',
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/carousel', $image->hashName());

        //create post
        $carousel = Carousel::create([
            'image'     => $image->hashName(),
            'deskripsi'    => $request->deskripsi,
        ]);
        

        //redirect to index
        return redirect()->route('carousel.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    public function edit(string $id): View
    {
        $carousel = Carousel::findOrFail($id);
        
        return view('admin.carousel.edit', compact('carousel'));
    }
    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'deskripsi'     => 'required',
        ]);

        $carousel = Carousel::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //validate form image
            $this->validate($request, [
                'image'     => 'required|image|mimes:jpeg,jpg,png',
            ]);
            
            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/carousel', $image->hashName());

            //delete old image
            Storage::delete('public/carousel/'.$carousel->image);

            //update post with new image
            $carousel->update([
                'image'     => $image->hashName(),
                'deskripsi'     => $request->deskripsi,
            ]);

        } else {

            //update post without image
            $carousel->update([
                'deskripsi'     => $request->deskripsi,
            ]);
        }

        //redirect to index
        return redirect()->route('carousel.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    public function destroy($id): RedirectResponse
    {
        //get transaksi by ID
        $carousel = Carousel::findOrFail($id);

        //delete old image
        Storage::delete('public/carousel/'.$carousel->image);

        //delete transaksi
        $carousel->delete();

        //redirect to index
        return redirect()->route('carousel.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
