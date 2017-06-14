<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JenisKonsumsi;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Dashboard';
        return view('dashboard',compact('title'));
    }
    public function config()
    {
        $title = 'Pengaturan';
        return view('pengaturan',compact('title'));
    }
    public function tambah_menu(Request $r)
    {
        $m = new JenisKonsumsi;
        $m['jenis'] = $r['jenis'];
        $m['nama'] = $r['nama'];
        $m['harga'] = $r['harga'];
        $m->save();
        return redirect('/pengaturan');
    }
    public function hapus_menu($id)
    {
        JenisKonsumsi::whereId($id)->delete();
        return redirect('/pengaturan');
    }
}
