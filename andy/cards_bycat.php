<?php

$response = array();

require_once __DIR__ . '/connect.php';

$db = new DB_CONNECT();

if (isset($_GET["catid"])) {
    $catid = $_GET['catid'];

	$result = mysql_query("SELECT * FROM AS_card WHERE card_cat = $catid ORDER BY cardid ASC") or die(mysql_error());

    if (mysql_num_rows($result) > 0) {
    // looping through all results
    // cards node
    $response["cards"] = array();
    
    while ($row = mysql_fetch_array($result)) {
        // temp user array
        $card = array(); 
        $card["cardid"] = $row["cardid"];
        $card["card_cat"] = $row["card_cat"];
        //$card["card_img"] = $row["card_img"];
        $card["card_title"] = $row["card_title"];
        $card["card_content"] = $row["card_content"];

        // push single card into final response array
        array_push($response["cards"], $card);
    }
    // success
    $response["success"] = 1;

    // echoing JSON response
    echo json_encode($response);
	} else {
		// no cards found
		$response["success"] = 0;
		$response["message"] = "No cards found";

		// echo no users JSON
		echo json_encode($response);
	}
} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";

    // echoing JSON response
    echo json_encode($response);
}
?>