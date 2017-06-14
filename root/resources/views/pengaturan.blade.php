@extends('layouts.template')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Pengaturan Menu Konsumsi</h3>
                <div class="right">
                    <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                    <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
                </div>
            </div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                        <tr><th>No</th><th>Jenis</th><th>Nama</th><th>Harga</th><th></th></tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $konsumsi = App\JenisKonsumsi::orderBy('jenis')->get();
                        ?>
                        @foreach($konsumsi as $k)
                        <tr>
                            <td>{{$no}}</td>
                            <td>{{$k['jenis']}}</td>
                            <td>{{$k['nama']}}</td>
                            <td>Rp. {{$k['harga']}}</td>
                            <td>
                                <a href="{{route('hapus_menu',$k['id'])}}"><button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button></a>
                            </td>
                        </tr>
                        <?php $no++ ?>
                        @endforeach
                    </tbody>
                </table>
                    <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#tambahMenu">Tambah Menu</button>
            </div>
        </div>
    </div>
</div>

<div id="tambahMenu" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Menu</h4>
      </div>
      <div class="modal-body">
          <form action="{{route('tambah_menu')}}" method="post">
             {!! csrf_field() !!}
              <div class="form-group">
                  <label for="jenis">Jenis</label>
                  <select name="jenis" id="" class="form-control">
                      <option value="Makanan">Makanan</option>
                      <option value="Minuman">Minuman</option>
                  </select>
              </div>
              <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="text" class="form-control" name="nama">
              </div>
              <div class="form-group">
                  <label for="harga">Harga</label>
                  <div class="input-group">
                      <span class="input-group-addon">Rp. </span>
                      <input type="text" class="form-control" name="harga">
                  </div>
              </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Input</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </form>
      </div>
    </div>

  </div>
</div>

@endsection