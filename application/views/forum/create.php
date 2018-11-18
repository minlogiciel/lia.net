
<div class="left_box">

    <?php echo validation_errors(); ?>
    
    <?php echo form_open('forum/create'); ?>
    	<div align=left>
            <label for="title"><B>TITLE :&nbsp;&nbsp;</B></label>
            <INPUT type='input' maxLength=60 size=60 name=title	value="<?php echo($title); ?>">
        </div>
		<div align=left>
			<label for="autor"><B>YOUR NAME :&nbsp;&nbsp;</B></label>
			<INPUT maxLength=20 size=15 name=autor value="<?php echo($autor); ?>">
		</div>
    	<div align=left>
        	<label for="text">Text</label>
        	<TEXTAREA name=text rows=10 wrap=virtual cols="60"><?php echo($text); ?></TEXTAREA>
        </div>
    	<div align=center>
    		<INPUT class=button type=submit value=" Send "> 
			<input class=button type=reset name="cancel" value="Reset">
        </div>
    
    </form>
</div>

	
    
