<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Konsumsi;
use App\JenisKonsumsi;

class KonsumsiController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $title = 'Penjualan Konsumsi';
        $konsumsi = Konsumsi::join('k_konsumsi','p_konsumsi.id_konsumsi','k_konsumsi.id')->get();
        $jenis = JenisKonsumsi::orderBy('jenis')->get();
        return view('penjualan.konsumsi',compact('konsumsi','jenis','title'));
    }
    public function tambah(Request $r){
        $k = new Konsumsi;
        $harga = JenisKonsumsi::whereId($r['konsumsi'])->first(['harga']);
        $k['id_konsumsi'] = $r['konsumsi'];
        $k['jumlah'] = $r['jumlah'];
        $k['total'] = $harga['harga']*$k['jumlah'];
        $k['keterangan'] = $r['keterangan'];
        $k->save();
        return redirect()->route('pkonsumsi');
    }
    public function edit($id){
        $title = 'Penjualan Konsumsi';
        $k = Konsumsi::join('k_konsumsi','p_konsumsi.id_konsumsi','k_konsumsi.id')->where('id_penjualan',$id)->first();
        return view('penjualan.editkonsumsi',compact('k','title'));
    }
    public function update(Request $r, $id){
       $k = Konsumsi::find($id);
       $harga = JenisKonsumsi::whereId($r['konsumsi'])->first(['harga']);
       $k['id_konsumsi'] = $r['konsumsi'];
       $k['jumlah'] = $r['jumlah'];
       $k['total'] = $harga['harga']*$k['jumlah'];
       $k['keterangan'] = $r['keterangan'];
       $k->save();
        return redirect()->route('pkonsumsi');
    }
    public function hapus($id){
       $k = Konsumsi::find($id);
       $k->delete();
        session()->flash('success','Data berhasil dihapus.');
        return redirect()->route('pkonsumsi');
    }
    public function index_config(){
        $title = 'Pengaturan Konsumsi';
        $konsumsi = Konsumsi::join('k_konsumsi','p_konsumsi.id_konsumsi','k_konsumsi.id')->get();
        $jenis = JenisKonsumsi::orderBy('jenis')->get();
        return view('pengaturan.konsumsi',compact('konsumsi','jenis','title'));
    }
}
