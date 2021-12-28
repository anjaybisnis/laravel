<!-- Start counter-section -->
<section class="counter-section counter-section2 section-gap primary-color-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="single-counter d-flex flex-row align-items-center">
					<div class="ico">
						<i class="icons icon-notebook"></i>
					</div>
					<div class="count-wrap">
						<h1>{{ number_format(HP::countTableItems('items', '', ''), 2) }}</h1>
						<p>Produk Digital</p>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="single-counter d-flex flex-row align-items-center">
					<div class="ico">
						<i class="icons icon-people"></i>
					</div>
					<div class="count-wrap">
						<h1>{{ number_format(HP::countTableItems('users', '', ''), 2) }}</h1>
						<p>Pengguna Terdaftar</p>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="single-counter d-flex flex-row align-items-center">
					<div class="ico">
						<i class="icons icon-cloud-download"></i>
					</div>
					<div class="count-wrap">
						<h1>{{ number_format(HP::countTableItems('carts', 'status', 'Paid'), 2) }}</h1>
						<p>Downloads</p>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="single-counter d-flex flex-row align-items-center">
					<div class="ico">
						<i class="icons icon-earphones-alt"></i>
					</div>
					<div class="count-wrap">
						<h1>{{ number_format(HP::countTableItems('reviews', '', ''), 2) }}</h1>
						<p>Total Reviews</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End counter-section -->
