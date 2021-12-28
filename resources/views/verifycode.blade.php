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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Site Title -->
    <title>{{ HP::set()->title }} - {{ HP::set()->slogan }}</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700" rel="stylesheet">
    <!-- ===========================================
		CSS
	============================================= -->
    <link rel="stylesheet" href="{{ asset('css/simple-line-icons.css')}}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{ asset('css/nice-select.css')}}">
    <link rel="stylesheet" href="{{ asset('css/animate.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/main.css')}}">

</head>
    <!-- start Header Area -->
    <header id="header">

        @include('inc.messages')

        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-2" id="logo">
                    <a href="{{ url('/')}}"><img src="{{ asset('images/' . HP::set()->logo ) }}" alt="" title="" /></a>
                </div>
                <div class="loading" id="loading" style="display:none;">
                    <img src="{{ asset('images/loading.svg')}}" alt="Loading">
                </div>
                <!-- #nav-menu-container -->
            </div>
        </div>
    </header>
    <!-- End Header Area -->
<body>

    <!-- Start upload-item Area -->
    <section class="upload-item-area section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="name-desc-wrap">
                        <h1 class="text-center pb-20" style=" color: #dd4b39; font-weight: bold;">Please Verify Your Purchase Code</h1>
                        <form method="POST" action="{{ action('VerifyController@storePurchasecode', 1) }}" class="setting-form" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="form-group col-md-8 offset-md-2">
                                <input placeholder="Envato Username*" name="envatouser" onfocus="this.placeholder=''" onblur="this.placeholder = 'Envato Username*'" required="" class="form-control common-input" type="text">
                                <input placeholder="Purchase Code*" name="purchasecode" onfocus="this.placeholder=''" onblur="this.placeholder = 'Purchase Code*'" required="" class="form-control common-input" type="text">
                                <p class="text-center pb-30">Please, insert your envato username & purchse key to verify and active Codeclub. Not bought yet? Please <a href="https://codecanyon.net/user/codethemes" target="_blank">Buy Now</a></p>
                            </div>
                            <div class="form-group col-md-3 offset-md-5">
                                <button type="submit" class="primary-btn primary-btn-wr">Verify Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End upload-item Area -->

    <script> var baseurl = "{{ url('/') }}/";</script>
    <script src="{{ asset('js/vendor/jquery-2.2.4.min.js')}}"></script>
    <script src="{{ asset('js/popper.min.js')}}"></script>
    <script src="{{ asset('js/vendor/bootstrap.min.js')}}"></script>
    <script src="{{ asset('js/easing.min.js')}}"></script>
    <script src="{{ asset('js/superfish.min.js')}}"></script>
    <script src="{{ asset('js/jquery.ajaxchimp.min.js')}}"></script>
    <script src="{{ asset('js/jquery-ui.js')}}"></script>

    <!-- Confirm JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>

</body>

</html>
