<?php
	
	$response = array();
		
	require_once __DIR__ . '/connect.php';
	$db = new DB_CONNECT();

	if (isset($_POST['user_name']) && isset($_POST['user_fname']) 
		&& isset($_POST['user_password']) && isset($_POST['user_email']) 
			&& isset($_POST['user_mobile'])) {
		
		$user_name = $_POST['user_name'];
		$user_fname = $_POST['user_fname'];
		$user_surname = $_POST['user_surname'];
		$user_password = md5(trim($_POST['user_password']));
		$user_email = $_POST['user_email'];
		$user_mobile = $_POST['user_mobile'];
		$user_joined = date('Y-m-d H:i:s');
		
		$result = mysql_query("INSERT INTO AS_user(user_name, user_fname, user_surname, user_password, user_email, user_mobile, user_joined) VALUES('$user_name', '$user_fname', '$user_surname', '$user_password', '$user_email', '$user_mobile', '$user_joined')");
		
		if ($result) {
			
			$getuser = mysql_query("SELECT * FROM AS_user WHERE user_name = '$user_name'");
			$response["user"] = array();
			while ($row = mysql_fetch_array($getuser)) {
				
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
			
			$response["success"] = 1;
			$response["message"] = "You have registered successfully.";
			
			echo json_encode($response);
		} else {
			
		}
	} else {
		$response["success"] = 0;
		$response["message"] = "Required field(s) is missing";
		echo json_encode($response);
	}
	?>
