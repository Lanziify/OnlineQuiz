<?php
include("../class/users.php");
$cat = new users;
$category = $cat->cat_shows();

// print_r($category);


if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: index.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- <link rel="icon" href="../../favicon.ico"> -->

    <title>Admin Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!-- <link href="../css/ie10-viewport-bug-workaround.css" rel="stylesheet"> -->

    <!-- Custom styles for this template -->
    <link href="../css/dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!-- <script src="../../assets/js/ie-emulation-modes-warning.js"></script> -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="dashboard.php">Quizlet</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="#">Settings</a></li>
                    <li><a href="profile.php">Profile</a></li>
                    <li><a href="../logout.php?run=log">Logout</a></li>
                </ul>
                <form class="navbar-form navbar-right">
                    <input type="text" class="form-control" placeholder="Search...">
                </form>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 col-md-2 sidebar">
                <ul class="nav nav-sidebar">
                    <li><a href="dashboard.php">Home</a></li>
                    <li><a href="createquiz.php">Upload question</a></li>
                    <li class="active"><a href="categories.php"><span class="sr-only">(current)</span>Edit
                            categories</a></li>
                </ul>
            </div>

            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <br>
                <br>
                <br>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <form method="post" action="delete_category.php">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th colspan="2" style="vertical-align: middle;">Category</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($category as $c) { ?>
                                        <tr>
                                            <td style="vertical-align: middle;">
                                                <?php echo $c['category']; ?>
                                            </td>
                                            <td style="width: 13rem;">
                                                <?php echo '<a class="btn btn-warning" style="padding: 5px;" href="update_category.php?updtcatid=' . $c['id'] . '">Update</a>' ?>
                                                <input type="hidden" name="id" value="<?php echo $c['id']; ?>">
                                                <button type="submit" class="btn btn-danger"
                                                    style="padding: 5px;">Delete</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                <?php } ?>
                            </table>
                        </form>
                    </table>
                </div>
                <form method="post" action="add_category.php">
                    <div class="form-group">
                        <label for="text">Create new category</label>
                        <input type="text" class="form-control" name="cat" placeholder="Enter Category Name" required>
                        <button style="margin-top: 10px;" type="submit" class="btn btn-success">Submit</button><br>
                    </div>
                </form>
                </tbody>
                <div class="form-group">
                    <center>
                        <?php
                        if (isset($_GET['msg']) && !empty($_GET['msg'])) {
                            echo '<div style="color: #fff; background-color: #5CB85C; border-radius: 5px; padding: 5px;">';
                            echo "<span>Data inserted successfully!</span>";
                            echo "</div>";
                        }
                        if (isset($_GET['msg_del']) && !empty($_GET['msg_del'])) {
                            echo '<div style="color: #fff; background-color: #5CB85C; border-radius: 5px; padding: 5px;">';
                            echo "<span>Data successfully deleted!</span>";
                            echo "</div>";
                        }
                        ?>
                    </center>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages will load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../js/ie10-viewport-bug-workaround.js"></script>
</body>

</html>