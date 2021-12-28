<div class="row pb-60">
	<div class="col-lg-12 top-nav-wrap">
		<!-- details Tab navs -->
		<ul class="top-nav d-flex justify-content-center offwhite-color-bg">
		  <!-- <li @if(Request::is('user/' . $userinfo->name)) class="active" @endif>
			<a href="{{ url('user', $userinfo->name )}}">Profile</a>
		  </li>

		  <li @if(Request::is('user/portfolio/*')) class="active" @endif>
			<a href="{{ url('user/portfolio', $userinfo->name )}}">Produk</a>
		  </li>

		  <li @if(Request::is('user/reviews/*')) class="active" @endif>
			<a href="{{ url('user/reviews', $userinfo->name )}}">Reviews</a>
		  </li>

		  <li @if(Request::is('user/earnings/*')) class="active" @endif>
			<a href="{{ url('user/earnings', $userinfo->name )}}">Penghasilan</a>
		  </li>

		  <li @if(Request::is('user/statement/*')) class="active" @endif>
			<a href="{{ url('user/statement', $userinfo->name )}}">Statements</a>
		  </li>

		  <li @if(Request::is('user/downloads/*')) class="active" @endif>
			<a href="{{ url('user/downloads', $userinfo->name )}}">Unduh Produk</a>
		  </li> -->

		  <li @if(Request::is('dashboard/settings/*')) class="active" @endif>
			<a href="{{ url('dashboard/')}}">Dashboard</a>
		  </li>
		  <li @if(Request::is('dashboard/allitems/*')) class="active" @endif>
			<a href="{{ url('dashboard/allitems', $userinfo->name )}}">Semua Produk</a>
		  </li>
		  <li @if(Request::is('dashboard/allusers/*')) class="active" @endif>
			<a href="{{ url('dashboard/allusers', $userinfo->name )}}">Semua Pengguna</a>
		  </li>

		</ul>
	</div>
</div>
