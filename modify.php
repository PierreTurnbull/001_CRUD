<?php

// CONNECT TO SERVER AND DATABASE
require_once "connection.php";

// START SESSION
session_start();
if (isset($_POST["ID"])) {
    $_SESSION["modify_ID"] = $_POST["ID"];
}

// GET DATA
$query  = "SELECT * FROM data WHERE ID=?";
$stmt   = $server->prepare($query);
$stmt->bind_param("s", $_SESSION["modify_ID"]);
$stmt->execute();
$data   = $stmt->get_result()->fetch_all();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        th {
            background-color: #EEE;
        }

        th, td {
            border: 1px solid black;
            width: 150px;
        }

        table {
            border: 1px solid black;
        }

        .modify_form {
            margin-top: 30px;
        }

        .modify_form > input {
            width: 150px;
        }

        .error_msg {
            background-color: red;
            width: 300px;
            border: 3px solid darkred;
        }
    </style>
</head>
<body>
    <h2>MODIFY DATA:</h2>
    <?php echo "<table>
<tr>
<th>First name</th>
<th>Last name</th>
<th>Age</th>
</tr>
<td>" . $data[0][1] . "</td>
<td>" . $data[0][2] . "</td>
<td>" . $data[0][3] . "</td>
</tr>
</table>"?>
    <form class="modify_form" action="action/ACTION_modify.php" method="POST">
        <input type="text"      name="first_name"   value="<?php echo $data[0][1] ?>" placeholder="First name">
        <input type="text"      name="last_name"    value="<?php echo $data[0][2] ?>" placeholder="Last name">
        <input type="text"      name="age"          value="<?php echo $data[0][3] ?>" placeholder="Age">
        <input type="submit">
    </form>
    <?php

    // SHOW ERROR MESSAGES
    require_once "show_error_msg.php";

    ?>
</body>
</html>