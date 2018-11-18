<div class="content">
    <div class="left">
    	<div class="left_box">

			<h2><?php echo $title; ?></h2>

      <?php 
         echo $this->session->flashdata('email_sent'); 
         echo form_open('/Email_controller/send_mail'); 
      ?> 
		
      <input type = "email" name = "email" required /> 
      <input type = "submit" value = "SEND MAIL"> 
		
      <?php 
         echo form_close(); 
      ?> 
      
        </div>
	</div>
	

    <div class="right">
    	<?php include_once (utils_root()."right.php"); ?>
    </div>
</div>
