<?php
	session_start();
	error_reporting(0);
	include('pdo.php');
	/*if(strlen($_SESSION['alogin'])==0)
	    {
	header('location:index.php');
	}*/
	//else
	//{

	if(isset($_POST['update']))
	{
	$bookname=$_POST['bname'];
	$genre=$_POST['genre'];
	$author=$_POST['author'];
	$isnb=$_POST['isnb'];
	$avail=$_POST['avail'];
	$bookid=$_GET['bookid'];
	$sql="UPDATE books SET bname=:bookname, genre=:genre, bauthor=:author, isnb=:isnb, avail=:avail WHERE books.bookid=:bookid";
	$query = $dbh->prepare($sql);
	$query->bindParam(':bookname',$bookname,PDO::PARAM_STR);
	$query->bindParam(':genre',$genre,PDO::PARAM_STR);
	$query->bindParam(':author',$author,PDO::PARAM_STR);
	$query->bindParam(':isnb',$isnb,PDO::PARAM_INT);
	$query->bindParam(':avail',$avail,PDO::PARAM_BOOL);
	$query->bindParam(':bookid',$bookid,PDO::PARAM_STR);

	if($query->execute())
		{
			echo "<script>alert('Book info updated successfully');</script>";
			echo "<script>window.location.href='book-list.php'</script>";
		}

	else
	{
		echo "<script>alert('Errror');</script>";
		echo "<script>window.location.href='book-list.php'</script>";
	}

	}

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Edit Book</title>

    <link href="../assets/css/bootstrap1.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="../assets/css/styles.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>

    <div class="content-wrapper">
         <div class="container">

	        <div class="row pad-botm">
	            <div class="col-md-12">
	                <h4 class="header-line">Add Book</h4>
	            </div>

			</div>
	<div class="row">
	<div class="col-md12 col-sm-12 col-xs-12">
	<div class="panel panel-info">
	<div class="panel-heading">
	Book Info
	</div>
	<div class="panel-body">
	<form role="form" method="post">
		<?php
		$bookid=$_GET['bookid'];
		$sql = "SELECT * FROM books where bookid=:bookid";
		$query = $dbh -> prepare($sql);
		$query->bindParam(':bookid',$bookid,PDO::PARAM_STR);
		$query->execute();
		$results=$query->fetchAll(PDO::FETCH_OBJ);
		$cnt=1;
		if($query->rowCount() > 0)
		{
		foreach($results as $result)
		{               ?>

	<div class="col-md-6">
	<div class="form-group">
	<label>Book Image</label>
	<img src="images/<?php echo htmlentities($result->bdir);?>" width="100">
	<a href="change-img.php?bookid=<?php echo htmlentities($result->bookid);?>">Change Book Image</a>
	</div></div>

	<div class="col-md-6">
	<div class="form-group">
	<label>Book Name<span style="color:red;">*</span></label>
	<input class="form-control" type="text" name="bname" value="<?php echo htmlentities($result->bname);?>" required />
	</div></div>

	<div class="col-md-6">
	<div class="form-group">
	<label>Genre<span style="color:red;">*</span></label>
	<input class="form-control" type="text" name="genre" value="<?php echo htmlentities($result->genre);?>" required />
	</div></div>
	</div></div>

	<div class="col-md-6">
	<div class="form-group">
	<label> Author<span style="color:red;">*</span></label>
	<input class="form-control" type="text" name="author" value="<?php echo htmlentities($result->bauthor);?>" required />
	<div></div>

	<div class="col-md-6">
	<div class="form-group">
	<label>ISNB Number<span style="color:red;">*</span></label>
	<input class="form-control" type="text" name="isnb" value="<?php echo htmlentities($result->isnb);?>" required/>
	<p class="help-block">ISNB must be unique</p>
	</div></div>


	<div class="col-md-6">
	 <div class="form-group">
	 <label>Availbility<span style="color:red;">*</span></label>
	 <select class="form-control" name="avail" required="required">
		<option value="0">Issued</option>
		<option value="1">Available</option>
	</select>
	 </div>
	</div>

	 <?php }} ?>
	 <div class="col-md-12">
	<button type="submit" name="update" id="update" class="btn btn-info">Update </button></div>

    </form>
                            </div>
                        </div>
                            </div>

        </div>

    </div>
    </div>
</body>
</html>

<?php //} ?>
