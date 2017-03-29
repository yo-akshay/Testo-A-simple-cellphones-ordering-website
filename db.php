<?php
$con = mysqli_connect('localhost','root','');
if (!$con) {
    die('Not connected : ' . mysql_error());
}

// make foo the current db
$db_selected = mysqli_select_db($con,'testo');
if (!$db_selected) {
    die ('Can\'t use testo : ' . mysql_error());
}
?>