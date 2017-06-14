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
                <form action="{{route('edit_pkonsumsi',$k['id_penjualan'])}}" method="POST">
                   {!! csrf_field() !!}
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <select name="konsumsi" class="form-control">
                        <?php $nama = App\JenisKonsumsi::all(); ?>
                        @foreach($nama as $n)
                            <option value="{{$n['id']}}" {{$n['nama']==$k['nama']?'selected':null}} nam>{{$n['nama']}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" class="form-control" name="jumlah" value="{{$k['jumlah']}}" min="1" required>
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Keterangan</label>
                        <input type="text" class="form-control" name="keterangan" value="{{$k['keterangan']}}">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Input</button>
                        <button class="btn btn-warning" type="reset">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection