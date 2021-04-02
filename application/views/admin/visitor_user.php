<div class="chart has-fixed-height" id="new_visitor"></div>
<?php 
	for ($i=25; $i > 0; $i--) 
	{ 
		echo '<span class="hidden new_user_visitor">'.${'user'.$i.'_visitor'}.'</span>';
	}
 ?>
<span class="hidden new_user_visitor"><?=$user_visitor?></span>
