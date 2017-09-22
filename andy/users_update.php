<?php
	
	$response = array();
		
	require_once __DIR__ . '/connect.php';
	$db = new DB_CONNECT();

	if (isset($_POST['userid']) && $_POST['user_name']) && isset($_POST['user_fname']) && isset($_POST['surname']) && isset($_POST['user_email']) && isset($_POST['user_mobile'])) {
		
		$userid = $_POST['userid'];
		$user_name = $_POST['username'];
		$user_fname = $_POST['fname'];
		$user_surname = $_POST['surname'];
		$user_email = $_POST['email'];
		$user_mobile = $_POST['mobile'];
		$user_joined = date('Y-m-d H:i:s');
		
		$result = mysql_query("UPDATE AS_user SET user_name = '$user_name', user_fname = '$user_fname', user_email = '$user_email', user_mobile = '$user_mobile' WHERE userid = $userid");

		if ($result) {
			$response["success"] = 1;
			$response["message"] = "You have updated successfully.";
			
			echo json_encode($response);
		} else {
			
		}
	} else {
		// required field is missing
		$response["success"] = 0;
		$response["message"] = "Required field(s) is missing";

		// echoing JSON response
		echo json_encode($response);
	}
	?>
