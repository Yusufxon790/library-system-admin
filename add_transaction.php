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
        <h2 class="alert alert-info text-center" >Adding Membership's Transaction</h2>
        <?php
            $con=mysqli_connect('localhost','root','root','library');
            $sql="select * from member where id=".$_GET['id'];
            $q=mysqli_query($con,$sql) or die(mysqli_error($con));
            $row=mysqli_fetch_array($q);

        ?>
        <h3 style="color: blue;" ><span style="color: black;" >Membership Name: </span><?echo $row['first_name']." ".$row['last_name']?></h3>
        <form method="POST" action="">
            <input type="hidden" name="member_id" value="<?echo $_GET['id']?>" >
            <label for="">Book Name :</label>
            <input type="search" id="ser_book" name="ser_book" class="form-control mb-2" placeholder="Search..." >
            <select class="form-select" name="book_id" id="suggestions" required >
                <option value="">---</option>
            </select><br>
            <label for="">Staff Name :</label>
            <input type="search" name="ser_staff" id="ser_staff" class="form-control mb-2" placeholder="Search..." >
            <select name="staff_id" id="suggestions2" class="form-select" required >
                <option value="">---</option>
            </select><br>
            <label for="">Borrow Date :</label>
            <input type="date" name="borrow_date" class="form-control" placeholder="Borrow Date" required><br>
            <p>Membership Expiry Date: <span class="text-danger" ><?echo $row['expiry_date']?> </span></p>
            <label for="">Return Date :</label>
            <input type="date" name="return_date" max="<?echo $row['expiry_date']?>" class="form-control" placeholder="Return Date" required><br>
            <input type="submit" name="s" value="Send" class="btn btn-primary" >
            <a href="member.php" class="btn btn-danger" >Back</a>
        </form>

        <?php
            if (isset($_POST['s'])) {
                $member_id=addslashes($_POST['member_id']);
                $book_id=addslashes($_POST['book_id']);
                $staff_id=addslashes($_POST['staff_id']);
                $borrow_date=addslashes($_POST['borrow_date']);
                $return_date=addslashes($_POST['return_date']);
                $con=mysqli_connect('localhost','root','root','library');
                $sql="insert into transaction(book_id,member_id,staff_id,borrow_date,return_date) values('{$book_id}','{$member_id}','{$staff_id}','{$borrow_date}','{$return_date}')";
                $q=mysqli_query($con,$sql) or die(mysqli_error($con)) ;
                if ($q) {
                   ?>
                   <script>
                    alert("Data inserted successfully!");
                    window.location.href="transaction.php";
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