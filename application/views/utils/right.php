<?php 
include_once (includes_path()."right_information.inc");
include_once (includes_path()."announce.inc");


announce_form($ANNOUNCEMENT);

if ($SCHEDULELISTR[1] == 1) {
    cours_form($SCHEDULELISTR);
}

if ($TESTTAKERLISTR[1] == 1) {
    cours_form($TESTTAKERLISTR);
}

?>
