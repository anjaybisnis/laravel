<div class="row pb-60">
	<div class="col-lg-12 top-nav-wrap">
		<!-- details Tab navs -->
		<ul class="top-nav d-flex justify-content-center offwhite-color-bg">
		  <li @if(Request::is('user/' . $userinfo->name)) class="active" @endif>
			<a href="{{ url('user', $userinfo->name )}}">Profil</a>
		  </li>
		  <li @if(Request::is('user/portfolio/*')) class="active" @endif>
			  <a href="{{ url('user/portfolio', $userinfo->name )}}">Produk</a>
		  </li>

		  	<?php if(HP::eligibleYN($userinfo->id) && $userinfo->role != 2){  ?>
				
				<li @if(Request::is('user/settings/*')) class="active" @endif>
					<a href="{{ url('user/settings', $userinfo->name )}}">Pengaturan</a>
				</li>

				<li @if(Request::is('user/downloads/*')) class="active" @endif>
					<a href="{{ url('user/downloads', $userinfo->name )}}">Unduh Produk</a>
				</li>

		 	<?php } else if(HP::eligibleYN($userinfo->id) && $userinfo->role == 2){ ?>

				<li @if(Request::is('user/settings/*')) class="active" @endif>
	 			  <a href="{{ url('user/settings', $userinfo->name )}}">Pengaturan</a>
	 			</li>

	 			<li @if(Request::is('user/downloads/*')) class="active" @endif>
	 			  <a href="{{ url('user/downloads', $userinfo->name )}}">Unduh Produk</a>
	 			</li>

		 	<?php } if($userinfo->role != 2){ ?>

			  <li @if(Request::is('user/reviews/*')) class="active" @endif>
				<a href="{{ url('user/reviews', $userinfo->name )}}">Ulasan</a>
			  </li>

			<?php } if(HP::eligibleYN($userinfo->id) && $userinfo->role != 2){ ?>

			  <li @if(Request::is('user/earnings/*')) class="active" @endif>
				<a href="{{ url('user/earnings', $userinfo->name )}}">Penghasilan</a>
			  </li>

			  <li @if(Request::is('user/statement/*')) class="active" @endif>
				<a href="{{ url('user/statement', $userinfo->name )}}">Statement</a>
			  </li>

    		<?php } ?>
		</ul>
	</div>
</div>
