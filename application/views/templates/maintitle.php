<?php 
include_once (includes_path()."lastnews.inc");

$loguserid = '';
if (isset($_SESSION['log_user_id'])) {
	$loguserid = $_SESSION['log_user_id'];
}


$MITEM = array(
    "Home",				"home",
    "About Us",			"about",
	"Homework",			"homework", 
	"Class Schedule",	"schedule",
    "Forum",			"forum", 
	"Sign on",			"member", 
	"Register",			"member/register.php", 
//	"Teacher Account",	"../teacher/", 
	"Logout",			"member/logout.php", 
);

$lnews = "";
for ($l = 0; $l < count($LASTNEWS); $l++) {
    $lnews .= $LASTNEWS[$l]. "&nbsp;&nbsp;";
}

?> 
<div class=title>
	<div class=title_left>
		<div class=title_left_img>
		<A  href="home"><IMG src="<?php echo base_url(); ?>images/lia_logo.png" border=0></a>
		</div>
		
	</div>
	<div class=title_right>
		<div class=title_txt>
		<?php 
			$nitem =  count($MITEM);
			if (!$loguserid) {
				$nitem -= 2; /* should not show logout item */
			}
			for ($i = 0; $i < $nitem; $i+= 2) {
				$menuitem = $MITEM[$i];
				echo("<A  class=SCHEDULE_BAR href='".base_url()."index.php/".$MITEM[$i+1]. "'>" .$menuitem. "</A> &nbsp;");
			} 
		?>
		</div>
		<div class=title_txt>&nbsp;</div>
		<div class=title_txt1>Tel. <?php echo(lia_phone()); ?></div>
		<div class=title_txt1>
			<?php echo(lia_address()); ?>
		</div>
		<div class=title_txt>&nbsp;</div>
	</div>
</div>

<div class=title_bar>
	<div class=bar_time id="bar_time"></div>
	<div class=bar_center>
		<MARQUEE width=550 onmouseover=this.stop() onmouseout=this.start() trueSpeed scrollAmount=1 scrollDelay=25 direction=left>
		<?php echo("<font color=red>". $lnews. "</font>");	?>
		</MARQUEE>
	</div>
	<div class=bar_right>
		<A  href='contact'>Contact Us</A> &nbsp;
	</div>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>scripts/lia_date.js"></script>

