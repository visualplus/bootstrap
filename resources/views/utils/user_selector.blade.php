<div class="modal fade" id="modalUserSelector" tabindex="-1" role="dialog" aria-labelledby="modalUserSelectorLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="modalUserSelectorLabel">사용자 선택</h4>
			</div>
			<div class="modal-body">
				<div class='row'>
					<div class='col-sm-4'>
						@include ('utils.dept_list', ['id' => 'dept_list_from_user_selector', 'viewOnly' => true])
					</div>
					<div class='col-sm-8'>
						<div class='itembox'>
							<div class='itembox-header'>
								<span class='fa fa-user'></span> 사용자
							</div>
							<div class='itembox-body'>
								<div id='user_list'></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary">선택</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">닫기</button>
			</div>
		</div>
	</div>
</div>

@section ('script')
@parent
<script>
$(function() {
	$('#user_list').getUser({
		url: "{{ url('user/user') }}",
		fire: {
			object: $('#dept_list_from_user_selector_tree'),
		},
		renderer: 'userlist.default'
	})
})
</script>
@append
