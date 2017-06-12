@extends('layouts.template')

@section('content')
<div class="panel panel-headline">
    <div class="panel-heading">
        <h3 class="panel-title">Penjualan Hari Ini</h3>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-4">
                <div class="metric">
                    <a href="#bensinModal" data-toggle="modal" data-target="#bensinModal"><span class="icon"><i class="fa fa-plus"></i></span></a>
                    <p>
                        <span class="number">{{ App\Bensin::whereRaw('Date(created_at) = CURDATE()')->count() }}</span>
                        <span class="title">Penjualan Bensin</span>
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="metric">
                    <a href=""><span class="icon"><i class="fa fa-plus"></i></span></a>
                    <p>
                        <span class="number">0</span>
                        <span class="title">Penjualan Pulsa</span>
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="metric">
                    <a href=""><span class="icon"><i class="fa fa-plus"></i></span></a>
                    <p>
                        <span class="number">0</span>
                        <span class="title">Penjualan Nasi</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9">
                <div id="headline-chart" class="ct-chart"></div>
            </div>
            <div class="col-md-3">
                <div class="weekly-summary text-right">
                    <span class="number">0</span> <span class="percentage"></span>
                    <span class="info-label">Total Penjualan</span>
                </div>
                <div class="weekly-summary text-right">
                    <span class="number">Rp.0</span> <span class="percentage"></span>
                    <span class="info-label">Penjualan Hari Ini</span>
                </div>
                <div class="weekly-summary text-right">
                    <span class="number">Rp.0</span> <span class="percentage"></span>
                    <span class="info-label">Total Pemasukan</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div id="bensinModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Penjualan Bensin</h4>
            </div>
            <div class="modal-body">
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
                        <div class="col-md-12">
                        </div>
                    </div>
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
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Input</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END OVERVIEW -->
<div class="row">
    <div class="col-md-6">
        <!-- RECENT PURCHASES -->
<!--
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Recent Purchases</h3>
                <div class="right">
                    <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                    <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
                </div>
            </div>
            <div class="panel-body no-padding">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Order No.</th>
                            <th>Name</th>
                            <th>Amount</th>
                            <th>Date &amp; Time</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><a href="#">763648</a></td>
                            <td>Steve</td>
                            <td>$122</td>
                            <td>Oct 21, 2016</td>
                            <td><span class="label label-success">COMPLETED</span></td>
                        </tr>
                        <tr>
                            <td><a href="#">763649</a></td>
                            <td>Amber</td>
                            <td>$62</td>
                            <td>Oct 21, 2016</td>
                            <td><span class="label label-warning">PENDING</span></td>
                        </tr>
                        <tr>
                            <td><a href="#">763650</a></td>
                            <td>Michael</td>
                            <td>$34</td>
                            <td>Oct 18, 2016</td>
                            <td><span class="label label-danger">FAILED</span></td>
                        </tr>
                        <tr>
                            <td><a href="#">763651</a></td>
                            <td>Roger</td>
                            <td>$186</td>
                            <td>Oct 17, 2016</td>
                            <td><span class="label label-success">SUCCESS</span></td>
                        </tr>
                        <tr>
                            <td><a href="#">763652</a></td>
                            <td>Smith</td>
                            <td>$362</td>
                            <td>Oct 16, 2016</td>
                            <td><span class="label label-success">SUCCESS</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-6"><span class="panel-note"><i class="fa fa-clock-o"></i> Last 24 hours</span></div>
                    <div class="col-md-6 text-right"><a href="#" class="btn btn-primary">View All Purchases</a></div>
                </div>
            </div>
        </div>
-->
        <!-- END RECENT PURCHASES -->
    </div>
</div>
@endsection