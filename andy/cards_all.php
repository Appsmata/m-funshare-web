<?php

$response = array();

require_once __DIR__ . '/connect.php';
$db = new DB_CONNECT();

	if (isset($_GET["catid"])) {
		$catid = $_GET['catid'];
		$result = mysql_query("SELECT * FROM AS_card WHERE card_cat='$catid' ORDER BY cardid ASC") or die(mysql_error());
		if (mysql_num_rows($result) > 0) {
			$response["cards"] = array();		
			while ($row = mysql_fetch_array($result)) {
				$card = array();
				$card["cardid"] = $row["cardid"];
				$card["card_cat"] = $row["card_cat"];
				$card["card_image"] = $row["card_img"];
				$card["card_title"] = $row["card_title"];
				$card["card_content"] = $row["card_content"];
				array_push($response["cards"], $card);
			}
			$response["success"] = 1;
			echo json_encode($response);
		} else {
			$response["success"] = 0;
			$response["message"] = "No cards found";
			echo json_encode($response);
		}
	} else {
		$response["success"] = 0;
		$response["message"] = "No cards found";
		echo json_encode($response);
	}
	
?>
