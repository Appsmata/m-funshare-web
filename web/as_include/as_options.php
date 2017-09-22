<?php include AS_THEME."AS_header.php"; ?>
        <div class="tj_card page_name" ><center>

		  <h1>Site Options</h1> </div>
			<div class="tj_card">
				<form action="index.php?action=options" method="post">
                <table style="width:100%;font-size:20px;">
				<tr>
					<td>Site Name:</td>
					<td><input type="text" class="input_card" name="sitename" value="<?php echo AS_get_option('sitename') ?>"></td>
				</tr>
                <tr>
					<td>Site Url:</td>
					<td><input type="text" class="input_card" name="siteurl" autocomplete="off" value="<?php echo AS_get_option('siteurl') ?>"></td>
				</tr>
                <tr>
					<td>Keywords:</td>
					<td><input type="text" class="input_card" name="keywords" autocomplete="off" value="<?php echo AS_get_option('keywords') ?>"></td>
				</tr>
                <tr>
					<td>Descriptions:</td>
					<td><textarea class="input_card" name="description"><?php echo AS_get_option('description') ?></textarea></td>
				</tr>
				</table><br>
                        <center><input type="submit" class="mysubmith" name="SaveSite" value="Save Options">
			  </center><br></form>
				
			</div>
		
<?php include AS_THEME."AS_footer.php" ?>
    
