<?php

$response = array();

// check for required fields
if (isset($_POST['roomname'])) {

    $username = $_POST['roomname'];

    require_once __DIR__ . '/db_connect.php';
    $db = new DB_CONNECT();
    $result = mysql_query("INSERT INTO rooms(roomname) VALUES('$roomname')");

    // check if inserted
    if ($result) {
        // it is inserted
        $response["success"] = 1;
        $response["message"] = "Room created.";

        // echoing JSON response
        echo json_encode($response);
    } else {
        // it is not inserted
        $response["success"] = 0;
        $response["message"] = "An error occurred.";

        // echoing JSON response
        echo json_encode($response);
    }
} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field is missing";

    // echoing JSON response
    echo json_encode($response);
}
?>
