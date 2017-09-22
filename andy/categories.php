<?php

$response = array();

require_once __DIR__ . '/connect.php';

// connecting to db
$db = new DB_CONNECT();

// get all categories from categories table
$result = mysql_query("SELECT * FROM AS_category ORDER BY catid ASC") or die(mysql_error());

// check for empty result
if (mysql_num_rows($result) > 0) {
    // looping through all results
    // categories node
    $response["categories"] = array();
    
    while ($row = mysql_fetch_array($result)) {
        // temp user array
        $category = array();
        $category["catid"] = $row["catid"];
        $category["cat_icon"] = $row["cat_icon"];
        $category["cat_title"] = $row["cat_title"];
        $category["cat_content"] = $row["cat_content"];

        // push single category into final response array
        array_push($response["categories"], $category);
    }
    // success
    $response["success"] = 1;

    // echoing JSON response
    echo json_encode($response);
} else {
    // no categories found
    $response["success"] = 0;
    $response["message"] = "No categories found";

    // echo no users JSON
    echo json_encode($response);
}
?>
