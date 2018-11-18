<?php

if ( ! function_exists('announce_form'))
{
    
    function announce_form($announce)
    {
?>
		<div class="right_box right_box_top">
        	<div class=item_tit>Announcement</div>
        	<div class="anno_red">
        	<?php
        	for ($n = 0; $n < count($announce); $n++) {
        	    echo("<p>&nbsp;".$announce[$n]."</p>");
            }
            ?>
 			</div>
		</div>
		<div><img src="<?php echo base_url(); ?>images/box_bg2.gif"></div>
<?php 
    }
}

if ( ! function_exists('cours_form'))
{
    
    function cours_form($item)
    {
?>
		<div class="right_box right_box3">
			<div class=item_tit><?php echo($item[0]); ?></div>
 			<div class=item_schdule>  
         	<?php 
        		for ($i = 2; $i < count($item); $i++) {
        			$elem = $item[$i];
        			$dates = $elem[0];
        			//$dates = getFullDateSimple($dates);						
        			$times = $elem[1];
        		?>								
         			<div class=list_tit><?php echo($dates. "&nbsp;&nbsp;&nbsp;&nbsp;" .$times); ?></div>
        			<div class=list_text>
        			<?php 
        				for ($j = 2; $j < count($elem); $j++) {
        					echo($elem[$j]. "<br>"); 
        				}
        			?>
        			</div>
        	<?php } ?>
 			</div>
		</div>
		<div><img src="<?php echo base_url(); ?>images/box_bg2.gif"></div>
<?php 
    }
}


if ( ! function_exists('congratulation_form'))
{
    
    function congratulation_form($item)
    {
?>
		<div class="box_tit">
        	<div align=center><h2><?php echo($item[1]); ?></h2></div>
      	</div>
      	<div class="box_txt">
    		<div class="schedule_left">
         		<ul> 
      			<?php 
					for ($i= 2; $i < count($item); $i+=2) {
						echo("<li>".$item[$i]. " : &nbsp;&nbsp; ".$item[$i+1]."</li>");
					} 
 				?>
           		</ul>
        	</div>
		</div>
<?php 
    }
}

if ( ! function_exists('schdule_form'))
{
    
    function schdule_form($item)
    {
        ?>
		<div class="box_tit">
			<a href="<?php echo base_url(); ?>schedule/type=<?php echo("1"); ?>"><h2>LIA Class Schedule</h2></a>
		</div>
      	<div class="box_txt">
            <div class="tit_img">
            	<img src="<?php echo base_url(); ?>photos/Picture_020-758x300.jpg" border="0" height="140" width="290">
            </div>
            <div class="text2">
            <?php
            for ($i = 0; $i < count($item); $i++) {
                if ($item[$i][1]) {
            ?>
            	<div class=schedule2><font size=4>&#9997;&nbsp;&nbsp;</font>
            	<A href='../schedule/?scheduletype=<?php echo($item[$i][2]); ?>'><?php echo($item[$i][0]); ?></a></div>
            <?php 
            	}
            }
            ?>
            </div>
		</div>
<?php 
    }
}



if ( ! function_exists('list_congratulation_form'))
{
    
    function list_congratulation_form($item)
    {
        ?>
        
		<div class="box_tit"><h2>Congratulations</h2></div>
			<div class="box_txt">
				<div class="tit_img">
					<img src="../photos/harvard-university.jpg" border="0" height="140" width="290">
				</div>
				<div class="text2">
				<?php
                $nb = count($item);
                if ($nb > 8)
                    $nb = 8;
                for ($i= 1; $i < $nb; $i++) {
                    $admitem = $item[$i];
                    $body = "<div class=box_tit align=center><h2>".$admitem[1]."</h2></div><br>";
                    for ($j= 2; $j < count($admitem); $j+=2) {
                        $body .= "<div>&nbsp;&nbsp";
                        if ($admitem[$j])
                            $body .= "<font color=blue>".$admitem[$j]. " : </font>&nbsp;&nbsp; ";
                        $body .= $admitem[$j+1]."</div>";
                    }
        
                    echo("<div class=schedule2>");
                        echo("<font size=4>&#9997;&nbsp;&nbsp;</font>");
                        echo("<a href='#' class=tooltip>".$admitem[0]);
                        echo("<span>".$body."</span></a>");
                    echo("</div>");
                }
                ?>
        	</div>
      	</div>
<?php 
    }
}



        

if ( ! function_exists('show_summer_students'))
{
    function show_grade_link($grade, $gstart, $gend)
    {
        for ($g = $gstart; $g < $gend; $g+=2) {
            $lnid = $g;
            if ($grade != $g) {
                echo("&nbsp;&nbsp;&nbsp;<a href='#link".$lnid."'>".$g."</a>"); $g++;
                echo("&nbsp;&nbsp;&nbsp;<a href='#link".$lnid."'>".$g."</a>");
			} else {
				echo("&nbsp;&nbsp;&nbsp;".$g); $g++;
				echo("&nbsp;&nbsp;&nbsp;".$g);
			} 
		}
    }

    
    function showGradeStudentsScores($grade, $st_lists, $studentid, $forpublic) {
        $GRADE_TABLE = array("","1st", "2nd", "3rd", "4th", "5th","6th","7th","8th","9th","10th", "11-12th");
        
        $nbmember = count($st_lists);
        if ($nbmember > 0) {
?>
<TABLE cellSpacing=0 cellPadding=0 width=100% border=0 align=center>
<TR>
	<TD class=background>
		<TABLE cellSpacing=0 cellPadding=0 width=100% border=0 align=center>
		<TR>
			<TD class=background>
				<TABLE cellSpacing=1 cellPadding=0 width=100% border=0 align=center class=titleplacement>

				<TR>
					<TD  height=25 class=titleplacement colspan=6>
						Score Report For All <?php echo($GRADE_TABLE[$grade]); ?> Grade Test Taker 
					</TD>
				</TR>

				<TR>
					<TD class=soustitleplacement colspan=2 width='33%' height=20> Math  </TD>
					<TD class=soustitleplacement colspan=2 width='33%'> English  </TD>
					<TD class=soustitleplacement colspan=2 width='33%'> Combined  </TD>
				</TR>
				<TR>
					<TD class='soustitleplacement' width=8%>AVG</TD>
					<TD class='soustitleplacement' width=25%>
						<div align=center><?php echo($lists[0][0]); ?></div>
					</TD>
					<TD class='soustitleplacement' width=8%>AVG</TD>
					<TD class='soustitleplacement' width=25%>
						<div align=center><?php echo($lists[0][1]); ?></div>
					</TD>
					<TD class='soustitleplacement' width=8%>AVG</TD>
					<TD class='soustitleplacement' width=25%>
						<div align=center><?php echo($lists[0][2]); ?></div>
					</TD>
				</TR>


		<?php 
			$prev_math = -1;
			$prev_en = -1;
			$prev_total = -1;
			$n_math = 0;
			$n_en = 0;
			$n_total = 0;
			
			if ($forpublic)
				$al = "center";
			else 
				$al = "left";
			
			for ($i = 1; $i < $nbmember; $i++) {
				$score 		= $lists[$i];
				$math		= $score[0][0];
				$mathid		= $score[0][1];
				if ($forpublic)
					$mathname	= $score[0][1];
				else
					$mathname	= $score[0][2];
				$english	= $score[1][0];
				$englishid	= $score[1][1];

				if ($forpublic)
					$englishname	= $score[1][1];
				else
					$englishname	= $score[1][2];
				
				$total		= $score[2][0];
				$totalid	= $score[2][1];
				if ($forpublic)
					$totalname	= $score[2][1];
				else
					$totalname	= $score[2][2];

				if ($prev_math != $math) {
					$n_math++;
				}
				$prev_math = $math;
				
				if ($prev_en != $english) {
					$n_en++;
				}
				$prev_en = $english;

				if ($prev_total != $total) {
					$n_total++;
				}
				$prev_total = $total;
				
				if ($total == 0)
					break;
				
					
			?>			
				<TR>
					<?php if ($n_math < 4) {?>
					<TD class='numplacement1' width=8%><?php echo($n_math); ?></TD>
					<?php } else { ?>
					<TD class='numplacement' width=8%><?php echo($n_math); ?></TD>
					<?php } ?>
					<TD class='listtesttext' width=25%><div align=<?php echo($al); ?>>&nbsp;
					<?php if ($math) {
						if ($studentid == $mathid) {
							echo("<font color=red >". $math. " (". $mathname. ")</font>") ; 
						}
						else {
							echo("<font color=black >". $math. " </font><font color=#888888 >(". $mathname. ")</font>") ; 
						}
					}
					?>
					</div>
					</TD>
					<?php if ($n_en < 4) {?>
					<TD class='numplacement1' width=8%><?php echo($n_en); ?></TD>
					<?php } else { ?>
					<TD class='numplacement' width=8%><?php echo($n_en); ?></TD>
					<?php } ?>
					<TD class='listtesttext' width=25%><div align=<?php echo($al); ?>>&nbsp;
					<?php if ($english) {
						if ($studentid == $englishid) {
							echo("<font color=red >". $english. " (". $englishname. ")</font>") ; 
						}
						else {
							echo("<font color=black >". $english. " </font> <font color=#888888  >(". $englishname. ")</font>") ; 
						}
					}
					?></div>
					</TD>
					<?php if ($n_total < 4) {?>
					<TD class='numplacement1' width=8%><?php echo($n_total); ?></TD>
					<?php } else { ?>
					<TD class='numplacement' width=8%><?php echo($n_total); ?></TD>
					<?php } ?>
					<TD class='listtesttext' width=25%><div align=<?php echo($al); ?>>&nbsp;
					<?php if ($total) {
						if ($studentid == $totalid) {
							echo("<font color=red >". $total. " (". $totalname. ")</font>") ; 
						}
						else {
							echo("<font color=black >". $total. " </font> <font color=#888888  >(". $totalname. ")</font>") ; 
						}
					}
					?></div>
					</TD>
				</TR>
		<?php } ?>		
				</TABLE>
			</TD>
		</TR>
		</TABLE>
	</TD>
</TR>
<TR><TD height=15></TD></TR>
</TABLE>
<?php 
	}
}
    
    
    function show_summer_students($studentid, $forpublic=0, $gstart=2, $gend=12)
    {
        if ($forpublic)
            $url_form = "../schedule/OpenTestResult.php";
        else
            $url_form = "../member/member.php";
        $cstid = strtoupper($studentid);
        $linkid = 1;
?>

<TABLE cellSpacing=0 cellPadding=0 width=100% border=0 align=center>
<TR>
	<TD>
		<FORM action='<?php echo($url_form); ?>' method=post>
		<TABLE cellSpacing=0 cellPadding=0 width=100% border=0 align=center>
<?php 
        for ($grade = $gstart; $grade < $gend; $grade+=2) { 
		      $linkid = $grade/2; 
?>
		<TR>
			<TD class=TABLE_COL2 colspan=3>
				<div id="link<?php echo($linkid); ?>">To Grade : <?php show_grade_link($grade, $gstart, $gend) ; ?></div>
			</TD>
		</TR>
		<TR>
			<TD width=49% valign=top>
				<?php 
				    $st_lists = $mlists->getSummerGradeStudentScores($grade);
				    showGradeStudentsScores($grade, $st_lists, $cstid, $forpublic); 
				 ?>
			</TD>
			<TD width=1%></TD>
			<TD width=50% valign=top>
				<?php 
				    $grade++;
				    $st_lists = $mlists->getSummerGradeStudentScores($grade);
				    showGradeStudentsScores($grade, $st_lists, $cstid, $forpublic);
				
				?>
			</TD >
		</TR>
<?php } ?>
		<TR>
			<TD class=formlabel colspan=3 height=50>
				<div align=center>
					Your ID # : <INPUT class=fields type=text size=10 name="mystudentid" value="">
				</div>
			</TD>
		</TR>
		<TR>
			<TD class=formlabel colspan=3 height=50>
				<div align=center>
				<INPUT NAME=action TYPE=HIDDEN VALUE="findmytestresult">
				<INPUT type="submit" class=button NAME="myresult" value=" Find My Placement In Ranking ">
				</div>
			</TD>
		</TR>
		</TABLE>
		</FORM>
	</TD>
</TR>
</TABLE>
<?php 
    }
}
?>
