
 <div class="chart has-fixed-height" id="visitor_todaylogin"></div>

<?php 
	for ($i=10; $i > -1; $i--) 
	{ 
		echo '<span class="hidden todaylogin">'.${'todaylogin'.$i.'_visitor'}.'</span>';
	}
 ?>

<div class="row">
<?php 
	$current_date = date("d-m-Y");

	for ($i=10; $i > -1; $i--) 
	{ 
		echo '<span class="hidden date_todaylogin">'.date('d', strtotime('-'.$i.' day', strtotime($current_date))).'</span>';
	}
 ?>
		

