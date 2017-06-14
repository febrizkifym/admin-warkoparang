@extends('layouts.template')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Tambah Record</h3>
                <div class="right">
                    <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                    <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
                </div>
            </div>
            <div class="panel-body">
                <form action="{{url('/penjualan/konsumsi')}}" method="POST">
                   {!! csrf_field() !!}
                    <div class="form-group">
                       <label for="jenis">Konsumsi</label>
                        <select name="konsumsi" id="konsumsi" class="form-control">
                            @foreach($jenis as $j)
                            <option value="{{$j['id']}}">{{$j['nama']}}</option>
                            @endforeach
                        </select>
                    </div>
<!-- NEED AJAX , SHIT
                    <div class="form-group">
                       <label for="">Harga</label>
                        <div class="input-group">
                            <span class="input-group-addon">Rp.</span>
                            <input class="form-control" type="text" id="harga" name="harga" readonly>
                        </div>
                    </div>
-->
                    <div class="form-group">
                       <label for="">Jumlah</label>
                        <input name="jumlah" id="jumlah" type="number" class="form-control" min="1" value="1" required>
                    </div>
<!-- THIS ONE TOO
                    <div class="form-group">
                       <label for="">Total</label>
                        <div class="input-group">
                            <span class="input-group-addon">Rp.</span>
                            <input class="form-control" type="text" id="total" name="total" readonly>
                        </div>
                    </div>
-->
                    <div class="form-group">
                       <label for="">Keterangan</label>
                        <input name="keterangan" type="text" class="form-control" min="0">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary btn-block">Input</button>
                        </div>
                        <div class="col-md-6">
                            <button type="reset" class="btn btn-warning btn-block">Reset</button>
                        </div>
                    </div>
                </form>
                <script>
                    
                </script>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Log Penjualan</h3>
                <div class="right">
                    <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                    <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
                </div>
            </div>
            <div class="panel-body no-padding">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Jenis</th>
                            <th>Nama</th>
                            <th>Jumlah</th>
                            <th>Total</th>
                            <th>Waktu &amp; Tanggal</th>
                            <th>Keterangan</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $no=1 ?>
                    @foreach($konsumsi as $k)
                        <tr>
                            <td><a href="#">{{$no}}</a></td>
                            <td>{{$k['jenis']}}</td>
                            <td>{{$k['nama']}}</td>
                            <td>{{$k['jumlah']}}</td>
                            <td>Rp. {{$k['total']}}</td>
                            <td>{{ Carbon\Carbon::parse($k->created_at)->format('d-m-Y H:i') }}</td>
                            <td>{{$k['keterangan']}}</td>
                            <td>
                                <a href="{{route('edit_pkonsumsi',$k['id_penjualan'])}}"><button class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></button></a>
                                <a href="{{route('hapus_pkonsumsi',$k['id_penjualan'])}}"><button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button></a>
                            </td>
                        </tr>
                    <?php $no++ ?>
                    @endforeach
                    </tbody>
                    <tr>
                        <th colspan="4">Total</th>
                        <th colspan="">Rp. {{App\Konsumsi::sum('total')}}</th>
                       <th></th>
                       <th></th>
                       <th></th>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection