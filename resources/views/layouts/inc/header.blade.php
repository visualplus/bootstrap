@include ('layouts.inc.header_sub')
<header>
	<nav class='navbar navbar-default'>
		<div class='col-xs-12'>
			<div class='container-fluid'>
				<div class='navbar-header text-center'>
					<a class='navbar-brand' href='/'>
						Brand
					</a>
					
					<button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#header-navbar' aria-expanded='false'>
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
			
				<div class='collapse navbar-collapse' id='header-navbar'>
					<ul class='nav navbar-nav navbar-right'>
						<li class='dropdown hidden-sm hidden-xs'>
							<a href='#' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
								<span class='fa fa-bell-o'></span>
							</a>
							<ul class='dropdown-menu'>
								<li>
									<a href='#'></a>
								</li>
							</ul>
						</li>
						<li class='dropdown user-profile hidden-sm hidden-xs'>
							<a href='#' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
								<div class='avatar'>
									<img src='{{ Auth::user()->profileImage() }}' class='img-circle'>
								</div>
								<span class='hidden-sm hidden-xs'>{{ Auth::user()->name }}</span>
							</a>
							
							<ul class='dropdown-menu'>
								<li role='separator' class='divider'></li>
								<li>
									<a href="{{ url('/auth/logout') }}">
										<span class='fa fa-sign-out'></span>&nbsp;&nbsp;로그아웃
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</nav>
</header>