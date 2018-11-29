<?php 
include_once (includes_path()."class_names.inc");
$class_nb = count($CLASS_NAME)/2;

echo form_open_multipart('homework/upload'); 
?> 
<INPUT type=hidden name='action' value='uploadhomework'>
<INPUT type=hidden name='mtype' value='<?php echo($HOMEWORK_TYPE); ?>'>
<INPUT type=hidden name='action' value='uploadhomework'>
<INPUT type=hidden name='hindex' value='<?php echo($hid); ?>'>

<TABLE cellSpacing=0 cellPadding=0 width=100% border=0 align=center>
<TR>
	<TD class=labelright>
		<TABLE cellSpacing=0 cellPadding=0 width=100% border=0 align=center>
		<TR>
			<TD height=80 colspan=2>
				<div class=item_tit><h2>Upload Homework</h2></div>
			</TD>
		</TR>
		<TR>
			<TD class=error height=30 colspan=2><?php echo($err); ?></TD>
		</TR>
		<TR>
			<TD class=labelright height=30>Class : </TD>
			<TD class=labelleft>
				<select name="classes" id="classes" STYLE='width: 180; color:blue; align: center' >
				<?php 	
				for ($i = 0; $i < count($CLASS_NAME)-2; $i+=2) {
					$slsname = $CLASS_NAME[$i];
					if ($classes == $slsname)
						echo ("<option value=".$slsname." selected > " .$slsname. " </option>");
					else
						echo ("<option  value=".$slsname."> " .$slsname. " </option>");
				}
		
				?>
				</select>
			</TD>
		</TR>
		
		<TR>
			<TD class=labelright width=30%  height=30>Subject : </TD>
			<TD class=labelleft width=70%>
				<select name="subjects" id="subjects" STYLE='width: 180; color:blue; align: center'>
				<?php 	
				for ($i = 0; $i < count($programlist); $i++) {
					$program = $programlist[$i];
					if ($program == $subjects)
						echo ("<option value=".$program." selected> " .$program. " </option>");
					else
						echo ("<option  value=".$program."> " .$program. " </option>");
				}
		
				?>
				</select>
			</TD>
		</TR>
		<TR>
			<TD class=labelright  height=30>Due Date : </TD>
			<TD class=labelleft>
				<select name="duedate" STYLE='width:180; color:blue; align: center' >
				<?php 	$first = 0;
				for ($i = 0; $i < count($SATURDAYLIST); $i++) {
					if ($dates <= date($SATURDAYLIST[$i])) {
						$first++;
					}
					if ($first == 0)
						echo ("<option value=".$SATURDAYLIST[$i]." selected> " .$SATURDAYLIST[$i]. " </option>");
					else
						echo ("<option  value=".$SATURDAYLIST[$i]."> " .$SATURDAYLIST[$i]. " </option>");
				}
				?>
				</select>
			</TD>
		</TR>
		<TR>
			<TD class=labelright height=30>Comments : </TD>
			<TD class=labelleft>
				<INPUT class=fields type=text size=40 name="comments" id="comments" value="<?php echo($comments); ?>">
			</TD>
		</TR>

		<TR><TD height=20 class=labelleft colspan=2></TD></TR>
		<?php if ($filename) { ?>
		<TR>
			<TD class=labelright height=30>Homework File : </TD>
			<TD class=labelleft>
				<INPUT class=fields type=text size=30 name="hw_file" id="hw_file" value="<?php echo($filename); ?>"  disabled>
			</TD>
		</TR>
		<?php } ?>
		<TR><TD height=20 class=labelleft colspan=2></TD></TR>
		<TR>
			<TD class=labelright height=30>Upload File : </TD>
			<TD class=labelleft>
				<input name="homework_file" size=40 type="file" id="homwork_file" title="homework file" value="homework_file" />
			</TD>
		</TR>
		<TR><TD height=50 class=labelleft colspan=2></TD></TR>
		<TR>
			<TD height=50 class=labelright colspan=2>
				<div align=center>
				<?php if ($hindex > 0) { ?>
					<INPUT class=button type=submit name="savescores" value=' Modify ' id="uploadhomeworkid">
				<?php } else { ?>
					<INPUT class=button type=submit name="savescores" value=' Upload ' id="uploadhomeworkid">
				<?php } ?>
				</div>
			</TD>
		</TR>
		<TR><TD height=15 colspan=2>&nbsp;</TD></TR>
		</TABLE>
	</TD>
</TR>
</TABLE>
<?php echo form_close(); ?> 
