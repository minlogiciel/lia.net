<?php 
include_once (includes_path()."class_names.inc");
$class_nb = count($CLASS_NAME)/2-1;
echo form_open('email/send'); 
?> 

<INPUT type=hidden name='classnumber' value='<?php echo($class_nb); ?>'>		
<INPUT type=hidden name='action' value='sendtoparents'>

<div class=form_line><h2><?php echo ($title); ?></h2></div>
<div class=form_line><?php echo($err); ?></div>
<div class=form_line_title><b>Choose The Classes To Send Email</b></div>

<?php for ($i = 0; $i <$class_nb; $i+=4) { ?>
<div class=form_line>
<?php for ($j = 1; $j <= 4; $j++) {  $divname = "form_span".$j; ?>
	<div class='<?php echo($divname);?>'>
<?php
	$n = $i+$j-1;
	if ($n < $class_nb) {
		$clsname = $CLASS_NAME[$n*2];
		if (get_class_name($classlists, $clsname)) {
			echo ("<INPUT class=box type='checkbox' name='selectclass_".$n."' value='1' checked>");
		} else { 
			echo("<INPUT class=box type='checkbox' name='selectclass_".$n."' value='1'>");
		} 
		echo ("<INPUT NAME='classname_".$n."' TYPE=HIDDEN VALUE='".$clsname."'>");
		echo("Class " .$clsname); 
	}
?>
	</div>
<?php } ?>
</div>
<?php } ?>
<div class=form_line>&nbsp;</div>
<div class=form_line_border>&nbsp;</div>

<div class=form_line>
	<div class=form_label>Send by : </div>
	<div class=form_span2>
		<?php if ($sendby == 1) { ?>
			<INPUT class=box type='radio' name='sendby' value='0' > Group
		<?php } else { ?>
			<INPUT class=box type='radio' name='sendby' value='0' checked > Group
		<?php } ?>
	</div>
	<div class=form_span3>
		<?php if ($sendby == 1) { ?>
			<INPUT class=box type='radio' name='sendby' value='1' checked> Individual
		<?php } else { ?>
			<INPUT class=box type='radio' name='sendby' value='1' > Individual
		<?php  } ?>
	</div>
</div>



<div class=form_line>
	<div class=form_label>Variables :</div>
	<div class=form_content>
<?php 		
		for ($i = 0; $i < count($STUDENT_VAR1); $i++) {
			echo("<font color=orange><b>" .$STUDENT_VAR1[$i]. "</b></font>&nbsp;&nbsp;&nbsp;&nbsp;");
		}
?>
	</div>
</div>

<div class=form_line>
	<div class=form_label>With Report Card : </div>
	<div class=form_content> 		
<?php if ($reportcard) { ?>
		<INPUT class=box type='checkbox' name='reportcard' value='1' checked > Yes
<?php } else { ?>
		<INPUT class=box type='checkbox' name='reportcard' value='1'> Yes
<?php  } ?> 

	</div>
</div>

<div class=form_line>&nbsp;</div>

<div class=form_line>
	<div class=form_label>Subject : </div>
	<div class=form_content>
		<INPUT class=fields type=text size=65 name="msgtitle" value="<?php echo($msgtitle); ?>">
	</div>
</div>

<div class=form_line>
	<div class=form_label>Message : </div>
	<div class=form_content>
		<textarea name="messages" id="messages" cols="60" rows="20" class="area-fields" ><?php echo($messages); ?></textarea>
	</div>
</div>

<div class=form_line>
	<INPUT class=button type=submit name="sendmail" value=' Send '>
	<INPUT class=button type=submit name="viewmail" value=' View '>
	<INPUT class=button type=submit name="reset" value=' Reset '>
</div>

<?php echo form_close(); ?> 
