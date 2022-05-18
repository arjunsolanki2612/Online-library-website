<?php
	session_start();
	include('pdo.php');

	$bookid=$_GET['bookid'];
	$sql="SELECT * FROM books WHERE bookid=:bookid";
	$query = $dbh -> prepare($sql);
	$query-> bindParam(':bookid', $bookid, PDO::PARAM_STR);
	$query->execute();
	$result=$query->fetch(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tutorial</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">
    <!-- CSS -->
    <link href="book-desc.css" rel="stylesheet">
    <meta name="robots" content="noindex,follow" />

  </head>

  <body>
    <main class="container">

      <!-- Left Column / book Image -->
      <div class="left-column">
        <img src="images/<?php echo htmlentities($result->bdir);?>">
      </div>


      <!-- Right Column -->
      <div class="right-column">

        <!-- book Description -->
        <div class="book-description">
          <span><?php echo htmlentities($result->genre); ?></span>
          <h1><?php echo htmlentities($result->bname); ?></h1>
          <h3> By <?php echo htmlentities($result->bauthor); ?></h3>
          <p>ISNB: <?php echo htmlentities($result->isnb); ?></p>
        </div>

        <div class="product-configuration">

          <div class="product-color">
            <span>Description</span>
    		<p><?php echo htmlentities($result->bdes); ?></p>
          </div>
        </div>
      </div>
    </main>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" charset="utf-8"></script>
    <script src="script.js" charset="utf-8"></script>
  </body>
</html>
