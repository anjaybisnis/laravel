@extends('layouts.app')
@section('content')

<body>

		<!-- Start common-header-sectiion -->
		<section class="common-header-sectiion relative">
			<div class="overlay overlay-bg"></div>
			<div class="container">
				<div class="row justify-content-center pb-100 pt-100">
					<div class="col-lg-7 text-center relative">
						<h1 class="text-uppercase text-white pb-20">
							{{HP::countTableItems('items', '', '')}} Koleksi Produk Digital Terbaik
						</h1>
						<p class="mb-0 text-white">
							Temukan {{HP::countTableItems('items', '', '')}} Source code aplikasi, tools premium, plugin, tema dan template web mulai dari 25.000 IDR
						</p>
					</div>
				</div>
			</div>
		</section>
		<!-- End common-header-sectiion -->

		<!-- Start theme-details -->
		<section class="theme-details pb-50">
			<div class="container">
				<div class="row">
					<div class="col-lg-9">
						<!-- details Tab navs -->
						<ul class="nav nav-tabs d-flex justify-content-center offwhite-color-bg mb-60">
						  <li>
						    <a class="active" data-toggle="tab" href="#overview">Overview</a>
						  </li>
						  <li>
						    <a data-toggle="tab" href="#review">Reviews</a>
						  </li>
						  <li>
						    <a data-toggle="tab" href="#comments">Comments</a>
						  </li>
						  <!-- <li>
						    <a data-toggle="tab" href="#support">Support</a>
						  </li> -->
						</ul>
					</div>

					<div class="col-lg-12">
						<h2 class="pb-30 semi-bold">{{ $item->item_name }}</h2>
					</div>

					<div class="col-lg-9">
						<!-- details Tab panes -->
						<div class="tab-content">
						  <div class="tab-pane active" id="overview">
								<!-- Overview section -->
					  			<div class="overview-section">
					  				<div class="theme-thumb">
					  					<img class="img-fluid" src="{{ asset('images/item/' . $item->preview ) }}" alt="">
					  				</div>
				  					<!-- <div class="other-details">
				  						<h4 class="text-uppercase">Feaatures</h4>
				  						<div class="row">
				  							<div class="col-lg-6">
				  								<ul class="support-list">
				  									<li>
				  										<img src="{{ asset('img/bullet.png') }}" alt="">Not All Blank Cassettes Are Created Equal
				  									</li>
				  									<li>
				  										<img src="{{ asset('img/bullet.png') }}" alt="">Help Finding Information Online
				  									</li>
				  									<li>
				  										<img src="{{ asset('img/bullet.png') }}" alt="">5 Reasons To Choose A Notebook Over
				  									</li>
				  									<li>
				  										<img src="{{ asset('img/bullet.png') }}" alt="">3 Simple Ways To Save A Bunch Of Money
				  									</li>
				  								</ul>
				  							</div>
				  							<div class="col-lg-6">
				  								<ul class="support-list">
				  									<li>
				  										<img src="{{ asset('img/bullet.png') }}" alt="">Not All Blank Cassettes Are Created Equal
				  									</li>
				  									<li>
				  										<img src="{{ asset('img/bullet.png') }}" alt="">Help Finding Information Online
				  									</li>
				  									<li>
				  										<img src="{{ asset('img/bullet.png') }}" alt="">5 Reasons To Choose A Notebook Over
				  									</li>
				  									<li>
				  										<img src="{{ asset('img/bullet.png') }}" alt="">3 Simple Ways To Save A Bunch Of Money
				  									</li>
				  								</ul>
				  							</div>
				  						</div>
				  					</div> -->
				  					<!-- <div class="other-details">
				  						<h4 class="text-uppercase">Compatibility</h4>
				  						<ul class="compatability-list">
				  							<li><img src="{{ asset('img/c1.png') }}" alt=""></li>
				  							<li><img src="{{ asset('img/c2.png') }}" alt=""></li>
				  							<li><img src="{{ asset('img/c3.png') }}" alt=""></li>
				  							<li><img src="{{ asset('img/c4.png') }}" alt=""></li>
				  						</ul>
				  					</div> -->

									<div class="other-details">
					  					<h4 class="text-uppercase">Overview</h4>
					  					{!! $item->description !!}
					  				</div>

				  					<!-- <div class="other-details banners">
				  						<img class="img-fluid pb-30" src="{{ asset('img/banner1.jpg') }}" alt="">
				  						<img class="img-fluid pb-30" src="{{ asset('img/banner2.jpg') }}" alt="">
				  						<img class="img-fluid" src="{{ asset('img/banner3.jpg') }}" alt="">
				  					</div> -->
					  			</div>
								<!-- Overview section -->
						  </div>
						  <div class="tab-pane fade" id="review">
							  	<!-- review section -->
							  	<div class="review-section">
					  				<!-- <div class="theme-thumb ">
					  					<img class="img-fluid" src="{{ asset('img/theme-img.jpg') }}" alt="">
					  				</div> -->
									<!-- <h4 class="text-uppercase">Reviews</h4> -->
							  		@foreach ($reviews as $review)
										<div class="other-details">
											<div class="media">
													<?php if( HP::user($review->userID) !=false ){ ?>
														<img class="mr-3 img-60" src="{{ URL::asset('images/profile/' . HP::user($review->userID)->avatar)}}" alt="">
													<?php }else{ ?>
														<img class="mr-3 img-60" src="{{ URL::asset('images/default.png')}}" alt="Photo">
													<?php } ?>
											  <div class="media-body">
												<h5 class="mt-0 d-flex review-title">
													<span>
														<?php
															if($review->reason == 1){
																echo "Design Quality";
															}else if($review->reason == 2){
																echo "Customizability";
															}else if($review->reason == 3){
																echo "Flexibility";
															}else if($review->reason == 4){
																echo "Documentation Quality";
															}else if($review->reason == 5){
																echo "Feature Availability";
															}else if($review->reason == 6){
																echo "Customer Support";
															}else if($review->reason == 7){
																echo "Clean Code";
															}else{
																echo "Others";
															}
														?>
													</span>
													<ul class="rate">
														<?php if($review->point == 1){ ?>

															<li><a href="#"><i class="rated icons icon-star"></i></a></li>
															<li><a href="#"><i class="icons icon-star"></i></a></li>
															<li><a href="#"><i class="icons icon-star"></i></a></li>
															<li><a href="#"><i class="icons icon-star"></i></a></li>
															<li><a href="#"><i class="icons icon-star"></i></a></li>

														<?php }else if($review->point == 2){ ?>

															<li><a href="#"><i class="rated icons icon-star"></i></a></li>
															<li><a href="#"><i class="rated icons icon-star"></i></a></li>
															<li><a href="#"><i class="icons icon-star"></i></a></li>
															<li><a href="#"><i class="icons icon-star"></i></a></li>
															<li><a href="#"><i class="icons icon-star"></i></a></li>

														<?php }else if($review->point == 3){ ?>

															<li><a href="#"><i class="rated icons icon-star"></i></a></li>
															<li><a href="#"><i class="rated icons icon-star"></i></a></li>
															<li><a href="#"><i class="rated icons icon-star"></i></a></li>
															<li><a href="#"><i class="icons icon-star"></i></a></li>
															<li><a href="#"><i class="icons icon-star"></i></a></li>

														<?php }else if($review->point == 4){ ?>

															<li><a href="#"><i class="rated icons icon-star"></i></a></li>
															<li><a href="#"><i class="rated icons icon-star"></i></a></li>
															<li><a href="#"><i class="rated icons icon-star"></i></a></li>
															<li><a href="#"><i class="rated icons icon-star"></i></a></li>
															<li><a href="#"><i class="icons icon-star"></i></a></li>

														<?php }else if($review->point == 5){ ?>

															<li><a href="#"><i class="rated icons icon-star"></i></a></li>
															<li><a href="#"><i class="rated icons icon-star"></i></a></li>
															<li><a href="#"><i class="rated icons icon-star"></i></a></li>
															<li><a href="#"><i class="rated icons icon-star"></i></a></li>
															<li><a href="#"><i class="rated icons icon-star"></i></a></li>

														<?php }else{ ?>

															<li><a href="#"><i class="icons icon-star"></i></a></li>
															<li><a href="#"><i class="icons icon-star"></i></a></li>
															<li><a href="#"><i class="icons icon-star"></i></a></li>
															<li><a href="#"><i class="icons icon-star"></i></a></li>
															<li><a href="#"><i class="icons icon-star"></i></a></li>

														<?php } ?>
													</ul>
												</h5>
												  <p class="mb-0">
														Reviewed by <?php if(HP::user($review->userID) !=false){ echo HP::user($review->userID)->name; }else{ echo "N/A"; } ?> on <span>{{ date('d F Y')}}</span>
												  </p>
											  </div>
											</div>
											<p class="pt-20 mb-0">{{ strip_tags($review->content) }}</p>
										</div>
									@endforeach
									<?php if(HP::isBoughtorNot($item->item_id, Auth::id())){ ?>
									<div class="review-form">
										<!-- <h6 class="text-center offwhite-color-bg">You must login and be a buyer of this download to submit a review</h6> -->
										<h3 class="text-center offwhite-color-bg pt-20 pb-20">Submit a review</h3>
										<form method="POST" action="{{ action('ReviewController@store') }}" class="setting-form" enctype="multipart/form-data">
			                                @csrf
											<input id="review_point" name="point" type="hidden" value="1">
											<input type="hidden" name="itemID" value="{{ $item->item_id }}">

										  <div class="form-group">
										    <label for="exampleInputEmail1">Select A Review Reason</label>
											<select class="nice-select w-100 mb-20" name="reason" required>
												<option value="">Select Review Reason</option>
												<option value="1">Design Quality</option>
												<option value="2">Customizability</option>
												<option value="3">Flexibility</option>
												<option value="4">Documentation Quality</option>
												<option value="5">Feature Availability</option>
												<option value="6">Customer Support</option>
												<option value="7">Code Quality</option>
												<option value="8">Others</option>
											</select>
										  </div>
										  <div class="form-group">
										  <label for="exampleInputEmail1">Review</label>
										  <textarea placeholder="Write a review" name="content" onfocus="this.placeholder=''" onblur="this.placeholder = 'Review '" required="" class="common-textarea form-control w-100 mb-20"></textarea>
										  </div>
										  <div class="form-group">
											  <label for="exampleInputEmail1">Review Stars</label>
											  <div id="jRate"></div>
										  </div>
										  <button type="submit" class="primary-btn mt-40">Submit</button>
										</form>
									</div>
								<?php } ?>
							  	</div>
							  	<!-- review section -->
						  </div>
						  <div class="tab-pane fade" id="comments">
						  		<!-- comment section -->
							  	<div class="comment-section">
					  				<!-- <div class="theme-thumb ">
					  					<img class="img-fluid" src="{{ asset('img/theme-img.jpg') }}" alt="">
					  				</div> -->
					  				<!-- <div class="comment-top-wrap d-flex justify-content-between">
					  					<h4 class="text-uppercase">09 Comment</h4>
					  					<div class="comment-filter">
					  						<a class="text-uppercase" href="#">Oldest</a>
					  						<a class="text-uppercase" href="#">Newest</a>
					  					</div>
					  				</div> -->

									@foreach ($comments as $comment)
								  		<div class="media other-details">
											<?php if( HP::user($comment->userID) !=false ){ ?>
												<img class="mr-3 img-60" src="{{ URL::asset('images/profile/' . HP::user($comment->userID)->avatar)}}" alt="">
											<?php }else{ ?>
												<img class="img-60" src="{{ URL::asset('images/default.png')}}" alt="Photo">
											<?php } ?>
										  <div class="media-body">
										    <h5 class="mt-0">{{ HP::user($comment->userID)->name }}</h5>
											<div class="mb-0">
											  	{{ strip_tags($comment->comment) }}
											</div>
											<p class="mb-0 mt-20 comments-meta">
												 Komentar {{ date('d F Y') }}   <!-- <span class="ml-5 mr-5">•</span>   <i class="icons icon-heart"></i>  01 -->
											</p>
										  </div>
										</div>
									@endforeach
									@auth
				  					<div class="comment-area">
										<form method="POST" action="{{ action('CommentController@store') }}" class="setting-form" enctype="multipart/form-data">
			                                @csrf
											<input type="hidden" name="itemID" value="{{ $item->item_id }}">
					  						<label for="exampleInputEmail1">Tinggalkan komentar Anda</label>
					  						<textarea name="comment" class="w-100" placeholder="Enter Your Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Your Messege'" required></textarea>
					  						<button type="submit" class="primary-btn mt-40">Submit</button>
										</form>
				  					</div>
									@endauth
					  			</div>
						  		<!-- comment section -->
						  </div>
						  <!-- <div class="tab-pane fade" id="support">
					  			<div class="overview-section">
					  				<div class="theme-thumb ">
					  					<img class="img-fluid" src="{{ asset('img/theme-img.jpg') }}" alt="">
					  				</div>
					  				<div class="support-section offwhite-color-bg d-flex flex-row align-items-center">
					  					<div class="logo">
					  						<img src="{{ asset('img/cp.png') }}" alt="">
					  					</div>
					  					<div class="detials">
					  						<h4>Codepixar Supports this item </h4>
					  						<p class="mb-0">
					  							This author's response time can be up to 1 business day.
					  						</p>
					  					</div>
					  				</div>
				  					<div class="other-details">
				  						<h4 class="text-uppercase">Contact the author</h4>
				  						<p class="mb-0">
				  							This author will respond to buyers' questions and provides limited support through their own support system.
				  						</p>
				  					</div>
				  					<div class="other-details">
				  						<h4 class="text-uppercase">Item support includes</h4>
				  						<div class="row">
				  							<div class="col-lg-6">
				  								<ul class="support-list">
				  									<li>
				  										<img src="{{ asset('img/bullet.png') }}" alt="">Not All Blank Cassettes Are Created Equal
				  									</li>
				  									<li>
				  										<img src="{{ asset('img/bullet.png') }}" alt="">Help Finding Information Online
				  									</li>
				  									<li>
				  										<img src="{{ asset('img/bullet.png') }}" alt="">5 Reasons To Choose A Notebook Over
				  									</li>
				  									<li>
				  										<img src="{{ asset('img/bullet.png') }}" alt="">3 Simple Ways To Save A Bunch Of Money
				  									</li>
				  								</ul>
				  							</div>
				  							<div class="col-lg-6">
				  								<ul class="support-list">
				  									<li>
				  										<img src="{{ asset('img/bullet.png') }}" alt="">Not All Blank Cassettes Are Created Equal
				  									</li>
				  									<li>
				  										<img src="{{ asset('img/bullet.png') }}" alt="">Help Finding Information Online
				  									</li>
				  									<li>
				  										<img src="{{ asset('img/bullet.png') }}" alt="">5 Reasons To Choose A Notebook Over
				  									</li>
				  									<li>
				  										<img src="{{ asset('img/bullet.png') }}" alt="">3 Simple Ways To Save A Bunch Of Money
				  									</li>
				  								</ul>
				  							</div>
				  						</div>
				  					</div>
				  					<div class="other-details">
				  						<h4 class="text-uppercase">However, item support does not include</h4>
				  						<div class="row">
				  							<div class="col-lg-6">
				  								<ul class="support-list">
				  									<li>
				  										<img src="{{ asset('img/bullet.png') }}" alt="">Not All Blank Cassettes Are Created Equal
				  									</li>
				  									<li>
				  										<img src="{{ asset('img/bullet.png') }}" alt="">Help Finding Information Online
				  									</li>
				  								</ul>
				  							</div>
				  							<div class="col-lg-6">
				  								<ul class="support-list">
				  									<li>
				  										<img src="{{ asset('img/bullet.png') }}" alt="">How To Protect Your Computer Werm
				  									</li>
				  									<li>
				  										<img src="{{ asset('img/bullet.png') }}" alt="">Video Games Playing With Imagination
				  									</li>
				  								</ul>
				  							</div>
				  						</div>
				  					</div>
				  					<div class="message-area">
				  						<textarea name="messege" class="w-100" name="message" placeholder="Enter Your Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Your Messege'" required></textarea>
				  						<a href="#" class="primary-btn mt-30 mx-auto d-block">go to item support</a>
				  					</div>
					  			</div>
						  </div> -->
						</div>

					</div>
					<div class="col-lg-3 sidebar theme-details-sidebar">
						<div class="single-sidebar">
							<div class="price-title d-flex flex-row justify-content-between align-items-center">
								<h6>{{ HP::currency() }} {{ $item->item_purchasefee}}</h6>
							</div>
							<!-- <div class="price-title mt-20 d-flex flex-row justify-content-between align-items-center">
								<h6>{{ HP::currency() }} {{ $item->item_purchasefee}}</h6>
							</div> -->
							<ul>
								<li>{{ $item->keyfeature1 }}</li>
								<li>{{ $item->keyfeature2 }}</li>
							</ul>
							<?php if(HP::isfree($item->item_id) == false){ ?>
								<form method="POST" action="{{ action('CartController@store') }}" class="setting-form" enctype="multipart/form-data">
	                                @csrf
									<input type="hidden" name="item_id" value="{{ $item->item_id }}">
									<button type="submit" class="primary-btn">Tambah ke Keranjang</button>
								</form>
							<?php }else{ ?>
								<a class="primary-btn" href="{{ asset('public/' . $item->mainfile) }}"><i class="icon icon-cloud-download"></i> Download Gratis</a>
							<?php }?>

						</div>

						<div class="single-sidebar d-flex flex-row justify-content-between align-items-center total-downlaod">
							<h6>Total Downloads</h6>
							<h3>{{ count(HP::tsbyitem($item->item_id)) }}</h3>
						</div>

						<div class="single-sidebar theme-details">
							<h6>Detail Produk</h6>
							<ul class="theme-details-list">

								@if($item->high_resulation == 1)
									<li><i class="icons icon-frame"></i> High Resulation</li>
								@endif

								@if($item->widget_ready == 1)
									<li><i class="icons icon-grid"></i> Widger Ready</li>
								@endif

								@if($item->compatible_browser !='')
									<li><i class="icons icon-directions"></i> Compatible With Browsers</li>
								@endif

								@if($item->compatible_width !='')
									<li><i class="icons icon-size-fullscreen"></i> Compatible Width</li>
								@endif

								@if($item->framework !='')
									<li><i class="icons icon-docs"></i> {{ $item->framework }}</li>
								@endif

								@if($item->software_version !='')
									<li><i class="icons icon-puzzle"></i> {{ $item->software_version }}</li>
								@endif

								@if($item->files_included == 1)
									<!-- <li><i class="icons icon-docs"></i> {{ $item->files_included }}</li> -->
								@endif

								@if($item->columns == 1)
								<li><i class="icons icon-chart"></i> One Column</li>
								@elseif($item->columns == 2)
								<li><i class="icons icon-chart"></i> Two Columns</li>
								@elseif($item->columns == 3)
								<li><i class="icons icon-chart"></i> Three Columns</li>
								@elseif($item->columns == 4)
								<li><i class="icons icon-chart"></i> Four Columns</li>
								@endif

								@if($item->layout == 1)
								<li><i class="icons icon-layers"></i> Responsive</li>
								@elseif($item->layout == 2)
								<li><i class="icons icon-layers"></i> Non Responsive</li>
								@endif

								@if($item->category !='')
									<li><i class="icons icon-pin"></i> {{ HP::getCatByID($item->category)->cat_title }}</li>
								@endif

								@if($item->subcategory !='')
									<li><i class="icons icon-pin"></i> {{ HP::getCatByID($item->subcategory)->cat_title }}</li>
								@endif
							</ul>
						</div>

						<div class="single-sidebar theme-tags">
							<h6>Tags</h6>
							<ul class="tag-list">
								<li>
									<?php $tagArray = explode(',', $item->tags);
										for($x=0; count($tagArray) > $x; $x++) { ?>
											<a href="{{ url('/browse/tags/'.strip_tags($tagArray[$x]))}}">{{ strip_tags($tagArray[$x]) }}</a>,
									<?php } ?>
								</li>
							</ul>
			                <!-- <div class="sidebar-social">
			                    <ul>
			                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
			                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
			                        <li><a href="#"><i class="fa fa-github" aria-hidden="true"></i></a></li>
			                        <li><a href="#"><i class="fa fa-slack" aria-hidden="true"></i></a></li>
			                        <li><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
			                    </ul>
			                </div> -->
						</div>

						<!-- <div class="sidebar-banner relative mb-30">
							<div class="banner-img">
								<img class="img-fluid" src="{{ asset('img/banner-img1.jpg') }}" alt="">
							</div>
							<div class="details">
								<p class="text-white">
									Having a trip to europe? <br>
									Book your hotel from hotel jocky
								</p>
								<a href="#" class="primary-btn">book now</a>
							</div>
						</div>

						<div class="sidebar-banner relative">
							<div class="banner-img">
								<img class="img-fluid" src="{{ asset('img/banner-img2.jpg') }}" alt="">
							</div>
							<div class="details">
								<p class="text-white">
									Enjoy upto 30% off <br>
									@Sabrosso Restaurant till oct 31st
								</p>
								<a href="#" class="primary-btn">Get Coupon</a>
							</div>
						</div> -->
					</div>
				</div>
			</div>
		</section>
		<!-- End theme-details -->


		@include('inc.fcounterblue')



@endsection
