<div class="content">
    <div class="left">
    	<div class="left_box">

			<h2><?php echo $title; ?></h2>

        <?php foreach ($news as $news_item): ?>
        
                <h3><?php echo $news_item['UTITLE']; ?></h3>
                <div class="main">
                        <?php echo $news_item['UTEXT']; ?>
                </div>
                
        
        <?php endforeach; ?>
        </div>
	</div>
	
    <div class="right">
    	<?php include_once (utils_root()."right.php"); ?>
    </div>
</div>
