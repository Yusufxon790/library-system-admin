<?
session_start();
if (!(isset($_SESSION['c_password']))) {
   ?>
   <script>
    window.location.href="index.php";
   </script>
   <?
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="page_logout.js" ></script>
    <link rel="stylesheet" href="./bootstrap-5.3/css/bootstrap.css">
</head>
<body>
    <div class="container mb-4">
        <h2 class="alert alert-warning text-center " >Edit Authors</h2>
        <?php
             $con=mysqli_connect('localhost','root','root','library');
             $sql="select * from author where id=".$_GET['uid'];
             $q=mysqli_query($con,$sql) or die(mysqli_error($con));
             $row=mysqli_fetch_array($q);
       ?>
       <form action="" method="POST" >
           <input type="hidden" name="uid" value="<?echo $_GET['uid']?>" >
           <label for="">Name :</label>
           <input type="text" name="first_name" value="<?echo $row['first_name']?>" class="form-control"><br>
           <label for="">Surname :</label>
           <input type="text" name="last_name" value="<?echo $row['last_name']?>" class="form-control" ><br>
           <label for="">Nationality :</label>
           <input type="text" name="nationality" value="<?echo $row['nationality']?>" class="form-control"><br>
           <label for="">Birth Date :</label>
           <input type="date" name="birth_date" value="<?echo $row['birth_date']?>" class="form-control"  ><br>
           <input type="submit" name="s" value="Edit" class="btn btn-info" >
           <a href="author.php" class="btn btn-danger" >Back</a>
       </form>
       <?
    ?>
    </div>
    <?php
     if (isset($_POST['s'])) {
        $first_name=addslashes($_POST['first_name']);
        $last_name=addslashes($_POST['last_name']);
        $nationality=addslashes($_POST['nationality']);
        $birth_date=addslashes($_POST['birth_date']);
        $con=mysqli_connect('localhost','root','root','library');
        $sql="update author set first_name='{$first_name}',last_name='{$last_name}',nationality='{$nationality}',birth_date='{$birth_date}' where id='{$_POST['uid']}'";
        $q=mysqli_query($con,$sql) or die(mysqli_error($con));
        if ($q) {
            ?>
                <script>
                    alert("Data Updated successfully!");
                    window.location.href="author.php";
                </script>
            <?
        }
        else{
            ?>
                <script>
                    alert("Data is not Updated!!");
                </script>
            <?
        }
     }
    ?>
</body>
</html>