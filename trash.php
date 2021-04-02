 <?php if(!empty($coming_soon)) { foreach ($coming_soon as $key => $value) { 
    $time_24 = date("H:i", strtotime($value->time_timer)); ?>
<!-- <b style="" id="comming<?=$value->id?>"></b> -->
<div class="check"></div>
<script>
var countDownDate<?=$value->id?> = new Date("<?=$value->date_timer?> <?=$time_24?>:00").getTime();
var x<?=$value->id?> = setInterval(function() {
var now = new Date().getTime();
var distance = countDownDate<?=$value->id?>  - now;
var days = Math.floor(distance / (1000 * 60 * 60 * 24));
var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
var seconds = Math.floor((distance % (1000 * 60)) / 1000);
/*document.getElementById("comming<?=$value->id?>").innerHTML = days + "d " + hours + "h "
+ minutes + "m " + seconds + "s "; */
if (distance < 0) {
  clearInterval(x<?=$value->id?>);
  /*document.getElementById("comming<?=$value->id?>").innerHTML = "Reload Page";*/
  //window.location.href='<?=BASE_URL_SHOP?>index';
  $(document).ready(function(){
      $.ajax({
                url: '<?=BASE_URL?>Home/coming_soon_active/<?=$value->id?>',
                type:'POST',
                data:{
                    product_id: <?=$value->id?>,
                },
                success: function(response) {
                    $('.check').html(response);
                }
        });
    });
}
}, 1000);
</script>
<?php  } } ?>