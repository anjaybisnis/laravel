@extends('layouts.app')
@section('content')

<body>

	<!-- Start common-header-sectiion -->
	<section class="common-header-sectiion relative">
		<div class="overlay overlay-bg"></div>
		<div class="container">
			<div class="row justify-content-center pb-100 pt-100">
				<div class="col-lg-7 text-center relative">
					<h1 class="text-uppercase text-white pb-20">Temukan {{ number_format(count($allItems))}} Koleksi Produk Digital Terbaik</h1>
					<p class="mb-0 text-white">
						Temukan {{ HP::countTableItems('items', '', '') }} Source code aplikasi, tools premium, plugin, tema dan template web mulai dari 25.000 IDR
					</p>
				</div>
			</div>
		</div>
	</section>
	<!-- End common-header-sectiion -->

	<!-- Start category-items Area -->
	<section class="category-items-area featured-item-section offwhite-color-bg">
		<div class="cat-nav-wrap">
			<div class="container">
				<div class="row cat-nav-menu justify-content-center" id="cat-menu">
					<ul class="cat-menu">
						<li @if(Request::is('browse')) class="active" @endif><a href="{{ url('browse')}}">Semua Produk <br> <span>({{ HP::countTableItems('items', '', '')}})</span></a></li>
						@foreach ($categories as $category)
							<li @if(Request::is('browse/category/' . $category->id )) class="active" @endif ><a href="{{ url('browse/category', $category->id)}}">{{ $category->cat_title }} <br> <span>({{ HP::countItemByCat($category->id)}})</span></a></li>
						@endforeach
						<li class=""><a href="{{ url('browse/featured')}}">Produk Unggulan <br> <span>({{ count($tfItems)}})</span></a></li>
						<li class="active"><a href="{{ url('browse/free')}}">Produk Gratis <br> <span>({{ count($tfreeItems)}})</span></a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row pb-60 pt-80">

				@foreach ($items as $item)
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
									<div class="user-img"><img src="{{ asset('images/profile/' . HP::user($item->user)->avatar)}}" alt=""></div>
								@else
								<div class="user-img"><img src="{{ asset('images/default-profile.png')}}" alt=""></div>
								@endif
								<p>by <?php if(HP::user($item->user) !=false){ echo HP::user($item->user)->name; }else{ echo "N/A"; } ?> in <a class="primary-color" href="@if(HP::getCatByID($item->category) != false) {{ url('/browse/category/' . $item->category) }} @endif">@if(HP::getCatByID($item->category) != false) {{ HP::getCatByID($item->category)->cat_title }} @endif</a></p>							</div>
						</div>
					</div>
				@endforeach

				 <ul class="pagination mx-auto pt-80">
				  {{ $items->links() }}
				</ul>
			</div>
		</div>
	</section>
	<!-- End category-items Area -->

	@include('inc.bluefooterbanner')

@endsection
