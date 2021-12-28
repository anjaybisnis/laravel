<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ asset('images/' . HP::set()->favicon ) }}">
    <!-- Author Meta -->
    <meta name="author" content="codethemes & onezeroart">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>{{ HP::set()->title }} - {{ HP::set()->slogan }}</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700" rel="stylesheet">
    <!-- ===========================================
		CSS
	============================================= -->
    <link rel="stylesheet" href="css/simple-line-icons.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/main.css">
</head>

    <body>

	<!-- Start login-form Area -->
	<section class="login-form-area relative">
		<div class="container-fluid">
			<div class="row equal align-items-center fullscreen">
				<div class="col-lg-3 left-part-wrap text-center left-part">
					<div class="fullscreen relative">
						<a class="d-block pt-40 ml-20 text-left login-page-logo" href="{{ url('/')}}"><img  src="{{ asset('images/' . HP::set()->logo ) }}" alt=""></a>
						<div class="content-wrap relative">
							<h3 class="text-uppercase semi-blod text-white">{{ HP::set()->lpheading }}</h3>
							<p class="text-white">{{ HP::set()->lptext }}</p>
							<a href="{{ HP::set()->lpburl }}" class="primary-btn">{{ HP::set()->lpbtext }}</a>
						</div>

						<div class="social-icons relative">
							<p class="text-white">Temukan kami</p>
			                <div class="sidebar-social">
                                <ul>
                                    <li><a href="{{HP::set()->social_facebook}}"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="{{HP::set()->social_twitter}}"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="{{HP::set()->social_google}}"><i class="fa fa-google" aria-hidden="true"></i></a></li>
                                    <li><a href="{{HP::set()->social_linkedin}}"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                    <li><a href="{{HP::set()->social_youtube}}"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                                    <li><a href="{{HP::set()->social_reddit}}"><i class="fa fa-reddit" aria-hidden="true"></i></a></li>
                                </ul>
			                </div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 offset-lg-2 signup-form">
					<h1>{{ HP::set()->title }} - Masuk</h1>
					<p>
						Masukkan detail Login untuk mendapatkan akses ke akun Anda
					</p>
                    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @csrf
						<div class="form-group">
							<label class="text-uppercase">Alamat email</label>
							<input name="email" type="email" placeholder="Alamat email" onfocus="this.placeholder=''" onblur="this.placeholder = 'Alamat email'" required class="common-input mt-10">
						</div>
						<div class="form-group">
							<label class="text-uppercase">Password</label>
							<input name="password" type="password" placeholder="Masukkan Password" onfocus="this.placeholder=''" onblur="this.placeholder = 'Masukkan Password'" required class="common-input mt-10">
                        </div>
						<div class="mt-20"><input name="remember" type="checkbox" class="pixel-checkbox" id="login-1" value="1"><label for="login-1">Ingat Saya</label></div>
						<button class="primary-btn view-btn mt-20 mr-20"><span>Masuk</span></button>
					</form>
				</div>
				<a class="primary-btn white-btn signup-btn" href="{{ route('register') }}">Daftar</a>
			</div>
		</div>
	</section>
	<!-- End login-form Area -->


    <script src="js/vendor/jquery-2.2.4.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
    <script src="js/easing.min.js"></script>
    <script src="js/superfish.min.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.2.1/Chart.min.js"></script>
    <script src="js/mail-script.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
