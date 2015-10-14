@extends ('layouts.default')

@section ('content')
<div class='row'>
	<div class='col-sm-2'>
		<div class='itembox'>
			<div class='itembox-header'>
				<span class='fa fa-list-ul'></span> 부서 리스트
				<div class='pull-right'>
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
				<div id='department_list'></div>
			</div>
		</div>
	</div>
	<div class='col-sm-10'>
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
@stop

@section ('script')
<script>
$(function() {
	$('#department_list').jstree({
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
			'contextmenu', 'dnd', 'search', 'state', 'types', 'wholerow'
		]
	});
	
	$('#department_list').on('rename_node.jstree', function(ev, node, parent, position) {
		console.log(node);
		if (node.text === '') {
		} else {
			
		}
	});
});

// 부서 추가
function dept_create() {
	var ref = $('#department_list').jstree(true),
		sel = ref.get_selected();
	
	if (!sel.length) { return false; }
	
	sel = sel[0];
	sel = ref.create_node(sel, {'text': ''});
	
	if (sel) {
		ref.edit(sel);
	}
}

// 부서 수정
function dept_rename() {
	var ref = $('#department_list').jstree(true),
		sel = ref.get_selected();
		
	if (!sel.length) { return false; }
	
	sel = sel[0];
	ref.edit(sel);
}
</script>
@stop
