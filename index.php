<?php
include("class/users.php");
$signup = new users;
$signin = new users;

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
	header("location: home.php");
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

		$(document).ready(function () {

			$(document)[0].oncontextmenu = function () { return false; }

			$(document).mousedown(function (e) {
				if (e.button == 2) {
					// alert('Sorry, this functionality is disabled!');
					return false;
				} else {
					return true;
				}
			});
		});
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

		.col-sm-5{
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
						<h1>Quizlet</h1>
					</center>
				</div>
			</div>
			<div class="col-sm-5">
				<br>
				<div class="panel panel-info">
					<center>
						<div class="panel-heading">Sign In Your Account</div>
					</center>
					<div class="panel-body">
						<?php
						if (isset($_GET['run']) && $_GET['run'] == "failed") {
							echo "<mark>Check you email or password</mark>";
						}
						?>
						<form role="form" method="post" action="signin_sub.php">
							<div class="form-group">
								<label for="email">Email address:</label>
								<input type="email" class="form-control" name="e" id="email" placeholder="Email"
									required>
							</div>
							<div class="form-group">
								<label for="pwd">Password:</label>
								<input type="password" class="form-control" name="p" id="pwd" placeholder="Password"
									required>
							</div>
							<div class="checkbox">
								<label><input type="checkbox"> Remember me</label>
								<a style="float:right; text-decoration: none; color: #fff;;"
									href="admin/index.php">Login as Admin</a>
							</div>
							
							<button type="submit" class="btn btn-default" name="signin">Submit</button>
						</form>
					</div>
				</div>
			</div>
			<div class="col-sm-2"></div>
			<div class="col-sm-5">
				<br>


				<div class="panel panel-info">
					<center>
						<div class="panel-heading">Create An Account</div>
					</center>
					<div class="panel-body">
						<?php
						if (isset($_GET['run']) && $_GET['run'] == "success") {
							echo "<mark>Registrataion succesfull</mark>";
						}
						?>
						<form role="form" method="post" action="signup_sub.php" enctype="multipart/form-data">
							<div class="form-group">
								<label for="firstname">Name</label>
								<input type="text" class="form-control" name="n" id="firstname" placeholder="Name"
									required>
							</div>
							<div class="form-group">
								<label for="email">Email</label>
								<input type="email" class="form-control" name="e" id="email" placeholder="Email"
									required>
							</div>
							<div class="form-group">
								<label for="pwd">Password:</label>
								<input type="password" class="form-control" name="p" id="pwd" placeholder="Password"
									required>
							</div>
							<div class="form-group">
								<label for="pwd">Avatar:</label>
								<input type="file" class="form-control" name="img">
							</div>
							<div class="checkbox">
								<label><input type="checkbox"> Remember me</label>
							</div>
							<button type="submit" class="btn btn-default" name="signup">Submit</button>
						</form>
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-footer">&copy; copyright<p style="float:right">Designed & Developed by Unknown</p>
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