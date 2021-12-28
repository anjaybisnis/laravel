@extends('layouts.app')
@section('content')

<body>

    @include('inc.dashboardheader')

    <!-- Start Author Portfolio -->
    <section class="author-portfolio pb-60">
        <div class="container">

            @include('inc.dashboardlinks')

            <div class="row author-portfolio-section">
                <div class="settings-content col-lg-12">
                    <h4>
                        Semua Produk
                    </h4>

                    <div class="download-item-list">
                        <?php foreach ($items as $item): ?>
                            <div class="single-item d-flex justify-content-between align-items-center">
                                <div class="item-desc d-flex align-items-center">
                                    <div class="item-thumb mr-20">
                                        <img class="img-150" src="{{ asset('images/item/' . $item->thumbnail) }}" alt="">
                                    </div>
                                    <div class="details">
                                        <a href="{{ url('item', $item->item_id ) }}"><h5>{{ $item->item_name }}</h5></a>
                                        <p class="primary-color mb-0">
                                            {{ $item->name }}
                                        </p>
                                    </div>
                                </div>
                                <div class="items-button">
                                    <form class="float-right" action="{{ action('ItemController@dashboardestroy', $item->item_id) }}" method="POST">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button title="Hapus Produk" type="submit" class="primary-btn red-btn delete-item mr-10"><i class="icon icon-trash"></i></button>
                                    </form>
                                    <a style="background:<?php if(HP::isfeatured($item->item_id)){ echo "#ccc"; } ?>" title="<?php if(HP::isfeatured($item->item_id)){ echo "Featured Item"; }else{ echo "Tandai sebagai Produk Unggulan";} ?>" class="primary-btn mr-10"  href="{{ url('dashboard/makefeatured', $item->item_id ) }}"><i class="icon icon-flag"></i></a>
                                    <a style="background:<?php if(HP::isfree($item->item_id)){ echo "#ccc"; } ?>" title="<?php if(HP::isfree($item->item_id)){ echo "Fee Item"; }else{ echo "Tandai sebagai Produk Gratis";} ?>" class="primary-btn mr-10"  href="{{ url('dashboard/makefree', $item->item_id ) }}"><i class="icon icon-pin"></i></a>
                                    <a title="Download Produk" class="primary-btn mr-10" href="{{ asset('public/' . $item->mainfile) }}"><i class="icon icon-cloud-download"></i></a>
                                    <a title="Update Informasi Produk" class="primary-btn mr-10" href="{{ url('item', $item->item_id ) }}/edit"><i class="icon icon-tag"></i></a>
                                </div>
                                <div class="price-details text-center">
                                    <h1 class="semi-bold">{{ HP::currency() }} {{ $item->item_purchasefee }}</h1>
                                    <p class="mb-0">
                                        Total {{ count(HP::tsbyitem($item->item_id)) }} pembelian
                                    </p>
                                </div>
                            </div>
                        <?php endforeach; ?>



                        <ul class="pagination d-flex justify-content-center pt-20 pb-20">
                          {{ $items->links() }}
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Author Portfolio -->

    <!-- Start counter-section -->
    @include('inc.fcounterblue')
    <!-- End counter-section -->


@endsection
