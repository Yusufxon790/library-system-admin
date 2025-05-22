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
        <h2 class="alert alert-primary text-center " >Adding Books</h2>
        <form action="" method="POST" >
            <input type="text" name="title" class="form-control" placeholder="Title" required ><br>
            <label for="">Author : </label>
            <input type="search" id="ser_author"  name="ser_author" class="form-control" placeholder="Search..." >
            <select id="suggestions" class="form-select" name="author_id" required >
               <option value="">---</option>
            </select><br>
            <input type="text" name="isbn" class="form-control" placeholder="ISBN" required ><br>
            <input type="text" name="genre" class="form-control" placeholder="Genre" required ><br>
            <input type="text" name="publisher" class="form-control" placeholder="Publisher" required ><br>
            <input type="number" name="pub_date" class="form-control" placeholder="Publish Year" required ><br>
            <p>Copies Available</p>
           <input type="radio" name="copies_available" id="c_av"  value="Yes" required >Yes
           <input type="radio" name="copies_available" id="c_av" value="No" required >No
           <br>
            <input type="submit" name="s" value="Send" class="btn btn-info" >
            <a href="book.php" class="btn btn-danger" >Back</a>
        </form>
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
        $sql="insert into book(title,author_id,isbn,genre,publisher,pub_date,copies_available,quantity) values('{$title}','{$author_id}','{$isbn}','{$genre}','{$publisher}','{$pub_date}','{$copies_available}','0')";
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
<script>
$(function(){
    $('#ser_author').keyup(function(){
        $.post(
            'ajax.php',{ser_author:$("#ser_author").val()},
            function(ser_data) {
                $("#suggestions").html(ser_data);
            }
        )
    })
})
</script>


</html>