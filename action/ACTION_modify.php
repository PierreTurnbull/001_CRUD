<?php

// CONNECT TO SERVER AND DATABASE
require_once "../connection.php";

// START SESSION
session_start();

// CHECK IF POST VALUES ARE VALID
$error = false;
if      (!isset($_POST)) {
    $_SESSION["error1"] = "No value was entered";
    $error = true;
}
if ($_POST["first_name"] == "" || $_POST["last_name"] == "" || $_POST["age"] == "") {
    $_SESSION["error2"] = "Please use all fields";
    $error = true;
}
if ($_POST["age"] != "" && !is_numeric($_POST["age"])) {
    $_SESSION["error3"] = "Field age must be numeric";
    $error = true;
}
if ($error == true) {
    header("Location: ../modify.php");
    exit;
} else {
    $query  = "UPDATE data
    SET first_name = ?, last_name = ?, age = ?
    WHERE ID = ?";
    $stmt   = $server->prepare($query);
    $stmt->bind_param("ssss", $_POST["first_name"], $_POST["last_name"], $_POST["age"], $_SESSION["modify_ID"]);
    $stmt->execute();
    var_dump($query);
    header("Location: ../index.php");
}

?>