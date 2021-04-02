<?php $this->load->view(ADMIN_VIEW.'header'); ?>

<div class="panel panel-flat">
	<div class="panel-heading">
		<h4 class="panel-title">Coin Rate</h4>
		<div class="heading-elements"></div><br>
	</div>

	<div class="panel-body">
		
			<div class="row">

				<div class="col-md-4">
					<form method="post" action="<?=BASE_URL_ADMIN?>coin_rate/Coin_rate/update" >
						<input type="hidden" name="id" value="<?=$imgae_rate->id?>">
					<label class="col-md-12 control-label"><b>Image : <span class="text-danger">*</span></b></label>
					<div class="col-md-12">
						<input type="number" name="coin" class="form-control" placeholder="Image Coin" value="<?=$imgae_rate->coin?>">
						<?=form_error('coin', '<div class="text-danger">', '</div>'); ?>
					</div>
					<div class="col-md-12">
						<br>
						<input type="date"  name="date" value="<?=$imgae_rate->date?>"  class="form-control">	
						<?=form_error('date', '<div class="text-danger">', '</div>'); ?>
					</div>

					<div class="col-md-12">
						<br>
						<select class="select form-control" name="status">
						<option value="1"
							<?php
								if( $imgae_rate->status == 1 ) {
									echo 'selected';
								}
							?>
						>Active</option>
						<option value="0"
							<?php
								if( $imgae_rate->status == 0 ) {
									echo 'selected';
								}
							?>
						>Inactive</option>

					</select>
					<?=form_error('status', '<div class="text-danger">', '</div>'); ?>
					</div>

					<div class="col-md-12">
						<br>
						<input type="submit" value="Submit" class="btn btn-primary">
					</div>
				</form>
				</div>

				<div class="col-md-4">
					<form method="post" action="<?=BASE_URL_ADMIN?>coin_rate/Coin_rate/update" >
						<input type="hidden" name="id" value="<?=$link_rate->id?>">
					<label class="col-md-12 control-label"><b>Link : <span class="text-danger">*</span></b></label>
					<div class="col-md-12">
						<input type="number" name="coin" class="form-control" placeholder="Link Coin" value="<?=$link_rate->coin?>">
						<?=form_error('coin', '<div class="text-danger">', '</div>'); ?>
					</div>
					<div class="col-md-12">
						<br>
						<input type="date"  name="date" value="<?=$link_rate->date?>"  class="form-control">	
						<?=form_error('date', '<div class="text-danger">', '</div>'); ?>
					</div>

					<div class="col-md-12">
						<br>
						<select class="select form-control" name="status">
						<option value="1"
							<?php
								if( $link_rate->status == 1 ) {
									echo 'selected';
								}
							?>
						>Active</option>
						<option value="0"
							<?php
								if( $link_rate->status == 0 ) {
									echo 'selected';
								}
							?>
						>Inactive</option>

					</select>
					<?=form_error('status', '<div class="text-danger">', '</div>'); ?>
					</div>

					<div class="col-md-12">
						<br>
						<input type="submit" value="Submit" class="btn btn-primary">
					</div>
				</form>
				</div>

				<div class="col-md-4">
					<form method="post" action="<?=BASE_URL_ADMIN?>coin_rate/Coin_rate/update" >
						<input type="hidden" name="id" value="<?=$video_rate->id?>">
					<label class="col-md-12 control-label"><b>Video : <span class="text-danger">*</span></b></label>
					<div class="col-md-12">
						<input type="number" name="coin" class="form-control" placeholder="Video Coin" value="<?=$video_rate->coin?>">
						<?=form_error('coin', '<div class="text-danger">', '</div>'); ?>
					</div>
					<div class="col-md-12">
						<br>
						<input type="date"  name="date" value="<?=$video_rate->date?>"  class="form-control">	
						<?=form_error('date', '<div class="text-danger">', '</div>'); ?>
					</div>

					<div class="col-md-12">
						<br>
						<select class="select form-control" name="status">
						<option value="1"
							<?php
								if( $video_rate->status == 1 ) {
									echo 'selected';
								}
							?>
						>Active</option>
						<option value="0"
							<?php
								if( $video_rate->status == 0 ) {
									echo 'selected';
								}
							?>
						>Inactive</option>

					</select>
					<?=form_error('status', '<div class="text-danger">', '</div>'); ?>
					</div>

					<div class="col-md-12">
						<br>
						<input type="submit" value="Submit" class="btn btn-primary">
					</div>
				</form>
				</div>
			</div>

		</form>
	</div>
</div>
<!-- /traffic sources -->
<?php $this->load->view(ADMIN_VIEW.'footer'); ?>	