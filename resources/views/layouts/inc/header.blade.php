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
						<li>
							{!! Html::link('page/management', '부서/사원 관리') !!}
						</li>
						<li>
							{!! Html::link('page/document', '전자결재') !!}
						</li>
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
						<li class='hidden-md hidden-lg'>
							{!! Html::link('auth/logout', '로그아웃') !!}
						</li>
						<li class='dropdown user-profile hidden-sm hidden-xs'>
							<!-- pc용 사용자 메뉴 -->
							<a href='#' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
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