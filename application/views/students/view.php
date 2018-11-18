<div class="content">
    <div class="left">
    	<div class="left_box">

    <?php 
    $ids =      $student_item['IDS'];
    $civil = $student_item['CIVIL'];
    $firstname 	=   $student_item['FIRSTNAME'];
    $lastname 	=   $student_item['LASTNAME'];
    $email 	=   $student_item['EMAIL'];
    
    echo("<div> <a href=".site_url('students/'.$ids).">". $civil. ". " .$firstname." ".$lastname."</a></div>");
    echo("<div> Email : " .$email. "</div>");
    if (empty($scores_items))
    {
        
    }
    else 
    {
        $m = 0;
        foreach ($scores_items as $score):
        
            $total 	=   $score['TOTAL'];
            $subject 	=   $score['SUBJECTS'];
            $classes 	=   $score['CLASSES'];
            
            echo("<div> ". $m. ". " .$classes. " " .$subject. " : " .$total. "</div>");

            $m++;
        endforeach;

    }

    echo("<div><A  class=SCHEDULE_BAR href='".base_url()."index.php/students'>Students</A> &nbsp;</div>");
    
    ?>

        </div>
	</div>
	

    <div class="right">
    	<?php  ?>
    </div>
</div>
