@extends('layouts.template')

@section('content')
<?php
$pbensin = App\Bensin::whereRaw('Date(created_at) = CURDATE()');
$ppulsa = App\Pulsa::whereRaw('Date(created_at) = CURDATE()');
$pkonsumsi = App\Konsumsi::whereRaw('Date(created_at) = CURDATE()');
$ptotal = $pbensin->count()+$ppulsa->count()+$pkonsumsi->count();

$income = $pbensin->sum('total')+$ppulsa->sum('total')+$pkonsumsi->sum('total');
?>
<div class="panel panel-headline">
    <div class="panel-heading">
        <h3 class="panel-title">Penjualan Hari Ini</h3>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-4">
                <div class="metric">
                    <a href="{{route('pbensin')}}"><span class="icon"><i class="fa fa-plus"></i></span></a>
                    <p>
                        <span class="number">{{ $pbensin->count() }}</span>
                        <span class="title">Penjualan Bensin</span>
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="metric">
                    <a href="{{route('ppulsa')}}"><span class="icon"><i class="fa fa-plus"></i></span></a>
                    <p>
                        <span class="number">{{ $ppulsa->count() }}</span>
                        <span class="title">Penjualan Pulsa</span>
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="metric">
                    <a href="{{route('pkonsumsi')}}"><span class="icon"><i class="fa fa-plus"></i></span></a>
                    <p>
                        <span class="number">{{ $pkonsumsi->count() }}</span>
                        <span class="title">Penjualan Konsumsi</span>
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
                    <span class="number">{{ $ptotal }}</span> <span class="percentage"></span>
                    <span class="info-label">Total Penjualan</span>
                </div>
                <div class="weekly-summary text-right">
                    <span class="number">Rp. {{ $income }}</span> <span class="percentage"></span>
                    <span class="info-label">Penjualan Hari Ini</span>
                </div>
                <div class="weekly-summary text-right">
                    <span class="number">Rp. {{ $outcome or '0' }}</span> <span class="percentage"></span>
                    <span class="info-label">Pengeluaran Hari Ini</span>
                </div>
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