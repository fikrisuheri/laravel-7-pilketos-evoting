<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pemilih;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $npm = $request->npm;
        $password = $request->password;
        $cek = Pemilih::where(['npm' => $npm,'password' => $password])->first();

        if($cek){
            session([
                'npm' => $cek->npm,
                'name' => $cek->name,
                'kandidat_id' => $cek->kandidat_id
            ]);

            return redirect()->route('front.dashboard');
        }else{
            return redirect('/#login')->with('status','Gagal login ! Periksa NIS dan Token');
        }

    }

    public function logout()
    {
        session()->flush();
        return redirect()->route('awal');
    }
}
