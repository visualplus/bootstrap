	{!! Html::script('https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js') !!}
	{!! Html::script('js/moment.min.js') !!}
	{!! Html::script('js/bootstrap.min.js') !!}
	{!! Html::script('js/plugins/fullcalendar/fullcalendar.min.js') !!}
	{!! Html::script('js/plugins/fullcalendar/lang-all.js') !!}
	{!! Html::script('js/plugins/jstree/jstree.min.js') !!}
	{!! Html::script('js/plugins/selectize/selectize.min.js') !!}
	
	{!! Html::script('js/app.js') !!}
		
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	
	<script>
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	</script>
</body>
</html>