<?php

	$response = array();

	require_once __DIR__ . '/connect.php';

	$db = new DB_CONNECT();

	if (isset($_POST['login_name']) && isset($_POST['login_key'])) { 
 	//if (isset($_GET['login_name'])) { 
 	
		$loginname = $_POST['login_name'];
		$loginkey = md5($_POST['login_key']);
		
		$result = mysql_query("SELECT * FROM AS_user WHERE user_name = '$loginname' AND user_password = '$loginkey'
			OR user_email ='$loginname' AND user_password = '$loginkey'") or die(mysql_error());

		if (mysql_num_rows($result) > 0) {
		$response["user"] = array();
		
		while ($row = mysql_fetch_array($result)) {
			
			$user = array(); 
			$user["userid"] = $row["userid"];
			$user["user_name"] = $row["user_name"];
			$user["user_fname"] = $row["user_fname"];
			$user["user_surname"] = $row["user_surname"];
			$user["user_sex"] = $row["user_sex"];
			$user["user_email"] = $row["user_email"];
			$user["user_level"] = $row["user_level"];
			$user["user_joined"] = $row["user_joined"];
			$user["user_mobile"] = $row["user_mobile"];
			$user["user_avatar"] = $row["user_avatar"];
			
			array_push($response["user"], $user);
		}
		// success
		$response["success"] = 1;

		// echoing JSON response
		echo json_encode($response);
		} else {
			// no users found
			$response["success"] = 0;
			$response["message"] = "Either the username/email address or password is incorrect";

			// echo no users JSON
			echo json_encode($response);
		}
	} else {
		// required field is missing
		$response["success"] = 0;
		$response["message"] = "Either the username/email address or password is incorrect";

		// echoing JSON response
		echo json_encode($response);
	}

?>