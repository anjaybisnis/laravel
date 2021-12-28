@extends('layouts.app')
@section('content')

<body>

    <!-- Start common-header-sectiion -->
    <section class="common-header-sectiion relative">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row justify-content-center pb-100 pt-100">
                <div class="col-lg-7 text-center relative">
                    <h1 class="text-uppercase text-white pb-20">Checkout</h1>
                    <p class="mb-0 text-white menu-nav">
                        <a href="index.php">Beranda</a>
                        <i class="fa fa-caret-right" aria-hidden="true"></i>
                        <a href="checkout.php">Checkout</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- End common-header-sectiion -->

    <div class="checkout-section">
        <!-- Start Checkout Area -->
        <!-- <div class="container pt-120">
            <div class="checkput-login">
                <div class="top-title">
                    <p>Returning Customer? <a data-toggle="collapse" href="#checkout-login" aria-expanded="false" aria-controls="checkout-login">Click here to Masuk</a></p>
                </div>
                <div class="collapse" id="checkout-login">
                    <div class="checkout-login-collapse d-flex flex-column">
                        <p>If you have shopped with us before, please enter your details in the boxes below. If you are a new customer, please proceed to the Billing & Shipping section.</p>
                        <form action="#" class="d-block">
                            <div class="row">
                                <div class="col-lg-4">
                                    <input type="text" placeholder="Username or Email*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Username or Email*'" required class="common-input mt-10">
                                </div>
                                <div class="col-lg-4">
                                    <input type="password" placeholder="Password*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Password*'" required class="common-input mt-10">
                                </div>
                            </div>
                            <div class="d-flex align-items-center flex-wrap">
                                <button class="view-btn mt-20 mr-20"><span>Login</span></button>
                                <div class="mt-20"><input type="checkbox" class="pixel-checkbox" id="login-1"><label for="login-1">Remember me</label></div>
                            </div>
                        </form>
                        <a href="#" class="mt-10 lost-pass">Lost your password?</a>
                    </div>
                </div>
            </div>
            <div class="checkput-login mt-20">
                <div class="top-title">
                    <p>Have a coupon? <a data-toggle="collapse" href="#checkout-cupon" aria-expanded="false" aria-controls="checkout-cupon">Click here to enter your code</a></p>
                </div>
                <div class="collapse" id="checkout-cupon">
                    <div class="checkout-login-collapse d-flex flex-column">
                        <form action="#" class="d-block">
                            <div class="row">
                                <div class="col-lg-8">
                                    <input type="text" placeholder="Enter coupon code" onfocus="this.placeholder=''" onblur="this.placeholder = 'Enter coupon code'" required class="common-input mt-10">
                                </div>
                            </div>
                            <button class="view-btn mt-20"><span>Apply Coupon</span></button>
                        </form>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- End Checkout Area -->
        <!-- Start Billing Details Form -->
        <div class="container mt-50 pb-60">
            <form id="payment-form" method="POST" action="{{ action('PaymentController@store') }}" class="billing-form" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <!-- <div class="col-lg-9 col-md-6">
                        <h4 class="billing-title mt-20 mb-10">Billing Details</h4>
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="text" placeholder="First name*" onfocus="this.placeholder=''" onblur="this.placeholder = 'First name*'" required class="common-input">
                            </div>
                            <div class="col-lg-6">
                                <input type="text" placeholder="Last name*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Last name*'" required class="common-input">
                            </div>
                            <div class="col-lg-12">
                                <input type="text" placeholder="Company Name" onfocus="this.placeholder=''" onblur="this.placeholder = 'Company Name'" required class="common-input">
                            </div>
                            <div class="col-lg-6">
                                <input type="text" placeholder="Phone number*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Phone number*'" required class="common-input">
                            </div>
                            <div class="col-lg-6">
                                <input type="email" placeholder="Alamat email*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Alamat email*'" required class="common-input">
                            </div>
                            <div class="col-lg-12">
                                <div class="sorting">
                                    <select>
                                        <option value="1">Country*</option>
                                        <option value="1">Default sorting</option>
                                        <option value="1">Default sorting</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <input type="text" placeholder="Address line 01*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Address line 01*'" required class="common-input">
                            </div>
                            <div class="col-lg-12">
                                <input type="text" placeholder="Address line 02*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Address line 02*'" required class="common-input">
                            </div>
                            <div class="col-lg-12">
                                <input type="text" placeholder="Town/City*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Town/City*'" required class="common-input">
                            </div>
                            <div class="col-lg-12">
                                <div class="sorting">
                                    <select>
                                        <option value="1">District*</option>
                                        <option value="1">Default sorting</option>
                                        <option value="1">Default sorting</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <input type="text" placeholder="Postcode/ZIP" onfocus="this.placeholder=''" onblur="this.placeholder = 'Postcode/ZIP'" class="common-input">
                            </div>
                        </div>
                        <div class="mt-20"><input type="checkbox" class="pixel-checkbox" id="login-3"><label for="login-3">Create an account?</label></div>
                        <h4 class="billing-title mt-20 mb-10">Shipping Details</h4>
                        <div class="mt-20"><input type="checkbox" class="pixel-checkbox" id="login-6"><label for="login-6">Ship to a different address?</label></div>
                        <textarea placeholder="Order Notes" onfocus="this.placeholder=''" onblur="this.placeholder = 'Order Notes'" required class="common-textarea"></textarea>
                    </div> -->
                    <div class="col-lg-8 col-md-6 offset-lg-2">
                        <div class="order-wrapper mt-50">
                            <h4 class="billing-title mb-10 semi-bold">Pesanan Anda</h4>
                            <div class="order-list">
                                <div class="list-row d-flex justify-content-between">
                                    <div>Product</div>
                                    <div>Total</div>
                                </div>

                                @foreach ($carts as $cart)
                                <div class="list-row d-flex justify-content-between">
                                    <div>{{ HP::item($cart->item_id)[0]->item_name }}</div>
                                    <div class="qtys semi-bold">x {{ $cart->qty }}</div>
                                    <div>{{HP::currency() }} {{ number_format(HP::item($cart->item_id)[0]->item_purchasefee * $cart->qty, 2)}}</div>
                                </div>
                                @endforeach

                                <div class="list-row d-flex justify-content-between">
                                    <h6 class="semi-bold">Subtotal</h6>
                                    <div>{{HP::currency() }} {{ HP::carttotal() }}</div>
                                </div>
                                <!-- <div class="list-row d-flex justify-content-between">
                                    <h6 class="semi-bold">Shipping</h6>
                                    <div>Flat rate: $50.00</div>
                                </div> -->
                                <div class="list-row d-flex justify-content-between">
                                    <h6 class="semi-bold">Total</h6>
                                    <div class="semi-bold total">{{HP::currency() }} {{ HP::carttotal() }}</div>
                                </div>
                                <!-- <div class="d-flex align-items-center mt-10"><input class="pixel-radio" type="radio" id="check" name="brand"><label for="check" class="bold-lable">Check payments</label></div>
                                <p class="payment-info">Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p> -->

                                <div class="d-flex justify-content-between mt-10">
                                    <div class="d-flex align-items-center">
                                        <input class="pixel-radio paymentmethod" type="radio" name="paymentmethod" value="1" required>
                                        <label for="paypal" class="bold-lable">Paypal</label>
                                    </div>
                                    <img src="img/cart/pm.jpg" alt="" class="img-fluid">
                                </div>
                                <p class="payment-info">Bayar melalui PayPal; Anda dapat membayar dengan kartu kredit Anda jika Anda tidak memiliki akun PayPal.</p>

                                <div class="d-flex justify-content-between mt-10">
                                    <div class="d-flex align-items-center">
                                        <input class="pixel-radio paymentmethod" type="radio" name="paymentmethod" value="2" required>
                                        <label for="paypal" class="bold-lable">Stripe</label>
                                    </div>
                                    <img src="img/cart/pm.jpg" alt="" class="img-fluid">
                                </div>

                                <p class="payment-info">Bayar melalui Stripe; Anda dapat membayar dengan kartu kredit Anda.</p>

                                <div class="form-row">
                                   <!-- <label for="card-element">
                                     Credit or debit card
                                   </label> -->
                                   <div id="card-element">
                                     <!-- A Stripe Element will be inserted here. -->
                                   </div>
                                   <!-- Used to display form errors. -->
                                   <div id="card-errors" role="alert"></div>
                                </div>




                                <div class="mt-20 d-flex align-items-start">
                                    <input type="checkbox" class="pixel-checkbox" id="login-4" required>
                                    <label class="text-black semi-bold" for="login-4">Saya sudah membaca dan menerima <a href="#" class="terms-link">Syarat & Ketentuan*</a></label>
                                </div>

                                <button class="view-btn checkout-btn color-2 w-100 mt-20"><span>Proses Checkout</span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- End Billing Details Form -->
    </div>


    @include('inc.bluefooterbanner')

@endsection
