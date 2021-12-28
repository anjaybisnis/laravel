@extends('layouts.app')
@section('content')

<body>

		<!-- Start common-header-sectiion -->
		<section class="common-header-sectiion relative">
			<div class="overlay overlay-bg"></div>
			<div class="container">
				<div class="row justify-content-center pb-100 pt-100">
					<div class="col-lg-7 text-center relative">
						<h1 class="text-uppercase text-white pb-20">Update Item</h1>
						<p class="mb-0 text-white menu-nav">
							<a href="#">Beranda</a>
							<i class="fa fa-caret-right" aria-hidden="true"></i>
							<a href="#">Upload Produk</a>
						</p>
					</div>
				</div>
			</div>
		</section>
		<!-- End common-header-sectiion -->

		<!-- Start upload-item Area -->
		<section class="upload-item-area section-gap">
			<div class="container">
				<div class="row">
					<div class="col-lg-3">
						<div class="category-wrap">
							<h6 class="pt-20">Pilih Kategori</h6>
							<div class="product-type">
								<select name="primeCategory" id="primeCategory">
									@foreach ($categories as $category)
										<option value="{{ $category->id }}">{{ $category->cat_title }}</option>
									@endforeach
								</select>
							</div>
						</div>
					</div>
					<div class="col-lg-9">
						<div class="name-desc-wrap">
							<h4>Nama dan Deskripsi</h4>
                            <form method="POST" action="{{ action('ItemController@update', $item->item_id) }}" class="setting-form" enctype="multipart/form-data">
                                @csrf
								{{ method_field('PUT') }}
								<input id="item_parent_category" name="category" type="hidden" value="{{ $category->id }}">
								<div class="form-group">
									<input placeholder="Name*" name="name" onfocus="this.placeholder=''" onblur="this.placeholder = 'Name*'" required="" class="form-control common-input" value="{{ $item->item_name }}" type="text">
									<p class="pb-30">
										Berikan nama deskriptif yang bagus untuk item Anda.
									</p>
								</div>
								<div class="form-group">
									<input placeholder="Key Feature" name="keyfeature1" onfocus="this.placeholder=''" onblur="this.placeholder = 'Key Feature'" required="" class="form-control common-input" value="{{ $item->keyfeature1 }}" type="text">
									<input placeholder="Key Feature" name="keyfeature2" onfocus="this.placeholder=''" onblur="this.placeholder = 'Key Feature'" required="" class="form-control common-input" value="{{ $item->keyfeature2 }}" type="text">
									<p class="pb-30">
										Buat dua fitur utama dari produk Anda.
									</p>
								</div>
								<div class="form-group mb-0">
									<textarea placeholder="HTML5 Description " name="description" onfocus="this.placeholder=''" onblur="this.placeholder = 'HTML5 Description '" required="" class="common-textarea form-control">{!! $item->description !!}</textarea>
									<p class="mb-0">
										Deskripsi produk Anda di sini. Gunakan kode HTML untuk menyisipkan banner atau link.
									</p>
								</div>
						</div>

						<div class="name-desc-wrap">
							<h4>Files</h4>
								<div class="form-group">
									<div class="product-type">
                                        <p>Upload Thumbnail</p>
                                        <input placeholder="Thumbnail" name="thumbnail" onfocus="this.placeholder=''" onblur="this.placeholder = 'Thumbnail'" required="" class="form-control file-input" type="file">
                                    </div>
								</div>
								<div class="form-group">
									<div class="product-type">
                                        <div class="product-type">
                                            <p>Upload Preview</p>
                                            <input placeholder="Preview" name="preview" onfocus="this.placeholder=''" onblur="this.placeholder = 'Preview'" required="" class="form-control file-input" type="file">
                                        </div>
									</div>
								</div>
								<div class="form-group">
									<div class="product-type">
                                        <div class="product-type">
                                            <p>Upload Main File (.zip)</p>
                                            <input placeholder="Main File" name="mainfile" onfocus="this.placeholder=''" onblur="this.placeholder = 'Main File'" required="" class="form-control file-input" type="file">
                                        </div>
									</div>
								</div>
								<div class="form-group mb-0">
									<div class="product-type">
                                        <div class="product-type">
                                            <p>Upload ready files (.zip)</p>
                                            <input placeholder="Wordpress Theme" name="wptheme" onfocus="this.placeholder=''" onblur="this.placeholder = 'Wordpress Theme'" required="" class="form-control file-input" type="file">
                                        </div>
									</div>
								</div>
						</div>

						<div class="name-desc-wrap">
							<h4>Kategori dan Atribut</h4>
								<div class="form-group">
									<div class="product-type">
										<select class="w-100 mb-20" name="subcategory">
											<option data-display="Subkategori*">Subkategori*</option>
											<option selected value="{{ $item->subcategory }}"><?php if(HP::getCatByID($item->subcategory) !=false){ echo HP::getCatByID($item->subcategory)->cat_title; } ?></option>
											@foreach ($subcategories as $subcategory)
												<option value="{{ $subcategory->id }}">{{ $subcategory->cat_title }}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="form-group">
									<div class="product-type">
										<select class="w-100 mb-20" name="high_resulation">
											<option data-display="Hight Resolution*">Hight Resolution*</option>
											<option selected value="{{ $item->high_resulation }}"><?php echo ($item->high_resulation == 1) ? "Yes" : "No"; ?></option>
											<option value="1">Yes</option>
											<option value="2">No</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<div class="product-type">
										<select class="w-100 mb-20" name="widget_ready">
											<option data-display="Widget Ready*">Widget Ready*</option>
											<option selected value="{{ $item->widget_ready }}"><?php echo ($item->widget_ready == 1) ? "Yes" : "No"; ?></option>
											<option value="1">Yes</option>
											<option value="2">No</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<div class="product-type">
										<label class="label mr-20">Compatible Browsers : </label>
										<div class="form-check form-check-inline">
												<input class="form-check-input" name="compatible_browser[]" type="checkbox" id="inlineCheckbox1" value="option1">
												<label class="form-check-label" for="inlineCheckbox1">Chrome</label>
										</div>
										<div class="form-check form-check-inline">
												<input class="form-check-input" name="compatible_browser[]" type="checkbox" id="inlineCheckbox2" value="option2">
												<label class="form-check-label" for="inlineCheckbox2">Safari</label>
										</div>
										<div class="form-check form-check-inline">
												<input class="form-check-input" name="compatible_browser[]" type="checkbox" id="inlineCheckbox3" value="option3">
												<label class="form-check-label" for="inlineCheckbox3">Firefox</label>
										</div>
										<div class="form-check form-check-inline">
												<input class="form-check-input" name="compatible_browser[]" type="checkbox" id="inlineCheckbox4" value="option4">
												<label class="form-check-label" for="inlineCheckbox4">Opera</label>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="product-type">
										<input placeholder="Compatible With*" name="compatible_width" onfocus="this.placeholder=''" onblur="this.placeholder = 'Compatible With*'" required="" class="form-control common-input" value="{{ $item->compatible_width }}" type="text">
									</div>
								</div>
								<div class="form-group">
									<div class="product-type">
										<input placeholder="Framework*" name="framework" onfocus="this.placeholder=''" onblur="this.placeholder = 'Framework*'" required="" class="form-control common-input" value="{{ $item->framework }}" type="text">
									</div>
								</div>
								<div class="form-group">
									<div class="product-type">
										<input placeholder="Software Version*" name="software_version" onfocus="this.placeholder=''" onblur="this.placeholder = 'Software Version*'" required="" class="form-control common-input" value="{{ $item->software_version }}" type="text">
									</div>
								</div>
								<div class="form-group">
									<div class="product-type">
										<select class="w-100 mb-20" name="columns">
											<option data-display="Columns*">Columns*</option>
											<option selected value="{{ $item->columns }}">
												<?php if($item->columns == 1){
													echo "One";
												}elseif($item->columns == 2){
													echo "Two";
												}elseif($item->columns == 3){
													echo "Three";
												}elseif($item->columns == 4){
													echo "Four";
												} ?>
											</option>
											<option value="1">One</option>
											<option value="2">Two</option>
											<option value="3">Three</option>
											<option value="4">Four</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<div class="product-type">
										<select class="w-100 mb-20" name="layout">
											<option data-display="Layout*">Layout*</option>
											<option selected value="{{ $item->layout }}"><?php echo ($item->layout == 1) ? "Response" : "Non Responsive"; ?></option>
											<option value="1">Responsive</option>
											<option value="2">Non Responsive</option>
										</select>
									</div>
								</div>
								<div class="form-group mb-0">
									<input placeholder="Demo URL*" name="demo_url" onfocus="this.placeholder=''" onblur="this.placeholder = 'Demo URL*'" required="" class="form-control common-input" value="{{ $item->demo_url }}" type="text">
								</div>
						</div>
						<div class="name-desc-wrap">
							<h4>Tags</h4>
								<div class="form-group mb-0">
									<textarea placeholder="tags" name="tags" onfocus="this.placeholder=''" onblur="this.placeholder = 'tags '" required="" class="common-textarea form-control">{{ $item->tags }}</textarea>
									<p class="mb-0">
										Masukkan keywords untuk item Anda
									</p>
								</div>
						</div>
						<div class="name-desc-wrap">
							<h4>PENGATURAN HARGA</h4>
							<div class="form-group mb-30">
								<p class="pt-20">
									Tetapkan Harga Barang untuk lisensi reguler dan untuk lisensi diperpanjang
								</p>
								<div class="regular-price d-flex justify-content-between align-items-center">
									<p class="widths reg-title mb-0">Regular License</p>
									<div class="form-group">
										<label for="item price" class="text-uppercase text-black">Item Price</label>
										<div class="d-flex align-items-center">
											{{ HP::set()->currency}}<input type="text" class="form-control mb-0 item_price" name="item_price" placeholder="" onfocus="this.placeholder=''" onblur="this.placeholder = ''" value="{{ $item->item_price }}">
										</div>
									</div>
									<div class="form-group">
										<label for="item price" class="text-uppercase text-black">Buyer fee</label>
										<div class="d-flex align-items-center">
											+<input disabled type="text" class="form-control mb-0 xxitem_buyerfee" name="xxitem_buyerfee"  placeholder="{{ HP::set()->buyerfee}}" onfocus="this.placeholder=''" onblur="this.placeholder = '{{ HP::set()->buyerfee}}'" value="{{ HP::set()->buyerfee}}">
											<input type="hidden" class="form-control mb-0 item_buyerfee" name="item_buyerfee"  placeholder="{{ HP::set()->buyerfee}}" onfocus="this.placeholder=''" onblur="this.placeholder = '{{ HP::set()->buyerfee}}'" value="{{ HP::set()->buyerfee}}">
										</div>
									</div>
									<div class="form-group">
										<label for="item price" class="text-uppercase text-black primary-color">Purchase price</label>
										<div class="d-flex align-items-center total-price">
											=<input disabled type="text" class="form-control mb-0 xxitem_purchasefee" name="xxitem_purchasefee"  placeholder="{{ HP::set()->buyerfee}}" onfocus="this.placeholder=''" onblur="this.placeholder = '{{ HP::set()->buyerfee}}'" value="{{ $item->item_purchasefee }}">
											<input type="hidden" class="form-control mb-0 item_purchasefee" name="item_purchasefee"  placeholder="{{ HP::set()->buyerfee}}" onfocus="this.placeholder=''" onblur="this.placeholder = '{{ HP::set()->buyerfee}}'" value="{{ $item->item_purchasefee }}">
										</div>
									</div>
									<div class="recomanded-price widths">
										Recommended  <br>
										Purchase price <br>
										{{ HP::set()->currency}}15 - {{ HP::set()->currency}}59
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="regular-price d-flex justify-content-between align-items-center">
									<p class="widths reg-title mb-0">Extended License</p>
									<div class="form-group">
										<label for="item price" class="text-uppercase text-black">Item Price</label>
										<div class="d-flex align-items-center">
											{{ HP::set()->currency}}<input type="text" class="form-control mb-0 item_ex_price" name="item_ex_price" placeholder="" onfocus="this.placeholder=''" onblur="this.placeholder = ''" value="{{ $item->item_ex_price }}">
										</div>
									</div>
									<div class="form-group">
										<label for="item price" class="text-uppercase text-black">Buyer fee</label>
										<div class="d-flex align-items-center">
											+<input disabled type="text" class="form-control mb-0 xxitem_ex_buyerfee" name="xxitem_ex_buyerfee" placeholder="{{ HP::set()->buyerfee}}" onfocus="this.placeholder=''" onblur="this.placeholder = '{{ HP::set()->buyerfee}}'" value="{{ HP::set()->buyerfee}}">
											<input type="hidden" class="form-control mb-0 item_ex_buyerfee" name="item_ex_buyerfee" placeholder="{{ HP::set()->buyerfee}}" onfocus="this.placeholder=''" onblur="this.placeholder = '{{ HP::set()->buyerfee}}'" value="{{ HP::set()->buyerfee}}">
										</div>
									</div>
									<div class="form-group">
										<label for="item price" class="text-uppercase text-black primary-color">Purchase price</label>
										<div class="d-flex align-items-center total-price">
											=<input disabled type="text" class="form-control mb-0 xxitem_ex_purchasefee" name="item_ex_purchasefee" placeholder="{{ HP::set()->buyerfee}}" onfocus="this.placeholder=''" onblur="this.placeholder = '{{ HP::set()->buyerfee}}'" value="{{ $item->item_ex_purchasefee }}">
											<input type="hidden" class="form-control mb-0 item_ex_purchasefee" name="item_ex_purchasefee" placeholder="{{ HP::set()->buyerfee}}" onfocus="this.placeholder=''" onblur="this.placeholder = '{{ HP::set()->buyerfee}}'" value="{{ $item->item_ex_purchasefee }}">
										</div>
									</div>
									<div class="recomanded-price widths">
										Recommended  <br>
										Purchase price <br>
										{{ HP::set()->currency}}100 - {{ HP::set()->currency}}300
									</div>
								</div>
							</div>

							<div class="name-desc-wrap">
								<h4>PESAN KEPADA REVIEWER</h4>
									<div class="form-group mb-0">
										<textarea placeholder="Messages " name="item_message" onfocus="this.placeholder=''" onblur="this.placeholder = 'Messages '" required="" class="common-textarea form-control">{{ $item->message }}</textarea>
									</div>
								<button type="submit" class="primary-btn primary-btn-wr mt-20">Upload Produk</button>
							</div>
                        </form>

					</div>
				</div>
			</div>
		</section>
		<!-- End upload-item Area -->


@endsection
