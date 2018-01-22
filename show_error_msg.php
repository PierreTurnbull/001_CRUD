<?php
if      (isset($_SESSION["error1"]) || isset($_SESSION["error2"]) || isset($_SESSION["error3"])) {
echo "<p class='error_msg'>";
    echo "Error:<br>";
    if      (isset($_SESSION["error1"])) {
    echo $_SESSION["error1"] . "<br>";
    unset($_SESSION["error1"]);
    }
    if (isset($_SESSION["error2"])) {
    echo $_SESSION["error2"] . "<br>";
    unset($_SESSION["error2"]);
    }
    if (isset($_SESSION["error3"])) {
    echo $_SESSION["error3"] . "<br>";
    unset($_SESSION["error3"]);
    }
    echo "</p>";
}
?>