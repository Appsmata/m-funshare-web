<?php
	// POSTING FUNCTIONS
	// Begin Posting Functions 
	
	function AS_slug_this($content) {
		return preg_replace("/-$/","",preg_replace('/[^a-z0-9]+/i', "-", strtolower($content)));
	}
	
	function AS_slug_is(){
		if(empty($_POST['slug'])) {
		    $AS_slug = trim($_POST['slug']);
		} else $AS_slug = AS_slug_this($_POST['title']);		
	}
		
	function AS_add_new_category(){
		$raw_file_name = basename($_FILES["filename"]["name"]);
		$temp_file_name = $_FILES["filename"]["tmp_name"];		
		$upload_file_ext = explode(".", $raw_file_name);
		$upload_file_name = preg_replace("/-$/","",preg_replace('/[^a-z0-9]+/i', "_", strtolower($upload_file_ext[0])));
		$finalname = 'cat_'.time().'.'.$upload_file_ext[1];
		$target_file = AS_TARGET . $finalname;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);		
		if (move_uploaded_file($temp_file_name, $target_file)) $AS_icon = $finalname;
		else $AS_icon = "cat_default.jpg";		
		
		$database = new AS_Dbconn();			
		$New_Category_Details = array(			
			'cat_icon' => trim($AS_icon),
			'cat_title' => addslashes(trim($_POST['title'])),
			'cat_slug' => AS_slug_this($_POST['title']),
			'cat_content' => addslashes(trim($_POST['content'])),
			'cat_created' => date('Y-m-d H:i:s'),
			'cat_createdby' => $_SESSION['username_loggedin'],
		);
			
		$add_query = $database->AS_insert( 'AS_category', $New_Category_Details ); 
	}
			
	function AS_edit_category($catid) {
		$raw_file_name = basename($_FILES["filename"]["name"]);
		$temp_file_name = $_FILES["filename"]["tmp_name"];		
		$upload_file_ext = explode(".", $raw_file_name);
		$upload_file_name = preg_replace("/-$/","",preg_replace('/[^a-z0-9]+/i', "_", strtolower($upload_file_ext[0])));
		$finalname = 'cat_'.time().'.'.$upload_file_ext[1];
		$target_file = AS_TARGET . $finalname;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);		
		if (move_uploaded_file($temp_file_name, $target_file)) $AS_icon = $finalname;
		else $AS_icon = $_POST['caticon'];		
		
		$database = new AS_Dbconn();	
		$Update_Category_Details = array(
			'cat_icon' => trim($AS_icon),
			'cat_title' => addslashes(trim($_POST['title'])),
			'cat_slug' => AS_slug_this($_POST['title']),
			'cat_content' => addslashes(trim($_POST['content'])),
			'cat_updated' => date('Y-m-d H:i:s'),
			'cat_updatedby' => $_SESSION['username_loggedin'],
		);
		$where_clause = array('catid' => $catid);
		$updated = $database->AS_update( 'AS_category', $Update_Category_Details, $where_clause, 1 );
		if( $updated )	{	}
	
	}
 		
	function AS_add_admin($admin_username) {		
		$database = new AS_Dbconn();	
		$Update_Admin_Details = array(
			'user_level' => trim($_POST['admin_role']),
		);
		$where_clause = array('user_name' => $admin_username);
		$updated = $database->AS_update( 'AS_user', $Update_Admin_Details, $where_clause, 1 );
		if( $updated )	{	}
	
	}
 	
	function AS_add_new_card(){
		$raw_file_name = basename($_FILES["filename"]["name"]);
		$temp_file_name = $_FILES["filename"]["tmp_name"];		
		$upload_file_ext = explode(".", $raw_file_name);
		$upload_file_name = preg_replace("/-$/","",preg_replace('/[^a-z0-9]+/i', "_", strtolower($upload_file_ext[0])));
		$finalname = 'card_'.time().'.'.$upload_file_ext[1];
		$target_file = AS_TARGET . $finalname;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);		
		if (move_uploaded_file($temp_file_name, $target_file)) $AS_image = $finalname;
		else $AS_image = "card_default.jpg";		
			 
		$database = new AS_Dbconn();			
		$New_Card_Details = array(
			'card_cat' => trim($_POST['category']),
			'card_title' => addslashes(trim($_POST['title'])),
			'card_slug' => AS_slug_this($_POST['title']),
			'card_content' => addslashes(trim($_POST['content'])),
			'card_color' => trim($_POST['color']),
			'card_img' => trim($AS_image),
		    'card_posted' => date('Y-m-d H:i:s'),
		    'card_postedby' => $_SESSION['username_loggedin'],
		);
			
		$add_query = $database->AS_insert( 'AS_card', $New_Card_Details ); 
	}
		
	function AS_edit_card($cardid) {
		$raw_file_name = basename($_FILES["filename"]["name"]);
		$temp_file_name = $_FILES["filename"]["tmp_name"];		
		$upload_file_ext = explode(".", $raw_file_name);
		$upload_file_name = preg_replace("/-$/","",preg_replace('/[^a-z0-9]+/i', "_", strtolower($upload_file_ext[0])));
		$finalname = 'card_'.time().'.'.$upload_file_ext[1];
		$target_file = AS_TARGET . $finalname;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);		
		if (move_uploaded_file($temp_file_name, $target_file)) $AS_image = $finalname;
		else $AS_image = $_POST['cardimg'];		
				
		$database = new AS_Dbconn();	
		$Update_Card_Details = array(
			'card_cat' => trim($_POST['category']),
			'card_title' => addslashes(trim($_POST['title'])),
			'card_slug' => AS_slug_this($_POST['title']),
			'card_content' => addslashes(trim($_POST['content'])),
			'card_color' => trim($_POST['color']),
			'card_img' => trim($AS_image),
			'card_updated' => date('Y-m-d H:i:s'),
			'card_updatedby' => $_SESSION['username_loggedin'],
		);
		$where_clause = array('cardid' => $cardid);
		$updated = $database->AS_update( 'AS_card', $Update_Card_Details, $where_clause, 1 );
		if( $updated )	{	}
	
	}
		