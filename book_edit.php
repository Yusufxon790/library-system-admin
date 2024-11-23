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
        <h2 class="alert alert-warning text-center " >Edit Books</h2>
        <?php
             $con=mysqli_connect('localhost','root','root','library');
             $sql="select * from book where id=".$_GET['uid'];
             $q=mysqli_query($con,$sql) or die(mysqli_error($con));
             $row=mysqli_fetch_array($q);
       ?>
       <form action="" method="POST" >
           <input type="hidden" name="uid" value="<?echo $_GET['uid']?>" >
           <label for="">Title :</label>
           <input type="text" name="title" value="<?echo $row['title']?>" class="form-control"><br>
           <label for="">Author ID :</label>
           <input type="number" name="author_id" value="<?echo $row['author_id']?>" class="form-control" ><br>
           <label for="">ISBN :</label>
           <input type="text" name="isbn" value="<?echo $row['isbn']?>" class="form-control"><br>
           <label for="">Genre :</label>
           <input type="text" name="genre" value="<?echo $row['genre']?>" class="form-control"  ><br>
           <label for="">Publisher :</label>
           <input type="text" name="publisher" value="<?echo $row['publisher']?>" class="form-control"  ><br>
           <label for="">Pub Date :</label>
           <input type="number" name="pub_date" value="<?echo $row['pub_date']?>" class="form-control"><br>
           <p>Copies Available</p>
          <input type="radio" name="copies_available" id="c_av"  value="Yes" <? if ($row['copies_available']=="Yes") {
            echo "checked";
          } ?> >Yes
          <input type="radio" name="copies_available" id="c_av" value="No"
          <? if ($row['copies_available']=="No") {
            echo "checked";
          } ?>  >No
          <br>
           <input type="submit" name="s" value="Edit" class="btn btn-info" >
           <a href="book.php"  class="btn btn-danger" > Back </a>
       </form>
       <?
    ?>
    </div>
    <?php
     if (isset($_POST['s'])) {
        $title=addslashes($_POST['title']);
        $author_id=addslashes($_POST['author_id']);
        $isbn=addslashes($_POST['isbn']);
        $genre=addslashes($_POST['genre']);
        $publisher=addslashes($_POST['publisher']);
        $pub_date=addslashes($_POST['pub_date']);
        $copies_available=addslashes($_POST['copies_available']);
        $con=mysqli_connect('localhost','root','root','library');
        $sql="update book set title='{$title}',author_id='{$author_id}',isbn='{$isbn}',genre='{$genre}',publisher='{$publisher}',pub_date='{$pub_date}',copies_available='{$copies_available}' where id='{$_POST['uid']}'";
        $q=mysqli_query($con,$sql) or die(mysqli_error($con));
        if ($q) {
            ?>
                <script>
                    alert("Data Updated successfully!");
                    window.location.href="book.php";
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