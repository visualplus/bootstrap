<!DOCTYPE html>
<html lang="ko">
<head>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Bootstrap 101 Template</title>
	
	{!! Html::style('css/app.css') !!}
	{!! Html::style('css/font-awesome.min.css') !!}
	{!! Html::style('css/plugins/fullcalendar/fullcalendar.min.css') !!}
	{!! Html::style('css/plugins/jstree/style.min.css') !!}
	{!! Html::style('css/plugins/selectize/selectize.default.css') !!}
</head>
<body>