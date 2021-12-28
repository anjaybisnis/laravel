<!-- Start common-header-sectiion -->
<section class="common-header-sectiion relative">
	<div class="overlay overlay-bg"></div>
	<div class="container">
		<div class="row justify-content-start align-items-end user-header">
			<!-- <div class="col-lg-5 relative d-flex pb-80 align-items-center user-details"> -->
			<div class="col-lg-5 col-sm-8  col-12 relative d-flex pb-80 align-items-center user-details">
				<div class="thumb">
					<?php if($userinfo->avatar){ ?>
						<img class="img-60" src="{{ URL::asset('images/profile/' . $userinfo->avatar)}}" alt="Photo">
					<?php } else{ ?>
						<img class="img-60" src="{{ URL::asset('images/default.png')}}" alt="Photo">
					<?php } ?>
				</div>
				<div class="details ml-20">
					<h3 class="text-white">{{ $userinfo->name }}</h3>
					<p class="text-white mb-0">
						<?php echo $userinfo->country; if(!empty($userinfo->country)){ echo ","; }?> Member sejak {{ date('d F Y', strtotime($userinfo->created_at)) }}
					</p>
				</div>
			</div>
			<!-- <div class="col-lg-5 col-sm-4 col-12 offset-md-2  text-right pb-80 user-sales-details">
				<span class="text-white">Total Sales</span>
				<h1 class="text-white mt-15">25</h1>
			</div> -->
		</div>
	</div>
</section>
<!-- End common-header-sectiion -->
