<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nilai;
use Session;

class NilaiController extends Controller
{
    public function index()
    {
        $data = Nilai::all();
        return view('nilai', compact('data'));
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'nim' => 'required|string',
            'nama' => 'required|string',
        ]);
        
        $data = new Nilai();
            $data->nim = $request->nim;
            $data->nama = $request->nama;
            $data->prodi = $request->prodi;
            $data->matkul = $request->matkul;
            $data->nilai = $request->nilai;
        $data->save();
        Session::flash('sukses', 'Data berhasil disimpan');
        return back();
    }

    public function hapus($id)
    {
        $data = Nilai::find($id);
        $data->delete();
        Session::flash('sukses', 'Data berhasil dihapus');
        return back();
    }

    public function update(Request $request, $id)
    {
        $data = Nilai::find($id);
            $data->nim = $request->nim;
            $data->nama = $request->nama;
            $data->prodi = $request->prodi;
            $data->matkul = $request->matkul;
            $data->nilai = $request->nilai;
        $data->save();
        Session::flash('sukses', 'Data berhasil diupdate');
        return back(); 
    }
}
