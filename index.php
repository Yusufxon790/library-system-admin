<?
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./bootstrap-5.3/css/bootstrap.css">
</head>
<body>
    <div class="container">
        <h2 class="alert alert-primary text-center mt-4 ">Enter Login & Password</h2>
        <div class="d-flex justify-content-center" >
            <div class="card border-primary shadow-sm" style="width: 30rem;" >
                <div class="card-body">
                    <form action="" method="POST">
                        <input type="text" class="form-control" name="username" placeholder="Login.." required ><br>
                        <input type="password" class="form-control" name="password"  placeholder="Password.." required ><br>
                        <input type="submit" value="Send"  class="btn btn-primary" name="s" >
                    </form>
                    <?php
                    $con=mysqli_connect('localhost','root','root','library');
                    $sql="select * from login where id=1";
                    $q=mysqli_query($con,$sql) or die(mysqli_error($con)) ;
                    $row=mysqli_fetch_array($q);
                    if (isset($_POST['s'])) {
                        if ($_POST['username']==$row['username'] && $_POST['password']==$row['password']) {
                            $_SESSION['c_password']=true;
                            ?>
                            <script>
                                window.location.href="book.php";
                            </script>
                            <?
                        
                        }
                        else{
                            $error='Error in login or password';
                        }
                    }
                    
                
                    ?>
                    <p style="color: red;" >
                        <?echo $error;?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>