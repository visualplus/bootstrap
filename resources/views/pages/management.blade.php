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
				<span class='fa fa-list'></span> 사원 리스트
			</div>
			<div class='itembox-body'>
				<div id='worker_list'></div>
			</div>
		</div>
	</div>
</div>
@stop

@section ('script')
<script>
$('#dept_list_tree').on('selected.deptlist', function(ev, param) {
	$.ajax({
		url: "{{ url('user/user') }}",
		data: $.extend(param, {
			renderer: 'userlist.default'
		}),
		dataType: 'html',
		type: 'GET',
		success: function(html) {
			$('#worker_list').html(html);
		},
		error: function(e) {
			console.log(e);
		}
	});
});
</script>
@stop

@include ('utils.user_selector')