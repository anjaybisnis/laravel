@extends('layouts.app')
@section('content')



<body>

    @include('inc.dashboardheader')

    <!-- Start User Settings -->
    <section class="user-setting pb-60">
        <div class="container">

            @include('inc.dashboardlinks')

            <div class="row" id="tabs">
                <div class="col-lg-3">
                    <div class="options-sidebar">
                        <h4 class="text-uppercase pt-20 pb-20">Pengaturan</h4>
                        <ul>
                            <li><a href="#general">Pengaturan Umum</a></li>
                            <li><a href="#homePage">Pengaturan Beranda</a></li>
                            <li><a href="#loginPage">Pengaturan Halaman Login</a></li>
                            <li><a href="#footerPage">Pengaturan Widget Footer</a></li>
                            <li><a href="#socialNetworks">Pengaturan Sosial Media</a></li>
                            <li><a href="#allCategories">Semua Kategori</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">

                    <!-- Pengaturan Umum Start Here -->

                    <div id="general">
                        <div class="settings-content">
                            <h4>Pengaturan Umum</h4>
                            <form method="POST" action="{{ action('DashboardController@storeGeneral', 1) }}" class="billing-form" enctype="multipart/form-data">
                                @csrf
                                {{ method_field('PUT') }}
                                <div class="row pt-30">
                                    <div class="col-lg-6">
                                        <span>Logo</span>
                                        <div class="d-flex align-items-center avatar-wrap">
                                            <div class="avatar-thumb mr-20">
                                                <?php if(HP::set()->logo){ ?>
                                                    <img class="img-60" src="{{ asset('images/' . HP::set()->logo ) }}" alt="Photo">
                                                <?php } else{ ?>
                                                    <img class="img-60" src="{{ URL::asset('images/default.png')}}" alt="Photo">
                                                <?php } ?>
                                            </div>
                                            <div class="upload-fleid logo">
                                                <p>Upload logo</p>
                                                <div class="input-group input-file">
                                                    <input name="logo" class="form-control" type="file">
                                                </div>
                                                <p>JPEG 125x30PX</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <span>Favicon</span>
                                        <div class="d-flex align-items-center avatar-wrap">
                                            <div class="avatar-thumb mr-20">
                                                <?php if(HP::set()->favicon){ ?>
                                                    <img class="img-60" src="{{ asset('images/' . HP::set()->favicon ) }}" alt="Photo">
                                                <?php } else{ ?>
                                                    <img class="img-60" src="{{ URL::asset('images/default.png')}}" alt="Photo">
                                                <?php } ?>
                                            </div>
                                            <div class="upload-fleid favicon">
                                                <p>Upload favicon</p>
                                                <div class="input-group input-file">
                                                    <input name="favicon" class="form-control" type="file">
                                                </div>
                                                <p>JPEG 16x16PX</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <span>Title</span>
                                        <input type="text" name="title" placeholder="Title*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Title*'" value="{{ $settings->title }}" required class="common-input">
                                    </div>
                                    <div class="col-lg-6">
                                        <span>Slogan</span>
                                        <input type="text" name="slogan" placeholder="Slogan*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Slogan*'" value="{{ $settings->slogan }}" required class="common-input">
                                    </div>
                                    <div class="col-lg-6">
                                        <span>Default Currency</span>
                                        <input type="text" name="currency" placeholder="Default Currency" onfocus="this.placeholder=''" onblur="this.placeholder = 'Default Currency*'" value="{{ $settings->currency }}" required class="common-input">
                                    </div>
                                    <div class="col-lg-6">
                                        <span>Fee Pembeli Per Pembelian Produk</span>
                                        <input type="text" name="buyerfee" placeholder="Buyer Fee" onfocus="this.placeholder=''" onblur="this.placeholder = 'Buyer Fee*'" value="{{ $settings->buyerfee }}" required class="common-input">
                                    </div>
                                    <div class="col-lg-6">
                                        <span>Fee Penjual Per Penjualan Produk</span>
                                        <input type="text" name="authorfee" placeholder="Author Fee" onfocus="this.placeholder=''" onblur="this.placeholder = 'Author Fee*'" value="{{ $settings->authorfee }}" required class="common-input">
                                    </div>
                                    <div class="col-lg-6">
                                        <span>Teks Footer Hak Cipta</span>
                                        <input type="text" name="fcopyright" placeholder="Teks Footer Hak Cipta" onfocus="this.placeholder=''" onblur="this.placeholder = 'Teks Footer Hak Cipta*'" value="{{ $settings->fcopyright }}" required class="common-input">
                                    </div>
                                    <div class="col-lg-6">
                                        <span>Action URL Formulir Berlangganan MailChimp</span>
                                        <input type="text" name="mailchimpurl" placeholder="MailChimp Subscribe URL" onfocus="this.placeholder=''" onblur="this.placeholder = 'MailChimp Subscribe'" value="{{ $settings->mailchimpurl }}" class="common-input">
                                    </div>
                                    <div class="col-lg-12 text-right">
                                        <button type="submit" class="primary-btn">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Pengaturan Umum End Here -->
                    <!-- Hope Page Settings Start Here -->

                    <div id="homePage">
                        <div class="settings-content">
                            <h4> Pengaturan Beranda </h4>
                            <form method="POST" action="{{ action('DashboardController@storeHomepage', 1) }}" class="billing-form" enctype="multipart/form-data">
                                @csrf
                                {{ method_field('PUT') }}
                                <div class="row pt-30">

                                  <div class="col-lg-6">
                                      <span> Banner Halaman Beranda</span>
                                      <div class="d-flex align-items-center avatar-wrap mt-4">
                                          <div class="upload-fleid logo">
                                              <div class="input-group input-file">
                                                  <input name="hphbimage" class="form-control" type="file">
                                              </div>
                                              <p>JPEG 675x370PX</p>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-lg-6">
                                      <span> Banner Footer Halaman Beranda </span>
                                      <div class="d-flex align-items-center avatar-wrap mt-4">
                                          <div class="upload-fleid favicon">
                                              <div class="input-group input-file">
                                                  <input name="hpfbimage" class="form-control" type="file">
                                              </div>
                                              <p>JPEG 1084x435PX</p>
                                          </div>
                                      </div>
                                  </div>

                                    <div class="col-lg-6">
                                        <span>Teks Judul Banner Utama</span>
                                        <input type="text" name="hppbheading" placeholder="Teks Judul Banner Utama*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Teks Judul Banner Utama*'" value="{{ HP::set()->hppbheading }}" required class="common-input">
                                    </div>

                                    <div class="col-lg-6">
                                        <span> Teks Pendek </span>
                                        <input type="text" name="hpbstext" placeholder="Teks Pendek*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Short Text*'" value="{{ HP::set()->hpbstext }}" required class="common-input">
                                    </div>

                                    <div class="col-lg-6">
                                        <span>Teks Tombol Banner </span>
                                        <input type="text" name="hpbbtext" placeholder="Teks Tombol Banner*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Teks Tombol Banner*'" value="{{ HP::set()->hpbbtext }}" required class="common-input">
                                    </div>

                                    <div class="col-lg-6">
                                        <span> URL Tombol Banner </span>
                                        <input type="text" name="hpburl" placeholder="Banner URL*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Banner URl*'" value="{{ HP::set()->hpburl }}" required class="common-input">
                                    </div>

                                    <div class="col-lg-6">
                                        <span> Area Deskripsi Produk Unggulan </span>
                                        <input type="text" name="hpbfiadis" placeholder="Area Deskripsi Produk Unggulan*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Area Deskripsi Produk Unggulan*'" value="{{ HP::set()->hpbfiadis }}" required class="common-input">
                                    </div>

                                    <div class="col-lg-6">
                                        <span> Area Deskripsi Produk Terbaru </span>
                                        <input type="text" name="hpbliadis" placeholder="Area Deskripsi Produk Terbaru*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Area Deskripsi Produk Terbaru*'" value="{{ HP::set()->hpbliadis }}" required class="common-input">
                                    </div>

                                    <div class="col-lg-6">
                                        <span> Area Deskripsi Produk Gratis </span>
                                        <input type="text" name="hpbfreeiadis" placeholder="Area Deskripsi Produk Gratis*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Area Deskripsi Produk Gratis*'" value="{{ HP::set()->hpbfreeiadis }}" required class="common-input">
                                    </div>

                                    <div class="col-lg-6">
                                        <span> Area Deskripsi yang Menakjubkan </span>
                                        <input type="text" name="hpbatadis" placeholder="Area Deskripsi yang Menakjubkan*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Area Deskripsi yang Menakjubkan*'" value="{{ HP::set()->hpbatadis }}" required class="common-input">
                                    </div>

                                    <div class="col-lg-6">
                                        <span> Teks Judul Banner Footer </span>
                                        <input type="text" name="hpfbhtext" placeholder="Teks Judul Banner Footer*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Teks Judul Banner Footer*'" value="{{ HP::set()->hpfbhtext }}" required class="common-input">
                                    </div>

                                    <div class="col-lg-6">
                                        <span> Teks Pendek Banner Footer </span>
                                        <input type="text" name="hpfbstext" placeholder="Teks Pendek Banner Footer*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Teks Pendek Banner Footer*'" value="{{ HP::set()->hpfbstext }}" required class="common-input">
                                    </div>

                                    <div class="col-lg-6">
                                        <span> Teks Tombol Banner Footer </span>
                                        <input type="text" name="hpfbbtext" placeholder="Teks Tombol Banner Footer*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Teks Tombol Banner Footer*'" value="{{ HP::set()->hpfbbtext }}" required class="common-input">
                                    </div>

                                    <div class="col-lg-6">
                                        <span> URL Tombol Banner Footer </span>
                                        <input type="text" name="hpfbburl" placeholder="URL Tombol Banner Footer*" onfocus="this.placeholder=''" onblur="this.placeholder = 'URL Tombol Banner Footer*'" value="{{ HP::set()->hpfbburl }}" required class="common-input">
                                    </div>
                                    <div class="col-lg-12 text-right">
                                        <button type="submit" class="primary-btn">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Hope Page Settings End Here -->
                    <!-- Pengaturan Halaman Login Start Here -->

                    <div id="loginPage">
                        <div class="settings-content">
                            <h4> Pengaturan Halaman Login </h4>
                            <form method="POST" action="{{ action('DashboardController@storeLogingpage', 1) }}" class="billing-form" enctype="multipart/form-data">
                                @csrf
                                {{ method_field('PUT') }}

                                <div class="row pt-30">
                                    <div class="col-lg-6">
                                        <span>Teks Judul Halaman Login</span>
                                        <input type="text" name="lpheading" placeholder="Teks Judul Halaman Login*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Teks Judul Halaman Login*'" value="{{ HP::set()->lpheading }}" required class="common-input">
                                    </div>
                                    <div class="col-lg-6">
                                        <span>Teks Pendek Halaman Login</span>
                                        <input type="text" name="lptext" placeholder="Teks Pendek Halaman Login*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Teks Pendek Halaman Login*'" value="{{ HP::set()->lptext }}" required class="common-input">
                                    </div>
                                    <div class="col-lg-6">
                                        <span>Teks Tombol Halaman Login</span>
                                        <input type="text" name="lpbtext" placeholder="Teks Tombol Halaman Login*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Teks Tombol Halaman Login*'" value="{{ HP::set()->lpbtext }}" required class="common-input">
                                    </div>
                                    <div class="col-lg-6">
                                        <span>URL Tombol Halaman Login</span>
                                        <input type="text" name="lpburl" placeholder="URL Tombol Halaman Login*" onfocus="this.placeholder=''" onblur="this.placeholder = 'URL Tombol Halaman Login*'" value="{{ HP::set()->lpburl }}" required class="common-input">
                                    </div>
                                    <div class="col-lg-12 text-right">
                                        <button type="submit" class="primary-btn">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Login Page End Here -->
                    <!-- Semua Kategori Start Here -->

                    <div id="allCategories">
                        <div class="settings-content">
                            <h4>Tambah Kategori</h4>
                            <form method="POST" action="{{ action('DashboardController@storeCategory') }}" class="billing-form">
                                @csrf
                                <div class="row pt-30">
                                    <div class="col-lg-6">
                                        <input type="text" name="cat_title" placeholder="Nama Kategori*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Nama Kategori*'" required class="common-input">
                                    </div>
                                    <div class="col-lg-6">
                                        <select name="cat_type" class="common-input cat_type" required>
                                            <option value="">Pilih Tipe Kategori*</option>
                                            <option value="1">Kategori Utama</option>
                                            <option value="2">Subkategori</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 parent_cat_div" style="display:none;">
                                        <select id="parent_cat" name="cat_parent" class="common-input parent_cat">
                                            <option value="">Pilih Kategori Induk*</option>
                                            @foreach ($primaryCategories as $primarycategory)
                                            <option value="{{ $primarycategory->id }}">{{ $primarycategory->cat_title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-6 text-right">
                                        <button type="submit" class="primary-btn">Tambah</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="settings-content">
                            <div class="coupons-wrap">
                                <h4>Semua Kategori</h4>
                                <table class="table table-striped mt-40 coupons-table allCategories">
                                    <thead>
                                        <tr>
                                            <th>Nama Kategori</th>
                                            <th>Tipe Kategori</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category)
                                        <tr>
                                            <td>{{ $category->cat_title }}</td>
                                            <td>{{ ($category->cat_type == 1) ? "Primary" : "Subkategori" }}</td>
                                            <td class="buttons">
                                                <a data-toggle="modal" data-target="#updateCategory" data-id="{{ $category->id }}" class="primary-btn edit-btn"><i class="icon icon-tag"></i></a>
                                                <form id="deleteFrom" action="{{ action('DashboardController@deleteCategory', $category->id) }}" method="POST">
                                                    {{ method_field('DELETE') }} {{ csrf_field() }}
                                                    <button type="submit" class="primary-btn red-btn delete-btn"><i class="icon icon-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="updateCategory" tabindex="-1" role="dialog" aria-labelledby="updateCategory" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="updateCategoryTitle">Update Kategori</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{ action('DashboardController@updateCategory', 1) }}" class="billing-form">
                                            @csrf {{ method_field('PUT') }}

                                            <input type="hidden" id="id" name="id">
                                            <div class="row pt-30">
                                                <div class="col-lg-6">
                                                    <input type="text" id="cat_title" name="cat_title" placeholder="Nama Kategori*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Nama Kategori*'" required class="common-input cat_title">
                                                </div>
                                                <div class="col-lg-6">
                                                    <select id="cat_type" name="cat_type" class="common-input cat_type" required>
                                                        <option value="">Pilih Tipe Kategori*</option>
                                                        <option value="1">Kategori Utama</option>
                                                        <option value="2">Subkategori</option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-6 xxparent_cat_div" style="display:block;">
                                                    <select id="parent_cat" name="cat_parent" class="common-input xxparent_cat">
                                                        <option value="">Pilih Kategori Induk*</option>
                                                        @foreach ($primaryCategories as $primarycategory)
                                                        <option value="{{ $primarycategory->id }}">{{ $primarycategory->cat_title }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-lg-6 text-right">
                                                    <button type="submit" class="primary-btn">Update</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <!-- <button type="button" class="btn btn-primary">Simpan</button> -->
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Semua Kategori End Here -->
                    <!-- Footer Page Stert Here -->

                    <div id="footerPage">
                        <div class="settings-content">
                            <h4>Widget 1</h4>
                            <form method="POST" action="{{ action('DashboardController@storeWidget', 1) }}" class="billing-form" enctype="multipart/form-data">
                                @csrf
                                {{ method_field('PUT') }}
                                <input type="hidden" name="widget" value="1">
                                <div class="row pt-30">
                                    <div class="col-lg-12">
                                        <span>Judul Widget</span>
                                        <input type="text" name="fwtitle1" placeholder="Judul Widget*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Judul Widget*'" value="{{ HP::set()->fwtitle1 }}" required class="common-input">
                                    </div>
                                    <div class="col-lg-12">
                                        <span>Konten Widget</span>
                                        <textarea name="fwcon1" placeholder="Konten Widget*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Konten Widget*'" required class="common-input fwcon1">{!! HP::set()->fwcon1 !!}</textarea>
                                    </div>
                                    <div class="col-lg-12 mt-20 text-right">
                                        <button type="submit" class="primary-btn">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="settings-content">
                            <h4>Widget 2</h4>
                            <form method="POST" action="{{ action('DashboardController@storeWidget', 1) }}" class="billing-form" enctype="multipart/form-data">
                                @csrf
                                {{ method_field('PUT') }}
                                <input type="hidden" name="widget" value="2">
                                <div class="row pt-30">
                                    <div class="col-lg-12">
                                        <span>Judul Widget</span>
                                        <input type="text" name="fwtitle2" placeholder="Judul Widget*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Judul Widget*'" value="{{ HP::set()->fwtitle2 }}" required class="common-input">
                                    </div>
                                    <div class="col-lg-12">
                                        <span>Konten Widget</span>
                                        <textarea name="fwcon2" placeholder="Konten Widget*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Konten Widget*'" required class="common-input fwcon2">{!! HP::set()->fwcon2 !!}</textarea>
                                    </div>
                                    <div class="col-lg-12 mt-20 text-right">
                                        <button type="submit" class="primary-btn">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="settings-content">
                            <h4>Widget 3</h4>
                            <form method="POST" action="{{ action('DashboardController@storeWidget', 1) }}" class="billing-form" enctype="multipart/form-data">
                                @csrf
                                {{ method_field('PUT') }}
                                <input type="hidden" name="widget" value="3">
                                <div class="row pt-30">
                                    <div class="col-lg-12">
                                        <span>Judul Widget</span>
                                        <input type="text" name="fwtitle3" placeholder="Judul Widget*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Judul Widget*'" value="{{ HP::set()->fwtitle3 }}" required class="common-input">
                                    </div>
                                    <div class="col-lg-12">
                                        <span>Konten Widget</span>
                                        <textarea name="fwcon3" placeholder="Konten Widget*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Konten Widget*'" required class="common-input fwcon3">{!! HP::set()->fwcon3 !!}</textarea>
                                    </div>
                                    <div class="col-lg-12 mt-20 text-right">
                                        <button type="submit" class="primary-btn">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="settings-content">
                            <h4>Widget 4</h4>
                            <form method="POST" action="{{ action('DashboardController@storeWidget', 1) }}" class="billing-form" enctype="multipart/form-data">
                                @csrf
                                {{ method_field('PUT') }}
                                <input type="hidden" name="widget" value="4">
                                <div class="row pt-30">
                                    <div class="col-lg-12">
                                        <span>Judul Widget</span>
                                        <input type="text" name="fwtitle4" placeholder="Judul Widget*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Judul Widget*'" value="{{ HP::set()->fwtitle4 }}" required class="common-input">
                                    </div>
                                    <div class="col-lg-12">
                                        <span>Konten Widget</span>
                                        <textarea name="fwcon4" placeholder="Konten Widget*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Konten Widget*'" required class="common-input fwcon4">{!! HP::set()->fwcon4 !!}</textarea>
                                    </div>
                                    <div class="col-lg-12 mt-20 text-right">
                                        <button type="submit" class="primary-btn">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="settings-content">
                            <h4>Widget 5</h4>
                            <form method="POST" action="{{ action('DashboardController@storeWidget', 1) }}" class="billing-form" enctype="multipart/form-data">
                                @csrf
                                {{ method_field('PUT') }}
                                <input type="hidden" name="widget" value="5">
                                <div class="row pt-30">
                                    <div class="col-lg-12">
                                        <span>Judul Widget</span>
                                        <input type="text" name="fwtitle5" placeholder="Judul Widget*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Judul Widget*'" value="{{ HP::set()->fwtitle5 }}" required class="common-input">
                                    </div>
                                    <div class="col-lg-12">
                                        <span>Konten Widget</span>
                                        <textarea name="fwcon5" placeholder="Konten Widget*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Konten Widget*'" required class="common-input fwcon5">{!! HP::set()->fwcon5 !!}</textarea>
                                    </div>
                                    <div class="col-lg-12 mt-20 text-right">
                                        <button type="submit" class="primary-btn">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Footer Page End Here -->
                    <!-- Akun Sosial Media Start Here -->

                    <div id="socialNetworks">
                        <div class="settings-content social-settings">
                            <h4>Akun Sosial Media</h4>
                            <form method="POST" action="{{ action('DashboardController@storeSocial', 1) }}" class="billing-form">
                                @csrf
                                {{ method_field('PUT') }}
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group d-flex align-items-center justify-content-between">
                                            <i class="social-icon be fa fa-behance" aria-hidden="true"></i>
                                            <input name="social_behance" type="text" class="form-control" value="{{ HP::set()->social_behance }}" placeholder="Behance username" onfocus="this.placeholder=''" onblur="this.placeholder = 'Behance username'" >
                                        </div>
                                        <div class="form-group d-flex align-items-center justify-content-between">
                                            <i class="social-icon digg fa fa-digg" aria-hidden="true"></i>
                                            <input name="social_digg" type="text" class="form-control"  value="{{ HP::set()->social_digg }}" placeholder="Digg username" onfocus="this.placeholder=''" onblur="this.placeholder = 'Digg username'" >
                                        </div>
                                        <div class="form-group d-flex align-items-center justify-content-between">
                                            <i class="social-icon fb fa fa-facebook" aria-hidden="true"></i>
                                            <input name="social_facebook" type="text" class="form-control"  value="{{ HP::set()->social_facebook }}" placeholder="Facebook username" onfocus="this.placeholder=''" onblur="this.placeholder = 'Facebook username'" >
                                        </div>
                                        <div class="form-group d-flex align-items-center justify-content-between">
                                            <i class="social-icon git fa fa-github" aria-hidden="true"></i>
                                            <input name="social_github" type="text" class="form-control"  value="{{ HP::set()->social_github }}" placeholder="Github username" onfocus="this.placeholder=''" onblur="this.placeholder = 'Github username'" >
                                        </div>
                                        <div class="form-group d-flex align-items-center justify-content-between">
                                            <i class="social-icon lf fa fa-lastfm" aria-hidden="true"></i>
                                            <input name="social_lastfm" type="text" class="form-control"  value="{{ HP::set()->social_lastfm }}" placeholder="Lastfm username" onfocus="this.placeholder=''" onblur="this.placeholder = 'Lastfm username'" >
                                        </div>
                                        <div class="form-group d-flex align-items-center justify-content-between">
                                            <i class="social-icon ri fa fa-reddit-alien" aria-hidden="true"></i>
                                            <input name="social_reddit" type="text" class="form-control" value="{{ HP::set()->social_reddit }}" placeholder="Reddit username" onfocus="this.placeholder=''" onblur="this.placeholder = 'Reddit username'" >
                                        </div>
                                        <div class="form-group d-flex align-items-center justify-content-between">
                                            <i class="social-icon th fa fa-tumblr" aria-hidden="true"></i>
                                            <input name="social_thumblr" type="text" class="form-control"  value="{{ HP::set()->social_thumblr }}" placeholder="Thumblr username" onfocus="this.placeholder=''" onblur="this.placeholder = 'Thumblr username'" >
                                        </div>
                                        <div class="form-group d-flex align-items-center justify-content-between">
                                            <i class="social-icon vi fa fa-vimeo" aria-hidden="true"></i>
                                            <input name="social_vimeo" type="text" class="form-control" value="{{ HP::set()->social_vimeo }}" placeholder="Vimeo username" onfocus="this.placeholder=''" onblur="this.placeholder = 'Vimeo username'" >
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group d-flex align-items-center justify-content-between">
                                            <i class="social-icon dv fa fa-deviantart" aria-hidden="true"></i>
                                            <input name="social_devianart" type="text" class="form-control" value="{{ HP::set()->social_devianart }}" placeholder="Devianart username" onfocus="this.placeholder=''" onblur="this.placeholder = 'Devianart username'" >
                                        </div>
                                        <div class="form-group d-flex align-items-center justify-content-between">
                                            <i class="social-icon dr fa fa-dribbble" aria-hidden="true"></i>
                                            <input name="social_dribble" type="text" class="form-control" value="{{ HP::set()->social_dribble }}" placeholder="Dribble username" onfocus="this.placeholder=''" onblur="this.placeholder = 'Dribble username'" >
                                        </div>
                                        <div class="form-group d-flex align-items-center justify-content-between">
                                            <i class="social-icon fl fa fa-flickr" aria-hidden="true"></i>
                                            <input name="social_flickr" type="text" class="form-control" value="{{ HP::set()->social_flickr }}" placeholder="Flickr username" onfocus="this.placeholder=''" onblur="this.placeholder = 'Flickr username'" >
                                        </div>
                                        <div class="form-group d-flex align-items-center justify-content-between">
                                            <i class="social-icon gp fa fa-google-plus" aria-hidden="true"></i>
                                            <input name="social_google" type="text" class="form-control" value="{{ HP::set()->social_google }}" placeholder="Google plus username" onfocus="this.placeholder=''" onblur="this.placeholder = 'Google plus username'" >
                                        </div>
                                        <div class="form-group d-flex align-items-center justify-content-between">
                                            <i class="social-icon li fa fa-linkedin" aria-hidden="true"></i>
                                            <input name="social_linkedin" type="text" class="form-control" value="{{ HP::set()->social_linkedin }}" placeholder="Linkedin username" onfocus="this.placeholder=''" onblur="this.placeholder = 'Linkedin username'" >
                                        </div>
                                        <div class="form-group d-flex align-items-center justify-content-between">
                                            <i class="social-icon sc fa fa-soundcloud" aria-hidden="true"></i>
                                            <input name="social_soundcloud" type="text" class="form-control" value="{{ HP::set()->social_soundcloud }}" placeholder="Soundcloud username" onfocus="this.placeholder=''" onblur="this.placeholder = 'Soundcloud username'" >
                                        </div>
                                        <div class="form-group d-flex align-items-center justify-content-between">
                                            <i class="social-icon tw fa fa-twitter" aria-hidden="true"></i>
                                            <input name="social_twitter" type="text" class="form-control" value="{{ HP::set()->social_twitter }}" placeholder="Twitter username" onfocus="this.placeholder=''" onblur="this.placeholder = 'Twitter username'" >
                                        </div>
                                        <div class="form-group d-flex align-items-center justify-content-between">
                                            <i class="social-icon yt fa fa-youtube-play" aria-hidden="true"></i>
                                            <input name="social_youtube" type="text" class="form-control" value="{{ HP::set()->social_youtube }}" placeholder="Youtube username" onfocus="this.placeholder=''" onblur="this.placeholder = 'Youtube username'" >
                                        </div>
                                        <div class="btns text-right">
                                            <button type="submit" class="primary-btn">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Akun Sosial Media End Here -->
            </div>
        </div>
    </section>
    <!-- End User Settings -->


    <!-- Start counter-section -->
    @include('inc.fcounterblue')
    <!-- End counter-section -->


@endsection
