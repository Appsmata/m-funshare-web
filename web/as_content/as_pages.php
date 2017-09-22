<?php


function category_all() {
	$results = array();
	$results['pageTitle'] = "Site Categories";
	$results['pageAction'] = "Categories";  
	require( AS_INC . "AS_category_all.php" );
}

function category_new() {
	$results = array();
	$results['pageTitle'] = "New Category";
	$results['pageAction'] = "Newcat"; 
	
	if ( isset( $_POST['AddCart'] ) ) {
		AS_add_new_category();
		header( "Location: index.php?action=category_new");						
	}  else if ( isset( $_POST['AddClose'] ) ) {
		AS_add_new_category();
		header( "Location: index.php?action=category_all");						
	}  else {
		require( AS_INC . "AS_category_new.php" );
	}	
	
}

function category_view() {
	$results = array();
	$results['pageTitle'] = "View Card";
	$results['pageAction'] = "Viewcat"; 
	$AS_catid = isset( $_GET['AS_catid'] ) ? $_GET['AS_catid'] : "";
	
	$AS_db_query = "SELECT * FROM AS_category WHERE catid = '$AS_catid'";
	$database = new AS_Dbconn();
	if( $database->AS_num_rows( $AS_db_query ) > 0 ) {
		list( $catid, $cat_slug) = $database->get_row( $AS_db_query );
		$results['category'] = $catid;
	} else  {
		return false;
		header( "Location: index.php?action=category_all");	
	}
	
	require( AS_INC . "AS_category_view.php" );	
	
}


function category_edit() {
	$results = array();
	$results['pageTitle'] = "Edit Card";
	$results['pageAction'] = "Viewcat"; 
	$AS_catid = isset( $_GET['AS_catid'] ) ? $_GET['AS_catid'] : "";
	
	$AS_db_query = "SELECT * FROM AS_category WHERE catid = '$AS_catid'";
	$database = new AS_Dbconn();
	if( $database->AS_num_rows( $AS_db_query ) > 0 ) {
		list( $catid, $cat_slug) = $database->get_row( $AS_db_query );
		$results['category'] = $catid;
	} else  {
		return false;
		header( "Location: index.php?action=category_all");	
	}
	
	if ( isset( $_POST['SaveCart'] ) ) {
		AS_edit_category($AS_catid);
		header( "Location: index.php?action=category_edit&&AS_catid=".$AS_catid);						
	}  else if ( isset( $_POST['SaveClose'] ) ) {
		AS_edit_category($AS_catid);
		header( "Location: index.php?action=category_view&&AS_catid=".$AS_catid);					
	}  else {
		require( AS_INC . "AS_category_edit.php" );
	}	
	
}
	  	  
function card_all() {
	$results = array();
	$results['pageTitle'] = "Site Cards";
	$results['pageAction'] = "Cards"; 
	
	if ( isset( $_POST['SearchThis'] ) ) {
		$AS_card_search = $_POST['AS_card_search'];
		$AS_catid = $_POST['AS_catid'];
		
		header( "Location: index.php?action=card_search&&AS_card_search=".$AS_card_search."&&AS_catid=".$AS_catid);
								
	}  else {	
		require( AS_INC . "AS_card_all.php" );
	}
}

function card_search() {
	$results = array();
	$results['pageTitle'] = "Search Cards";
	$results['pageAction'] = "Search"; 
	$results['card_search'] = isset( $_GET['AS_cardid'] ) ? $_GET['AS_cardid'] : "";
	$results['card_searchcat'] = isset( $_GET['AS_catid'] ) ? $_GET['AS_catid'] : "";
	
	if ( isset( $_POST['SearchThis'] ) ) {
		$AS_card_search = $_POST['AS_card_search'];
		$AS_catid = $_POST['AS_catid'];
		
		header( "Location: index.php?action=card_search&&AS_card_search=".$AS_card_search."&&AS_catid=".$AS_catid);
														
	}  else {	
		require( AS_INC . "AS_card_search.php" );
	}
}
function card_new() {
	$results = array();
	$results['pageTitle'] = "New Card";
	$results['pageAction'] = "Newcard"; 
	
	if ( isset( $_POST['AddCard'] ) ) {
		AS_add_new_card();
		header( "Location: index.php?action=card_new");						
	}  else if ( isset( $_POST['AddClose'] ) ) {
		AS_add_new_card();
		header( "Location: index.php?action=card_all");						
	}  else {
		require( AS_INC . "AS_card_new.php" );
	}	
	
}

function card_view() {
	$results = array();
	$results['pageTitle'] = "View Card";
	$results['pageAction'] = "Viewcard"; 
	$AS_cardid = isset( $_GET['AS_cardid'] ) ? $_GET['AS_cardid'] : "";
	
	$AS_db_query = "SELECT * FROM AS_card WHERE cardid = '$AS_cardid'";
	$database = new AS_Dbconn();
	if( $database->AS_num_rows( $AS_db_query ) > 0 ) {
		list( $cardid) = $database->get_row( $AS_db_query );
		$results['card'] = $cardid;
	} else  {
		return false;
		header( "Location: index.php?action=card_all");	
	}
	
	if ( isset( $_POST['DeleteCard'] ) ) {
		$delete = array('cardid' => $AS_cardid);
		$deleted = $database->delete( 'AS_card', $delete, 1 );
		header( "Location: index.php?action=card_all");						
	} else if ( isset( $_POST['SaveCard'] ) ) {
		AS_edit_card($AS_cardid);
		header( "Location: index.php?action=card_view&&AS_cardid=".$AS_cardid);
	}  else if ( isset( $_POST['SaveClose'] ) ) {
		AS_edit_card($AS_cardid);	
		header( "Location: index.php?action=card_all");										
	}  else {
		require( AS_INC . "AS_card_view.php" );
	}	
	
}

function card_edit() {
	$results = array();
	$results['pageTitle'] = "Edit Card";
	$results['pageAction'] = "Editcard"; 
	$AS_cardid = isset( $_GET['AS_cardid'] ) ? $_GET['AS_cardid'] : "";
	
	$AS_db_query = "SELECT * FROM AS_card WHERE cardid = '$AS_cardid'";
	$database = new AS_Dbconn();
	if( $database->AS_num_rows( $AS_db_query ) > 0 ) {
		list( $cardid) = $database->get_row( $AS_db_query );
		$results['card'] = $cardid;
	} else  {
		return false;
		header( "Location: index.php?action=card_all");	
	}
	
	if ( isset( $_POST['SaveCard'] ) ) {
		AS_edit_card($AS_cardid);
		header( "Location: index.php?action=editcard&&AS_cardid=".$AS_cardid);						
	}  else if ( isset( $_POST['SaveClose'] ) ) {
		AS_edit_card($AS_cardid);
		header( "Location: index.php?action=card_view&&AS_cardid=".$AS_cardid);					
	}  else {
		require( AS_INC . "AS_card_edit.php" );
	}	
	
}

function user_delete() {
	$AS_userid = isset( $_GET['AS_userid'] ) ? $_GET['AS_userid'] : "";
	
	$database = new AS_Dbconn();
	$AS_db_query = "DELETE * FROM AS_user WHERE userid = '$AS_userid'";
	$delete = array(
		'userid' => $AS_userid,
	);
	$deleted = $database->delete( 'AS_user', $delete, 1 );
	if( $deleted )	{
		header( "Location: index.php?action=user_all");	
	}
}

function user_all() {
	$results = array();
	$results['pageTitle'] = "Site Users";
	$results['pageAction'] = "Users";  
	require( AS_INC . "AS_user_all.php" );
}

function user_new() {
	$results = array();
	$results['pageTitle'] = "New User";
	$results['pageAction'] = "Newuser"; 
	
	if ( isset( $_POST['AddUser'] ) ) {
		AS_add_new_user();
		header( "Location: index.php?action=user_new");						
	}  else if ( isset( $_POST['AddClose'] ) ) {
		AS_add_new_user();
		header( "Location: index.php?action=user_all");						
	}  else {
		require( AS_INC . "AS_user_new.php" );
	}	
	
}
function user_view() {
	$results = array();
	$results['pageTitle'] = "User Profile";
	$results['pageAction'] = "Viewuser"; 
	$AS_userid = isset( $_GET['AS_userid'] ) ? $_GET['AS_userid'] : "";
	
	$AS_db_query = "SELECT * FROM AS_user WHERE userid = '$AS_userid'";
	$database = new AS_Dbconn();
	if( $database->AS_num_rows( $AS_db_query ) > 0 ) {
		list( $userid, $user_name) = $database->get_row( $AS_db_query );
		$results['user'] = $userid;
	} else  {
		return false;
		header( "Location: index.php?action=user_all");	
	}
	
	require( AS_INC . "AS_user_view.php" );
		
}

function profile() {
	$results = array();
	$results['pageTitle'] = "My Profile";
	$results['pageAction'] = "Profile"; 
	$AS_username = $_SESSION['username_loggedin'];
	
	$AS_db_query = "SELECT * FROM AS_user WHERE user_name = '$AS_username'";
	$database = new AS_Dbconn();
	if( $database->AS_num_rows( $AS_db_query ) > 0 ) {
		list( $userid, $user_name) = $database->get_row( $AS_db_query );
		$results['user'] = $userid;
	} else  {
		return false;
		header( "Location: index.php?action=user_all");	
	}
	
	require( AS_INC . "AS_user_view.php" );
		
}

function options() {
	$results = array();
	$results['pageTitle'] = "Manage Site Options";
	$results['pageAction'] = "Options"; 
	$AS_loginid = isset( $_SESSION['username_loggedin'] ) ? $_SESSION['username_loggedin'] : "";
	
	if ( isset( $_POST['SaveSite'] ) ) {
			
		AS_set_option('sitename', $_POST['sitename'], $AS_loginid);	
		AS_set_option('keywords', $_POST['keywords'], $AS_loginid);
		AS_set_option('description', $_POST['description'], $AS_loginid);
		AS_set_option('siteurl', $_POST['siteurl'], $AS_loginid);
		
		header( "Location: index.php?action=options");						
	}  else if ( isset( $_POST['CancelSave'] ) ) {
		header( "Location: index.php?action=options");						
	}  else {
		require( AS_INC . "AS_options.php" );
	}
	
}


?>