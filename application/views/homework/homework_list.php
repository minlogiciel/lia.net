<?php 
include_once (includes_path()."class_names.inc");
$title =  get_year(). " " .get_semester(). " Semester Homework Answer" ;
$modif= 0;
$np = count($homeworks);


echo("<div class=item_tit><h2>".$title."</h2></div>");
for ($n = 0; $n < count($CLASS_NAME)-2; $n+=2) {
	$classname = $CLASS_NAME[$n]; 
	$hws = $homeworks[$classname];
	$np = count($hws);
	$p = 0;
	echo("<div class=form_line><h4>Class ".$classname."</h4></div>");
		
	if ($np > 0) {
		for ($i = 0; $i < $np; $i+=4) {
			echo("<div class='form_line'>");
			for ($m = 0; $m < 4; $m++) {
				$divname = "form_span".($m+1);
				echo("<div class='".$divname."'>");
				if ($p < $np) {
					$item = $hws[$p];
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
					if (!$comments) {
						$comments = substr(strrchr($files, "/"), 1);
					}
					
					echo("<div title='".$comments."' onmouseover='tooltip.show(this)' onmouseout='tooltip.hide(this)'>");
					echo("<a href='".$files."' target='pdffile_".$m."'>".$str."</a>");
					echo("</div>");
				}
				$p++;
				echo("&nbsp;</div>");
			} 
			echo("</div>");
		}
	}
}



