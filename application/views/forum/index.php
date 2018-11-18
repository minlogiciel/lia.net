<div class="content">
    <div class="left">
    	<div class="left_box">

			<h2><?php echo $title; ?></h2>

     <?php foreach ($news as $news_item): 
            $mid =      $news_item['PID'];
            $title 	=   $news_item['UTITLE'];
            $autor 	=   $news_item['UAUTOR'];
            $times 	=   $news_item['UTIME'];
            $level 	=   $news_item['ULEVEL'];
            $number =   $news_item['URESP'];
            $groups =   $news_item['UGROUP'];
    ?>        	<a href="<?php echo site_url('forum/groups='.$groups.'&mid='.$mid.'&level='.$level); ?>">
				<font size=2><b><?php echo($title); ?></b></font></a>
				<div align=center><?php echo($number); ?>&nbsp;&nbsp;</div>
				<div align=right><font size=1 color=black><?php echo($autor); ?>&nbsp;&nbsp;<?php echo($times); ?>&nbsp;&nbsp;</font></div>


       <?php endforeach; ?>

        </div>
	</div>
	

    <div class="right">
    	<?php include_once (utils_root()."right.php"); ?>
    </div>
</div>
