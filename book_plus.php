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
        <h2 class="alert alert-success text-center " >Plus Books Quantity</h2>
        <?php
             $con=mysqli_connect('localhost','root','root','library');
             $sql="select * from book where id=".$_GET['id'];
             $q=mysqli_query($con,$sql) or die(mysqli_error($con));
             $row=mysqli_fetch_array($q);
       ?>
       <form action="" method="POST" >
           <input type="hidden" name="id" value="<?echo $_GET['id']?>" >
           <label for="">Plus Quantity :</label>
           <input type="number" name="quantity" class="form-control" required ><br>
           <input type="submit" name="s" value="Plus" class="btn btn-info" >
           <a href="book_view.php?id=<?echo $_GET['id']?>" class="btn btn-danger" >Back</a>
       </form>
       <?
    ?>
    </div>
    <?php
     if (isset($_POST['s'])) {
        $quantity=addslashes($_POST['quantity']+$row['quantity']);
        $sql="update book set quantity='{$quantity}' where id='{$_POST['id']}'";
        $q=mysqli_query($con,$sql) or die(mysqli_error($con));
        if ($q) {
            ?>
                <script>
                    alert("Data Inserted successfully!");
                </script>
            <?
        }
        else{
            ?>
                <script>
                    alert("Data is not Inserted!!");
                </script>
            <?
        }
     }
    ?>
</body>
</html>