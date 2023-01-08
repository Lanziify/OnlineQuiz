<?php
include("class/users.php");
$email = $_SESSION['email'];
$profile = new users;
$profile->users_profile($email);
$profile->cat_shows();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
	
	header("location: index.php");
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>QUIZ</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript">

		// $(document).ready(function () {

		// 	$(document)[0].oncontextmenu = function () { return false; }

		// 	$(document).mousedown(function (e) {
		// 		if (e.button == 2) {
		// 			// alert('Sorry, this functionality is disabled!');
		// 			return false;
		// 		} else {
		// 			return true;
		// 		}
		// 	});
		// });
	</script>
	<style>
		.nav-tabs {
			border-bottom: none;
		}

		.nav-tabs li {
			margin-bottom: 0;
		}

		.nav-tabs li a {
			color: gray;
			border: none;
		}

		.nav-tabs>li.active>a,
		.nav-tabs>li.active>a:focus,
		.nav-tabs>li.active>a:hover {
			color: #fff;
			background-color: #CE7777;
			border: none;
			border-radius: 10px;
		}
		
		.nav-tabs>li>a:hover{
			color: #CE7777;
			background-color: unset;
		}
		
		.tab-content {
			padding: 20px;
		}
	</style>
</head>

<body>

	<div class="container">
		<br>
		<ul class="nav nav-tabs">
			<li class="active"><a data-toggle="tab" href="#home">Home</a></li>
			<li><a data-toggle="tab" href="#menu1">Profile</a></li>

			<li style="float:right; color: #fff; background-color: #3D3C42; border-radius: 10px;"><a href="logout.php?run=log">Logout</a>
			</li>
		</ul>
		<br>
		<div class="tab-content">

			<div id="home" class="tab-pane fade in active">
				<div class="form-group header-online">
					<?php
					foreach ($profile->data as $prof) { ?>
						<img src="img/<?php echo $prof['img'] ?>" alt="" width="35px" height="35px"
							style="object-fit: cover; object-position: center; border-radius: 50px; overflow: hidden;" />
						<span>
							<?php echo $prof['name']; ?>
						</span>
					<?php } ?>
				</div>
				<center>
					<button type="button" class="btn btn-info" data-toggle="tab" href="#select">StartQuiz</button>
				</center>
				<div class="col-sm-4"></div>
				<div class="col-sm-4"><br>
					<div id="select" class="tab-pane fade">

						<form method="post" action="qus_show.php">
							<select class="form-control" id="select" name="cat">
								<option>select category</option>
								<?php
								foreach ($profile->cat as $category) { ?>
									<option value="<?php echo $category['id']; ?>">
										<?php echo $category['category']; ?>
									</option>
								<?php } ?>
							</select><br>
							<center><input type="submit" value="submit" class="btn btn-success"></center>
						</form>


					</div>
				</div>
				<div id="" class="col-sm-4"></div>
			</div>


			<div id="menu1" class="tab-pane fade">
				<h3>Profile</h3>

				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th>Id</th>
								<th>Name</th>
								<th>Email</th>
								<th>image</th>
							</tr>
						</thead>
						<tbody>

							<?php
							foreach ($profile->data as $prof) { ?>

								<tr>
									<td><?php echo $prof['id']; ?></td>
									<td>
										<?php echo $prof['name']; ?>
									</td>
									<td><?php echo $prof['email']; ?></td>
									<td><img src="img/<?php echo $prof['img'] ?>" alt="" width="150px" height="150px"
											style="object-fit: cover; object-position: center;" />
									</td>
								</tr>
							</tbody>
						<?php } ?>

					</table>
				</div>
			</div>
		</div>
	</div>
</body>

</html>