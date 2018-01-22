<?php

// LOAD SESSION
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
    header("Location: ../index.php");
    exit;
}

// CONNECT TO SERVER AND DATABASE
require_once "../connection.php";

// ADD DATA
$query  = "INSERT INTO data(first_name, last_name, age) VALUES(?, ?, ?)";
$stmt   = $server->prepare($query);
$stmt->bind_param("sss", $_POST["first_name"], $_POST["last_name"], $_POST["age"]);
$stmt->execute();

// RETURN TO INDEX
header("Location: ../index.php");

?>