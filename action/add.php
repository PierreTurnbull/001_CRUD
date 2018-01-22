<?php

// CHECK IF POST VALUES ARE VALID
if      (!isset($_POST)) {
    echo "fuck off 1";
    exit;
}
else if ($_POST["first_name"] == "" || $_POST["last_name"] == "" || $_POST["age"] == "") {
    echo "fuck off 2";
    exit;
}
else if (!is_numeric($_POST["age"])) {
    echo "fuck off 3";
    exit;
}

// CONNECT TO SERVER AND DATABASE
require_once "../connection.php";

// GET DATA
require_once "../get_data.php";

// RETURN TO INDEX
header("Location: ../index.php");

?>