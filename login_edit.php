<?
session_start();
if (!(isset($_SESSION['c_password']))) {
   ?>
   <script>
    window.location.href="login_check.php";
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
    <div class="container">
        <h2 class="alert alert-warning text-center" >Edit Login and Password</h2>
        <?php
        $con=mysqli_connect('localhost','root','root','library');
        $sql="select * from login where id=1";
        $q=mysqli_query($con,$sql) or die(mysqli_error($con)) ;
        $row=mysqli_fetch_array($q);
        ?>
        <form action="" method="POST" >
            <label for="">Username :</label>
            <input type="text" name="username" class="form-control" value="<?echo $row['username']?>" ><br>
            <label for="">Password :</label>
            <input type="text" name="password" class="form-control" value="<?echo $row['password']?>" ><br>
            <input type="submit" value="Edit" name="s" class="btn btn-warning" >
            <a href="book.php" class="btn btn-danger" > Back</a>
        </form>
        <?php
        $username=addslashes($_POST['username']);
        $password=addslashes($_POST['password']);
        if (isset($_POST['s'])) {
            $sql1="update login set username='{$username}',password='{$password}' where id=1";
            $q1=mysqli_query($con,$sql1) or die(mysqli_error($con));
            if ($q1) {
                ?>
                <script>
                    alert("Data updated successfully!");
                </script>
                <?
            }
            else {
                ?>
                <script>
                    alert("Data is not updated!!");
                </script>
                <?
            }
        }
        ?>
    </div>
</body>
</html>