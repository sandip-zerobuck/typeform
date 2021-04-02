<?php $this->load->view(ADMIN_VIEW.'header'); ?>

<div class="panel panel-flat">
	<div class="panel-heading">
		<h6 class="panel-title"></h6>
		<div class="heading-elements">
			<label class="col-md-2 control-label">Image:</label>
			<div class="col-md-10">
				<input type="file" class="file-styled image" name="image" >
			</div>
		</div>
	</div><br>

	<div class="panel-body">
		<div class="row">
			<?php
				if( !empty($image) ):
					foreach( $image as $key => $value):
			?>
			<div class="col-lg-3 col-sm-6 image-container">
				<div class="thumbnail">
					<div class="thumb">
						<img src="<?=base_url().GALLERY_UPLOADS.$value->image?>" alt="">
						<div class="caption-overflow">
							<span>
								<a href="<?=base_url().GALLERY_UPLOADS.$value->image?>" data-popup="lightbox" rel="gallery" class="btn border-white text-white btn-flat btn-icon btn-rounded"><i class="icon-plus3"></i></a>
								<a href="<?=BASE_URL_ADMIN.'gallery/delete/'.$value->id?>" class="btn border-white text-white btn-flat btn-icon btn-rounded ml-5 delete"><i class="icon-trash"></i></a>
							</span>
						</div>
					</div>
				</div>
			</div>
			<?php
					endforeach;
				endif;
			?>
		</div>
	</div>	
</div>
<!-- /traffic sources -->
<?php $this->load->view(ADMIN_VIEW.'footer'); ?>

<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/media/fancybox.min.js"></script>

<script type="text/javascript" src="<?=base_url()?>assets/admin/js/plugins/forms/styling/uniform.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('[data-popup="lightbox"]').fancybox({
	       padding: 3
		});
	
		$(".file-styled").uniform({
	        fileButtonHtml: '<i class="icon-googleplus5"></i>',
	        wrapperClass: 'bg-warning',
	    });

	    $(document).on('change','.image',function(){
	    	$(".loader").removeClass('hidden');
	    	var formData = new FormData();
	    	formData.append('image', $('.image')[0].files[0]);

	    	$.ajax({
				url : '<?=BASE_URL_ADMIN?>gallery/add',
				type : 'POST',
				dataType: 'JSON',
				data : formData,
				processData: false,  // tell jQuery not to process the data
				contentType: false,  // tell jQuery not to set contentType
				success : function(response) {
					$(".loader").addClass('hidden');
				    if( response.response ) {
				   		// show_notify(response.msg,'bg-success');
				   		location.reload();
				   	} else {
				   		show_notify(response.msg,'bg-danger');
				   	}
				}
	    	});
	    });

        $(document).off('click','.delete').on('click','.delete',function(e){
            e.preventDefault();
            var self = $(this);
            if( confirm('Are you sure, you want to delete this record?') ) {
                $(".loader").removeClass('hidden');
                var url = self.attr('href');
                $.ajax({
                    url: url,
                    dataType: 'JSON',
                    success: function(response) {
                        if( response.response ) {
                            self.closest('.image-container').remove();
                        }
                        $(".loader").addClass('hidden');
                    }
                });
            }
        });


	});
</script>