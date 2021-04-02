<div class="chart has-fixed-height" id="ads_users_adsads_user"></div>
<?php 
	for ($i=25; $i > 0; $i--) 
	{ 
		echo '<span class="hidden ads_user_visitor">'.${'ads_user'.$i.'_visitor'}.'</span>';
	}
 ?>
<span class="hidden ads_user_visitor"><?=$ads_user_visitor?></span>
