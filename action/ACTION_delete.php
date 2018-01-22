<?php

// CONNECT TO SERVER AND DATABASE
require_once "../connection.php";

// DELETE DATA
$query  = "DELETE FROM data WHERE ID=?";
$stmt   = $server->prepare($query);
$stmt->bind_param("s", $_POST["ID"]);
$stmt->execute();

// RETURN TO INDEX
header("Location: ../index.php");

?>