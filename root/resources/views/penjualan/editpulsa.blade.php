@extends('layouts.template')
@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Edit Record</h3>
                <div class="right">
                    <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                    <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
                </div>
            </div>
            <div class="panel-body">
                <form action="{{route('edit_ppulsa',$p['id_penjualan'])}}" method="POST">
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
                            <option value="5000" {{$p['jumlah']==5000?'selected':null}} >5000</option>
                            <option value="10000" {{$p['jumlah']==10000?'selected':null}} >10000</option>
                            <option value="20000" {{$p['jumlah']==20000?'selected':null}} >20000</option>
                        </select>
                    </div>
                    <div class="form-group">
                       <label for="">Total</label>
                        <div class="input-group">
                            <span class="input-group-addon">Rp.</span>
                            <input class="form-control" type="text" id="total" name="total" value="{{$p['total']}}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                       <label for="">Tunai</label>
                        <div class="input-group">
                            <span class="input-group-addon">Rp.</span>
                            <input class="form-control" type="text" id="tunai" name="tunai" value="{{$p['tunai']}}" required>
                        </div>
                    </div>
                    <div class="form-group">
                       <label for="">Keterangan</label>
                        <input name="keterangan" type="text" class="form-control" min="0" value="{{$p['keterangan']}}">
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
                        total = $('#total');
                    function hitung(){
                        var j = jumlah.val()/5000;
                        return j*6000;
                    }
                    total.val(hitung());
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
</div>
@endsection