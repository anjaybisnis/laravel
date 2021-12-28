@extends('layouts.app')
@section('content')

<body>

    <!-- Start common-header-sectiion -->
    <section class="common-header-sectiion relative">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row justify-content-center pb-100 pt-100">
                <div class="col-lg-7 text-center relative">
                    <h1 class="text-uppercase text-white pb-20">Keranjang Belanja</h1>
                    <p class="mb-0 text-white menu-nav">
                        <a href="index.php">Beranda</a>
                        <i class="fa fa-caret-right" aria-hidden="true"></i>
                        <a href="index.php">Keranjang Belanja</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- End common-header-sectiion -->

    <!-- Start Cart Area -->
    <div class="cart-section section-gap">
        <div class="container">
            <div class="cart-title">
                <div class="row">
                    <div class="col-md-4">
                        <h6 class="ml-15">Product</h6>
                    </div>
                    <div class="col-md-2">
                        <h6>Price</h6>
                    </div>
                    <div class="col-md-2">
                        <h6>Quantity</h6>
                    </div>
                    <div class="col-md-2">
                        <h6>Total</h6>
                    </div>
                    <div class="col-md-2">
                        <h6>Action</h6>
                    </div>
                </div>
            </div>

            @foreach ($carts as $cart)
            <div class="cart-single-item">
                <div class="row align-items-center cartpage-single-item">
                    <div class="col-md-4 col-12">
                        <div class="product-item d-flex align-items-center">
                            <img class="img-150" src="{{ asset('images/item/' . HP::item($cart->item_id)[0]->thumbnail) }}" class="img-fluid" alt="">
                            <h6 class="ml-30"><a href="{{ url('/item/' . HP::item($cart->item_id)[0]->item_id ) }}">{{ HP::item($cart->item_id)[0]->item_name }}</a></h6>
                        </div>
                    </div>
                    <div class="col-md-2 col-12">
                        <div class="price">{{HP::currency() }} {{HP::item($cart->item_id)[0]->item_purchasefee}}</div>
                    </div>
                    <div class="col-md-2 col-12">
                        <div class="quantity-container d-flex align-items-center mt-15">
                            <div class="arrow-btn d-inline-flex flex-column">
                                <div class="quantity">
                                  <input data-cart-id="{{ $cart->id }}" id="cartquantity" type="number" min="1" max="99" step="1" value="{{ $cart->qty }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-12 cart-item-price">
                        <div class="total">{{HP::currency() }} {{HP::item($cart->item_id)[0]->item_purchasefee * $cart->qty}}</div>
                    </div>
                    <div class="col-md-2 col-12 cart-item-price">
                        <div class="delete">
                            <form id="deleteFrom" action="{{ action('CartController@destroy', $cart->id) }}" method="POST">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="primary-btn red-btn delete-btn "><i class="icon icon-trash"></i></button>
                            </form>
                    </div>
                    </div>
                </div>
            </div>
            @endforeach

            <div class="cupon-area d-flex align-items-center justify-content-between flex-wrap">
                <div class="cuppon-wrap d-flex align-items-center flex-wrap" id="cuppon-wrap">
                    <!-- <div class="cupon-code">
                        <input type="text" placeholder="Coupon Code" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Coupon Code'">
                        <button class="view-btn color-2"><span>Apply</span></button>
                    </div>
                    <a href="#" class="view-btn have-btn ml-10"><span>Close Coupon</span></a> -->
                </div>

                <div class="d-flex align-items-center justify-content-end">
                    <button class="view-btn have-btn ml-10 cart-subtotal"><span>Subtotal : {{HP::currency() }} {{ HP::carttotal() }}</span></button>
                    <!-- <div class="title text-uppercase"></div>
                    <div class="subtotal">$2160.00</div> -->
                </div>

            </div>

            <!-- <div class="shipping-area d-flex justify-content-end">
                <div class="tile text-uppercase">Shipping</div>
                <form action="#" class="d-inline-flex flex-column align-items-end shipping-form">
                    <ul class="d-flex flex-column align-items-end">
                        <li class="filter-list"><label for="flat-rate">Flat Rate:<span>$5.00</span></label><input class="pixel-radio" type="radio" id="flat-rate" name="brand"></li>
                        <li class="filter-list"><label for="free-shipping">Free Shipping</label><input class="pixel-radio" type="radio" id="free-shipping" name="brand"></li>
                        <li class="filter-list"><label for="flat-rate-2">Flat Rate:<span>$10.00</span></label><input class="pixel-radio" type="radio" id="flat-rate-2" name="brand"></li>
                        <li class="filter-list"><label for="local-delivery">Local Delivery:<span>$2.00</span></label><input class="pixel-radio" type="radio" id="local-delivery" name="brand"></li>
                        <li class="calculate mt-20">Calculate Shipping</li>
                    </ul>
                    <div class="sorting">
                        <select>
                            <option value="1">Bangladesh</option>
                            <option value="1">Dhaka</option>
                            <option value="1">Khulna</option>
                            <option value="1">Newyork</option>
                            <option value="1">Uganda</option>
                        </select>
                    </div>
                    <div class="sorting mt-20">
                        <select>
                            <option value="1">State One</option>
                            <option value="1">State Two</option>
                            <option value="1">State Three</option>
                        </select>
                    </div>
                    <input type="text" placeholder="Postcode/Zipcode" onfocus="this.placeholder=''" onblur="this.placeholder = 'Postcode/Zipcode'" required class="form-control mt-20">
                    <button class="view-btn mt-20"><span>Update Details</span></button>
                </form>

            </div> -->
            <div class="checkout-area d-flex justify-content-end">
                <a href="{{ url('/browse/')}}" class="view-btn have-btn"><span>Lanjutkan Belanja</span></a>
                <a href="{{ url('/checkout/')}}" class="view-btn have-btn"><span>Proses Checkout</span></a>
            </div>
        </div>
    </div>
    <!-- End Cart Area -->

    @include('inc.bluefooterbanner')


@endsection
