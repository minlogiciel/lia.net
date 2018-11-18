<div class="content">
    <div class="left">
    	<div class="left_box">

    <?php 
        $m = 0;
        foreach ($homeworks as $item): 
             $ids =      $item['IDS'];
             $title 	=   $item['TITLE'];
             $subject 	=   $item['SUBJECTS'];
             $classes 	=   $item['CLASSES'];
             $annee 	=   $item['ANNEE'];
             $semester =   $item['SEMESTER'];
             $dates =   $item['DATES'];
             $files =   $item['FILES'];
             $comments =   $item['COMMENTS'];
             $str = $dates. "-" .$subject;
             
             echo("<div title='".$comments."' onmouseover='tooltip.show(this)' onmouseout='tooltip.hide(this)'>");
             echo("<a href='".$files."' target='pdffile_".$m."'>".$str."</a>");
             echo("</div>");
             $m++;
        endforeach; 
    ?>

        </div>
	</div>
	

    <div class="right">
    	<?php include_once (utils_root()."right.php"); ?>
    </div>
</div>
