<?php

$response = array();

if (isset($_POST['username']) && isset($_POST['password'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    require_once __DIR__ . '/db_connect.php';
    $db = new DB_CONNECT();
    $result = mysql_query("INSERT INTO player(username, pasword) VALUES('$username', '$password')");

    // check if inserted
    if ($result) {
        // it is inserted
        $response["success"] = 1;
        $response["message"] = "Player created.";

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
    $response["message"] = "Required field(s) is missing";

    // echoing JSON response
    echo json_encode($response);
}
?>
