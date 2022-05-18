<?php
include "connection.php";
error_reporting(0)

?>

<!DOCTYPE html>
<html>

<head>
	<title>Feedback</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- google fonts -->
	<link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Style+Script&family=Ubuntu&display=swap" rel="stylesheet">
	<!-- bootstrap js -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<!-- bootstrap css -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="feedback.css">
	<!-- <style type="text/css">
		body {
			background-image: url("images/66.jpg");
			background-repeat: no-repeat;
		}

		.wrapper {
			padding: 10px;
			margin: -20px auto;
			width: 900px;
			height: 600px;
			background-color: black;
			opacity: .8;
			color: white;
		}

		.form-control {
			height: 70px;
			width: 60%;
		}

		.scroll {
			width: 100%;
			height: 300px;
			overflow: auto;
		}
	</style> -->
</head>

<body>
	<section id="Navigation">

		<div class="container-fluid">




			<nav class="navbar navbar-expand-lg navbar-dark">
				<a class="navbar-brand" href="index1.php">
					<h2 class="navbar-heading">Online Library <br />Management System</h2>
				</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="#navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
					<ul class="navbar-nav ms-auto">
						<li class="nav-item">
							<a class="nav-link" href="index1.php">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="about.html">About</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="feedback.php">Requests</a>
						</li>
					</ul>
				</div>
			</nav>
		</div>
	</section>

	<section id="form-container">
		<div class="container">
			<form action="" method="post">
				<h1 class="text-capitalize text-center my-5">Put your Requests</h1>
						<marquee scrollamount="20"><h2 style="color:red;">Request Book giving your SID and Name</h2></marquee>
				<div class="mb-3">
					<label for="exampleFormControlTextarea1" class="form-label" placeholder="Please give your feedback">Add your Requests</label>
					<!-- <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea> -->
					<input class="form-control" type="text" name="comment" placeholder="Write something..."><br>
				</div>
				<!-- <a href="" class="btn btn-dark">Submit</a> -->
				<input class="btn btn-default" type="submit" name="submit" value="Comment" style="width: 100px; height: 35px;">
			</form>
		</div>

	</section>

	<br><br>
	<div class="scroll">

		<?php
		if (isset($_POST['submit'])) {
			// $sql="INSERT INTO `comments` VALUES('', '$_SESSION[login_user]', '$_POST[comment]');";
			$sql = "INSERT INTO `comments` VALUES('', '$_POST[comment]');";
			if (mysqli_query($db, $sql)) {
				$q = "SELECT * FROM `comments` ORDER BY `comments`.`id` DESC";
				$res = mysqli_query($db, $q);

				echo "<table class='table table-bordered'>";
				while ($row = mysqli_fetch_assoc($res)) {

					echo "<tr>";
					// echo "<td>"; echo $row['username']; echo "</td>";
					echo "<td>";
					echo $row['comment'];
					echo "</td>";
					echo "</tr>";
				}
				echo "</table>";
			}
		} else {
			$q = "SELECT * FROM `comments` ORDER BY `comments`.`id` DESC";
			$res = mysqli_query($db, $q);

			echo "<table class='table table-bordered'>";
			while ($row = mysqli_fetch_assoc($res)) {
				echo "<tr>";
				// echo "<td>"; echo $row['username']; echo "</td>";
				echo "<td>";
				echo $row['comment'];
				echo "</td>";
				echo "</tr>";
			}
			echo "</table>";
		}
		?>
	</div>
	</div>

</body>

</html>
