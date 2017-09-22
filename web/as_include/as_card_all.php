<?php include AS_THEME."AS_header.php"; ?>
	<div id="site_content">	
		
<?php 
	
	$database = new AS_Dbconn();			
	$AS_db_query = "SELECT * FROM AS_card ORDER BY card_title ASC";
	$results = $database->get_results( $AS_db_query );
	
?>
	  <div class="tj_card page_name" ><h1><?php echo $database->AS_num_rows( $AS_db_query ) ?> Fun Cards
		  <a class="button_small" style="float:right;text-align:center;" href="index.php?action=card_new">New Card</a> </h1></div>
		  
		<div class="tj_card">			
		   
			<?php foreach( $results as $row ) { ?>
			<table class="tt_tb" style="background:<?php echo getColorText($row['card_color']) ?>">
			<tr onclick="location='index.php?action=card_view&amp;AS_cardid=<?php echo $row['cardid'] ?>'">
			   <td style="width:60px"><img class="iconic" src="AS_media/<?php echo $row['card_img'] ?>" /></td>
			   <td>
				<h2><?php echo $row['card_title'] ?></h2>
				<p><?php echo substr($row['card_content'],0,50) ?></p>
			  </td>
			</tr>
			</table><hr style="margin:0px;">
			<?php } ?>
			
			</div>
		
<?php include AS_THEME."AS_footer.php" ?>
    
