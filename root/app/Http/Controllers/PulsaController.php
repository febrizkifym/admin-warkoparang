<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pulsa;
use Carbon\Carbon;

class PulsaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $title = 'Penjualan Pulsa';
        $pulsa = Pulsa::all();
        return view('penjualan.pulsa',compact('pulsa','title'));
    }
    public function tambah(Request $r){
        $p = new Pulsa;
        $p['jumlah'] = $r['jumlah'];
        $p['total'] = $r['total'];
        $p['tunai'] = $r['tunai'];
        $p['keterangan'] = $r['keterangan'];
        $p['created_at'] = Carbon::now();
        $p->save();
        return redirect()->route('ppulsa');
    }
    public function edit($id){
        $title = 'Penjualan Pulsa';
        $p = Pulsa::where('id_penjualan',$id)->first();
        return view('penjualan.editpulsa',compact('p','title'));
    }
    public function update(Request $r, $id){
        $p = Pulsa::find($id);
        $p['jumlah'] = $r['jumlah'];
        $p['total'] = $r['total'];
        $p['tunai'] = $r['tunai'];
        $p['keterangan'] = $r['keterangan'];
        $p->save();
        return redirect()->route('ppulsa');
    }
    public function hapus($id){
        Pulsa::find($id)->delete();
        return redirect()->route('ppulsa');
    }
}
