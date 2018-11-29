<?php
$Morning = array("English & Math",  "PSAT & Alg 2", "STA1","","","");
$Afternoon = array(
		"Writing",
		"Robotics",
		"Coding",
		"Earth Science",
		"Living Environment (Biology)",
		"Chemistry",
		"AP Physics",
		"ACT",
		"SAT Practice Test",
		"SAT Essay",
		"Pre-calc","" );
$result = "";

$civil = array("M", "F", "M");
$firstname = array("", "", "");
$lastname = array("", "", "");
$grade =  array("2", "3", "4");


$street1 = "street";
$city  = "city";
$postcode = "94230";
$department = "cachan";

$phone = "0123456789";
$mobile = "06123456789";
$email = "";
$comments = "";

$semestre = get_semester();
?>

<div class=login_line_field> &nbsp;</div>
<div class=box_tit><div align=center><H1> Registration Form For <?php echo($semestre); ?> </H1></div></div>

<TABLE cellSpacing=0 cellPadding=0 width=100% border=0>
<TR><TD class=error height=20></TD></TR>
<TR><TD class=error height=30><b><?php echo($result); ?></b></TD></TR>

<TR><TD height=40></TD></TR>
<TR><TD><H3>( <?php echo(semester_period($semestre)); ?> ) </H3></TD></TR>
<TR><TD height=40></TD></TR>
<TR>
	<TD valign=top>
		<TABLE cellSpacing=2 cellPadding=0 width=90% border=0  align=center>
<TR>
	<TD class=background>
<FORM action='<?php echo($formaction); ?>' method=post>
<INPUT type=hidden name='action' value='registerstudent'>
<TABLE cellSpacing=0 cellPadding=0 width=100% border=0 align=center>
<TR>
	<TD width=100%>
		<TABLE cellSpacing=0 cellPadding=0 width=100% border=0 align=center>
		<TR>
			<TD width=17%> 
				<TABLE cellSpacing=0 cellPadding=0 width=100% border=0 align=center>
				<TR><TD class=labelleft>&nbsp;</TD></TR>
				<?php for ($i = 1; $i < 4; $i++) {?>
				<TR><TD class=labelright height=30><?php echo($i); ?>. &nbsp;</TD></TR>
				<?php } ?>
				</TABLE>
			</TD>
			<TD >
				<TABLE cellSpacing=0 cellPadding=0 width=100% border=0 align=center>
				<TR>
					<TD class=labelleft width=15%>Gender</TD>
					<TD class=labelleft width=30%><?php show_mark( ); ?> First Name</TD>
					<TD class=labelleft width=30%><?php show_mark( ); ?> Last Name</TD>
					<TD class=labelleft width=25%>Grade in Sep. <?php echo(date('Y')); ?></TD>
				</TR>
				<?php for ($i = 1; $i < 4; $i++) { 
						$gender = $civil[$i-1];
						$grad = $grade[$i-1];
						$fname = $firstname[$i-1];
						$laname = $lastname[$i-1];
				?>
				<TR>
					<TD class=labelleft height=30>
						<select name="civil<?php echo($i); ?>" >
						<?php if ($gender == 'M') { ?>
							<option value='M' selected>Mr</option>
							<option value='F' >Miss</option>
						<?php } else { ?>
							<option value='M' >Mr</option>
							<option value='F' selected>Miss</option>
						<?php } ?>
						</select>
					</TD>
					<TD class=labelleft>
						<INPUT class=fields type=text size=20 name="firstname<?php echo($i); ?>"  value="<?php echo($fname); ?>">
					</TD>
					<TD class=labelleft>
						<INPUT class=fields type=text size=20 name="lastname<?php echo($i); ?>"  value="<?php echo($laname); ?>">
					</TD>
					<TD class=labelleft>
						<select name="grade<?php echo($i); ?>" >
						<?php for ($g=2; $g < 13; $g++) {?>
							<?php if ($grad == $g) { ?>
							<option value='<?php echo($g); ?>' selected><?php echo($g); ?></option>
						<?php } else { ?>
							<option value='<?php echo($g); ?>'><?php echo($g); ?></option>
						<?php } ?>
						<?php } ?>
						</select>
					</TD>
				</TR>
				<?php } ?>
				</TABLE>
			</TD>
		</TR>

		<TR>
			<TD class=labelright height=40>Street : </TD>
			<TD class=labelleft>
				<INPUT class=fields type=text size=50 name="street1" value="<?php echo($street1); ?>">
			</TD>
		</TR>
		<TR>
			<TD class=labelright height=40> City : </TD>
			<TD class=labelleft>
				<INPUT class=fields type=text size=50 name="city" value="<?php echo($city); ?>">
		</TR>
		<TR>
			<TD class=labelright height=40> State : </TD>
			<TD class=labelleft>
				<INPUT size=20 class=fields type=text name="department" value="<?php echo($department); ?>">
			&nbsp;&nbsp;&nbsp;&nbsp;Zip Code : 
			
				<INPUT size=20 class=fields type=text name="postcode" value="<?php echo($postcode); ?>">
		</TR>
		<TR>
			<TD class=labelright height=40><?php show_mark( ); ?> Email : </TD>
			<TD class=labelleft>
				<INPUT class=fields type=text size=50 name="email"  value="<?php echo($email); ?>">
			</TD>
		</TR>
		<TR>
			<TD class=labelright height=40><?php show_mark( ); ?> Parent's cell phone : </TD>
			<TD class=labelleft>
				<INPUT class=fields type=tel size="20" minlength="9" maxlength="14" placeholder="516-123-4567" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
					name="phone"  value="<?php echo($phone); ?>">
			</TD>
		</TR>
		<!-- TR>
			<TD class=labelright height=40>Cell Phone : </TD>
			<TD class=labelleft>
				<INPUT class=fields type=text size=50 name="mobile"  value="<?php echo($mobile); ?>">
			</TD>
		</TR -->
		<TR>
			<TD class=labelright height=40>Notes : </TD>
			<TD class=labelleft>
				<INPUT class=fields type=text size=50 placeholder="" name="comments"  value="<?php echo($comments); ?>" >
			</TD>
		</TR>
		<TR>
			<TD class=labelright height=20> </TD>
			<TD class=labelleft>
				Please specify the dates attenting __/__/ to __/__/
			</TD>
		</TR>
		<TR><TD class=labelright colspan=2 height=25></TD></TR>
		<TR>
			<TD class=labelright colspan=2>
				<TABLE cellSpacing=0 cellPadding=0 width=100% border=1 align=center>
					<TR>
						<TD class=TABLE_TITLE width=70% colspan=3  height=30>Choose your summer courses</TD>
					</TR>
					<TR>
						<TD class=TABLE_TITLE width=30% height=30>Morning</TD>
						<TD class=TABLE_TITLE width=70% colspan=2 >Afternoon</TD>
					</TR>
					<?php for ($i = 0; $i < 6; $i++) { ?>
					<TR>
						<TD class=labelleft height=30>
							<?php 
								$mc = $Morning[$i];
								if ($mc) {
									echo("&nbsp;&nbsp;<INPUT class=box type='checkbox' name='morning_" .$i. "'> ");
									echo($mc); 
									
								}
							?>
						</TD>
						<TD class=labelleft width=40% >
							<?php
							$n = $i * 2;
							$af = $Afternoon[$n];
							if ($af) {
								echo("&nbsp;&nbsp;<INPUT class=box type='checkbox' name='afternoon_" .$n. "'> ");
								echo($af); 
								
							}
							?>
						</TD>
						<TD class=labelleft width=30% >
							<?php
							$n = $i * 2+1;
							$af = $Afternoon[$n];
							if ($af) {
								echo("&nbsp;&nbsp;<INPUT class=box type='checkbox' name='afternoon_" .$n. "'> ");
								echo($af); 
							}
							?>
						</TD>
					</TR>
					<?php } ?>
				</TABLE>
			</TD>
		</TR>
		<TR>
			<TD colspan=2 class=labelcenter height=80>
				<INPUT  type=submit value=" Register ">
				&nbsp;&nbsp;&nbsp;&nbsp;
				<INPUT TYPE='submit' name='reset' VALUE=" Reset ">
			</TD>
		</TR>
		</TABLE>
	</TD>
</TR>
</TABLE>
</FORM>
	</TD>
</TR>
</TABLE>
	</TD>
</TR>
</TABLE>


