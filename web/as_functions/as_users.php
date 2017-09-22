<?php
	
	function AS_let_me_user($loginname, $loginkey) {
		$AS_db_query = "SELECT * FROM AS_user WHERE user_name = '$loginname' AND user_password = '$loginkey'
			OR user_email ='$loginname' AND user_password = '$loginkey'";
		$database = new AS_Dbconn();
		if( $database->AS_num_rows( $AS_db_query ) > 0 ) {
            list( $userid, $user_name, $user_fname, $user_surname, $user_sex, $user_password, $user_email, $user_level) = $database->get_row( $AS_db_query );
			$_SESSION['username_loggedin'] = $userid;
			$_SESSION['account'] = $user_level;
		    return true;
		} else  {
		    return false;
		}
		
	}
	
	function AS_logged_account($loginname) {
		$AS_db_query = "SELECT * FROM AS_user 
				WHERE user_name = '$loginname' 
					OR user_email ='$loginname'";
		$database = new AS_Dbconn();
		if( $database->AS_num_rows( $AS_db_query ) > 0 ) {
            list( $userid, $user_name, $user_fname, $user_surname, $user_sex, $user_password, $user_email, $user_level) = $database->get_row( $AS_db_query );
		    return $user_level;
		} else  {
		    return false;
		}
		
	}
	
	function AS_recover_username($email, $password) {
		$AS_db_query = "SELECT * FROM AS_user WHERE user_email = '$email' AND user_password = '$password'";
		$database = new AS_Dbconn();
		if( $database->AS_num_rows( $AS_db_query ) > 0 ) {
            list( $userid, $user_name) = $database->get_row( $AS_db_query );			
			$_SESSION['recover_username'] = $user_name;
		    return true;
		} else  {
		    return false;
		}
		
	}
	
	function AS_recover_password($username, $email) {
		$AS_db_query = "SELECT * FROM AS_user WHERE user_email = '$email' AND user_name = '$username'";
		$database = new AS_Dbconn();
		if( $database->AS_num_rows( $AS_db_query ) > 0 ) {
            list( $userid, $user_name) = $database->get_row( $AS_db_query );
			$_SESSION['recover_password'] = $user_name;
		    return true;
		} else  {
		    return false;
		}		
	}
	
	function AS_change_password($username) {		
		$database = new AS_Dbconn();	
		$Update_User_Details = array(
			'user_password' => md5($_POST['passwordcon']),
		);
		$where_clause = array('user_name' => $username);
		$updated = $database->AS_update( 'AS_user', $Update_User_Details, $where_clause, 1 );
		if( $updated )	{	}
	
	}
	
	function AS_is_logged(){
		$myloginid = isset( $_SESSION['username_loggedin'] ) ? $_SESSION['username_loggedin'] : "";
		
		if (!$myloginid) return true;
		else return false;
	}
	
	function AS_signin_modal() {
	  if ( isset( $_POST['LetMeIn'] ) ) {
		$loginname = $_POST['loginname'];
		$loginkey = md5($_POST['loginkey']);
		
		$AS_db_query = "SELECT * FROM AS_user 
			WHERE user_name = '$loginname' AND user_password = '$loginkey'
			OR user_email ='$loginname' AND user_password = '$loginkey'";
		$database = new AS_Dbconn();
		if( $database->AS_num_rows( $AS_db_query ) > 0 ) {
            list( $userid) = $database->get_row( $AS_db_query );
		    $_SESSION['username_loggedin'] = $userid;			
			header( "Location: ".AS_siteUrl());		
		} else header( "Location: ".AS_siteLynk()."signin" );	
	  }
	} 
	
	
function logout() {
  unset( $_SESSION['username_loggedin'] );
  unset( $_SESSION['account'] );
  header( "Location: index.php" );
}
	
	
	function AS_add_new_user(){
 		$target_dir = "file:///D:/Web/htdocs/library/AS_media/";
		$raw_file_name = basename($_FILES["avatar"]["name"]);
		$temp_file_name = $_FILES["avatar"]["tmp_name"];		
		$upload_file_ext = explode(".", $raw_file_name);
		$upload_file_name = preg_replace("/-$/","",preg_replace('/[^a-z0-9]+/i', "_", strtolower($upload_file_ext[0])));
		$finalname = 'user'.time().'.'.$upload_file_ext[1];
		$target_file = $target_dir . $finalname;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);		
		if (move_uploaded_file($temp_file_name, $target_file)) $AS_avatar = $finalname;
		else $AS_avatar = "user_default.jpg";		
			 
		$database = new AS_Dbconn();			
		$New_User_Details = array(			
			'user_name' => trim($_POST['username']),
			'user_fname' => trim($_POST['fname']),
			'user_surname' => trim($_POST['surname']),
			'user_password' => md5(trim($_POST['passwordcon'])),
			'user_email' => trim($_POST['email']),
			'user_mobile' => trim($_POST['mobile']),
			'user_level' => trim($_POST['group']),
			'user_avatar' => trim($AS_avatar),
			'user_joined' => date('Y-m-d H:i:s'),
		);
			
		$add_query = $database->AS_insert( 'AS_user', $New_User_Details ); 
	}
	
	function AS_register_me(){
 		$target_dir = "file:///D:/Web/htdocs/library/AS_media/";
		$raw_file_name = basename($_FILES["avatar"]["name"]);
		$temp_file_name = $_FILES["avatar"]["tmp_name"];		
		$upload_file_ext = explode(".", $raw_file_name);
		$upload_file_name = preg_replace("/-$/","",preg_replace('/[^a-z0-9]+/i', "_", strtolower($upload_file_ext[0])));
		$finalname = 'user'.time().'.'.$upload_file_ext[1];
		$target_file = $target_dir . $finalname;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);		
		if (move_uploaded_file($temp_file_name, $target_file)) $AS_avatar = $finalname;
		else $AS_avatar = "user_default.jpg";		
			 
		$database = new AS_Dbconn();			
		$New_User_Details = array(			
			'user_name' => trim($_POST['username']),
			'user_fname' => trim($_POST['fname']),
			'user_surname' => trim($_POST['surname']),
			'user_password' => md5(trim($_POST['passwordcon'])),
			'user_email' => trim($_POST['email']),
			'user_mobile' => trim($_POST['mobile']),
			'user_level' => 'student',
			'user_avatar' => trim($AS_avatar),
			'user_joined' => date('Y-m-d H:i:s'),
		);
			
		$add_query = $database->AS_insert( 'AS_user', $New_User_Details ); 
	}
	
	
?>
	