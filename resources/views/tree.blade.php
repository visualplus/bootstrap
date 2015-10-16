@extends ('layouts.default')

@section ('content')
<div class='row'>
	<div class='col-sm-4 col-md-3 col-lg-2'>
		@include ('utils.dept_list', ['id' => 'dept_list', 'viewOnly' => false])
	</div>
	<div class='col-sm-6 col-md-9 col-lg-10'>
		<div class='itembox'>
			<div class='itembox-header'>
				<span class='fa fa-gear'></span> 설정
			</div>
			<div class='itembox-body'>
				{!! Form::button('test', [
					'class'			=> 'btn btn-primary btn-sm',
					'data-toggle'	=> 'modal',
					'data-target'	=> '#modalUserSelector'
				]) !!}
			</div>
		</div>
		
		<div class='itembox'>
			<div class='itembox-header'>
				1
			</div>
			<div class='itembox-body'>
				123
			</div>
		</div>
	</div>
</div>

@include ('utils.user_selector')
@stop

@section ('script')
<script>

</script>
@stop
