$ = jQuery

$.fn.extend
	getUser: (options) ->
		# Default settings
		settings =
			url: ''					# 사용자 가져올 URL
			
			where:					# 사용자 가져올 조건 ( event를 통해 가져옴 )
				type: 'dept_id'		
				value: 1
			
			fire:					# 사용자 가져올 시점
				object: null		#- 이벤트를 발생시키는 오브젝트
			
			target: null			# 사용자 리스트를 그릴 오브젝트
			renerer: 'userlist.default'		# 사용자 리스트에 사용할 view
		
		# Merge default settings with options.
		settings = $.extend settings, options
		
		_get = (ev, data) ->
			# 이벤트에 사용자 가져올 옵션을 넣는다.
			#- type : 	dept_id -> 부서 아이디로 가져옴
			#-			기타 추가할 때 마다 여기다 꼭 넣기!!
			#-
			#- value :	조건에 사용할 값
			
			$.ajax
				url: settings.url
				type: 'GET'
				dataType: 'HTML',
				data: 
					type: data.type
					value: data.value
					renderer: settings.renderer
				success: (html) ->
					settings.target.html html
				error: (e) ->
					console.log e
				
			null
		
		# _Insert magic here._
		return @each () ->
			settings.fire.object.on 'selected.deptlist', _get
			
			$(this)