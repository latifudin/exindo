<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(): View
    {
        $data   = Setting::all();

        return view('admin.setting.index', compact('data'));
    }

    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'banner'     => 'image|mimes:jpeg,jpg,png',
        ]);

        //upload image
        $image = $request->file('banner');
        $image->storeAs('public/UI', $image->hashName());

        //create post
        Setting::create([
            'banner'     => $image->hashName(),
            'about'     => $request->about,
            'fb'     => $request->fb,
            'ig'    => $request->ig,
            'twitter'    => $request->twitter,
            'wa'    => $request->wa,
            'email'    => $request->email,
            'alamat'    => $request->alamat,
        ]);

        //redirect to index
        return redirect()->route('setting.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $setting = Setting::findOrFail($id);

        //check if banner is uploaded
        if ($request->hasFile('banner')) {

            //validate form banner
            $this->validate($request, [
                'banner'     => 'image|mimes:jpeg,jpg,png',
            ]);

            //upload new banner
            $banner = $request->file('banner');
            $banner->storeAs('public/UI', $banner->hashName());

            //delete old banner
            Storage::delete('public/UI/' . $setting->banner);

            //update post with new banner
            $setting->update([
                'banner'    => $banner->hashName(),
                'about'     => $request->about,
                'fb'        => $request->fb,
                'ig'        => $request->ig,
                'twitter'   => $request->twitter,
                'wa'        => $request->wa,
                'email'     => $request->email,
                'alamat'    => $request->alamat,
            ]);
        } else {

            //update post without image
            $setting->update([
                'about'     => $request->about,
                'fb'        => $request->fb,
                'ig'        => $request->ig,
                'twitter'   => $request->twitter,
                'wa'        => $request->wa,
                'email'     => $request->email,
                'alamat'    => $request->alamat,
            ]);
        }

        //redirect to index
        return redirect()->route('setting.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
}
