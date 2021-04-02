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
					<?=( ($this->uri->segment(2) == 'dashboard') || ($this->uri->segment(1) == 'admin' && $this->uri->segment(2) == '') ) ? 'active' : '' ?>
					">
						<a href="<?=BASE_URL_ADMIN?>"><i class="icon-home4"></i> <span>Dashboard</span></a>
					</li>

					<?php if($this->session->userdata('admin_type') == 'admin') { ?>

					<li class="<?=($this->uri->segment(2) == 'subadmin') ? 'active' : '' ?>">
						<a href="<?=BASE_URL_ADMIN?>subadmin/index"><i class="icon-stack-empty"></i> <span>Sub Admin</span></a>
					</li>

					<li class="<?=($this->uri->segment(2) == 'todaylogin') ? 'active' : '' ?>">
						<a href="<?=BASE_URL_ADMIN?>todaylogin/index"><i class="icon-watch2"></i> <span>Today Login User</span></a>
					</li>

					<li class="<?=($this->uri->segment(2) == 'covid') ? 'active' : '' ?>">
						<a href="<?=BASE_URL_ADMIN?>covid/covid"><i class="icon-bug2"></i> <span>Covid-19 Update</span></a>
					</li>

					<?php } ?>

					<?php if($this->crud->is_admin_authorized(DRAW)) { ?>

					<li class="<?=($this->uri->segment(2) == 'home') ? 'active' : '' ?>">
						<a href="javascript:void(0)"><i class="icon-gift"></i> <span>Draw</span></a>
						<ul>
							
							

							<li class="<?=($this->uri->segment(2) == 'draw' && $this->uri->segment(3) == 'index') ? 'active' : '' ?>">
								<a href="<?=BASE_URL_ADMIN?>draw/index"><i class="icon-gift"></i>Draw</a>
							</li>


							
						</ul>
					</li>

				<?php } ?>

					<!-- <?php if($this->session->userdata('admin_type') == 'admin') { ?>

					<li class="<?=($this->uri->segment(2) == 'coin_rate') ? 'active' : '' ?>">
						<a href="<?=BASE_URL_ADMIN?>coin_rate/coin_rate"><i class="icon-stack-empty"></i> <span>Coin Rate</span></a>
					</li>

					<?php } ?> -->


					<?php if($this->crud->is_admin_authorized(IMAGEMASTER) || $this->crud->is_admin_authorized(VIDEOMASTER) || $this->crud->is_admin_authorized(LINKMASTER)) {  ?>
					<li class="<?=($this->uri->segment(2) == 'home') ? 'active' : '' ?>">
						<a href="javascript:void(0)"><i class="icon-puzzle3"></i> <span>Campings</span></a>
						<ul>

							<?php if($this->crud->is_admin_authorized(IMAGEMASTER)) { ?>
							<li class="navigation-header"><span>Image Master</span> <i class="icon-menu" title="Main pages"></i></li>
							

							<li class="<?=(($this->uri->segment(3) == 'imagemaster') && $this->uri->segment(4) == '') ? 'active' : '' ?>">
								<a href="<?=BASE_URL_ADMIN?>campingmaster/imagemaster"><i class="icon-stack-empty"></i> Running Image Ads</a>
							</li>

							<li class="<?=($this->uri->segment(4) == 'complatedimage') ? 'active' : '' ?>">
								<a href="<?=BASE_URL_ADMIN?>campingmaster/imagemaster/complatedimage"><i class="icon-stack-empty"></i> Complated Image Ads</a>
							</li>

							<li class="<?=($this->uri->segment(4) == 'waitingimage') ? 'active' : '' ?>">
								<a href="<?=BASE_URL_ADMIN?>campingmaster/imagemaster/waitingimage"><i class="icon-stack-empty"></i> Waiting Image Ads</a>
							</li>

							<?php } ?>


							<?php if($this->crud->is_admin_authorized(VIDEOMASTER)) { ?>
							<li class="navigation-header"><span>Video Master</span> <i class="icon-menu" title="Main pages"></i></li>

							<li class="<?=(($this->uri->segment(3) == 'videomaster') && $this->uri->segment(4) == '') ? 'active' : '' ?>">
								<a href="<?=BASE_URL_ADMIN?>campingmaster/videomaster"><i class="icon-presentation"></i> Running Video Ads</a>
							</li>

							<li class="<?=($this->uri->segment(4) == 'complatedvideo') ? 'active' : '' ?>">
								<a href="<?=BASE_URL_ADMIN?>campingmaster/videomaster/complatedvideo"><i class="icon-presentation"></i> Complated Video Ads</a>
							</li>

							<li class="<?=($this->uri->segment(4) == 'waitingvideo') ? 'active' : '' ?>">
								<a href="<?=BASE_URL_ADMIN?>campingmaster/videomaster/waitingvideo"><i class="icon-presentation"></i> Waiting Video Ads</a>
							</li>

							<?php } ?>

							<?php if($this->crud->is_admin_authorized(LINKMASTER)) { ?>

							<li class="navigation-header"><span>Link Master</span> <i class="icon-menu" title="Main pages"></i></li>

							<li class="<?=(($this->uri->segment(3) == 'linkmaster') && $this->uri->segment(4) == '') ? 'active' : '' ?>">
								<a href="<?=BASE_URL_ADMIN?>campingmaster/linkmaster"><i class="icon-magic-wand"></i> Running Link Ads</a>
							</li>

							<li class="<?=($this->uri->segment(4) == 'complatedlink') ? 'active' : '' ?>">
								<a href="<?=BASE_URL_ADMIN?>campingmaster/linkmaster/complatedlink"><i class="icon-magic-wand"></i> Complated Link Ads</a>
							</li>

							<li class="<?=($this->uri->segment(4) == 'waitinglink') ? 'active' : '' ?>">
								<a href="<?=BASE_URL_ADMIN?>campingmaster/linkmaster/waitinglink"><i class="icon-magic-wand"></i> Waiting Link Ads</a>
							</li>

							<?php } ?>

							<?php if($this->crud->is_admin_authorized(APPLINKMASTER)) { ?>

							<li class="navigation-header"><span>App Link Master</span> <i class="icon-menu" title="Main pages"></i></li>

							<li class="<?=(($this->uri->segment(3) == 'applinkmaster') && $this->uri->segment(4) == '') ? 'active' : '' ?>">
								<a href="<?=BASE_URL_ADMIN?>campingmaster/applinkmaster"><i class="icon-android"></i> Running App Link Ads</a>
							</li>

							<li class="<?=($this->uri->segment(4) == 'complatedapplink') ? 'active' : '' ?>">
								<a href="<?=BASE_URL_ADMIN?>campingmaster/applinkmaster/complatedapplink"><i class="icon-android"></i> Complated App Link Ads</a>
							</li>

							<li class="<?=($this->uri->segment(4) == 'waitingapplink') ? 'active' : '' ?>">
								<a href="<?=BASE_URL_ADMIN?>campingmaster/applinkmaster/waitingapplink"><i class="icon-android"></i> Waiting App Link Ads</a>
							</li>

							<?php } ?>
							
						</ul>
					</li>

					<li class="<?=($this->uri->segment(2) == 'home') ? 'active' : '' ?>">
						<a href="javascript:void(0)"><i class="icon-alert"></i> <span>Ads Alert </span></a>
						<ul>

							<li class="<?=(($this->uri->segment(2) == 'ads_alert_limit') || $this->uri->segment(2) == 'Ads_alert_limit') ? 'active' : '' ?>">
								<a href="<?=BASE_URL_ADMIN?>ads_alert_limit"><i class=" icon-notification2"></i> Ads Alert Limit</a>
							</li>

							<?php if($this->crud->is_admin_authorized(IMAGEMASTER)) { ?>
							<li class="<?=(($this->uri->segment(3) == 'imagealert') || $this->uri->segment(3) == 'Imagealert') ? 'active' : '' ?>">
								<a href="<?=BASE_URL_ADMIN?>ads_alert/imagealert"><i class="icon-stack-empty"></i> Image Ads Alert</a>
							</li>

							<?php } ?>


							<?php if($this->crud->is_admin_authorized(VIDEOMASTER)) { ?>
							<li class="<?=(($this->uri->segment(3) == 'videoalert') || $this->uri->segment(3) == 'Videoalert') ? 'active' : '' ?>">
								<a href="<?=BASE_URL_ADMIN?>ads_alert/videoalert"><i class="icon-presentation"></i> Video Ads Alert</a>
							</li>

							<?php } ?>

							<?php if($this->crud->is_admin_authorized(LINKMASTER)) { ?>
							<li class="<?=(($this->uri->segment(3) == 'linkalert') || $this->uri->segment(3) == 'Linkalert') ? 'active' : '' ?>">
								<a href="<?=BASE_URL_ADMIN?>ads_alert/linkalert"><i class="icon-magic-wand"></i> Link Ads Alert</a>
							</li>

							<?php } ?>

							<?php if($this->crud->is_admin_authorized(APPLINKMASTER)) { ?>
							<li class="<?=(($this->uri->segment(3) == 'applinkalert') || $this->uri->segment(3) == 'Applinkalert') ? 'active' : '' ?>">
								<a href="<?=BASE_URL_ADMIN?>ads_alert/applinkalert"><i class="icon-android"></i> Link Ads Alert</a>
							</li>

							<?php } ?>
							
						</ul>
					</li>

					<li class="<?=($this->uri->segment(2) == 'home') ? 'active' : '' ?>">
						<a href="javascript:void(0)"><i class="icon-cash3"></i> <span>Coin to Cash </span></a>
						<ul>
							<li class="<?=(($this->uri->segment(3) == 'cashlimit') && ($this->uri->segment(2) == 'cointocash') || $this->uri->segment(3) == 'Cashlimit') ? 'active' : '' ?>">
								<a href="<?=BASE_URL_ADMIN?>cointocash/cashlimit"><i class="  icon-cash3"></i> Coin To Cash Limit</a>
							</li>
							<li class="<?=(($this->uri->segment(3) == 'request') && ($this->uri->segment(2) == 'cointocash') || $this->uri->segment(3) == 'Request') ? 'active' : '' ?>">
								<a href="<?=BASE_URL_ADMIN?>cointocash/request"><i class="  icon-git-pull-request"></i> Request</a>
							</li>
						</ul>
					</li>

				<?php } ?>

				

					<?php if($this->crud->is_admin_authorized(USERMASTER)) { ?>
					<li class="<?=($this->uri->segment(2) == 'home') ? 'active' : '' ?>">
						<a href="javascript:void(0)"><i class="icon-collaboration"></i> <span>User Master</span></a>
						<ul>

														
							<li class="<?=($this->uri->segment(3) == 'usermaster') ? 'active' : '' ?>">
								<a href="<?=BASE_URL_ADMIN?>usermaster/usermaster"><i class="icon-users2"></i> Users</a>
							</li>

							<li class="<?=($this->uri->segment(3) == 'walletmaster') ? 'active' : '' ?>">
								<a href="<?=BASE_URL_ADMIN?>walletmaster/walletmaster"><i class="icon-piggy-bank"></i> User Wallet</a>
							</li>

							<li class="<?=($this->uri->segment(2) == 'transfercoin') ? 'active' : '' ?>">
								<a href="<?=BASE_URL_ADMIN?>transfercoin"><i class="icon-database4"></i> <span>User Transfer Coin History</span></a>
							</li>

							<li class="<?=($this->uri->segment(2) == 'referbonus') ? 'active' : '' ?>">
								<a href="<?=BASE_URL_ADMIN?>referbonus"><i class="icon-coins"></i> <span>Refer Bonus</span></a>
							</li>

							<li class="<?=($this->uri->segment(2) == 'signupbonus') ? 'active' : '' ?>">
								<a href="<?=BASE_URL_ADMIN?>signupbonus"><i class="icon-coins"></i> <span>Signup Bonus</span></a>
							</li>

							<li class="<?=($this->uri->segment(2) == 'dailybonus') ? 'active' : '' ?>">
								<a href="<?=BASE_URL_ADMIN?>dailybonus"><i class="icon-coins"></i> <span>Daily Bonus</span></a>
							</li>

							<li class="<?=($this->uri->segment(2) == 'level_income') ? 'active' : '' ?>">
								<a href="<?=BASE_URL_ADMIN?>level_income"><i class="icon-bars-alt"></i> <span>Level Income</span></a>
							</li>


							<li class="<?=($this->uri->segment(2) == 'transfercharge') ? 'active' : '' ?>">
								<a href="<?=BASE_URL_ADMIN?>transfercharge"><i class="icon-percent"></i> <span>Tranfer Coin Charge</span></a>
							</li>

							<li class="<?=($this->uri->segment(2) == 'task_credit_coin') ? 'active' : '' ?>">
								<a href="<?=BASE_URL_ADMIN?>task_credit_coin"><i class="icon-cash4"></i> <span>User Task Credit Coin</span></a>
							</li>

							<li class="<?=($this->uri->segment(3) == 'qualification') ? 'active' : '' ?>">
								<a href="<?=BASE_URL_ADMIN?>usermaster/qualification"><i class="icon-users2"></i> Qualification</a>
							</li>

						</ul>
					</li>

				<?php } ?>

				<?php if($this->crud->is_admin_authorized(MERCHANT)) { ?>

					<li class="<?=($this->uri->segment(2) == 'home') ? 'active' : '' ?>">
						<a href="javascript:void(0)"><i class="icon-store2"></i> <span>Merchant</span></a>
						<ul>

							<li class="<?=($this->uri->segment(2) == 'Shopetype') ? 'active' : '' ?>">
								<a href="<?=BASE_URL_ADMIN?>Shopetype"><i class="icon-store"></i>Merchant Type</a>
							</li>
							
							<li class="<?=(($this->uri->segment(2) == 'merchant') && $this->uri->segment(3) == '') ? 'active' : '' ?>">
								<a href="<?=BASE_URL_ADMIN?>merchant/"><i class="icon-store"></i>Merchant User</a>
							</li>

							<li class="<?=($this->uri->segment(3) == 'Merchantwallet') ? 'active' : '' ?>">
								<a href="<?=BASE_URL_ADMIN?>walletmaster/Merchantwallet"><i class="icon-store"></i>Merchant User Wallet</a>
							</li>

							<!-- <li class="<?=($this->uri->segment(3) == 'request' && $this->uri->segment(2) == 'merchant') ? 'active' : '' ?>">
								<a href="<?=BASE_URL_ADMIN?>merchant/request"><i class="icon-store"></i>Merchant User Request</a>
							</li> -->

							<li class="<?=($this->uri->segment(3) == 'Online_request' && $this->uri->segment(2) == 'merchantuser') ? 'active' : '' ?>">
								<a href="<?=BASE_URL_ADMIN?>merchantuser/Online_request"><i class="icon-store"></i>Merchant Online Request</a>
							</li>

							<li class="<?=($this->uri->segment(3) == 'Offline_request' && $this->uri->segment(2) == 'merchantuser') ? 'active' : '' ?>">
								<a href="<?=BASE_URL_ADMIN?>merchantuser/Offline_request"><i class="icon-store"></i>Merchant Offline Request</a>
							</li>

							<li class="<?=($this->uri->segment(3) == 'returnrequest') ? 'active' : '' ?>">
								<a href="<?=BASE_URL_ADMIN?>merchant/returnrequest"><i class="icon-store"></i>Return Request</a>
							</li>

							<li class="<?=($this->uri->segment(2) == 'Transfercoin_merchat') ? 'active' : '' ?>">
								<a href="<?=BASE_URL_ADMIN?>Transfercoin_merchat"><i class="icon-database4"></i> <span>Transfer Merchat History</span></a>
							</li>
						</ul>
					</li>


					<!-- Commission -->

					<li class="<?=($this->uri->segment(2) == 'home') ? 'active' : '' ?>">
						<a href="javascript:void(0)"><i class="icon-address-book"></i> <span>Mycoinstation Commission</span></a>
						<ul>

							<li class="<?=($this->uri->segment(3) == 'Commission') ? 'active' : '' ?>">
								<a href="<?=BASE_URL_ADMIN?>merchantuser/Commission"><i class="icon-percent"></i>Commission</a>
							</li>
							

							<li class="<?=($this->uri->segment(3) == 'Request_history') ? 'active' : '' ?>">
								<a href="<?=BASE_URL_ADMIN?>merchantuser/Request_history"><i class="icon-history"></i>Request History</a>
							</li>

							<li class="<?=($this->uri->segment(3) == 'Report_history') ? 'active' : '' ?>">
								<a href="<?=BASE_URL_ADMIN?>merchantuser/Report_history"><i class="icon-history"></i>Report History</a>
							</li>							
							
						</ul>
					</li>

					<?php } ?>

				<?php if($this->crud->is_admin_authorized(ADSUSER)) { ?>

					<li class="<?=($this->uri->segment(2) == 'home') ? 'active' : '' ?>">
						<a href="javascript:void(0)"><i class="icon-newspaper"></i> <span>Ads User</span></a>
						<ul>
							
							<li class="<?=($this->uri->segment(3) == 'Adsuser') ? 'active' : '' ?>">
								<a href="<?=BASE_URL_ADMIN?>adsuser/Adsuser"><i class="icon-reading"></i>All User</a>
							</li>

							<li class="<?=($this->uri->segment(2) == 'adsuser' && $this->uri->segment(4) == 'Image') ? 'active' : '' ?>">
								<a href="<?=BASE_URL_ADMIN?>adsuser/request/Image"><i class="icon-image4"></i>Image Ads Request</a>
							</li>

							<li class="<?=($this->uri->segment(2) == 'adsuser' &&  $this->uri->segment(4) == 'Video') ? 'active' : '' ?>">
								<a href="<?=BASE_URL_ADMIN?>adsuser/request/Video"><i class="icon-film4"></i>Video Ads Request</a>
							</li>

							<li class="<?=($this->uri->segment(2) == 'adsuser' && $this->uri->segment(4) == 'Link') ? 'active' : '' ?>">
								<a href="<?=BASE_URL_ADMIN?>adsuser/request/Link"><i class="icon-link2"></i>Link Ads Request</a>
							</li>

							<li class="<?=($this->uri->segment(2) == 'adsuser' && $this->uri->segment(4) == 'applink') ? 'active' : '' ?>">
								<a href="<?=BASE_URL_ADMIN?>adsuser/request/applink"><i class="icon-android"></i>App Link Ads Request</a>
							</li>

							

							<li class="<?=($this->uri->segment(3) == 'Bannerads_charge') ? 'active' : '' ?>">
								<a href="<?=BASE_URL_ADMIN?>charge/Bannerads_charge"><i class="icon-calculator3"></i>Banner Ads Charge</a>
							</li>

							<li class="<?=($this->uri->segment(3) == 'Ads_click') ? 'active' : '' ?>">
								<a href="<?=BASE_URL_ADMIN?>charge/Ads_click"><i class="icon-pencil3"></i>Ads Click Charge</a>
							</li>


						</ul>
					</li>


					<li class="<?=($this->uri->segment(2) == 'home') ? 'active' : '' ?>">
						<a href="javascript:void(0)"><i class="icon-enlarge"></i> <span>Banner Ads Request</span></a>
						<ul>
							

							<li class="<?=($this->uri->segment(2) == 'adsuser' && $this->uri->segment(4) == 'Top' ) ? 'active' : '' ?>">
								<a href="<?=BASE_URL_ADMIN?>adsuser/banner/Top"><i class="icon-sort"></i>Top Ads Request</a>
							</li>

							<li class="<?=($this->uri->segment(2) == 'adsuser' && $this->uri->segment(4) == 'Middel') ? 'active' : '' ?>">
								<a href="<?=BASE_URL_ADMIN?>adsuser/banner/Middel"><i class="icon-transmission"></i>Middel Ads Request</a>
							</li>

							<li class="<?=($this->uri->segment(2) == 'adsuser' && $this->uri->segment(4) == 'Bottom') ? 'active' : '' ?>">
								<a href="<?=BASE_URL_ADMIN?>adsuser/banner/Bottom"><i class="icon-sort"></i>Bottom Ads Request</a>
							</li>

							
						</ul>
					</li>

					<?php } ?>

				<?php if($this->crud->is_admin_authorized(ADS)) { ?>

					<li class="<?=($this->uri->segment(2) == 'home') ? 'active' : '' ?>">
						<a href="javascript:void(0)"><i class="icon-enlarge"></i> <span>Banner Ads</span></a>
						<ul>
							
							

							<li class="<?=($this->uri->segment(3) == 'Top') ? 'active' : '' ?>">
								<a href="<?=BASE_URL_ADMIN?>banner/Top"><i class="icon-sort"></i>Top Ads</a>
							</li>

							<li class="<?=($this->uri->segment(3) == 'middel') ? 'active' : '' ?>">
								<a href="<?=BASE_URL_ADMIN?>banner/middel"><i class="icon-transmission"></i>Middel Ads</a>
							</li>

							<li class="<?=($this->uri->segment(3) == 'bottom') ? 'active' : '' ?>">
								<a href="<?=BASE_URL_ADMIN?>banner/bottom"><i class="icon-sort"></i>Bottom Ads</a>
							</li>

							
						</ul>
					</li>

				<?php } ?>

				<?php if($this->crud->is_admin_authorized(SHOP)) { ?>

					<li class="<?=($this->uri->segment(2) == 'home') ? 'active' : '' ?>">
						<a href="javascript:void(0)"><i class="icon-store2"></i> <span>Shop</span></a>
						<ul>
							
							<li class="<?=($this->uri->segment(3) == 'ordermaster') ? 'active' : '' ?>">
								<a href="<?=BASE_URL_ADMIN?>ordermaster/ordermaster"><i class="icon-store"></i>All Order</a>
							</li>

							<li class="<?=($this->uri->segment(2) == 'products_category') ? 'active' : '' ?>">
								<a href="<?=BASE_URL_ADMIN?>products_category"><i class="icon-stack-empty"></i> <span>Products Category</span></a>
							</li>

							<li class="<?=($this->uri->segment(2) == 'products_subcategory') ? 'active' : '' ?>">
								<a href="<?=BASE_URL_ADMIN?>products_subcategory"><i class="icon-stack-empty"></i> <span>Products Subcategory</span></a>
							</li>

							<li class="<?=($this->uri->segment(2) == 'products') ? 'active' : '' ?>">
								<a href="<?=BASE_URL_ADMIN?>products"><i class="icon-cart5"></i> <span>Products</span></a>
							</li>

							<li class="<?=($this->uri->segment(2) == 'chargemaster') ? 'active' : '' ?>">
								<a href="<?=BASE_URL_ADMIN?>chargemaster"><i class="icon-truck"></i> <span>Delivery Charge</span></a>
							</li>

							<li class="<?=($this->uri->segment(2) == 'courier') ? 'active' : '' ?>">
								<a href="<?=BASE_URL_ADMIN?>courier"><i class="icon-truck"></i> <span>Courier Service</span></a>
							</li>

							<li class="<?=($this->uri->segment(2) == 'slider') ? 'active' : '' ?>">
								<a href="<?=BASE_URL_ADMIN?>slider"><i class="icon-stack-empty"></i> <span>Slider</span></a>
							</li>

							<li class="<?=($this->uri->segment(3) == 'Dealads') ? 'active' : '' ?>">
								<a href="<?=BASE_URL_ADMIN?>dealads/Dealads"><i class="icon-stack-empty"></i> <span>Best Deal Ads</span></a>
							</li>

							<li class="<?=($this->uri->segment(3) == 'Shop_banner') ? 'active' : '' ?>">
								<a href="<?=BASE_URL_ADMIN?>shop/Shop_banner"><i class="icon-stack-empty"></i> <span>Shop Banners Ads</span></a>
							</li>

							<li class="<?=($this->uri->segment(3) == 'Comming') ? 'active' : '' ?>">
								<a href="<?=BASE_URL_ADMIN?>dealads/Comming"><i class="icon-stack-empty"></i> <span>Comming Soon Product</span></a>
							</li>


						</ul>
					</li>

					<?php } ?>

				<?php if($this->crud->is_admin_authorized(AREA)) { ?>



					<li class="<?=($this->uri->segment(2) == 'home') ? 'active' : '' ?>">
						<a href="javascript:void(0)"><i class="icon-direction"></i> <span>Area Master</span></a>
						<ul>
							<li class="<?=($this->uri->segment(3) == 'countrymaster') ? 'active' : '' ?>">
								<a href="<?=BASE_URL_ADMIN?>areamaster/countrymaster"><i class="icon-earth"></i> Country Master</a>
							</li>
							<li class="<?=($this->uri->segment(3) == 'statemaster') ? 'active' : '' ?>">
								<a href="<?=BASE_URL_ADMIN?>areamaster/statemaster"><i class="icon-map5"></i> State Master</a>
							</li>

							<li class="<?=($this->uri->segment(3) == 'Districtmaster') ? 'active' : '' ?>">
								<a href="<?=BASE_URL_ADMIN?>areamaster/Districtmaster"><i class="icon-map5"></i> District Master</a>
							</li>

							<li class="<?=($this->uri->segment(3) == 'citymaster') ? 'active' : '' ?>">
								<a href="<?=BASE_URL_ADMIN?>areamaster/citymaster"><i class="icon-city"></i> Taluka Master</a>
							</li>

							<li class="<?=($this->uri->segment(3) == 'areamaster') ? 'active' : '' ?>">
								<a href="<?=BASE_URL_ADMIN?>areamaster/areamaster"><i class="icon-pushpin"></i> City Master</a>
							</li>

							<li class="<?=($this->uri->segment(3) == 'pincodemaster') ? 'active' : '' ?>">
								<a href="<?=BASE_URL_ADMIN?>areamaster/pincodemaster"><i class="icon-home9"></i> Pincode Master</a>
							</li>

						</ul>
					</li>

					<?php } ?>

				<?php if($this->crud->is_admin_authorized(NOTIFICATION)) { ?>


					<li class="<?=($this->uri->segment(2) == 'Notification') ? 'active' : '' ?>">
						<a href="<?=BASE_URL_ADMIN?>Notification"><i class="icon-bell2"></i> <span>Notification</span></a>
					</li>

					<?php } ?>

				<?php if($this->crud->is_admin_authorized(AREA_REPORT)) { ?>

					<li class="<?=($this->uri->segment(2) == 'areareport') ? 'active' : '' ?>">
						<a href="<?=BASE_URL_ADMIN?>areareport/Country"><i class="icon-bookmark"></i> <span>Area Report</span></a>
					</li>
				
					<?php } ?>

				<?php if($this->crud->is_admin_authorized(REPORT)) { ?>

					<li class="<?=($this->uri->segment(2) == 'Report') ? 'active' : '' ?>">
						<a href="<?=BASE_URL_ADMIN?>Report"><i class="icon-bookmark"></i> <span>Report</span></a>
					</li>

					<?php } ?>

					<?php if($this->crud->is_admin_authorized(COMPANY_INFO)) { ?>

					<li class="<?=($this->uri->segment(2) == 'home') ? 'active' : '' ?>">
						<a href="javascript:void(0)"><i class="icon-direction"></i> <span>Company Info</span></a>
						<ul>
							<li class="<?=($this->uri->segment(2) == 'company_info') ? 'active' : '' ?>">
								<a href="<?=BASE_URL_ADMIN?>company_info/add"><i class="icon-earth"></i> Company Details</a>
							</li>
							

						</ul>
					</li>

					<?php } ?>

					<?php if($this->crud->is_admin_authorized(SEND_MAIL)) { ?>

					<li class="<?=($this->uri->segment(2) == 'home') ? 'active' : '' ?>">
						<a href="javascript:void(0)"><i class="icon-envelop"></i> <span>Mail Send Details</span></a>
						<ul>
							<li class="<?=($this->uri->segment(2) == 'send_mail') ? 'active' : '' ?>">
								<a href="<?=BASE_URL_ADMIN?>send_mail/add"><i class="icon-envelop2"></i> Mail Send</a>
							</li>
							

						</ul>
					</li>

					<?php } ?>

					<?php if($this->crud->is_admin_authorized(NON_USER)) { ?>

					<li class="<?=($this->uri->segment(2) == 'home') ? 'active' : '' ?>">
						<a href="javascript:void(0)"><i class="icon-traffic-lights"></i> <span>Non User Ads Request</span></a>
						<ul>
							
							<li class="<?=($this->uri->segment(2) == 'non_user' && $this->uri->segment(4) == 'Image') ? 'active' : '' ?>">
								<a href="<?=BASE_URL_ADMIN?>non_user/imageads/Image"><i class="icon-image4"></i>Image Ads Request</a>
							</li>

							<li class="<?=($this->uri->segment(2) == 'non_user' && $this->uri->segment(4) == 'Link') ? 'active' : '' ?>">
								<a href="<?=BASE_URL_ADMIN?>non_user/linkads/Link"><i class="icon-magic-wand"></i>Link Ads Request</a>
							</li>

							<li class="<?=($this->uri->segment(2) == 'non_user' && $this->uri->segment(4) == 'Video') ? 'active' : '' ?>">
								<a href="<?=BASE_URL_ADMIN?>non_user/videoads/Video"><i class="icon-presentation"></i>Video Ads Request</a>
							</li>

							<li class="<?=($this->uri->segment(2) == 'non_user' && $this->uri->segment(4) == 'Top') ? 'active' : '' ?>">
								<a href="<?=BASE_URL_ADMIN?>non_user/banner/Top"><i class="icon-sort"></i>Top Ads Request</a>
							</li>

							<li class="<?=($this->uri->segment(2) == 'non_user' && $this->uri->segment(4) == 'Middel') ? 'active' : '' ?>">
								<a href="<?=BASE_URL_ADMIN?>non_user/banner/Middel"><i class="icon-transmission"></i>Middel Ads Request</a>
							</li>

							<li class="<?=($this->uri->segment(2) == 'non_user' && $this->uri->segment(4) == 'Bottom') ? 'active' : '' ?>">
								<a href="<?=BASE_URL_ADMIN?>non_user/banner/Bottom"><i class="icon-sort"></i>Bottom Ads Request</a>
							</li>

						</ul>
					</li>

					<?php } ?>

			
				</ul>
			</div>
		</div>
		<!-- /main navigation -->

	</div>
</div>
<!-- /main sidebar -->
