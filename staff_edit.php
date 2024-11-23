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
    <div class="container">
        <h2 class="alert alert-warning text-center " >Edit Staffs</h2>
        <?php
            $con=mysqli_connect('localhost','root','root','library');
            $sql="select * from staff where id=".$_GET['uid'];
            $q=mysqli_query($con,$sql);
            $row=mysqli_fetch_array($q);
        ?>
        <form action="" method="POST" >
            <input type="hidden" name="uid" value="<?echo $_GET['uid']?>" >
            <label for="">Name :</label>
            <input type="text" name="first_name" value="<?echo $row['first_name']?>" class="form-control" ><br>
            <label for="">Surname :</label>
            <input type="text" name="last_name" value="<?echo $row['last_name']?>" class="form-control" ><br>
            <label for="">Position :</label>
            <input type="text" name="position" value="<?echo $row['position']?>" class="form-control" ><br>
            <label for="">Phone :</label>
            <input type="number" name="phone" value="<?echo $row['phone']?>" class="form-control" ><br>
            <label for="">Email :</label>
            <input type="email" name="email" value="<?echo $row['email']?>" class="form-control" ><br>
            <label for="">Hiredate :</label>
            <input type="date" name="hiredate" value="<?echo $row['hiredate']?>" class="form-control" ><br>
            <input type="submit" name="s"  value="Edit" class="btn btn-warning" >
            <a href="staff.php" class="btn btn-danger" >Back</a>
        </form>
        <?php
            if (isset($_POST['s'])) {
                $first_name=addslashes($_POST['first_name']);
                $last_name=addslashes($_POST['last_name']);
                $position=addslashes($_POST['position']);
                $phone=addslashes($_POST['phone']);
                $email=addslashes($_POST['email']);
                $hiredate=addslashes($_POST['hiredate']);
                $con=mysqli_connect('localhost','root','root','library');
                $sql="update staff set first_name='{$first_name}', last_name='{$last_name}',position='{$position}',phone='{$phone}',email='{$email}',hiredate='{$hiredate}' where id=".$_POST['uid'];
                $q=mysqli_query($con,$sql) or die(mysqli_error($con)) ;
                if ($q) {
                    ?>
                    <script>
                        alert("Data updated successfully!");
                        window.location.href="staff.php";
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
    </div>
</body>
</html>