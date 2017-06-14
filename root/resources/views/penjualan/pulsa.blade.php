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
                <form action="{{url('/penjualan/pulsa')}}" method="POST">
                   {!! csrf_field() !!}
                    <div class="form-group">
                       <label for="">Harga</label>
                        <div class="input-group">
                            <span class="input-group-addon">Rp.</span>
                            <input class="form-control" type="text" id="harga" name="harga" value="6000" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                       <label for="">Jumlah</label>
                        <select name="jumlah" id="jumlah" class="form-control">
                            <option value="5000">5000</option>
                            <option value="10000">10000</option>
                            <option value="20000">20000</option>
                        </select>
                    </div>
                    <div class="form-group">
                       <label for="">Total</label>
                        <div class="input-group">
                            <span class="input-group-addon">Rp.</span>
                            <input class="form-control" type="text" id="total" name="total" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                       <label for="">Tunai</label>
                        <div class="input-group">
                            <span class="input-group-addon">Rp.</span>
                            <input class="form-control" type="text" id="tunai" name="tunai" required>
                        </div>
                    </div>
                    <div class="form-group">
                       <label for="">Kembalian</label>
                        <div class="input-group">
                            <span class="input-group-addon">Rp.</span>
                            <input class="form-control" type="text" name="kembalian" id="kembalian" readonly>
                        </div>
                    </div>
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
                    var harga = $('#harga'),
                        jumlah = $('#jumlah'),
                        total = $('#total'),
                        tunai = $('#tunai'),
                        kembalian = $('#kembalian');
                    function hitung(){
                        var j = jumlah.val()/5000;
                        return j*6000;
                    }
                    total.val(hitung());
                    tunai.keyup(function(){
                        kembalian.val(tunai.val()-total.val());
                    })
                    jumlah.keyup(function(){
                        total.val(hitung());
                    })
                    jumlah.change(function(){
                        total.val(hitung());
                    })
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
                            <th>Jumlah</th>
                            <th>Total</th>
                            <th>Tunai</th>
                            <th>Kembalian</th>
                            <th>Waktu &amp; Tanggal</th>
                            <th>Keterangan</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $no=1 ?>
                    @foreach($pulsa as $p)
                        <tr>
                            <td><a href="#">{{$no}}</a></td>
                            <td>Pulsa Rp.{{$p['jumlah']}}</td>
                            <td>Rp. {{$p['total']}}</td>
                            <td>Rp. {{$p['tunai']}}</td>
                            <td>Rp. {{$p['tunai']-$p['total']}}</td>
                            <td>{{ Carbon\Carbon::parse($p->created_at)->format('d-m-Y H:i') }}</td>
                            <td>{{$p['keterangan']}}</td>
                            <td>
                                @if(($p['tunai']-$p['total'])>0)
                                <span class="label label-success">LUNAS</span>
                                @else
                                <span class="label label-warning">BELUM LUNAS</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{route('edit_ppulsa',$p['id_penjualan'])}}"><button class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></button></a>
                                <a href="{{route('hapus_ppulsa',$p['id_penjualan'])}}"><button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button></a>
                            </td>
                        </tr>
                    <?php $no++ ?>
                    @endforeach
                    </tbody>
                    <tr>
                        <th colspan="2">Total</th>
                        <th colspan="">Rp. {{App\Pulsa::sum('total')}}</th>
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