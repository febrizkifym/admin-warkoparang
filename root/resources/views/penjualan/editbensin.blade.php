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
                <form action="{{route('edit_pbensin',$b['id_penjualan'])}}" method="POST">
                   {!! csrf_field() !!}
                    <div class="form-group">
                       <label for="jenis">Jenis</label>
                        <select name="jenis" id="jenis" class="form-control">
                            <option value="1" {{$b['id_jenis']==1?'selected':null}}>Bensin</option>
                            <option value="2" {{$b['id_jenis']==2?'selected':null}}>Pertalite</option>
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
                        <input name="jumlah" id="jumlah" type="number" class="form-control" min="0" value="{{$b['jumlah']}}" required>
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
                        <input name="keterangan" type="text" class="form-control" min="0" value="{{$b['keterangan']}}">
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
                    if(jenis.val() == 1){
                        harga.val('8000');
                    }else{
                        harga.val('9000');
                    }
                    total.val(harga.val()*jumlah.val());
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
</div>
@endsection