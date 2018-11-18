<div class="content">
    <div class="left">
    	<div class="left_box">

    <?php 
        $m = 1;
        foreach ($students as $st): 
             $ids =      $st['IDS'];
             $firstname 	=   $st['FIRSTNAME'];
             $lastname 	=   $st['LASTNAME'];
             
             echo("<div>" .$m. " : <a href=".site_url('students/'.$ids).">". $firstname." ".$lastname."</a></div>");
             $m++;
        endforeach; 
    ?>

        </div>
	</div>
	

    <div class="right">
    	<?php include_once (utils_root()."right.php"); ?>
    </div>
</div>
