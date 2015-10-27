@foreach ($list as $user)
	{!! Form::button($user->name, [
		'class'		=> 'btn btn-default btn-sm user',
		'data-id'	=> $user->id,
		'data-name'	=> $user->name,
		'data-dept_id'	=> $user->dept_id,
	]) !!}
@endforeach