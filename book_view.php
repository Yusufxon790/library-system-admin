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
    <link rel="stylesheet" href="./font/all.css">
    <link rel="stylesheet" href="./css/styles.css">
</head>
<body>
    <div class="container mb-4">
        <h2 class="alert alert-info text-center " >All Information about Book</h2>
        <div class="table-responsive-xl" >
            <table class="table table-info table-striped" >
                <thead class="table table-dark" >
                <tr>
                 <th>No</th>
                 <th>Title</th>
                 <th>Author</th>
                 <th>ISBN</th>
                 <th>Genre</th>
                 <th>Publisher</th>
                 <th>Publish Date</th>
                 <th>Copies Available</th>
                 <th>Quantity</th>
                 <th>Plus/Minus</th>
                </tr>
                </thead>
                <tbody>
            <?php
                 $con=mysqli_connect('localhost','root','root','library');
                 $sql="select book.*, author.first_name,author.last_name from book left join author on author.id=book.author_id where book.id=".$_GET['id'];
                 $q=mysqli_query($con,$sql) or die(mysqli_error($con));
                 $i=1;
                 while ($row=mysqli_fetch_array($q)) {
                    ?>
                    <tr>
                        <td><?echo $i;$i++;?></td>
                        <td><?echo $row['title']?></td>
                        <td><?echo $row['first_name']." ".$row['last_name']?></td>
                        <td><?echo $row['isbn']?></td>
                        <td><?echo $row['genre']?></td>
                        <td><?echo $row['publisher']?></td>
                        <td><?echo $row['pub_date']?></td>
                        <td><?echo $row['copies_available']?></td>
                        <td><?echo $row['quantity']?></td>
                        <td>
                            <a href="book_plus.php?id=<?echo $row['id']?>" class="btn btn-success fs-5" >+</a>
                            <a href="book_minus.php?id=<?echo $row['id']?>" class="btn btn-danger fs-5" >-</a>
                        </td>
                    </tr>
                    <?
                }
             ?>
                </tbody>
            </table>
        </div>
        <a href="book.php" class="btn btn-danger" >Back</a>
    </div>
</body>
</html>