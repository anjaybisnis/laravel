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


    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.18/e-1.7.4/af-2.3.0/b-1.5.2/b-colvis-1.5.2/b-flash-1.5.2/b-html5-1.5.2/b-print-1.5.2/cr-1.5.0/fc-3.2.5/fh-3.1.4/kt-2.4.0/r-2.2.2/rg-1.0.3/rr-1.2.4/sc-1.5.0/sl-1.2.6/datatables.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">



    <style>
        /**
        * The CSS shown here will not be introduced in the Quickstart guide, but shows
        * how you can use CSS to style your Element's container.
        */
        .StripeElement {
        background-color: white;
        height: 40px;
        padding: 10px 12px;
        border-radius: 4px;
        border: 1px solid transparent;
        box-shadow: 0 1px 3px 0 #e6ebf1;
        -webkit-transition: box-shadow 150ms ease;
        transition: box-shadow 150ms ease;
        width: 100%;
        }

        .StripeElement--focus {
        box-shadow: 0 1px 3px 0 #cfd7df;
        }

        .StripeElement--invalid {
        border-color: #fa755a;
        }

        .StripeElement--webkit-autofill {
        background-color: #fefde5 !important;
        }
    </style>
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

                <div class="col-lg-10 nav-wrap d-flex flex-row align-items-center">
                    <nav id="nav-menu-container" class="ml-auto">
                        <ul class="nav-menu">
                            <li class="menu-has-children"><a href="{{ url('/') }}">Beranda</a>
                            </li>
                            <li><a href="{{ url('/browse/') }}">Produk</a></li>
                            @auth
                            <li class="menu-has-children"><a href="">Toko</a>
                                <ul>
                                    <?php if(HP::user(Auth::id()) !=false){
                                        if(HP::user(Auth::id())->role != 2){ ?>
                                            <li><a href="{{ url('item/upload', Auth::user()->name) }}">Upload Produk</a></li>
                                    <?php } }?>
                                    <li><a href="{{ url('/cart/') }}">Keranjang</a></li>
                                    <li><a href="{{ url('/checkout/') }}">Checkout</a></li>
                                </ul>
                            </li>
                            @endauth
                        </ul>
                    </nav>
                    <div class="cart relative">
                            <div class="single-shortcut top-cart mr-0">
                                <span class="icons icon-handbag"></span>
                                <span class="badge badge-light totalCartNumber">{{ count(HP::cucart()) }}</span>
                            </div>
                            <div class="mini-cart">
                                <div class="total-amount d-flex justify-content-between">
                                    <div class="title">
                                        <h6>Keranjang Saya</h6>
                                    </div>
                                    <div class="amount">{{HP::currency() }} {{ HP::carttotal() }}</div>
                                </div>

                                @foreach(HP::cucart() as $cartitem)
                                    <div class="single-cart-item d-flex justify-content-between align-items-center">
                                        <a href="{{ url('/item/' . HP::item($cartitem->item_id)[0]->item_id ) }}"><img class="cart-notification-img img-50" src="{{ asset('images/item/' . HP::item($cartitem->item_id)[0]->thumbnail) }}" alt=""></a>
                                        <div class="middle">
                                            <h5><a href="{{ url('/item/' . HP::item($cartitem->item_id)[0]->item_id ) }}">{{ HP::item($cartitem->item_id)[0]->item_name }}</a></h5>
                                            <h6><span class="lnr lnr-tag"></span> {{HP::currency() }}{{HP::item($cartitem->item_id)[0]->item_purchasefee}} x 1</h6>
                                        </div>
                                        <div class="cross"><span class="lnr lnr-cross"></span></div>
                                        <form id="deleteFrom" action="{{ action('CartController@destroy', $cartitem->id) }}" method="POST">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <i class="icon icon-close quickCartItems delete-btn"></i>
                                        </form>
                                    </div>
                                @endforeach

                                <div class="proceed-btn text-center"><a href="{{ url('/cart')}}" class="primary-btn primary-btn-wr"><span>Proses Checkout</span></a></div>
                            </div>
                    </div>

                    <nav id="nav-menu-container">
                        <ul class="nav-menu">
                            <li class="menu-has-children"><a href="">Profil</a>
                                <ul>
                                    @guest
                                    <li><a href="{{ route('login') }}">Masuk</a></li>
                                    <li><a href="{{ route('register') }}">Daftar</a></li>
                                    @else
                                    <li><a href="{{ url('user', Auth::user()->name) }}">Profil Saya</a></li>
                                    <li><a href="{{ url('user/downloads', Auth::user()->name) }}">Unduh Produk</a></li>
                                    <?php if(HP::user(Auth::id()) !=false){
                                        if(HP::user(Auth::id())->role == 1){ ?>
                                            <li><a href="{{ url('dashboard') }}">Dashboard</a></li>
                                    <?php } }?>
                                    <li><a onclick="event.preventDefault(); document.getElementById('logout-form').submit();" href="{{ route('logout') }}">Keluar</a></li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                    @endguest
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
                <!-- #nav-menu-container -->
            </div>
        </div>
    </header>
    <!-- End Header Area -->

    @yield('content')

    <!-- start footer Area -->
    <footer class="footer-area pt-70">
        <div class="container">
            <div class="row footer-top-wrap">
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="single-footer-widget">
                        <h4 class="text-white text-uppercase">{{ HP::set()->fwtitle1 }}</h4>
                        <ul class="widget-menu-list">
                            {!! HP::set()->fwcon1 !!}
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="single-footer-widget">
                      <h4 class="text-white text-uppercase">{{ HP::set()->fwtitle2 }}</h4>
                      <ul class="widget-menu-list">
                          {!! HP::set()->fwcon2 !!}
                      </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="single-footer-widget">
                      <h4 class="text-white text-uppercase">{{ HP::set()->fwtitle3 }}</h4>
                      <ul class="widget-menu-list">
                          {!! HP::set()->fwcon3 !!}
                      </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="single-footer-widget">
                      <h4 class="text-white text-uppercase">{{ HP::set()->fwtitle4 }}</h4>
                      <ul class="widget-menu-list">
                          {!! HP::set()->fwcon4 !!}
                      </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-footer-widget">
                        <h4 class="text-white text-uppercase">{{ HP::set()->fwtitle5 }}</h4>
                        <ul class="text-white widget-menu-list">
                            {!! HP::set()->fwcon5 !!}
                        </ul>
                        <div class="mt-20 newsletter-form" id="mc_embed_signup">
                              <form action="{{ HP::set()->mailchimpurl }}" method="get">
                                <div class="d-flex form-wrap">
                                    <div class="wrap">
                                        <input class="form-control" name="EMAIL" placeholder="Alamat email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Alamat email'" required="" type="email">
                                    </div>
                                    <button class="submit-btn"><i class="icon-paper-plane"></i></button>
                                </div>
                                  <div class="info mt-20"></div>
                              </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row footer-bottom-wrap">
                <div class="col-lg-8 footer-bottom-left">
                    <p class="text-white">&copy; {{ date('Y') }} <a href="{{ url('/') }}">{{ HP::set()->title }}</a> - All Rights Reserved.</p>
                    <p class="text-white">{{HP::set()->fcopyright}}</p>
                </div>
                <div class="col-lg-4 footer-bottom-right">
                    <p class="text-white">Temukan kami</p>
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
    </footer>
    <!-- End footer Area -->

    <script> var baseurl = "{{ url('/') }}/";</script>
    <script src="{{ asset('js/vendor/jquery-2.2.4.min.js')}}"></script>
    <script src="{{ asset('js/popper.min.js')}}"></script>
    <script src="{{ asset('js/vendor/bootstrap.min.js')}}"></script>
    <script src="{{ asset('js/easing.min.js')}}"></script>
    <script src="{{ asset('js/superfish.min.js')}}"></script>
    <script src="{{ asset('js/jquery.ajaxchimp.min.js')}}"></script>
    <script src="{{ asset('js/jquery.nice-select.min.js')}}"></script>
    <script src="{{ asset('js/jquery-ui.js')}}"></script>
    <script src="{{ asset('js/Chart.min.js')}}"></script>
    <script src="{{ asset('js/jRate.min.js')}}"></script>

    <!-- Confirm JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
    <!-- DataTable JS -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.18/b-1.5.2/b-colvis-1.5.2/b-flash-1.5.2/b-html5-1.5.2/b-print-1.5.2/r-2.2.2/datatables.min.js"></script>

    <!-- ckeditor Text Editor -->
    <!-- <script src="https://cdn.ckeditor.com/ckeditor5/11.1.1/classic/ckeditor.js"></script> -->

    <script src="{{ asset('js/main.js')}}"></script>
    <script src="{{ asset('js/dtInitialize.js')}}"></script>

    <script src="{{ asset('js/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
    <script src="{{ asset('js/unisharp/laravel-ckeditor/adapters/jquery.js')}}"></script>
    <script>
        $('textarea').ckeditor();
        // $('.textarea').ckeditor(); // if class is prefered.
    </script>

    <script src="https://js.stripe.com/v3/"></script>
    <script>

        if (document.getElementById("sales-chart")) {

            var canvas = document.getElementById("sales-chart");
            var ctx = canvas.getContext('2d');
            // Global Options:
             Chart.defaults.global.defaultFontColor = '#797979';
             Chart.defaults.global.defaultFontSize = 14;

            // Data with datasets options
            var data = {
                labels: ["01","02","03","04","05","06","07","08","09","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31"],
                  datasets: [
                    {
                        label: "Sales",
                        fill: true,
                        backgroundColor: "#ecf7fe",
                        borderColor: "#DC143C",
                        data: [
                            <?php echo HP::tsbyday('1');?>,
                            <?php echo HP::tsbyday('2');?>,
                            <?php echo HP::tsbyday('3');?>,
                            <?php echo HP::tsbyday('4');?>,
                            <?php echo HP::tsbyday('5');?>,
                            <?php echo HP::tsbyday('6');?>,
                            <?php echo HP::tsbyday('7');?>,
                            <?php echo HP::tsbyday('8');?>,
                            <?php echo HP::tsbyday('9');?>,
                            <?php echo HP::tsbyday('10');?>,
                            <?php echo HP::tsbyday('11');?>,
                            <?php echo HP::tsbyday('12');?>,
                            <?php echo HP::tsbyday('13');?>,
                            <?php echo HP::tsbyday('14');?>,
                            <?php echo HP::tsbyday('15');?>,
                            <?php echo HP::tsbyday('16');?>,
                            <?php echo HP::tsbyday('17');?>,
                            <?php echo HP::tsbyday('18');?>,
                            <?php echo HP::tsbyday('19');?>,
                            <?php echo HP::tsbyday('20');?>,
                            <?php echo HP::tsbyday('21');?>,
                            <?php echo HP::tsbyday('22');?>,
                            <?php echo HP::tsbyday('23');?>,
                            <?php echo HP::tsbyday('24');?>,
                            <?php echo HP::tsbyday('25');?>,
                            <?php echo HP::tsbyday('26');?>,
                            <?php echo HP::tsbyday('27');?>,
                            <?php echo HP::tsbyday('28');?>,
                            <?php echo HP::tsbyday('29');?>,
                            <?php echo HP::tsbyday('30');?>,
                            <?php echo HP::tsbyday('31');?>
                        ]
                    }
                ]
            };
            // Chart declaration with some options:
            var myFirstChart = new Chart(ctx, {
                type: 'line',
                data: data
            })
        }


        $("#jRate").jRate({
          startColor: "#ffd200",
          endColor: "#ffd200",
          count: 5,
          width: 50,
          height: 50,
          onSet: function(rating) {
            $('input#review_point').val(rating);
            //console.log(rating);
          }
        });

        <?php if(Request::is('cart') || Request::is('checkout') ){ ?>

        // $paymentMethod = $("#payment-form input[name='paymentmethod']:checked").val();
        // console.log($paymentMethod);
        $("#payment-form input.paymentmethod").on('change', function() {
            $paymentMethod = $("#payment-form input[name='paymentmethod']:checked").val();
            console.log($paymentMethod);
            if($paymentMethod == 1){
              $("#payment-form #card-element").attr('id', 'xxcard-element');
            }else if($paymentMethod == 2){
                $("#payment-form #xxcard-element").attr('id', 'card-element');
            }else{
               $("#payment-form #card-element").attr('id', 'xxcard-element');
            }
        });

        // Stripe API Key
        // var stripe = Stripe('pk_test_uavQVvB1ueyXPdPQTTi6LeDp');
        var stripe = Stripe('{{ env('STRIPE_KEY') }}');
        var elements = stripe.elements();
        // Custom Styling
        var style = {
            base: {
                color: '#32325d',
                lineHeight: '24px',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };
        // Create an instance of the card Element
        var card = elements.create('card', {style: style});
        // Add an instance of the card Element into the `card-element` <div>
        card.mount('#card-element');
        // Handle real-time validation errors from the card Element.
        card.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
        if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        // Handle form submission
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {

            $paymentMethod = $("#payment-form input[name='paymentmethod']:checked").val();
            if($paymentMethod == 2){
                event.preventDefault();
                // event.preventDefault();
                stripe.createToken(card).then(function(result) {
                    if (result.error) {
                        // Inform the user if there was an error
                        var errorElement = document.getElementById('card-errors');
                        errorElement.textContent = result.error.message;
                    } else {
                        stripeTokenHandler(result.token);
                    }
                });
            }

        });

        // Send Stripe Token to Server
        function stripeTokenHandler(token) {
            // Insert the token ID into the form so it gets submitted to the server
            var form = document.getElementById('payment-form');
        // Add Stripe Token to hidden input
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);
        // Submit form
            form.submit();
        }

        <?php } ?>

    </script>


</body>

</html>
