<?php include AS_THEME."AS_header.php"; ?>

<?php 
	$database = new AS_Dbconn();			
	
	$AS_query_one = "SELECT * FROM AS_category ORDER BY catid DESC LIMIT 5";
	$results_i = $database->get_results( $AS_query_one );
	
	$AS_query_two = "SELECT * FROM AS_card ORDER BY cardid DESC LIMIT 5";
	$results_ii = $database->get_results( $AS_query_two );
	
	$AS_query_three = "SELECT * FROM AS_user ORDER BY userid DESC LIMIT 5";
	$results_iii = $database->get_results( $AS_query_three );

?>
	
	<div class="tj_card page_name" ><center>
	  <h1>Welcome to <?php echo AS_get_option('sitename') ?></h1> 
		<?php
		if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
			
		foreach($_SESSION['ERRMSG_ARR'] as $msg) {
		echo '<div class="error" id="error"><img class="errimg" src="looks/images/cross.png">',$msg,'</div>'; 
		}
		unset($_SESSION['ERRMSG_ARR']);
		} ?>	  
	  </center></div>
	   
		  <div class="tj_card">
			<h1><a href="index.php?action=category_all"><?php echo $database->AS_num_rows( $AS_query_one ) ?> Categories</a> | <a href="index.php?action=category_new">Add a category</a></h1><hr>
			<?php foreach( $results_i as $row ) { ?>
			<div>
				<img class="iconic" src="AS_media/<?php echo $row['cat_icon'] ?>" /> <?php echo $row['cat_title'] ?> with <?php 
					$catid = $row['catid'];
					$AS_db_qry = "SELECT * FROM AS_card WHERE card_cat = '$catid'";
					echo $database->AS_num_rows( $AS_db_qry )
					?> cards.
			</div>
			<?php } ?>	  
		  </div>
		  
		  <div class="tj_card">
			<h1><a href="index.php?action=card_all"><?php echo $database->AS_num_rows( $AS_query_two ) ?> Fun Cards</a> | <a href="index.php?action=card_new">Add a Fun Card</a></h1><hr>
			<?php foreach( $results_ii as $row ) { ?>
			<div>
				<img class="iconic" src="AS_media/<?php echo $row['card_img'] ?>" /> 
			<?php echo AS_cat_card($row['card_cat']) ?> - <?php echo $row['card_title'] ?>
			</div>
			<?php } ?>
		  </div>
		   
		  <div class="tj_card">
			<h1><a href="index.php?action=user_all"><?php echo $database->AS_num_rows( $AS_query_three ) ?> Members</a> | <a href="index.php?action=user_new">Add a Member</a></h1><hr>
			<?php foreach( $results_iii as $row ) { ?>
			<div>
				<img class="iconic" src="AS_media/<?php echo $row['user_avatar'] ?>" /><?php echo $row['user_fname'].' '.$row['user_surname'] ?> - <?php echo $row['user_level'] ?> | Since <?php echo date("j/m/y", strtotime($row['user_joined'])); ?>
			</div>
			<?php } ?>
		  </div>
		  	
		
<?php include AS_THEME."AS_footer.php" ?>
    
