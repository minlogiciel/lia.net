
<div class=login_line_field> &nbsp;</div>
<div class=box_tit><div align=center><H1> Connect To Your Account</H1></div></div>
<div class=login_line_field> &nbsp;</div>

<div class=login_box>
	<?php echo form_open('signon/login'); ?> 
	<INPUT NAME=action TYPE=HIDDEN VALUE="login">
	<div class=login_line_field>Login Name :</div>
	<div class=login_line_field>
		<INPUT type=text class=login_fields size=30 name="log_name" value="">
	</div>
	<div class=login_line_field> &nbsp;</div>

	<div class=login_line_field>Password :</div>
	<div class=login_line_field> 
		<INPUT type=password class=login_fields maxLength=20 size=30 name="log_passwd" value="">
	</div>
	<div class=login_line_field> &nbsp;</div>
	<div class=login_line_field>
		<INPUT type="submit" class=login_buttton value="Sign In">
	</div>
	<?php echo form_close(); ?> 

	<div class=login_line_field>&nbsp;</div>
	<div class=login_line_field><IMG src="<?php echo base_url(); ?>images/puce_red.gif" border=0> &nbsp;Forgot your password ? </div>
	<div class=login_line_field>&nbsp;</div>
	
	<?php echo form_open('signon/getpass'); ?> 
	<INPUT NAME=action TYPE=HIDDEN VALUE="getpasswd">

	<div class=login_line_field>Your Email : </div>
	<div class=login_line_field>
		<INPUT type=text class=login_fields size=40 name="your_email" value="">
	</div>
	<div class=login_line_field>&nbsp;&nbsp;</div>
	<div class=login_line_field>
		<INPUT type="submit" class=login_buttton size=10 value=" Get Password ">
	</div>
	<?php echo form_close(); ?> 
</div>

