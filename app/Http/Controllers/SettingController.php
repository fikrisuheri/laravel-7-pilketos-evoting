<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    public function __invoke(Request $request)
    {
        $title = 'Pengaturan';
        $setting = Setting::first();
        return view('setting',compact('title','setting'));
    }

    public function update($field,$status)
    {
        DB::table('settings')->update([$field => $status]);
        return redirect()->route('setting');
    }
}
