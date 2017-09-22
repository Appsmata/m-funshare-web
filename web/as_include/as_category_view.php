<?php 

	$catid = $results['category'];
	$AS_db_cat_gry = "SELECT * FROM AS_category WHERE catid = '$catid'";
	$database = new AS_Dbconn();
	if( $database->AS_num_rows( $AS_db_query ) > 0 ) {
	list( $catid, $cat_slug, $cat_title, $cat_icon, $cat_content) = $database->get_row( $AS_db_cat_gry );
	}
	
	$AS_db_card_qry = "SELECT * FROM AS_card WHERE card_cat= '$catid' ORDER BY card_title ASC";
	$results = $database->get_results( $AS_db_card_qry );	
?>

<?php include AS_THEME."AS_header.php"; ?>
        <div class="tj_card page_name" >
		  <h1><?php echo $database->AS_num_rows( $AS_db_card_qry ) ?> <?php echo $cat_title ?>
		  <span style="float:right;" ><a class="button_small" href="index.php?action=card_new" >New Card</a> | <a class="button_small" href="index.php?action=category_edit&amp;AS_catid=<?php echo $catid ?>" >Edit Cat</a></span></h1> 
		</div>
		
		<div class="tj_card">			
		   <?php foreach( $results as $row ) { ?>
			<table class="tt_tb">
			<tr onclick="location='index.php?action=card_view&amp;AS_cardid=<?php echo $row['cardid'] ?>'">
			   <td style="width:60px"><img class="iconic" src="AS_media/<?php echo $row['card_img'] ?>" /></td>
			   <td>
				<h2 class="nowrap"><?php echo $row['card_title'] ?></h2>
				<p class="nowrap"><?php echo $row['card_content'] ?></p>
			  </td>
			</tr>
			</table>
			<?php } ?>
			
			</div>	
		
<?php include AS_THEME."AS_footer.php" ?>
    
