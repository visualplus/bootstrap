@extends ('layouts.default')

@section ('content')
<div class='row'>
	<div class='col-md-3'>
		<div class='itembox'>
			<div class='itembox-body'>
				<div id="calendar"></div>
			</div>
		</div>
	</div>
	
	<div class='col-md-6'>
		<div class='itembox'>
			<div class='itembox-header'>
				123213
			</div>
			<div class='itembox-body'>
				aa<Br/>
				123123
			</div>
			<div class='itembox-footer'>
				er
			</div>
		</div>
	</div>
	
	<div class='col-md-3'>
		<div class='itembox'>
			<div class='itembox-body'>
				1
			</div>
		</div>
	</div>
</div>
@stop

@section ('script')
<script>
$(function() {
	$('#calendar').fullCalendar({
		lang: 'ko',
		selectable: true,
	});
});
</script>
@stop
