<?php
session_start();
error_reporting(0);
include('pdo.php');
if(strlen($_SESSION['alogin'])==0)
    {
header('location:book-list.php');
}
else{

if(isset($_POST['update']))
{

$bookid=$_GET['bookid'];
$bookimg=$_FILES["bookpic"]["name"];
//currentimage
$cimage=$_POST['curremtimage'];
$cpath="images"."/".$cimage;
// get the image extension
$extension = substr($bookimg,strlen($bookimg)-4,strlen($bookimg));
// allowed extensions
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
// Validation for allowed extensions .in_array() function searches an array for a specific value.
//rename the image file
$imgnewname=md5($bookimg.time()).$extension;
// Code for move image into directory
move_uploaded_file($_FILES["bookpic"]["tmp_name"],"images/".$imgnewname);
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{
$sql="UPDATE books SET bdir=:imgnewname where bookid=:bookid";
$query = $dbh->prepare($sql);
$query->bindParam(':imgnewname',$imgnewname,PDO::PARAM_STR);
$query->bindParam(':bookid',$bookid,PDO::PARAM_STR);
$query->execute();
unlink($cpath);
echo "<script>alert('Book image updated successfully');</script>";
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
      <!------MENU SECTION START-->
<?php include('includes/header.php');?>
<!-- MENU SECTION END-->
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Edit Book</h4>

                            </div>

</div>
<div class="row">
<div class="col-md12 col-sm-12 col-xs-12">
<div class="panel panel-info">
<div class="panel-heading">
Book Info
</div>
<div class="panel-body">
<form role="form" method="post" enctype="multipart/form-data">
<?php
$bookid=intval($_GET['bookid']);
$sql = "SELECT * FROM books WHERE bookid=:bookid";
$query = $dbh -> prepare($sql);
$query->bindParam(':bookid',$bookid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>
<input type="hidden" name="curremtimage" value="<?php echo htmlentities($result->bdir);?>">
<div class="col-md-6">
<div class="form-group">
<label>Book Image</label>
<img src="images/<?php echo htmlentities($result->bdir);?>" width="100">
</div></div>

<div class="col-md-6">
<div class="form-group">
<label>Book Name<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="bookname" value="<?php echo htmlentities($result->bname);?>" readonly />
</div></div>

<div class="col-md-6">
 <div class="form-group">
 <label>Book Picture<span style="color:red;">*</span></label>
 <input class="form-control" type="file" name="bookpic" autocomplete="off"   required="required" />
 </div>
    </div>
 <?php }} ?><div class="col-md-12">
<button type="submit" name="update" class="btn btn-info">Update </button></div>

                                    </form>
                            </div>
                        </div>
                            </div>

        </div>

    </div>
    </div>

</body>
</html>
<?php } ?>