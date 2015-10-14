@extends ('layouts.onepage')

@section ('content')
<div class='auth'>
	{!! Form::open() !!}
	<div class='register-form col-md-3 col-sm-12'>
		<div class='panel panel-default'>
			<div class='panel-body'>
				<div class='logo'>
					{!! Html::image('images/logo/logo.png') !!}
				</div>
				
				<div class='form-group'>
					<label for='email' class='property'>이메일</label>
					{!! Form::text('email', old('email'), [
						'id'	=> 'email',
						'class'	=> 'form-control input-sm',
					]) !!}
					
					@if ($errors->has('email'))
					<div class='alert alert-danger alert-sm alert-dismissible' role='alert'>
						<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
							<span aria-hidden='true'>&times;</span>
						</button>
						{{ $errors->first('email') }}
					</div>
					@endif
				</div>
				
				<div class='form-group'>
					<label for='dept_id' class='property'>부서</label>
					{!! Form::select('dept_id', $deptSelectValues, old('dept_id'), [
						'class'	=> 'form-control input-sm',
					]) !!}
				</div>
				
				<div class='form-group'>
					<label for='password' class='property'>비밀번호</label>
					{!! Form::password('password', [
						'id'	=> 'password',
						'class'	=> 'form-control input-sm',
					]) !!}
				</div>
				
				<div class='form-group'>
					<label for='password_confirmation' class='property'>비밀번호 확인</label>
					{!! Form::password('password_confirmation', [
						'id'	=> 'password_confirmation',
						'class'	=> 'form-control input-sm',
					]) !!}
					
					@if ($errors->has('password'))
						<div class='alert alert-danger alert-sm alert-dismissible' role='alert'>
							<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
								<span aria-hidden='true'>&times;</span>
							</button>
							{{ $errors->first('password') }}
						</div>
					@endif
				</div>
				
				<div class='form-group'>
					<label for='name' class='property'>이름</label>
					{!! Form::text('name', old('name'), [
						'id'	=> 'name',
						'class'	=> 'form-control input-sm',
					]) !!}
					
					@if ($errors->has('name'))
						<div class='alert alert-danger alert-sm alert-dismissible' role='alert'>
							<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
								<span aria-hidden='true'>&times;</span>
							</button>
							{{ $errors->first('name') }}
						</div>
					@endif
				</div>
				
				<div class='btn-area'>
					{!! Form::submit('가입', [
						'class'		=> 'btn btn-primary',
					]) !!}
				</div>
			</div>
			
			<div class='panel-footer clearfix'>
				{!! Html::link('/', '취소', [
					'class'		=> 'pull-right',
				]) !!}
			</div>
		</div>
	</div>
	{!! Form::close() !!}
</div>
@stop
