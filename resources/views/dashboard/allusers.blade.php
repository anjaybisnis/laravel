@extends('layouts.app')
@section('content')

<body>

    @include('inc.dashboardheader')

    <!-- Start Author Portfolio -->
    <section class="author-portfolio pb-60">
        <div class="container">

            @include('inc.dashboardlinks')

            <div class="row author-portfolio-section">
                <div class="settings-content col-lg-12">
                    <h4>
                        Semua Pengguna
                    </h4>

                    <div class="download-item-list">
                        <?php foreach ($users as $user): ?>
                            <div class="single-item d-flex justify-content-between align-items-center">
                                <div class="item-desc d-flex align-items-center">
                                    <div class="item-thumb mr-20">
                                        <?php if($user->avatar){ ?>
                    						<img class="img-60" src="{{ URL::asset('images/profile/' . $user->avatar)}}" alt="Photo">
                    					<?php } else{ ?>
                    						<img class="img-60" src="{{ URL::asset('images/default-profile.png')}}" alt="Photo">
                    					<?php } ?>
                                    </div>
                                    <div class="details">
                                        <a href="{{ url('user', $user->name ) }}"><h5>{{ $user->name }}</h5></a>
                                        <p class="primary-color mb-0">
                                            <?php if($user->role == 1){
                                                echo "Admin";
                                            }else if($user->role == 2){
                                                echo "User";
                                            }else if($user->role == 3){
                                                echo "Author";
                                            } ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="items-button">
                                    <form  id="deleteFrom" action="{{ action('UserController@destroy', $user->id) }}" method="POST">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button title="Hapus Produk" type="submit" class="primary-btn red-btn delete-btn mr-10"><i class="icon icon-trash"></i></button>
                                    </form>
                                    <a href="#" data-toggle="modal" data-target="#dashboardUpdateUser" data-id="{{ $user->id }}" class="primary-btn user-update-btn mr-10"><i class="icon icon-settings"></i></a>
                                    <a title="Update Userinfo" class="primary-btn mr-10" href="{{ url('user', $user->name ) }}"><i class="icon icon-tag"></i></a>
                                </div>
                            </div>
                        <?php endforeach; ?>


                        <!-- Modal -->
                        <div class="modal fade" id="dashboardUpdateUser" tabindex="-1" role="dialog" aria-labelledby="dashboardUpdateUser" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Update Profil User</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{ action('DashboardController@updateUser', 0) }}" class="billing-form">
                                            @csrf {{ method_field('PUT') }}
                                            <p class="text-center">Leave Field Empty, If Not Necessary.</p>
                                            <input type="hidden" id="userID" name="id">
                                            <div class="row pt-30">
                                                <div class="col-lg-6">
                                                    <span>Username</span>
                                                    <input type="text" id="username" name="username" placeholder="Username" onfocus="this.placeholder=''" onblur="this.placeholder = 'Username'" class="common-input dashboard-username">
                                                </div>
                                                <div class="col-lg-6">
                                                    <span>Email</span>
                                                    <input type="email" id="email" name="email" placeholder="Email" onfocus="this.placeholder=''" onblur="this.placeholder = 'Email'" class="common-input">
                                                </div>
                                                <div class="col-lg-6">
                                                    <span>Password</span>
                                                    <input type="password" id="password" name="password" placeholder="Password" onfocus="this.placeholder=''" onblur="this.placeholder = 'Password'" class="common-input">
                                                </div>
                                                <div class="col-lg-6">
                                                    <span>User Role</span>
                                                    <select id="role" name="role" class="common-input">
                                                        <option value="">Select Role</option>
                                                        <option value="1">Admin</option>
                                                        <option value="2">Buyer</option>
                                                        <option value="3">Seller</option>
                                                        <option value="4">Buyer & Seller</option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-12 text-right">
                                                    <button type="submit" class="primary-btn">Update</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <ul class="pagination d-flex justify-content-center pt-20 pb-20">
                          {{ $users->links() }}
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Author Portfolio -->

    <!-- Start counter-section -->
    @include('inc.fcounterblue')
    <!-- End counter-section -->


@endsection
