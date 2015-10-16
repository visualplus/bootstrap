$ = jQuery

$.fn.extend
	deptTree: (options) ->
		# Default settings
		settings =
			options: null
		
		# Merge default settings with options.
		settings = $.extend settings, options
		
		# _Insert magic here._
		return @each () ->
			
			$(this)