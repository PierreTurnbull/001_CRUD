<?php

// CONNECT TO SERVER AND DATABASE
require_once "connection.php";

// GET DATA
require_once "get_data.php";

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

        .action_form {
            display: inline-block;
            width: 50%;
        }

        .action_form > input {
            display: inline-block;
            width: 100%;
            text-align: center;
        }

        input[type="value"] {
            display: none;
        }

        .add_form {
            margin-top: 30px;
        }

        .add_form > input {
            width: 150px;
        }
    </style>
</head>
<body>
<table>
    <tr>
        <th>ID</th>
        <th>First name</th>
        <th>Last name</th>
        <th>Age</th>
        <th>Action</th>
    </tr>
    <?php

    // INSERT DATA INTO TABLE
    $i      = 0;
    $j      = 0;
    while (isset($data[$i])) {
        echo "<tr>";
        while (isset($data[$i][$j])) {
            echo "<td>" . $data[$i][$j] . "</td>";
            $j++;
        }
        echo "<td>" .
        "<form class='action_form' action='delete.php' method='POST'><input type='value' value='" . $data[$i][0] . "'><input type='submit' value='Delete'></form>" .
        "<form class='action_form' action='modify.php' method='POST'><input type='value' value='" . $data[$i][0] . "'><input type='submit' value='Modify'></form>" .
            "</td>";
        echo "</tr>";
        $j = 0;
        $i++;
    }
    ?>
</table>
<form class="add_form" action="action/add.php" method="POST">
    <input type="text"      name='first_name'   placeholder="First name">
    <input type="text"      name='last_name'    placeholder="Last name">
    <input type="text"      name='age'          placeholder="Age">
    <input type="submit"    value="Add">
</form>
</body>
</html>