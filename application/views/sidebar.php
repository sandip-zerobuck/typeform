<!-- Main sidebar -->
<div class="sidebar sidebar-main">
	<div class="sidebar-content">

		<!-- User menu -->
		<div class="sidebar-user">
			<div class="category-content">
				<div class="media">
					<a href="<?=BASE_URL_ADMIN?>" class="media-left"><img src="<?=base_url()?>assets/admin/images/placeholder.jpg" class="img-circle img-sm" alt=""></a>
					<div class="media-body">
						<span class="media-heading text-semibold">Admin</span>
					</div>
				</div>
			</div>
		</div>
		<!-- /user menu -->

		


		<!-- Main navigation -->
		<div class="sidebar-category sidebar-category-visible">
			<div class="category-content no-padding">
				<ul class="navigation navigation-main navigation-accordion">
					<li class="
					<?=( ($this->uri->segment(2) == 'index') || ($this->uri->segment(1) == 'index' && $this->uri->segment(1) == '') ) ? 'active' : '' ?>
					">
						<a href="<?=BASE_URL?>"><i class="icon-home4"></i> <span>Dashboard</span></a>
					</li>
			
				</ul>
			</div>
		</div>
		<!-- /main navigation -->

	</div>
</div>
<!-- /main sidebar -->
