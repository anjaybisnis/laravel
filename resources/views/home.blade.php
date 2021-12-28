@extends('layouts.app')
@section('content')

<body>

    <!-- Start hero-section -->
    <section class="hero-section relative">
        <div class="container">
            <div class="overlay overlay-bg"></div>
            <div class="row fullscreen align-items-center">
                <div class="col-lg-5 hero-content-wrap relative">
                    <p class="text-white">
                        {{ HP::set()->hpbstext }}
                    </p>
                    <h1 class="text-white text-uppercase">
                        {{ HP::set()->hppbheading }}
                    </h1>
                    <a href="{{ HP::set()->hpburl }}" class="primary-btn white-btn">{{ HP::set()->hpbbtext }}</a>
                </div>
            </div>
        </div>
        <img class="hero-img" src="{{ asset('images/' . HP::set()->hphbimage )}}" alt="">
    </section>
    <!-- End hero-section -->


    <!-- Start search-section  -->
    <section class="search-section pt-40 pb-40">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 search-section-left text-uppercase">
                    <h3>
                        {{ number_format(count($items))}} Koleksi Produk Digital Terbaik <br>
                        mulai dari 25.000 IDR
                    </h3>
                </div>
                <div class="col-lg-6 search-section-right">
                    <form method="POST" action="{{ action('SearchController@search') }}" class="setting-form" enctype="multipart/form-data">
                        @csrf
                        <!-- <input id="item_parent_category" name="category" type="hidden"> -->
                        <div class="input-group">
                            <input class="form-control py-2" name="search" placeholder="Pencarian produk" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Pencarian produk'"  type="search">
                            <div class="input-group-append">
                                <button type="submit" class="btn" type="button">
									<i class="icons icon-magnifier"></i>
								</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- End search-section  -->

    <!-- Start featured-item-section -->
    <section class="featured-item-section section-gap offwhite-color-bg">
        <div class="container">
            <div class="row sections-title justify-content-center align-items-center">
                <div class="col-lg-4 text-right sections-left no-padding">
                    <h3>Produk Unggulan <i class="icons icon-people"></i></h3>
                </div>
                <div class="col-lg-4 no-padding sections-right">
                    <p>
                        {{ HP::set()->hpbfiadis }}
                    </p>
                </div>
            </div>
            <div class="row">
                @foreach ($featuredItems as $item)
					<div class="col-lg-3 col-md-6">
						<div class="single-image-thumb single-feature-item relative">
							<div class="thumb relative">
								<div class="thumb-img relative">
									<div class="overlay overlay-bg"></div>
									<img class="img-fluid" src="{{ asset('images/item/' . $item->thumbnail) }}" alt="">
								</div>
								<div class="link">
									<a class="relative" href="{{ url('item', $item->item_id ) }}"><i class="icons icon-eye"></i></a>
                                    @auth
                                    <a class="relative itemcartajax" data-id="{{ $item->item_id }}" href="#"><i class="icons icon-basket-loaded"></i></a>
                                    @endauth
								</div>
							</div>
							<div class="details pb-10 pt-20">
								<div class="title d-flex flex-row justify-content-between">
									<a href="{{ url('item', $item->item_id ) }}">
										<h6>{{ $item->item_name }}</h6>
									</a>
									<h6 class="price">{{ HP::currency() }} {{ $item->item_purchasefee }}</h6>
								</div>
							</div>
							<div class="meta d-flex flex-row">
								@if(HP::user($item->user) != false && !empty(HP::user($item->user)->avatar))
									<div class="user-img"><img class="img-30" src="{{ asset('images/profile/' . HP::user($item->user)->avatar)}}" alt=""></div>
								@else
								<div class="user-img"><img class="img-30" src="{{ asset('images/default-profile.png')}}" alt=""></div>
								@endif
								<p>by <?php if(HP::user($item->user) !=false){ echo HP::user($item->user)->name; }else{ echo "N/A"; } ?> in <a class="primary-color" href="@if(HP::getCatByID($item->category) != false) {{ url('/browse/category/' . $item->category) }} @endif">@if(HP::getCatByID($item->category) != false) {{ HP::getCatByID($item->category)->cat_title }} @endif</a></p>
							</div>
						</div>
					</div>
				@endforeach

                <div class="col-lg-12 text-center">
                    <a href="{{ url('/browse/featured')}}" class="primary-btn mx-auto mt-50">produk lainnya</a>
                </div>
            </div>
        </div>
    </section>
    <!-- End featured-item-section -->


    <!-- Start latest-item-section -->
    <section class="latest-item-section section-gap">
        <div class="container">
            <div class="row sections-title justify-content-center align-items-center">
                <div class="col-lg-4 text-right sections-left no-padding">
                    <h3>Produk terbaru <i class="icons icon-people"></i></h3>
                </div>
                <div class="col-lg-4 no-padding sections-right">
                    <p>
                        {{ HP::set()->hpbliadis }}
                    </p>
                </div>
            </div>
            <div class="row">
                @foreach ($latestItems as $item)
					<div class="col-lg-3 col-md-6">
						<div class="single-image-thumb single-feature-item relative">
							<div class="thumb relative">
								<div class="thumb-img relative">
									<div class="overlay overlay-bg"></div>
									<img class="img-fluid" src="{{ asset('images/item/' . $item->thumbnail) }}" alt="">
								</div>
								<div class="link">
									<a class="relative" href="{{ url('item', $item->item_id ) }}"><i class="icons icon-eye"></i></a>
                                    @auth
                                    <a class="relative itemcartajax" data-id="{{ $item->item_id }}" href="#"><i class="icons icon-basket-loaded"></i></a>
                                    @endauth								</div>
							</div>
							<div class="details pb-10 pt-20">
								<div class="title d-flex flex-row justify-content-between">
									<a href="{{ url('item', $item->item_id ) }}">
										<h6>{{ $item->item_name }}</h6>
									</a>
									<h6 class="price">{{ HP::currency() }} {{ $item->item_purchasefee }}</h6>
								</div>
							</div>
							<div class="meta d-flex flex-row">
								@if(HP::user($item->user) != false && !empty(HP::user($item->user)->avatar))
									<div class="user-img"><img class="img-30" src="{{ asset('images/profile/' . HP::user($item->user)->avatar)}}" alt=""></div>
								@else
								<div class="user-img"><img class="img-30" src="{{ asset('images/default-profile.png')}}" alt=""></div>
								@endif
                                <p>by <?php if(HP::user($item->user) !=false){ echo HP::user($item->user)->name; }else{ echo "N/A"; } ?> in <a class="primary-color" href="@if(HP::getCatByID($item->category) != false) {{ url('/browse/category/' . $item->category) }} @endif">@if(HP::getCatByID($item->category) != false) {{ HP::getCatByID($item->category)->cat_title }} @endif</a></p>							</div>
						</div>
					</div>
				@endforeach

                <div class="col-lg-12 text-center">
                    <a href="{{ url('/browse/')}}" class="primary-btn mx-auto mt-50">produk lainnya</a>
                </div>
            </div>
        </div>
    </section>
    <!-- End latest-item-section -->


    <!-- Start free-item-section -->
    <section class="free-item-section section-gap bg-dark">
        <div class="container">
            <div class="row sections-title justify-content-center align-items-center">
                <div class="col-lg-4 text-right sections-left no-padding">
                    <h3 class="text-white">Produk Gratis <i class="icons icon-present"></i></h3>
                </div>
                <div class="col-lg-4 no-padding sections-right">
                    <p class="text-white">
                        {{ HP::set()->hpbfreeiadis }}
                    </p>
                </div>
            </div>
            <div class="row">
                @foreach ($freeItems as $item)
					<div class="col-lg-3 col-md-6">
						<div class="single-image-thumb single-feature-item single-free-item relative">
							<div class="thumb relative">
								<div class="thumb-img relative">
									<div class="overlay overlay-bg"></div>
									<img class="img-fluid" src="{{ asset('images/item/' . $item->thumbnail) }}" alt="">
								</div>
								<div class="link">
									<a class="relative" href="{{ url('item', $item->item_id ) }}"><i class="icons icon-eye"></i></a>
									<!-- <a class="relative itemcartajax" data-id="{{ $item->item_id }}" href="#"><i class="icons icon-basket-loaded"></i></a> -->
								</div>
							</div>
							<div class="details pb-10 pt-20">
								<div class="title d-flex flex-row justify-content-between">
									<a href="{{ url('item', $item->item_id ) }}">
										<h6 class="text-white">{{ $item->item_name }}</h6>
									</a>
									<h6 class="price text-white">{{ HP::currency() }} 00.00</h6>
								</div>
							</div>
							<div class="meta d-flex flex-row">
								@if(HP::user($item->user) != false && !empty(HP::user($item->user)->avatar))
									<div class="user-img"><img class="img-30" src="{{ asset('images/profile/' . HP::user($item->user)->avatar)}}" alt=""></div>
								@else
								<div class="user-img"><img class="img-30" src="{{ asset('images/default-profile.png')}}" alt=""></div>
								@endif
								<p>by <?php if(HP::user($item->user) !=false){ echo HP::user($item->user)->name; }else{ echo "N/A"; } ?> in <a class="primary-color" href="@if(HP::getCatByID($item->category) != false) {{ url('/browse/category/' . $item->category) }} @endif">@if(HP::getCatByID($item->category) != false) {{ HP::getCatByID($item->category)->cat_title }} @endif</a></p>
							</div>
						</div>
					</div>
				@endforeach

                <div class="col-lg-12 text-center">
                    <a href="{{ url('/browse/free')}}" class="primary-btn white-btn mx-auto mt-50">produk lainnya</a>
                </div>
            </div>
        </div>
    </section>
    <!-- End free-item-section -->


    <!-- Start team-section -->
    <section class="team-section pt-60">
        <div class="container">
            <div class="row sections-title justify-content-center align-items-center">
                <div class="col-lg-4 text-right sections-left no-padding">
                    <h3>Dukungan Pelanggan <i class="icons icon-people"></i></h3>
                </div>
                <div class="col-lg-4 no-padding sections-right">
                    <p>
                        {{ HP::set()->hpbatadis }}
                    </p>
                </div>
            </div>
            <div class="row justify-content-center team-img">
                <div class="col-lg-10">
                     <img class="img-fluid" src="{{ asset('images/' . HP::set()->hpfbimage )}}" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- End team-section -->


    <!-- Start cta-section -->
    <section class="cta-section section-gap">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <h3 class="text-uppercase">{{ HP::set()->hpfbhtext }}</h3>
                    <p class="pt-30 pb-30 mb-0">
                        {{ HP::set()->hpfbstext }}
                    </p>
                    <a href="{{ HP::set()->hpfbburl }}" class="primary-btn">{{ HP::set()->hpfbbtext }}</a>
                </div>
            </div>
        </div>
    </section>
    <!-- End cta-section -->

    @include('inc.fcounterwhite')


@endsection
