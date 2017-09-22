<?php include AS_THEME."AS_header.php"; ?>
	<div id="site_content">	
		
<?php 
	
	$database = new AS_Dbconn();			
	$AS_db_query = "SELECT * FROM AS_category ORDER BY cat_title ASC";
	$results = $database->get_results( $AS_db_query );
?>
	  <div class="tj_card page_name" ><h1><?php echo $database->AS_num_rows( $AS_db_query ) ?> Categories
		  <a class="button_small" style="float:right;text-align:center;" href="index.php?action=category_new">New Category</a> </h1></div>
		  
		<div class="tj_card">			
		   <?php foreach( $results as $row ) { ?>
			<table class="tt_tb">
			<tr onclick="location='index.php?action=category_view&amp;AS_catid=<?php echo $row['catid'] ?>'">
			   <td style="width:60px"><img class="iconic" src="AS_media/<?php echo $row['cat_icon'] ?>" /></td>
			   <td>
				<h2><?php echo $row['cat_title'] ?> <em>(<?php
				echo $database->AS_num_rows("SELECT * FROM AS_card WHERE card_cat = '".$row['catid']."'")
				?> cards)</em></h2>
				<p><?php echo substr($row['cat_content'],0,50) ?></p>
			  </td>
			</tr>
			</table>
			<?php } ?>
			
			</div>
		
<?php include AS_THEME."AS_footer.php" ?>
    
