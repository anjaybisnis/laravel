@extends('layouts.app')
@section('content')

<body>

    @include('inc.profileheader')

    <!-- Start theme-details -->
    <section class="theme-details pb-60">
        <div class="container">

            @include('inc.profilelinks')

            <div class="row">
                <div class="col-lg-9">
                    <!-- details Tab panes -->
                    <div class="tab-content">
                      <div class="tab-pane active">
                            <!-- Overview section -->
                            <div class="overview-section cover-section">
                                <div class="theme-thumb ">
                                    <?php if($userinfo->cover){ ?>
                                        <img class="img-fluid" src="{{ URL::asset('images/profile/' . $userinfo->cover)}}" alt="Photo">
                                    <?php } else{ ?>
                                        <img class="img-fluid" src="{{ URL::asset('images/default-cover.jpg')}}" alt="Photo">
                                    <?php } ?>
                                </div>
                                <?php if(!empty($userinfo->description)){ ?>
                                    <p class="mt-30 pt-30">{!! $userinfo->description !!} </p>
                                <?php } ?>
                            </div>
                            <!-- Overview section -->
                      </div>
                    </div>

                </div>
                <div class="col-lg-3 sidebar">
                    <div class="single-sidebar theme-tags">
                        <h6 class="text-uppercase">Sosial Media</h6>
                        <div class="sidebar-social">
                            <ul>
                                <li><a href="{{ $userinfo->facebook }}"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="{{ $userinfo->twitter }}"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="{{ $userinfo->github }}"><i class="fa fa-github" aria-hidden="true"></i></a></li>
                                <li><a href="{{ $userinfo->behance }}"><i class="fa fa-behance" aria-hidden="true"></i></a></li>
                                <li><a href="{{ $userinfo->dribble }}"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
                                <li><a href="{{ $userinfo->digg }}"><i class="fa fa-digg" aria-hidden="true"></i></a></li>
                                <li><a href="{{ $userinfo->lastfm }}"><i class="fa fa-lastfm" aria-hidden="true"></i></a></li>
                                <li><a href="{{ $userinfo->reddit }}"><i class="fa fa-reddit" aria-hidden="true"></i></a></li>
                                <!-- <li><a href="{{ $userinfo->thumblr }}"><i class="fa fa-thumblr" aria-hidden="true"></i></a></li> -->
                                <li><a href="{{ $userinfo->vimeo }}"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
                                <!-- <li><a href="{{ $userinfo->devianart }}"><i class="fa fa-devianart" aria-hidden="true"></i></a></li> -->
                                <li><a href="{{ $userinfo->flickr }}"><i class="fa fa-flickr" aria-hidden="true"></i></a></li>
                                <li><a href="{{ $userinfo->google }}"><i class="fa fa-google" aria-hidden="true"></i></a></li>
                                <li><a href="{{ $userinfo->linkedin }}"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                <li><a href="{{ $userinfo->soundcloud }}"><i class="fa fa-soundcloud" aria-hidden="true"></i></a></li>
                                <li><a href="{{ $userinfo->youtube }}"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End theme-details -->


    <!-- Start counter-section -->
    @include('inc.fcounterblue')
    <!-- End counter-section -->


@endsection
