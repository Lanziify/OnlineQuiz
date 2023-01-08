<?php
include("../class/users.php");
$admin = new users;


if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
  header("location: dashboard.php");
  exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Quiz</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript">

    // $(document).ready(function () {

    //   $(document)[0].oncontextmenu = function () { return false; }

    //   $(document).mousedown(function (e) {
    //     if (e.button == 2) {
    //       alert('Sorry, this functionality is disabled!');
    //       return false;
    //     } else {
    //       return true;
    //     }
    //   });
    // });
  </script>
  <style>
    body {
      width: 100vw;
      height: 100vh;
      background: url("https://www.leadquizzes.com/wp-content/uploads/2019/02/New-blog-graphic.jpg") no-repeat;
      background-position: center;
      background-size: cover;
    }



    .row {
      margin-right: unset;
      margin-left: unset;
    }

    .panel-info {
      color: #fff;
      border: none;
      border-radius: 10px;
      background-color: #002A6350;
      backdrop-filter: blur(8px);
    }

    .panel-info .panel-heading {
      color: #ffff;
      border: none;
      background-color: #F37868;
      backdrop-filter: blur(20px);
      border-radius: 10px;
    }

    .col-sm-5 {
      padding-left: unset;
      padding-right: unset;
    }

    .panel-default,
    .panel-footer {
      color: #fff;
      border: none;
      border-radius: 0px;
      background-color: transparent;
    }

    .form-control,
    .btn-default {
      border: none;
    }

    .btn-default {
      width: 100%;
      color: #fff;
      transition: all .4s ease-in-out;
      background-color: #F37868;
    }

    .btn-default:hover,
    .btn-default:active:focus,
    .btn-default:active:hover {
      color: #fff;
      border: none;
      background-color: #FF6C59;
    }

    .panel-default {
      margin-bottom: 0px;
    }
  </style>

</head>

<body>
  <div class="container"> 
    <div class="row">
      <br>
      <div class="panel panel-info">
        <div class="panel-heading">
          <center>
            <h1>Quizlet Admin Page</h1>
          </center>
        </div>
      </div>

      <!-- Admin Form -->
        <div class="panel panel-info">
          <center>
            <div class="panel-heading">Admin login</div>
          </center>
          <div class="panel-body">
            <?php
            if (isset($_GET['run']) && $_GET['run'] == "failed") {
              echo "<mark>Check you username or password</mark>";
            }
            ?>
            <form role="form" method="post" action="admin_signin.php">
              <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" name="u" id="username" placeholder="Username" required>
              </div>
              <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" name="p" id="pwd" placeholder="Password" required>
              </div>
              <div class="checkbox">
                <label><input type="checkbox"> Remember me</label>
                <input style="float: right; background-color: unset; border: none;" type="button" value="Return"
                  onclick="history.back()">
              </div>
              <button type="submit" class="btn btn-default" name="signin">Submit</button>
            </form>
          </div>
      </div>
    </div>
  </div>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
</body>

</html>