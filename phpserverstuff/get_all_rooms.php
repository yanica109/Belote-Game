<?php

$response = array();

require_once __DIR__ . '/db_connect.php';

$db = new DB_CONNECT();

$result = mysql_query("SELECT *FROM rooms") or die(mysql_error());

// check for empty result
if (mysql_num_rows($result) > 0) {

    $response["rooms"] = array();

    while ($row = mysql_fetch_array($result)) {
        $room = array();
        $room["id"] = $row["id"];
        $room["roomname"] = $row["roomname"];

        array_push($response["rooms"], $room);
    }
    $response["success"] = 1;

    // echoing JSON response
    echo json_encode($response);
} else {
    // no rooms found
    $response["success"] = 0;
    $response["message"] = "No rooms found";

    // echo no users JSON
    echo json_encode($response);
}
?>
