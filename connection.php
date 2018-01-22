<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$database   = "001_CRUD";
$server     = new mysqli($servername, $username, $password, $database);
if (isset($server->connect_error)) {
    echo "Failed to connect to database " . $database . ": \"" . $server->connect_error . "\"<br>";
} else {
    echo "Connection to database " . $database . " Succeeded!<br>";
}
?>