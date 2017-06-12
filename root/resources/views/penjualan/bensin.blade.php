@extends('layouts.template')
@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Tambah Record</h3>
                <div class="right">
                    <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                    <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
                </div>
            </div>
            <div class="panel-body">
                <form action="{{url('/penjualan/bensin')}}" method="POST">
                   {!! csrf_field() !!}
                    <div class="form-group">
                       <label for="jenis">Jenis</label>
                        <select name="jenis" id="jenis" class="form-control">
                            <option value="1" selected>Bensin</option>
                            <option value="2">Pertalite</option>
                        </select>
                    </div>
                    <div class="form-group">
                       <label for="">Harga</label>
                        <div class="input-group">
                            <span class="input-group-addon">Rp.</span>
                            <input class="form-control" type="text" id="harga" name="harga" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                       <label for="">Jumlah</label>
                        <input name="jumlah" id="jumlah" type="number" class="form-control" min="0" value="0" required>
                    </div>
                    <div class="form-group">
                       <label for="">Total</label>
                        <div class="input-group">
                            <span class="input-group-addon">Rp.</span>
                            <input class="form-control" type="text" id="total" name="total" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                       <label for="">Keterangan</label>
                        <input name="keterangan" type="text" class="form-control" min="0" required>
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
                    var jenis = $('#jenis'),
                        harga = $('#harga'),
                        jumlah = $('#jumlah'),
                        total = $('#total');
                    harga.val('8000');
                    total.val('0');
                    jenis.change(function(){
                        if(jenis.val() == 1){
                            harga.val('8000');
                        }else{
                            harga.val('9000');
                        }
                    });
                    jumlah.keyup(function(){
                        total.val(harga.val()*jumlah.val());
                    })
                    jumlah.change(function(){
                        total.val(harga.val()*jumlah.val());
                    })
                </script>
            </div>
        </div>
    </div>
    <div class="col-md-8">
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
                            <th>Jumlah</th>
                            <th>Total</th>
                            <th>Waktu &amp; Tanggal</th>
                            <th>Keterangan</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $no=1 ?>
                    @foreach($bensin as $b)
                        <tr>
                            <td><a href="#">{{$no}}</a></td>
                            <td>{{$b['jenis']}}</td>
                            <td>{{$b['jumlah']}}</td>
                            <td>Rp. {{$b['total']}}</td>
                            <td>{{ Carbon\Carbon::parse($b->created_at)->format('d-m-Y H:i') }}</td>
                            <td>{{$b['keterangan']}}</td>
                            <td>
                                <a href=""><button class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></button></a>
                            </td>
                        </tr>
                    <?php $no++ ?>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection