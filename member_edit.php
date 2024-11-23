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
        <h2 class="alert alert-info text-center" >Editing Member</h2>
        <?php
            $con=mysqli_connect('localhost','root','root','library');
            $sql="select * from member where id=".$_GET['uid'];
            $q=mysqli_query($con,$sql) or die(mysqli_error($con));
            $row=mysqli_fetch_array($q);
        ?>
        <form method="POST" action="">
            <input type="hidden" name="uid" value="<?echo $_GET['uid']?>" >
            <label for="">Name :</label>
            <input type="text" name="first_name" class="form-control" value="<?echo $row['first_name']?>"><br>
            <label for="">Surname :</label>
            <input type="text" name="last_name" class="form-control" value="<?echo $row['last_name']?>"><br>
            <label for="">Address :</label>
            <input type="text" name="address" class="form-control" value="<?echo $row['address']?>"><br>
            <label for="">Phone :</label>
            <input type="number" name="phone" class="form-control" value="<?echo $row['phone']?>"><br>
            <label for="">Email :</label>
            <input type="email" name="email" class="form-control" value="<?echo $row['email']?>"><br>
            <label for="">Start Date :</label>
            <input type="date" name="start_date" class="form-control" value="<?echo $row['start_date']?>"><br>
            <label for="">Expiry Date :</label>
            <input type="date" name="expiry_date" class="form-control" value="<?echo $row['expiry_date']?>"><br>
            <input type="submit" name="s" value="Edit" class="btn btn-warning" >
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
                $sql="update member set first_name='{$first_name}',last_name='{$last_name}',address='{$address}',phone='{$phone}',email='{$email}',start_date='{$start_date}',expiry_date='{$expiry_date}' where id=".$_POST['uid'];
                $q=mysqli_query($con,$sql) or die(mysqli_error($con)) ;
                if ($q) {
                    ?>
                    <script>
                        alert("Data updated successfully!");
                        window.location.href="member.php";
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