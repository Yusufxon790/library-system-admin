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
        <h2 class="alert alert-info text-center" >Adding Member</h2>
        <form method="POST" action="">
            <input type="text" name="first_name" class="form-control" placeholder="Name" required><br>
            <input type="text" name="last_name" class="form-control" placeholder="Surname" required><br>
            <input type="text" name="address" class="form-control" placeholder="Address" required><br>
            <input type="number" name="phone" class="form-control" placeholder="Phone" required><br>
            <input type="email" name="email" class="form-control" placeholder="Email" required><br>
            <label for="">Start Date :</label>
            <input type="date" name="start_date" class="form-control" placeholder="Start Date" required><br>
            <label for="">Expiry Date :</label>
            <input type="date" name="expiry_date" class="form-control" placeholder="Expiry Date" required><br>
            <input type="submit" name="s" value="Send" class="btn btn-primary" >
            <a href="member.php" class="btn btn-danger" >Back</a>
        </form>

        <?php
            if (isset($_POST['s'])) {
                $first_name=addslashes($_POST['first_name']);
                $last_name=addslashes($_POST['last_name']);
                $address=addslashes($_POST['address']);
                $phone=addslashes($_POST['phone']);
                $email=addslashes($_POST['email']);
                $start_date=addslashes($_POST['start_date']);
                $expiry_date=addslashes($_POST['expiry_date']);
                $con=mysqli_connect('localhost','root','root','library');
                $sql="insert into member(first_name,last_name,address,phone,email,start_date,expiry_date) values('{$first_name}','{$last_name}','{$address}','{$phone}','{$email}','{$start_date}','{$expiry_date}')";
                $q=mysqli_query($con,$sql) or die(mysqli_error($con)) ;
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
    </div>
</body>
</html>