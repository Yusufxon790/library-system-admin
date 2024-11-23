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
        <h2 class="alert alert-warning text-center" >Editing Member</h2>
        <?php
         $con=mysqli_connect('localhost','root','root','library');
         $sql="select book.title,book.id as b_id,member.id as m_id,staff.id as s_id,staff.first_name as s_name,staff.last_name as s_surname,transaction.borrow_date,transaction.return_date from transaction left join book on transaction.book_id=book.id left join member on transaction.member_id=member.id left join staff on transaction.staff_id=staff.id where transaction.id=".$_GET['uid'];
         $q=mysqli_query($con,$sql) or die(mysqli_error($con));
         $row=mysqli_fetch_array($q);
        ?>
        <form method="POST" action="">
            <input type="hidden" name="uid" value="<?echo $_GET['uid']?>" >
            <input type="hidden" name="old_book" value="<?echo $row['b_id']?>" >
            <input type="hidden" name="old_staff" value="<?echo $row['s_id']?>" >
            <input type="hidden" name="member_id" value="<?echo $row['m_id']?>" >
            <label for="">Book Name : <?echo $row['title']?></label>
            <input type="search" id="ser_book" name="ser_book" class="form-control" placeholder="Search to change..." >
            <select class="form-select" name="book_id" id="suggestions"  >
                <option value="">---</option>
            </select><br>
            <label for="">Staff Name : <?echo $row['s_name']." ".$row['s_surname']?></label>
            <input type="search" name="ser_staff" id="ser_staff" class="form-control" placeholder="Search to change..." >
            <select name="staff_id" id="suggestions2" class="form-select" >
                <option value="">---</option>
            </select><br>
            <label for="">Borrow Date :</label>
            <input type="date" name="borrow_date" value="<?echo $row['borrow_date']?>" class="form-control" placeholder="Borrow Date" ><br>
            <label for="">Return Date :</label>
            <input type="date" name="return_date" class="form-control" value="<?echo $row['return_date']?>" placeholder="Return Date" ><br>
            <input type="submit" name="s" value="Edit" class="btn btn-warning" >
            <a href="transaction_view.php?id=<?echo $_GET['uid']?>" class="btn btn-danger" >Back</a>
        </form>

        <?php
            if (isset($_POST['s'])) {
               if ($_POST['book_id']=="") {
                $book_id=addslashes($_POST['old_book']);
               }
               else{
                $book_id=addslashes($_POST['book_id']);
               }
               if ($_POST['staff_id']=="") {
                $staff_id=addslashes($_POST['old_staff']);
               }
               else{
                $staff_id=addslashes($_POST['staff_id']);
               }
                $m_id=addslashes($_POST['member_id']);
                $borrow_date=addslashes($_POST['borrow_date']);
                $return_date=addslashes($_POST['return_date']);
                $con=mysqli_connect('localhost','root','root','library');
                $sql="update transaction set book_id='{$book_id}',member_id='{$m_id}',staff_id='{$staff_id}',borrow_date='{$borrow_date}',return_date='{$return_date}' where id=".$_POST['uid'];
                $q=mysqli_query($con,$sql) or die(mysqli_error($con)) ;
                if ($q) {
                   ?>
                   <script>
                    alert("Data updated successfully!");
                    window.location.href="transaction_view.php?id=<?echo $_GET['uid']?>";
                   </script>
                   <?
                }
                else{
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
<script src="./jquery.js" ></script>
<script>
    $(function(){
        $("#ser_book").keyup(function(){
            $.post(
                'ajax.php',{ser_book:$("#ser_book").val()},
                function(ser_data){
                    $("#suggestions").html(ser_data);
                }
            )
        })
    });

    $(function(){
        $("#ser_staff").keyup(function(){
            $.post(
                'ajax.php',{ser_staff:$("#ser_staff").val()},
                function(ser_data2){
                    $("#suggestions2").html(ser_data2);
                }
            )
        })
    })
</script>
</html>