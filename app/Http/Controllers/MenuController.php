<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Menu;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Menu::all();
        $cat = Categorie::all();
        
        return view('menu.index', compact('data','cat'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $input = $request->all();
        if($request->hasFile('gambar'))
        {
            $photo = $request->file('gambar'); //untuk mengambil value (photonya)
            $path_simpan = 'public/images/menu'; //menentukan path penyimpanan.
            $format = $photo->getClientOriginalExtension(); //mengambil format gambar
            $nama = 'menu-'.Carbon::now()->format('Ymd-his').random_int(000000,999999).'.'.$format;
            $simpan = $photo->storeAs($path_simpan, $nama); //menyimpan ke path.
            $input['gambar'] = $nama; //value yang disimpan di database.
        }

        Menu::create($input);
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = Menu::find($id);
        $cat = Categorie::all();
        return view('menu.detail', compact('data', 'cat'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $data = Menu::find($id);
        $input = $request->all();
        $data->update($input);
        return back()->with('success', 'Data siswa berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        //
    }
}
