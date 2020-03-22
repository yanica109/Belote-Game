<?php

$response = array();

// check for required fields
if (isset($_POST['id']) && isset($_POST['room'])) {

    $id = $_POST['id'];
    $room = $_POST['room'];

    require_once __DIR__ . '/db_connect.php';

    $db = new DB_CONNECT();

    $result = mysql_query("UPDATE players SET room = '$room' WHERE id = $id");

    // check if row inserted or not
    if ($result) {
        $response["success"] = 1;
        $response["message"] = "Player added to the room.";

        // echoing JSON response
        echo json_encode($response);
    } else {
      $response["success"] = 0;
      $response["message"] = "An error occurred.";
    }
} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";

    // echoing JSON response
    echo json_encode($response);
}
?>
