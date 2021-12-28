@extends('layouts.app')
@section('content')

<body>

    @include('inc.profileheader')

    <!-- Start Author Settings -->
    <section class="user-settings pb-60">
        <div class="container">

            @include('inc.profilelinks')

            <!-- Start Review Settings -->
            <div class="row">
                <div class="settings-content col-lg-12">
                    <h4>
                        Ulasan Pembeli
                    </h4>
                    <div class="row">
                        <?php $i=0; foreach($reviews as $review){ $i++; ?>
                        <div class="col-lg-6 col-md-6 pb-50">
                            <div class="single-buyer-review">
                                <div class="review-top d-flex align-items-center">
                                    <div class="thumb-wrap">
                                        <?php if( HP::user($review->userID) !=false ){ ?>
                                            <img class="mr-3 img-60" src="{{ URL::asset('images/profile/' . HP::user($review->userID)->avatar)}}" alt="">
                                        <?php }else{ ?>
                                            <img class="img-60" src="{{ URL::asset('images/default.png')}}" alt="Photo">
                                        <?php } ?>
                                    </div>
                                    <div class="detail-meta ml-10">
                                        <a href="#" class="d-flex">
                                            <h5 class="semi-bold"><?php
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
                                            ?></h5>
                                            <div class="star ml-30">
                                                <?php if($review->point == 1){ ?>

                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star "></span>
                                                    <span class="fa fa-star "></span>
                                                    <span class="fa fa-star "></span>
                                                    <span class="fa fa-star "></span>

                                                <?php }else if($review->point == 2){ ?>

                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star "></span>
                                                    <span class="fa fa-star "></span>
                                                    <span class="fa fa-star "></span>

                                                <?php }else if($review->point == 3){ ?>

                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>

                                                <?php }else if($review->point == 4){ ?>

                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star"></span>

                                                <?php }else if($review->point == 5){ ?>

                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>

                                                <?php }else{ ?>

                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>

                                                <?php } ?>

                                            </div>
                                        </a>
                                        <p class="metas mb-0">Reviewed by {{ HP::user($review->userID)->name }} on <span>{{ date('d F Y')}}</span></p>
                                    </div>
                                </div>
                                <div class="comment mt-20">
                                    <p>
                                        {{ strip_tags($review->content) }}
                                    </p>
                                </div>
                            </div>
                            </div>
                            <?php } ?>



                        <div class="col-lg-12 col-md-12">
                            <ul class="pagination d-flex justify-content-center pt-20 pb-20">
                              {{ $reviews->links() }}
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
            <!-- End Review Settings -->
        </div>
    </section>
    <!-- End Author Settings -->


    <!-- Start counter-section -->
    @include('inc.fcounterblue')
    <!-- End counter-section -->


@endsection
