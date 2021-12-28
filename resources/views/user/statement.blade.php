@extends('layouts.app')
@section('content')

<body>

    @include('inc.profileheader')

    <!-- Start Author Settings -->
    <section class="user-settings pb-60">
        <div class="container">

            @include('inc.profilelinks')

            <!-- Start Statements Section -->
            <div class="row justify-content-center stat-table-wrap">
                <div class="col-lg-9 stat-wrap-container">
                    <div class="settings-content stat-wrap">
                        <!-- <div class="button-top pb-10">
                            <a href="#" class="primary-btn">Last 30 days</a>
                            <a href="#" class="primary-btn white-btn">May 2021</a>
                            <a href="#" class="primary-btn white-btn">April 2021</a>
                            <a href="#" class="primary-btn white-btn">More options</a>
                        </div>
                        <div class="button-bottom d-flex">
                            <a href="#" class="primary-btn white-btn">Range</a>
                            <a href="#" class="primary-btn white-btn">Period</a>
                            <a href="#" class="primary-btn white-btn">Document Number</a>
                            <div class="dropdown">
                              <button class="btn primary-btn white-btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Today
                              </button>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">tomorrow</a>
                                <a class="dropdown-item" href="#">yesterday</a>
                              </div>
                            </div>
                            <div class="dropdown">
                              <button class="btn primary-btn white-btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                All Transaction types
                              </button>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">type one</a>
                                <a class="dropdown-item" href="#">type two</a>
                              </div>
                            </div>
                            <div class="dropdown">
                              <button class="btn primary-btn white-btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                All Marketplaces
                              </button>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Marketplace one</a>
                                <a class="dropdown-item" href="#">MArketplace two</a>
                              </div>
                            </div>
                            <a href="#" class="primary-btn white-btn"><i class="icons icon-magnifier"></i></a>
                        </div> -->
                          <table class="table table-striped mt-40 stat-table allCategories">
                            <thead>
                              <tr>
                                <th>SL</th>
                                <th>Date</th>
                                <th>Order Id</th>
                                <th>Type</th>
                                <th>Details</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>Amount</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php $i=0; foreach($allSales as $sale): $i++; ?>
                              <tr>
                                <td>{{ $i }}</td>
                                <td>{{ date('d M Y', strtotime($sale->created_at)) }}</td>
                                <td>#{{ $sale->id }}</td>
                                <td>Author Fee</td>
                                <td>Author fee for sale #{{ $sale->id }}</td>
                                <td class="price">{{ HP::currency() }} {{ number_format(HP::set()->authorfee,2) }}</td>
                                <td>{{ $sale->qty }}</td>
                                <td class="amount-red">{{ HP::currency() }} {{ number_format(HP::set()->authorfee * $sale->qty, 2) }}</td>
                              </tr>
                              <tr>
                                <td>{{ $i }}</td>
                                <td>{{ date('d M Y', strtotime($sale->created_at)) }}</td>
                                <td>#{{ $sale->id }}</td>
                                <td>Sale</td>
                                <td>{{ HP::item($sale->item_id)[0]->item_name }}</td>
                                <td class="price">{{ HP::currency() }} {{ number_format(HP::item($sale->item_id)[0]->item_price,2) }}</td>
                                <td>{{ $sale->qty }}</td>
                                <td class="amount-green">{{ HP::currency() }} {{ number_format(HP::item($sale->item_id)[0]->item_price * $sale->qty, 2) }}</td>
                              </tr>

                          <?php endforeach;?>
                            </tbody>
                          </table>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="earning-sidebar top-country">
                        <h4>Penghasilan</h4>
                        <p>
                            Penghasilan penjualan Anda selama
                            30 hari terakhir
                        </p>
                        <div class="funds-wrap d-flex justify-content-between">
                            <div class="my-earning">
                                <p class="title">Earning</p>
                                <h6 class="semi-bold">+{{ HP::currency() }} {{ number_format($totalSaleMonth,2) }}</h6>
                            </div>
                            <div class="my-fees">
                                <p class="title">Fees</p>
                                <h6 class="semi-bold">
                                    <?php $totalQty = array(); foreach($allSalesMonth as $allSalesMonth){
                                        $totalQty[] = $allSalesMonth->qty;
                                    } ?>
                                    -{{ HP::currency() }}{{ number_format(count($totalQty) * HP::set()->authorfee, 2) }}</h6>
                            </div>
                            <div class="my-funds">
                                <p class="title">My Funds</p>
                                <h1 class="semi-bold">{{ HP::currency() }} {{ number_format($totalSaleMonth - (count($totalQty) * HP::set()->authorfee), 2) }}</h1>
                            </div>
                        </div>
                        <!-- <a href="#" class="print-link primary-color pt-60">Print this overview</a> -->
                    </div>
                    <!-- <div class="invoice-wrap top-country">
                        <h4>view invoices</h4>
                        <div class="dropdown-wrap d-flex justify-content-between align-items-center">
                            <div class="dropdowns w-100">
                                <select>
                                    <option value="1">April 2018</option>
                                    <option value="2">May 2018</option>
                                    <option value="3">June 2018</option>
                                </select>
                            </div>
                            <a href="#" class="primary-btn"> <i class="icons icon-cloud-download"></i> </a>
                        </div>
                    </div> -->
                </div>
            </div>
            <!-- End Statements Section -->
        </div>
    </section>
    <!-- End Author Settings -->


    <!-- Start counter-section -->
    @include('inc.fcounterblue')
    <!-- End counter-section -->

@endsection
