@extends ('layouts.onepage')

@section ('content')
<div class='auth'>
	{!! Form::open() !!}
	<div class='login-form col-md-3 col-sm-12'>
		<div class='panel panel-default'>
			<div class='panel-body'>
				<div class='logo'>
					{!! Html::image('images/logo/logo.png') !!}
				</div>
				
				<div class='form-group'>
					<label for='email' class='property'>사용자 이메일</label>
					{!! Form::text('email', old('email'), [
						'id'	=> 'email',
						'class' => 'form-control input-sm',
					]) !!}
				</div>
				
				<div class='form-group'>
					<label for='password' class='property'>비밀번호</label>
					{!! Form::password('password', [
						'id'	=> 'password',
						'class'	=> 'form-control input-sm',
					]) !!}
				</div>
				
				<div class='checkbox'>
					<label>
						{!! Form::checkbox('remember') !!}로그인 정보 기억하기
					</label>
				</div>
				
				@if ($errors->count() > 0)
				<div class='alert alert-danger alert-sm alert-dismissible' role='alert'>
					<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
						<span aria-hidden='true'>&times;</span>
					</button>
					사용자 이메일 혹은 비밀번호를 잘못 입력하셨습니다.
				</div>
				@endif
				
				<div class='btn-area'>
					{!! Form::submit('로그인', [
						'class'		=> 'btn btn-primary',
					]) !!}
				</div>
			</div>
			
			<div class='panel-footer clearfix'>
				{!! Html::link('auth/register', '가입하기', [
					'class'		=> 'pull-right',
				]) !!}
			</div>
		</div>
	</div>
	{!! Form::close() !!}
</div>
@stop