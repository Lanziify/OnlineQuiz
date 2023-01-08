<?php
include "../class/users.php";
session_destroy();
$logout=new users;
if(isset($_GET['run']) && $_GET['run']=="log")
{
	$logout->url("index.php");
}
?>