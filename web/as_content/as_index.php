<?php
	session_start();
	require( 'AS_config.php' );
	include AS_FUNC.'AS_dbconn.php';
	require AS_FUNC.'AS_base.php';
	include AS_FUNC.'AS_options.php';
	include AS_FUNC.'AS_paging.php';
	include AS_FUNC.'AS_posting.php';
	include AS_FUNC.'AS_users.php';
 	
 	$AS_loginid = isset( $_SESSION['username_loggedin'] ) ? $_SESSION['username_loggedin'] : "";
	
	$action = isset( $_GET['action'] ) ? $_GET['action'] : "";
	$myaccount = isset( $_SESSION['account'] ) ? $_SESSION['account'] : "";
	
	if ( $action != "login" && $action != "logout" && $action != "register" 
			&& $action != "forgot_password" && $action != "recover_password"
			&& $action != "forgot_username" && $action != "recover_username"
			&& $action != "logout" && !$AS_loginid ) {
			
			AS_signin();
	   exit;
	} 
     
	include 'AS_pages.php';
 	
switch ( $action ) {
	case 'login': AS_signin();
		break;
	case 'register': register();
		break;
	case 'forgot_password': forgot_password();
		break;
	case 'recover_password': recover_password();
		break;
	case 'forgot_username': forgot_username();
		break;
	case 'recover_username': recover_username();
		break;
	case 'logout': logout();
		break;
	case 'category_all':  category_all();
		break;
	case 'category_new': 
		if ($myaccount != "adminstrator") category_new();
		else profile();
		break;
	case 'category_view': 
		if ($myaccount != "adminstrator") category_view();
		else profile();
		break;
	case 'category_edit': 
		if ($myaccount != "adminstrator") category_edit();
		else profile();
		break;
	case 'card_all': card_all();
		break;
	case 'card_search': card_search();
		break;
	case 'card_new':  
		if ($myaccount != "adminstrator") card_new();
		else profile();
		break;
	case 'card_view': card_view();
		break;
	case 'card_edit':  
		if ($myaccount != "adminstrator") card_edit();
		else profile();
		break;
	case 'card_delete':  
		if ($myaccount != "adminstrator") card_delete();
		else profile();
		break;
	case 'user_all': user_all();
		break;
	case 'user_new':  
		if ($myaccount != "adminstrator") user_new();
		else profile();
		break;
	case 'user_view': user_view();
		break;
	case 'profile': profile();
		break;
	case 'options':  
		if ($myaccount != "adminstrator") options();
		else category_all();
		break;  
    default:
		category_all();
}

function AS_signin() {

		$results = array();
		$results['pageAction'] = "Sign In";
		
		if ( isset( $_POST['SignMeIn'] ) ) {
		$loginname = $_POST['username'];
		$loginkey = md5($_POST['password']);
		
            if (AS_let_me_user($loginname, $loginkey)){
			header( "Location: index.php" );
			
		}   else {
			
            require( AS_INC."AS_signin.php" );
	    }
	
	  } else {
	
	    require( AS_INC."AS_signin.php" );
 	 }

	}
	
function register() {
	$results = array();
	$results['pageTitle'] = "Register Your Account";
	$results['pageAction'] = "Register"; 
	
	if ( isset( $_POST['Register'] ) ) {
		AS_register_me();
		header( "Location: index.php");		
	}  else {
		require( AS_INC . "AS_register.php" );
	}	
	
}

  function forgot_username() {
	$results = array();
	$results['pageTitle'] = "Forgot Username";
	$results['pageAction'] = "ForgotUsername"; 
	
	if ( isset( $_POST['ForgotUsername'] ) ) {
		$email = $_POST['username'];
		$password = md5($_POST['password']);
		AS_recover_username($email, $password);
		header( "Location: index.php?action=recovered_username");		
	}  else {
		require( AS_INC . "AS_forgot_username.php" );
	}	
}

  function forgot_password() {
	$results = array();
	$results['pageTitle'] = "Forgot Password";
	$results['pageAction'] = "ForgotPassword"; 
	
	if ( isset( $_POST['ForgotPassword'] ) ) {
		$username = $_POST['username'];
		$email = $_POST['email'];
		AS_recover_password($username, $email);
		header( "Location: index.php?action=recover_password");		
	}  else {
		require( AS_INC . "AS_forgot_password.php" );
	}	
	
}

function recover_username() {
	$results = array();
	$results['pageTitle'] = "Recover Username";
	$results['pageAction'] = "RecoveredUsername"; 
	require( AS_INC . "AS_recover_username.php" );
	
}

function recover_password() {
	$results = array();
	$results['pageTitle'] = "Recover Password";
	$results['pageAction'] = "RecoveredPassword"; 
	
	if ( isset( $_POST['RecoverPassword'] ) ) {
		$username = $_POST['username'];
		$password = md5($_POST['passwordcon']);
		AS_change_password($username);
		header( "Location: index.php");		
	}  else {
		require( AS_INC . "AS_recover_password.php" );
	}
}

function dashboard() {
	$results = array();
	$results['pageAction'] = "Dashboard";  
	require( AS_INC . "AS_dashboard.php" );
}

?>
