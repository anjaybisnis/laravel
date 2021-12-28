@extends('layouts.app')
@section('content')

<body>

	<!-- Start common-header-sectiion -->
	<section class="common-header-sectiion relative">
		<div class="overlay overlay-bg"></div>
		<div class="container">
			<div class="row justify-content-center pb-100 pt-100">
				<div class="col-lg-7 text-center relative">
					<h1 class="text-uppercase text-white pb-20">Pencarian Produk <u>{{ $search }}</u></h1>
				</div>
			</div>
		</div>
	</section>
	<!-- End common-header-sectiion -->

	<!-- Start search-section  -->
	<section class="search-section pt-40 pb-40">
		<div class="container">
			<div class="row align-items-center justify-content-center">
				<div class="col-lg-6 search-section-left text-uppercase">
					<h3> Pencarian Produk <u>{{ $search }}</u> </h3>
				</div>
				<div class="col-lg-6 search-section-right">
					<form method="POST" action="{{ action('SearchController@search') }}" class="setting-form" enctype="multipart/form-data">
						@csrf
						<div class="input-group">
							<input class="form-control py-2" name="search" placeholder="Pencarian produk" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Pencarian produk'" value="{{ $search }}" type="search">
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

	<!-- Start category-items Area -->
	<section class="category-items-area featured-item-section offwhite-color-bg">
		<div class="container">
			<div class="row pb-60 pt-80">
				@if(count($items) > 0)
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
									<a class="relative" href="cart.php"><i class="icons icon-basket-loaded"></i></a>
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
									<div class="user-img"><img src="{{ asset('images/profile/' . HP::user($item->user)->avatar)}}" alt=""></div>
								@endif
								<p>by <?php if(HP::user($item->user) !=false){ echo HP::user($item->user)->name; }else{ echo "N/A"; } ?> in <a class="primary-color" href="@if(HP::getCatByID($item->category) != false) {{ url('/browse/category/' . $item->category) }} @endif">@if(HP::getCatByID($item->category) != false) {{ HP::getCatByID($item->category)->cat_title }} @endif</a></p>
							</div>
						</div>
					</div>
				@endforeach

				 <ul class="pagination mx-auto pt-80">
				  {{ $items->links() }}
				</ul>
				@else
				<div class="col-lg-12 text-center relative">
					<h1 class="text-uppercase text-center pb-20">Tidak Ditemukan! <a href="{{ url('/browse')}}">Semua Produk</a></h1>
				</div>
				@endif
			</div>
		</div>
	</section>
	<!-- End category-items Area -->

	@include('inc.bluefooterbanner')

@endsection
