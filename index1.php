<?php
include "connection.php"
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library management system</title>
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Style+Script&family=Ubuntu&display=swap"
        rel="stylesheet">

    <!-- to make carousel work -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>

    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="style1.css">
    <script src="https://kit.fontawesome.com/91f536c46e.js" crossorigin="anonymous"></script>
</head>

<body>
    <section id="Navigtaion">

        <!-- Nav Bar -->
        <div class="container-fluid">


            <nav class="navbar navbar-expand-lg navbar-dark">
                <a class="navbar-brand" href="">
                    <h2 class="navbar-heading">Online Library <br />Management System</h2>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarTogglerDemo02" aria-controls="#navbarTogglerDemo02" aria-expanded="false"
                    aria-label="Toggle navigation">
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

            <!-- navigation section -->
            <div class="row">
                <div class="col-lg-6">
                    <h1 class="big-heading">A Library of Good Community.
                        Read.Learn.Educate.
                    </h1>


                </div>
                <div class="col-lg-6">
                    <img class="title-img" src="images/section-1-library.jpg" alt="library-mockup">
                </div>

            </div>
    </section>

    <section id="Login-section">
        <div class="row">
            <div class="col-md-3 col-sm-12"><i class="fa-solid fa-user fa-4x user-login-image"></i>
                <!-- <button class="login-user">Login</button> -->

                <div class="card-section">
                    <h2>User Login</h2>
                    <p class="p1-login-user">Login with your credentials to get access to the Library.</p>
                      <a href="index.php" class="login-user">Login</a>

                </div>


            </div>
            <div class="col-md-3 col-sm-12"><i class="fa-solid fa-graduation-cap fa-4x admin-login-image"></i>
                <!-- <button class="login-admin">Login</button> -->

                <div class="card-section">
                    <h2>Admin Login</h2>
                    <p class="p2-login-user">Login with your Admin Id and password to get access to your account. </p>
                      <a href="adminlogin.php" class="login-admin">Login</a>
                </div>
            </div>
            <div class="col-md-3 col-sm-12"><i class="fa-solid fa-user fa-4x user-signup-image"></i>
                <!-- <button class="signUp-user">SignUp</button> -->

                <div class="card-section">
                    <h2>User SignUp</h2>
                    <p class="p3-signup-user">New to the Library SignUp Now. </p>
                    <a href="signup.php" class="signUp-user">SignUp</a>
                </div>
            </div>
            <!-- <div class="col-md-3 col-sm-12"><i class="fa-solid fa-graduation-cap fa-4x admin-login-image"></i>


                <div class="card-section">
                    <h2>Admin SignUp</h2>
                    <p class="p2-login-user">Login with your Admin Id and password to get access to your account. </p>
                    <a href="ADMIN/registration.php" class="signUp-admin">SignUp</a>
                </div>
            </div> -->

        </div>

    </section>










    </div>
</body>

</html>
