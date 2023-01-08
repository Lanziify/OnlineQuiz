<?php
include("class/users.php");
$login = new users;
extract($_POST);
if ($login->signin($e, $p)) {
	$_SESSION["loggedin"] = true;
	$login->url("home.php");
} else {
	$login->url("index.php?run=failed");
}
?>