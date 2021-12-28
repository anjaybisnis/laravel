@extends('layouts.app')
@section('content')

<body>

    @include('inc.profileheader')

    <!-- Start Downloads-section -->
    <section class="download-section pb-60">
        <div class="container">

            @include('inc.profilelinks')

            <div class="row">
                <div class="settings-content col-lg-12">
                    <h4>
                        Unduh Produk
                    </h4>
                    <div class="download-item-list">
                        @foreach ($items as $item)                        
                        @if(!empty($item->item_name))
                            <div class="single-item d-flex justify-content-between align-items-center">
                                <div class="item-desc d-flex align-items-center">
                                    <div class="item-thumb mr-20">
                                        <img class="img-150" src="{{ asset('images/item/' . $item->thumbnail) }}" alt="">
                                    </div>
                                    <div class="details">
                                        <a href="{{ url('/item/' . $item->item_id ) }}"><h5>{{ $item->item_name }}</h5></a>
                                        <p class="primary-color mb-0">
                                            <?php if(HP::user($item->user) !=false){ echo HP::user($item->user)->name; }else{ echo "N/A"; } ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="items-button">
                                    <a class="primary-btn" href="{{ asset('public/' . $item->mainfile) }}"><i class="icon icon-cloud-download"></i> Download</a>
                                </div>
                            </div>
                        @endif
                        @endforeach

                        <ul class="pagination d-flex justify-content-center pt-20 pb-20">
                          {{ $items->links() }}
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Downloads-section -->

    <!-- Start counter-section -->
    @include('inc.fcounterblue')
    <!-- End counter-section -->


@endsection
