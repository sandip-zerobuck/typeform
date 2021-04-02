<?php $this->load->view(ADMIN_VIEW.'header'); ?>

<div class="panel panel-flat">
	<div class="panel-heading">
		<h4 class="panel-title">Information</h4>
	</div>

	<div class="summernote">
		<?php
			if( !empty($data) ) {
				echo htmlspecialchars_decode($data[0]->body);
			}
		?>
	</div><br>
	<button type="button" class="btn btn-success btn-save">Save</button>
</div>

<?php $this->load->view(ADMIN_VIEW.'footer'); ?>

<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/editors/summernote/summernote.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('.summernote').summernote();

		$(document).off('click','.btn-save').on('click','.btn-save',function(){
			$(".loader").removeClass('hidden');
			$.ajax({
				url: '<?=BASE_URL_ADMIN?>home/information/save',
				type: 'POST',
				dataType: 'JSON',
				data: {
					data: $(".note-editable").html(),
					submit: true
				},
				success: function(response){
					$(".loader").addClass('hidden');
					if( response.response ) {
						show_notify( response.msg, 'bg-success');
					} else {
						show_notify( response.msg, 'bg-danger');
					}
				}
			});
		});
	});
</script>