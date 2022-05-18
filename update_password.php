<?php
	include "connection.php";
	// include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<!-- google fonts -->
<link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Style+Script&family=Ubuntu&display=swap"
rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
crossorigin="anonymous">
<link rel="stylesheet" href="../feedback.css">
	<title>Change Password</title>


</head>
<body>
	<section id="Navigation">

		<div class="container-fluid">




			<nav class="navbar navbar-expand-lg navbar-dark">
				<a class="navbar-brand" href="">
					<h2 class="navbar-heading">Online Library <br />Management System</h2>
				</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="#navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
					<ul class="navbar-nav ms-auto">
						<li class="nav-item">
							<a class="nav-link" href="../index.php">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#pricing">About</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="../feedback.php">Feedback</a>
						</li>
					</ul>
				</div>
			</nav>
		</div>
	</section>

	<section id="section-container">
	  <div class="container">
	    <div class="row">
	      <div class="col-md-6 col-sm-12">
	        <figure>
	          <img src="../images/admin-update.jpg" class="img-fluid" alt="book image">
	        </figure>

	      </div>
	      <div class="col-md-6 col-sm-12 border-update my-5 py-5">
					<form action="" method="post" >
						<div class="">
							<input type="text" name="username" class="form-control" placeholder="Username" required=""><br>
							<input type="text" name="email" class="form-control" placeholder="Email" required=""><br>
							<input type="text" name="password" class="form-control" placeholder="New Password" required=""><br>
							<button class="btn btn-primary" type="submit" name="submit" >Update</button>
						</div>

					</form>



	      </div>

	    </div>

	  </div>
	</section>

	<?php

		if(isset($_POST['submit']))
		{
			if(mysqli_query($db,"UPDATE admin SET password='$_POST[password]' WHERE username='$_POST[username]'
			AND email='$_POST[email]' ;"))
			{
				?>
					<script type="text/javascript">
                alert("The Password Updated Successfully.");
              </script>

				<?php
			}

		}
	?></div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
	integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
