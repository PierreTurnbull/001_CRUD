<?php
$query  = "SELECT ID, first_name, last_name, age FROM data ORDER BY ID";
$stmt   = $server->prepare($query);
$stmt->execute();
$data   = $stmt->get_result()->fetch_all();
if (!isset($data)) {
    echo "Error: couldn't retrieve datas<br>";
    exit;
} else {
    echo "Data retrieved<br>";
}
?>