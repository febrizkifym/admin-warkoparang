<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bensin;

class BensinController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $title = 'Penjualan Bensin';
        $bensin = Bensin::join('k_bensin','p_bensin.id_jenis','k_bensin.id')->get();
        return view('penjualan.bensin',compact('bensin','title'));
    }
    public function tambah(Request $r){
        $b = new Bensin;
        $b['id_jenis'] = $r['jenis'];
        $b['jumlah'] = $r['jumlah'];
        $b['total'] = $r['total'];
        $b['keterangan'] = $r['keterangan'];
        $b->save();
        return redirect()->route('penjualan_bensin');
    }
}
