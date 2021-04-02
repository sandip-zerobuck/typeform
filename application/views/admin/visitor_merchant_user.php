<div class="chart has-fixed-height" id="users_merchantuser"></div>
<?php 
	for ($i=25; $i > 0; $i--) 
	{ 
		echo '<span class="hidden merchant_user_visitor">'.${'merchant_user'.$i.'_visitor'}.'</span>';
	}
 ?>
<span class="hidden merchant_user_visitor"><?=$merchant_user_visitor?></span>