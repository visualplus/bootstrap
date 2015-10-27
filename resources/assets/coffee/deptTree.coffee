$ = jQuery

$.fn.extend
	deptTree: (options) ->
		# Default settings
		settings =
			addBtn: null		# 노드 추가 버튼
			renameBtn: null		# 노드 수정 버튼
			deleteBtn: null		# 노드 삭제 버튼
			hideBtn: null		# 노드 리스트 숨기기 버튼
			baseURL: null		# 기본 url
		
		# Merge default settings with options.
		settings = $.extend settings, options
		
		baseURL = settings.baseURL
		
		# 노드 추가
		add = () ->
			jstree = settings.jstree
			sel = jstree.get_selected()
			
			if sel.length <= 0 then return false
			
			sel = sel[0]
			
			opts = 
				text: ''
				created: yes
				
			jstree.edit jstree.create_node sel, opts
			
			null
			
		# 노드 수정
		rename = () ->
			jstree = settings.jstree
			sel = jstree.get_selected()
			
			if sel.length <= 0 then return false
			
			sel = sel[0]
			
			jstree.edit sel
			
			null
			
		# 노드 삭제
		_del = (sel) ->
			jstree = settings.jstree
			 
			$.ajax
				url: baseURL + '/' + sel
				type: 'POST'
				data:
					'_method': 'DELETE'
				dataType: 'JSON'
				success: (json) ->
					jstree.delete_node sel
				error: (e) ->
					console.log e
					
		del = () ->
			jstree = settings.jstree
			sel = jstree.get_selected()
			parent = jstree.get_parent sel
			
			if sel.length <= 0 then return false
			if parent is '#' then return false
			
			_del sel
			
			null
		
		# _Insert magic here._
		return @each () ->	
			# 트리뷰로 만들기
			$(this).jstree
				core:
					check_callback: (operation, node, parent, position, more) ->
						true
					data:
						url: (node) ->
							if node.id is '#' then baseURL else baseURL + node.id
				
				plugins: [
					'contextmenu', 'search', 'state', 'types', 'wholerow'
				]
			
			settings.jstree = $(this).jstree true
			settings.object = $(this)
				
			$(this).on 'rename_node.jstree', (ev, node, parent, position) ->
				jstree 	= settings.jstree
				node_id = node.node.id
				parent 	= jstree.get_parent node_id
				
				if node.node.original.created is yes
					# 부서 추가
					node.node.original.created = no
					
					if node.node.text is ''
						_del node_id
						return false
					
					$.ajax
						url: baseURL
						type: 'POST'
						dataType: 'JSON'
						data:
							p_id: node.node.parent
							dept_name: node.node.text
						success: (json) ->
							jstree.refresh parent
						error: (e) ->
							console.log e
							
				else
					# 부서 수정
					if node.node.text is ''
						return false
					
					$.ajax
						url: baseURL + '/' + node_id
						type: 'POST'
						data:
							'_method': 'PUT'
							dept_name: node.node.text
						dataType: 'JSON'
						
			$(this).on 'select_node.jstree', (ev, node, selected, event) ->
				opts = 
					type: 'dept_id'
					value: node.node.id
				
				settings.object.trigger 'selected.deptlist', opts
				null
			
			if settings.addBtn.size() > 0
				settings.addBtn.on 'click', add
			
			if settings.renameBtn.size() > 0			
				settings.renameBtn.on 'click', rename
				
			if settings.deleteBtn.size() > 0
				settings.deleteBtn.on 'click', del
			
			settings.hideBtn.on 'click', () ->
				body = settings.object.closest('.itembox-body')
				body.toggleClass 'hidden'
				
				if body.hasClass 'hidden'
					$(this).removeClass 'fa-caret-up'
					$(this).addClass 'fa-caret-down'
				else
					$(this).removeClass 'fa-caret-down'
					$(this).addClass 'fa-caret-up'
			
			$(this)