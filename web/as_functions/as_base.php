<?php
    
	include AS_FUNC.'AS_install.php';

	// SITE FUNCTIONS 
	// Begin General Functions 
	function AS_getUrl() {
	  	if (AS_get_option('siteurl') == "") $siteurl = AS_SITEURL;
		else $siteurl = AS_get_option('siteurl');
	       return $siteurl;
	}
	
	function AS_siteUrl(){
		if (AS_get_option('siteurl') == "") $siteurl = AS_SITEURL;
		else $siteurl = AS_get_option('siteurl');
	    return $siteurl.'/';
	}

	function AS_siteLynk(){
		 return AS_siteUrl().'/';
	}
	

   
	function AS_siteLynk_img(){
		 return AS_siteUrl().'/AS_media/image/';
	}


	function AS_siteLynk_ava(){
		 return AS_siteUrl().'/AS_media/avata/';
	}


	function AS_siteLynk_icon(){
		 return AS_siteUrl().'/AS_media/icon/';
	}

	function AS_request() {
	  	$siteurl = explode('/',$_SERVER['REQUEST_URI']);
		$the_request = $siteurl[1];	
		return $the_request;
	}
	
	function AS_request_part($part) {
		$parts = explode('/', AS_request());
		return $parts[$part];
	}

    function AS_request_parts($start=0) {
		return array_slice(explode('/', AS_request()), $start);
	}

    function AS_request_partz($start=0) {
		return array_slice(explode('?', AS_request()), $start);
	}
	
	function AS_db_query($query) {
                $database = new AS_Dbconn();
                return $database->get_results( $query );
	}
		
	function AS_check_admin() {
		$database = new AS_Dbconn();
		$check_column = 'userid';
		$check_for = array( 'user_level' => 'super-admin' );
		$exists = $database->exists( 'AS_user', $check_column,  $check_for );
		if( $exists ){ return true; }
	}
	
	function AS_check_options() {
		$database = new AS_Dbconn();
		$check_column = 'optid';
		$check_for = array( 'title' => 'sitename' );
		$exists = $database->exists( 'AS_options', $check_column,  $check_for );
		if( $exists ){ return true; }
	}
		
	function AS_get_option($option) {
		$AS_db_query = "SELECT * FROM AS_options WHERE title = '$option'";
		$database = new AS_Dbconn();
		if( $database->AS_num_rows( $AS_db_query ) > 0 ) {
                    list( $optid, $title, $content) = $database->get_row( $AS_db_query );
		    return $content;
		} else  {
		    return false;
		}
		
	}
	
	function AS_new_option($title, $content, $userid) {
		$database = new AS_Dbconn();			
		$New_Option_Details = array(
			'title' => $title,
			'content' => $content,
			'createdby' => $userid,
			'created' => date('Y-m-d H:i:s'),
		);
		$add_query = $database->AS_insert( 'AS_options', $New_Option_Details ); 			
	}

	function AS_set_option($option, $value, $userid) {
		$database = new AS_Dbconn();	
		$Update_Site_Details = array(
			'content' => $value,
			'updatedby' => $userid,
			'updated' => date('Y-m-d H:i:s'),
		);
		$where_clause = array('title' => $option);
		$updated = $database->AS_update( 'AS_options', $Update_Site_Details, $where_clause, 1 );
	}
	
	function AS_new_options(){
	  if ( isset( $_POST['SaveSite'] ) ) {                
		AS_new_option('sitename', $_POST['sitename'], '1');
		AS_new_option('siteurl', $_POST['siteurl'], '1');
		AS_new_option('keywords', $_POST['keywords'], '1');
		AS_new_option('description', $_POST['description'], '1');		
	    header("location: ".AS_SITEURL);
	        
	    }
	}
	
	function AS_new_admin(){
	      if ( isset( $_POST['SetAdministrator'] ) ) {			
			$database = new AS_Dbconn();			
			$New_User_Details = array(		
    				'user_name' => trim($_POST['username']),
    				'user_fname' => trim($_POST['fname']),
    				'user_surname' => trim($_POST['surname']),
    				'user_password' => md5(trim($_POST['password'])),
    				'user_email' => trim($_POST['email']),
    				'user_level' => 'super-admin',
    				'user_avatar' => 'user_default.jpg',
    				'user_joined' => date('Y-m-d H:i:s'),
    			);
			
			$title = 'Congratulations for signing up on the next big site';
			$first_name = $_POST['fname'].' '.$_POST['surname'];
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers .= 'To: '.$first_name.' <'.SEND_ERRORS_TO.'>' . "\r\n";
			$headers .= 'From: JS Site <no-reply@jssite.com>' . "\r\n";
		
			$message = '<p>Hi '.$first_name.',</p>';
			$message = '<p>This is a system email to inform you that your account creation on our site on '.date('Y-m-d at H:i:s').' was successfully.</p>';
			$message .= '<p>To login to your site you will either use the email you used or the username you used to created '.trim($_POST['surname']).' with the password you chose. Incase you have a problem to login simply use the password or username reset links on the site.</p>';
			$message = '<p><br><br>With regards, <br> Site Admin<br>This site.</p>';
			$message = '<p><br><br><pre>Dont reply to this email because it will go nowhere if you did so</p>';
			
			mail( trim($_POST['email']), $title, $message, $headers);

			$add_query = $database->AS_insert( 'AS_user', $New_User_Details );
			header("location: ".AS_SITEURL);
			
	      }
	
	}
	
	function AS_opt($name, $value=null)
	{
		if (isset($value))
		AS_set_option($name, $value);
		$options=AS_get_options(array($name));
		return $options[$name];
	}
		
	function AS_db_set_option($name, $value)
	{
		AS_db_query(
			'REPLACE ^options (title, content) VALUES ($, $)', $name, $value
		);
	}
	
		//$AS_config = fopen("AS_config.php", "w");
		//fwrite($AS_config,"hjkjjhj");
			
	function AS_database_setup(){		
		if ( isset( $_POST['DatabaseSetup'] ) ) {	    				    			
			$filename = "AS_config.php";
			$line_1 = 6;
			$line_2 = 7;
			$line_3 = 8;
			$lines = file($filename, FILE_IGNORE_NEW_LINES );
			
			$lines[$line_1] = '	define( "AS_DB", "'.trim($_POST['database']).'" );';
			$lines[$line_2] = '	define( "AS_USER", "'.trim($_POST['username']).'" );';
			$lines[$line_3] = '	define( "AS_PASS", "'.trim($_POST['password']).'"  );';
			
			file_put_contents($filename, implode("\n", $lines));
			header("location: ".AS_SITEURL);
	    }
	}
	
	function AS_guest() {
		$results = array();	 
		//$results['pageTitle'] = AS_get_option('sitename');
		require( AS_INC."AS_guest.php" ); 
	}
		
	function AS_time_ago($tm,$rcs = 0) {
	   $cur_tm = time(); $dif = $cur_tm-$tm;
	   $pds = array('second','minute','hour','day','week','month','year','decade');
	   $lngh = array(1,60,3600,86400,604800,2630880,31570560,315705600);
	   for($v = sizeof($lngh)-1; ($v >= 0)&&(($no = $dif/$lngh[$v])<=1); $v--); if($v < 0) $v = 0; $_tm = $cur_tm-($dif%$lngh[$v]);

	   $no = floor($no); if($no <> 1) $pds[$v] .='s'; $x=sprintf("%d %s ",$no,$pds[$v]);
	   if(($rcs == 1)&&($v >= 1)&&(($cur_tm-$_tm) > 0)) $x .= time_ago($_tm);
	   return $x.' ago';
	}
	
	function AS_is_logged_user(){
		if (AS_logged_user('username')) return true;
		else if (!AS_logged_user('username')) return false;
	}
	
	function AS_logged_admin(){
		if (AS_is_logged()) {
			if (AS_logged_user('level') == "admin") {
				return true;
			} else return false;
		}
		
	}
	
	function AS_homepage(){
		$siteurl = explode('/',$_SERVER['REQUEST_URI']);
	
		$username = isset ( $_COOKIE['tujuane_username']) ? $_COOKIE['tujuane_username'] : "";
		$words = isset ( $_GET["start"]) ? $_GET["start"] : "";
	
		$results = array();	 
		$results['pageTitle'] = AS_get_option('sitename');
		$results['startfrom'] = $words;
		//setcookie('temp_task', '', time()+60*60*24*365, '/', AS_getUrl());
		//setcookie('temp_word', '', time()+60*60*24*365, '/', AS_getUrl());
		//setcookie('temp_plural', '', time()+60*60*24*365, '/', AS_getUrl());
		//setcookie('temp_meaning', '', time()+60*60*24*365, '/', AS_getUrl());
		//setcookie('temp_swa_word',  '', time()+60*60*24*365, '/', AS_getUrl());
		//setcookie('temp_tag_word', '', time()+60*60*24*365, '/', AS_getUrl());		
		require( AS_INC."AS_homepage.php" );	
	}
		
	function AS_error_404(){
		include AS_THEME."AS_header.php";
		/*
         	echo '<p style="font-size:72px;">Error 404</p>
		<h1>The page you are looking for can\'t be found</h1><hr>
		<a href="'.AS_siteUrl().'"><h1>Go back home</h1></a></p>';
		*/
		include AS_THEME."AS_footer.php";
	}
	
	