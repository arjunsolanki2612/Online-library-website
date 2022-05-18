<?php
	session_start();
	include('pdo.php');

/*	if(strlen($_SESSION['alogin'])==0)
	{
		header('location:index.php');
	}*/

    if(isset($_GET['del']))
    {
    $id=$_GET['del'];
    $sql = "delete from books  WHERE bookid=:id";
    $query = $dbh->prepare($sql);
    $query -> bindParam(':id',$id, PDO::PARAM_STR);
    $query -> execute();
    $_SESSION['delmsg']="Category deleted scuccessfully ";
    header('location:book-list.php');
    }

?>


<!DOCTYPE html>
<html>
<head>
	<title>book-list</title>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="../assets/css/bootstrap1.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- DATATABLE STYLE  -->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="../assets/css/styles.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>

    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">BOOK LIST</h4>
    </div>



        </div>
            <div class="row">
                <div class="col-md-12">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Books Listing
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Book Name</th>
                                            <th>Genre</th>
                                            <th>Author</th>
                                            <th>ISBN</th>
                                            <th>Availability</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php $sql = "SELECT * FROM books";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>
                                        <tr class="odd gradeX">
                                            <td class="center"><?php echo htmlentities($cnt);?></td>
                                            <td class="center" width="300">
										<a href="book-description.php?bookid=<?php echo htmlentities($result->bookid);?>">
                                            <img src="images/<?php echo htmlentities($result->bdir);?>" width="100">
                                        </a>
                                                <br /><b><?php echo htmlentities($result->bname);?></b></td>
                                            <td class="center"><?php echo htmlentities($result->genre);?></td>
                                            <td class="center"><?php echo htmlentities($result->bauthor);?></td>
                                            <td class="center"><?php echo htmlentities($result->isnb);?></td>
                                            <td class="center">
                                            	<?php
                                            	if($result->avail == 1)
                                            		echo "Book Available for Issue";
                                            	else
                                            		echo "Book Issued";
                                            	?></td>
                                            <td class="center">

                                            <a href="book-edit.php?bookid=<?php echo htmlentities($result->bookid);?>"><button class="btn btn-primary"><i class="fa fa-edit "></i> Edit</button>
                                          <a href="book-list.php?del=<?php echo htmlentities($result->bookid);?>" onclick="return confirm('Are you sure you want to delete?');"" >  <button class="btn btn-danger"><i class="fa fa-pencil"></i> Delete</button>
                                            </td>
                                        </tr>
 <?php $cnt=$cnt+1;}} ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>

                </div>
            </div>



    </div>
    </div>

</body>
</html>
