<?php
include("../class/users.php");
extract($_POST);
$updatecat = new users;

$id = $_POST[''];
$cat = $_POST['cat'];

if ($updatecat->update_category($id, $cat)) {
    $updatecat->url("categories.php?msg=run");
    //echo "Data inserted successfully";
}
?>
