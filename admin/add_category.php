<?php
include("../class/users.php");
extract($_POST);
$category = new users;
$cat = $_POST['cat'];
if ($category->add_category($cat)) {
    $category->url("categories.php?msg=run");
    //echo "Data inserted successfully";
}
?>