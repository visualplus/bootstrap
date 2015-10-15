<div class='itembox' id='dept_list'>
	<div class='itembox-header'>
		<span class='fa fa-list-ul'></span> 리스트
		<!-- 모바일 숨기기 버튼 -->
		<a href='javascript: toggleTree();' class='visible-sm-inline visible-xs-inline'>
			<span class='fa fa-caret-up' id='dept_list_hide_btn'></span>
		</a>
			
		<div class='pull-right hidden-sm hidden-xs'>
			<!-- 부서 추가 버튼 -->
			<a href='javascript: dept_create();'>
				<span class='fa fa-plus-circle'></span>
			</a>&nbsp;
			<!-- 부서 수정 버튼 -->
			<a href='javascript: dept_rename();'>
				<span class='fa fa-pencil'></span>
			</a>&nbsp;
			<!-- 부서 삭제 버튼 -->
			<a href='javascript: dept_delete();'>
				<span class='fa fa-trash-o'></span>
			</a>
		</div>
	</div>
	<div class='itembox-body'>
		<div id='dept_list_tree'></div>
	</div>
</div>

@section ('script')
@parent
<script>
$('#dept_list_tree').deptTree();

/*
$(function() {
	// 트리 뷰 만들기
	$('#dept_list_tree').jstree({
		'core': {
			'check_callback': function (operation, node, parent, position, more) {
				return true;
			},
			'data': {
				'url': function (node) {
					var url = node.id === '#' ? 
						"{{ url('department/') }}" : 
						"{{ url('department/') }}" + node.id;
					
					return url;
				}
			}
		},
		'plugins': [
			'contextmenu', 'search', 'state', 'types', 'wholerow'
		]
	});
	
	$('#dept_list_tree').on('rename_node.jstree', function(ev, node, parent, position) {
		var ref = $('#department_list').jstree(true);
		var node_id = node.node.id;
		var parent = ref.get_parent(node_id);
		
		if (node.node.original.created) {
			// 부서 추가
			node.node.original.created = false;
			if (node.node.text == '') {
				dept_delete(node_id);
				return false;
			}
			
			$.ajax({
				url: "{{ url('department') }}",
				type: 'POST',
				dataType: 'json',
				data: {
					p_id: node.node.parent,
					dept_name: node.node.text
				},
				success: function(json) {
					ref.refresh(parent);
				},
				error: function(e) {
					console.log(e);
				}
			});
		} else {
			// 부서 수정
			if (node.node.text == '') {
				return false;
			}
			
			$.ajax({
				url: "{{ url('department') }}/" + node_id,
				type: 'POST',
				data: {
					'_method': 'PUT',
					dept_name: node.node.text
				},
				dataType: 'json',
				success: function(json) {
					
				}
			});
		}
	});
});

// 부서 추가
function dept_create() {
	var ref = $('#dept_list_tree').jstree(true),
		sel = ref.get_selected();
	
	if (!sel.length) { return false; }
	
	sel = sel[0];
	sel = ref.create_node(sel, {'text': '', 'created': true});
	
	if (sel) {
		ref.edit(sel);
	}
}

// 부서 수정
function dept_rename() {
	var ref = $('#dept_list_tree').jstree(true),
		sel = ref.get_selected();
		
	if (!sel.length) { return false; }
	
	sel = sel[0];
	ref.edit(sel);
}

// 부서 삭제
function dept_delete(sel) {
	var ref = $('#dept_list_tree').jstree(true),
		sel = typeof sel !== 'undefined' ? sel : ref.get_selected();
		
	if (!sel.length) { return false; }
	if (ref.get_parent(sel) == '#') { return false; }
	
	$.ajax({
		url: "{{ url('department') }}/" + sel,
		type: 'POST',
		data: {
			'_method': 'DELETE'
		},
		dataType: 'json',
		success: function(json) {
			ref.delete_node(sel);
		},
		error: function(e) {
			console.log(e);
		}
	});
}

// 부서 리스트 보이기 / 숨기기
function toggleTree() {
	var $dept_list_div = $('#dept_list .itembox-body');
	var $dept_list_hide_btn = $('#dept_list_hide_btn'); 
	console.log($dept_list_hide_btn);
	if ($dept_list_div.hasClass('hidden')) {
		$dept_list_div.removeClass('hidden');
		
		$dept_list_hide_btn.removeClass('fa-caret-down').addClass('fa-caret-up');
	} else {
		$dept_list_div.addClass('hidden');
		
		$dept_list_hide_btn.removeClass('fa-caret-up').addClass('fa-caret-down');
	}
}
*/
</script>
@append
