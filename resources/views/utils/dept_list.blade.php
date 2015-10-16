<div class='itembox' id='{{ $id }}'>
	<div class='itembox-header'>
		<span class='fa fa-list-ul'></span> 리스트
		<!-- 모바일 숨기기 버튼 -->
		<a class='visible-sm-inline visible-xs-inline'>
			<span class='fa fa-caret-up' id='{{ $id }}_hide_btn'></span>
		</a>
		
		@if ($viewOnly == false)
		<div class='pull-right hidden-sm hidden-xs'>
			<!-- 부서 추가 버튼 -->
			<a id='{{ $id }}_add' href='#'>
				<span class='fa fa-plus-circle'></span>
			</a>&nbsp;
			<!-- 부서 수정 버튼 -->
			<a id='{{ $id }}_rename' href='#'>
				<span class='fa fa-pencil'></span>
			</a>&nbsp;
			<!-- 부서 삭제 버튼 -->
			<a id='{{ $id }}_delete' href='#'>
				<span class='fa fa-trash-o'></span>
			</a>
		</div>
		@endif
	</div>
	<div class='itembox-body'>
		<div id='{{ $id }}_tree'></div>
	</div>
</div>

@section ('script')
@parent
<script>
$('#{{ $id }}_tree').deptTree({
	addBtn: $('#{{ $id }}_add'),
	renameBtn: $('#{{ $id }}_rename'),
	deleteBtn: $('#{{ $id }}_delete'),
	hideBtn: $('#{{ $id }}_hide_btn'),
	baseURL: "{{ url('department') }}",
});
</script>
@append
