<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Kandidat;
use App\Pemilih;
class DashboardController extends Controller
{

    public function index()
    {
        if(session()->get('npm')){

        }else{
            return redirect()->route('awal')->with('status','Silahkan login terlebih dahulu');
        }

        $data = [
            'kandidats' => Kandidat::all(),
            'cek' => \App\Pemilih::where('npm',session()->get('npm'))->first(),
            'cekvoting' => \App\Setting::first(),
        ];
        
        return view('front.dashboard.index',$data);
    }

    public function hasil()
    {
        if(session()->get('npm')){

        }else{
            return redirect()->route('awal')->with('status','Silahkan login terlebih dahulu');
        }
        $cekhasil = \App\Setting::first();
        return view('front.hasil',compact('cekhasil'));
    }

    public function simpanpilihan($id)
    {

        if(session()->get('npm')){

        }else{
            return redirect()->route('awal')->with('status','Silahkan login terlebih dahulu');
        }

        $npm = session()->get('npm');
        $kandidat_id = $id;

        $pemilih = Pemilih::where(['npm' => $npm])->first();

        if($pemilih->kandidat_id == null){
            $pemilih->kandidat_id = $kandidat_id;
            $pemilih->save();
            
            return redirect()->route('front.dashboard')->with('status','Berhasil Menyimpan Suara Pilihan Anda');
        }else{
            return redirect()->route('front.dashboard')->with('status','Anda Telah Memilih');
        }
    }
}
