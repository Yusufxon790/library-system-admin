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
        <h2 class="alert alert-primary text-center " >Adding Staff</h2>
        <form action="" method="POST" >
           <label for="">Name :</label>
           <input type="text" name="first_name" class="form-control"><br>
           <label for="">Surname :</label>
           <input type="text" name="last_name"  class="form-control" ><br>
           <label for="">Position :</label>
           <input type="text" name="position" class="form-control"><br>
           <label for="">Phone :</label>
           <input type="number" name="phone" class="form-control"><br>
           <label for="">Email :</label>
           <input type="email" name="email" class="form-control"><br>
           <label for="">HireDate :</label>
           <input type="date" name="hiredate"  class="form-control"  ><br>
            <input type="submit" name="s" value="Send" class="btn btn-info" >
            <a href="staff.php" class="btn btn-danger" >Back</a>
        </form>
    </div>
    <?php
     if (isset($_POST['s'])) {
        $first_name=addslashes($_POST['first_name']);
        $last_name=addslashes($_POST['last_name']);
        $position=addslashes($_POST['position']);
        $phone=addslashes($_POST['phone']);
        $email=addslashes($_POST['email']);
        $hiredate=addslashes($_POST['hiredate']);
        $con=mysqli_connect('localhost','root','root','library');
        $sql="insert into staff(first_name,last_name,position,phone,email,hiredate) values('{$first_name}','{$last_name}','{$position}','{$phone}','{$email}','{$hiredate}')";
        $q=mysqli_query($con,$sql) or die(mysqli_error($con));
        if ($q) {
            ?>
                <script>
                    alert("Data inserted successfully!");
                </script>
            <?
        }
        else{
            ?>
                <script>
                    alert("Data is not inserted!!");
                </script>
            <?
        }
     }
    ?>
</body>
<script src="./jquery.js" ></script>
</html>