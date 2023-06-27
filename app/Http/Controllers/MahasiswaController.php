<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use Session;
use Image;
use File;
use Input;
use DB;

class MahasiswaController extends Controller
{
  public function index()
  {

    $data = Mahasiswa::all();
    return view('mahasiswa', compact('data'));
  } 

  public function simpan(Request $request)
  {

    $request->validate([
        'nama' => 'required|string|min:3',
        'nim' => 'required|string|max:10',
        'foto' => 'required|image|mimes:jpg,jpeg,png',

    ]);

    $request_image = $request->file('foto');

        $image = Image::make($request_image);
        $image_path = public_path('/foto/');
        
        if (!File::exists($image_path)) {
            File::makeDirectory($image_path);
        }

        $image_name = time().'.'.$request_image->getClientOriginalExtension();
        

        // keep ratio height and width
        $image->resize(null, 200, function($constraint) {
            $constraint->aspectRatio();
        });

        $image->save($image_path.$image_name);


    $data = new Mahasiswa();
      $data->nim = $request->nim;
      $data->nama = $request->nama;
      $data->prodi = $request->prodi;
      $data->foto = $image_name;
    $data->save();
    
    Session::flash('sukses', 'Data berhasil disimpan');
    return back();
  }

  public function hapus($id)
  {
    $data = Mahasiswa::find($id);
    $data->delete();
    Session::flash('sukses', 'Data berhasil dihapus');
    return back();
  }

    public function update(Request $request, $id)
  {

    $data = Mahasiswa::find($id);
      $data->nim = $request->nim;
      $data->nama = $request->nama;
      $data->prodi = $request->prodi;
    $data->save();
    Session::flash('sukses', 'Data berhasil diupdate');
    return back();
  }
}