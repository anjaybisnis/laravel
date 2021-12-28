@extends('layouts.app')
@section('content')

<body>

    @include('inc.profileheader')

    <!-- Start Author Settings -->
    <section class="user-settings pb-60">
        <div class="container">

            @include('inc.profilelinks')

            <!-- Start Earning Section -->
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-4">
                    <div class="single-earn-stat">
                        <?php
                        $totalAllSale = array();
                        $totalQty = array();
                        foreach($allSalesMonth as $sale){
                            $totalAllSale[] = HP::item($sale->item_id)[0]->item_price * $sale->qty;
                            $totalQty[] = $sale->qty;
                        } ?>
                        <h1>{{ HP::currency() }} {{ array_sum($totalAllSale) - (HP::set()->authorfee * array_sum($totalQty)) }}</h1>
                        <p>
                            Penghasilan penjualan bulan ini,
                            setelah biaya/fee
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="single-earn-stat">
                        <?php
                        $totalAllSale = array();
                        $totalQty = array();
                        foreach($allSales as $sale){
                            $totalAllSale[] = HP::item($sale->item_id)[0]->item_price * $sale->qty;
                            $totalQty[] = $sale->qty;
                        } ?>
                        <h1>{{ HP::currency() }} {{ array_sum($totalAllSale) - (HP::set()->authorfee * array_sum($totalQty)) }}</h1>
                        <p>
                            Total saldo Anda
                            setelah biaya/fee
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="single-earn-stat">
                        <h1>{{ HP::currency() }} {{ $totalSale }}</h1>
                        <p>
                            Nilai total penjualan Anda
                            sebelum biaya/fee (berdasarkan daftar harga)
                        </p>
                    </div>
                </div>
            </div>
            <div class="row pt-50">
                <div class="col-lg-9">
                    <div class="sale-graph-wrap settings-content">
                        <div class="d-flex justify-content-between align-items-center graph-top">
                            <h4>Grafik Penjualan</h4>
                            <div class="buttons d-flex">
                                <a href="#" class="primary-btn earning-month-report-btn">{{ date('F') }}</a>
                                <a href="#" class="primary-btn white-btn earning-year-report-btn">2021</a>
                                <a href="#" class="primary-btn white-btn earning-all-report-btn">All time</a>

                                <!-- <div class="dropdown">
                                  <button class="btn primary-btn white-btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Item Sales
                                  </button>
                                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Item One</a>
                                    <a class="dropdown-item" href="#">Item Two</a>
                                    <a class="dropdown-item" href="#">Item Three</a>
                                  </div>
                                </div> -->
                            </div>
                        </div>
                        <canvas id="sales-chart"></canvas>
                    </div>
                    <div class="sale-table-wrap settings-content">
                        <table class="table table-striped">
                          <thead>
                            <tr class="table-head">
                              <th>Date</th>
                              <th>Qty</th>
                              <th>Penghasilan</th>
                          </thead>
                          <tbody>
                              <?php $totalqty = array(); ?>
                            @foreach ($topCountriesSale as $sale)
                                <?php  $totalqty[] = $sale->qty; ?>
                                <tr>
                                  <th>{{ date('d F Y', strtotime($sale->created_at) ) }}</th>
                                  <th>{{ $sale->qty }}</th>
                                  <td><span>{{ HP::currency() }} {{ HP::item($sale->item_id)[0]->item_price * $sale->qty }}</span></td>
                                </tr>
                            @endforeach
                            <tr class="table-bottom">
                              <th>Total</th>
                              <th>{{ array_sum($totalqty)}}</th>
                              <td>{{ HP::currency() }} {{ $totalSaleFee }}</td>
                            </tr>
                          </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="top-country">
                        <h6 class="semi-bold text-uppercase semi-bold pb-20">Negara Teratas</h6>
                        <ul>
                            <?php $arrayCountries = array(); foreach ($topCountriesSale as $topsalecountry){
                                $countryName = HP::user($topsalecountry->user_id)->country;
                                $itemsPrice = HP::item($topsalecountry->item_id)[0]->item_price;

                                if(array_key_exists($countryName, $arrayCountries)){
                                    $arrayCountries[$countryName] += $itemsPrice;
                                }else{
                                    $arrayCountries[$countryName] = $itemsPrice;
                                }

                            } ?>

                            <?php foreach ($arrayCountries as $key => $topcountry){ ?>
                                <li class="d-flex justify-content-between">
                                    <span>{{ $key }}</span>
                                    <span class="price">{{ HP::currency() }}{{ $topcountry }}</span>
                                </li>
                            <?php } ?>


                        </ul>
                    </div>
                </div>
            </div>
            <!-- End Earning Section -->
        </div>
    </section>
    <!-- End Author Settings -->


    <!-- Start counter-section -->
    @include('inc.fcounterblue')
    <!-- End counter-section -->

@endsection
