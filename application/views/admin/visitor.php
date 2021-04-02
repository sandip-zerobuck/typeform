<div class="chart has-fixed-height" id="user_visitor"></div>

<?php 
	for ($i=25; $i > 0; $i--) 
	{ 
		echo '<span class="hidden visitor">'.${'previous'.$i.'_visitor'}.'</span>';
	}
 ?>

<span class="hidden visitor"><?=$today_visitor?></span>
<div class="row">
<?php 
	$current_date = date("d-m-Y");

	for ($i=25; $i > 0; $i--) 
	{ 
		echo '<span class="hidden date_data">'.date('d', strtotime('-'.$i.' day', strtotime($current_date))).'</span>';
	}
 ?>
<span class="hidden date_data"><?=date("d")?></span>
		
