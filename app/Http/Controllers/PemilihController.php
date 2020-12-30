<?php

namespace App\Http\Controllers;

use App\Pemilih;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Imports\PemilihImport;
use Maatwebsite\Excel\Facades\Excel;
class PemilihController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Peserta',
            'akuns' => Pemilih::orderBy('jurusan','ASC')->get(),
            'kelas' => Pemilih::groupBy('fakultas')->get()
        ];
        return view('pemilih.index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Akun Evoting'
        ];
        return view('pemilih.tambah', $data);
    }

    public function print(Request $request)
    {

        $pemilih = Pemilih::where('fakultas',$request->kelas)->orderBy('jurusan','ASC')->get();
        return view('pemilih.print', compact('pemilih','request'));
    }

    public function simpan(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'npm' => 'required|string|numeric|unique:pemilih',
            'fakultas' => 'required|string',
            'jurusan' => 'required|string',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->route('pemilih.tambah')->withErrors($validator)->withInput();
        }else{
            Pemilih::create($request->only(['name','npm','fakultas','jurusan','password']));
            return redirect()->route('pemilih')->with('status','Berhasil Menambah Akun Peserta');
        }
    }

    public function hapus()
    {
        Pemilih::truncate();
        return redirect()->route('pemilih')->with('status','Berhasil Menghapus Akun Voting');
    }

    public function hapusById($id)
    {
        Pemilih::find($id)->delete();
        return redirect()->route('pemilih')->with('status','Berhasil Menghapus Akun Voting');
    }

    public function import(Request $request)
    {
        Excel::import(new PemilihImport,$request->file('file'));
           
        return back();
    }
}
