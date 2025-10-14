<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InformasiController extends Controller
{
    public function informasi(){
        return view('pemiliklapangan.Informasi.informasi');
    }

    public function detail(){
        return view('pemiliklapangan.Detail.detail');
    }

    public function syarat(){
        return view('pemiliklapangan.Syarat.syarat');
    }

    public function end(){
        return view('pemiliklapangan.Dashboard.end');
    }
}
