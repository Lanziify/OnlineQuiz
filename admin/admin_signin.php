<?php
include("../class/users.php");
$login = new users;
extract($_POST);
if ($login->admin($u, $p)) {
	$_SESSION["loggedin"] = true;
	$login->url("dashboard.php");
} else {
	$login->url("index.php?run=failed");
}
?>