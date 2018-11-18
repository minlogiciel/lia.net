<?php 
include_once (includes_path()."admi2017_8.inc");
include_once (includes_path()."schedule_var.inc");
include_once (includes_path()."admission.inc");

?>

<div class="content">
    <div class="left">
    	<div class="left_box">
<?php	  congratulation_form($ADMI2017_8); ?>
		</div>
		
		
		<div class="left_box">
<?php  	    include_once (utils_root()."SummerOpenhouse.php"); ?> 
		</div>
		
    	<div class="left_box">
<?php	  schdule_form($S_INDEX_MENU); ?>
		</div>
		
    	<div class="left_box">
<?php	  list_congratulation_form($ADMISSION_VAR); ?>
		</div>
		
		

    </div>
    <div class="right">
    	<?php include_once (utils_root()."right.php"); ?>
    </div>
</div>
