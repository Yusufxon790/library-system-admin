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
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <script src="page_logout.js" ></script>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="./bootstrap-5.3/css/bootstrap.css">
        <link rel="stylesheet" href="./font/all.css">
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
<body>
    <div class="container-fluid">
        <h2 class="alert alert-info text-center" >Transaction View</h2>
        <div class="table-responsive-xl" >
            <?php
            if ($row['return_date']<=$current_date) {
                ?>
                <h4 class="text-danger" >This Member's book return date is over!!</h4>
                <?
            }
            ?>
            <table class="table table-striped table-primary table-hover" >
                                <thead class="table table-dark" >
                                    <tr>
                                        <th>No</th>
                                        <th>Book Name</th>
                                        <th>Member Name</th>
                                        <th>Member Surname</th>
                                        <th>Member Email</th>
                                        <th>Member Phone</th>
                                        <th>Staff Name</th>
                                        <th>Staff Position</th>
                                        <th>Borrow Date</th>
                                        <th>Due Date</th>
                                        <th>Return Date</th>
                                        <th style="width: 150px;" ></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $current_date=date("Y-m-d");
                                        $con=mysqli_connect('localhost','root','root','library');
                                        $sql="select book.title,member.first_name as m_name,member.last_name as m_surname,member.email as m_email,member.phone as m_phone,staff.first_name as s_name,staff.position as s_position,transaction.borrow_date,transaction.return_date,datediff(transaction.return_date,transaction.borrow_date) as due_date,transaction.*,transaction.id as id from transaction left join book on transaction.book_id=book.id left join member on transaction.member_id=member.id left join staff on transaction.staff_id=staff.id where transaction.id=".$_GET['id'];
                                        $q=mysqli_query($con,$sql) or die(mysqli_error($con));
                                        $i=1;
                                        while ($row=mysqli_fetch_array($q)) {
                                            ?>
                                            <tr <?php
                                            if ($row['return_date']<=$current_date) {
                                                ?>
                                                class="table-danger"
                                                <?
                                            }
                                            ?> >
                                                <td><?echo $i;$i++;?></td>
                                                <td><?echo $row['title']?></td>
                                                <td><?echo $row['m_name']?></td>
                                                <td><?echo $row['m_surname']?></td>
                                                <td><?echo $row['m_email']?></td>
                                                <td><?echo $row['m_phone']?></td>
                                                <td><?echo $row['s_name']?></td>
                                                <td><?echo $row['s_position']?></td>
                                                <td><?echo $row['borrow_date']?></td>
                                                <td><?echo $row['due_date']?> days</td>
                                                <td><?echo $row['return_date']?></td>
                                                <td>
                                                <a href="transaction_edit.php?uid=<?echo $row['id']?>" class="btn btn-warning" ><i class="fas fa-edit" ></i></a>
                                                <a href="<?echo $row['id']?>" class="btn btn-danger del"><i class="fas fa-trash" ></i></a>
                                                </td>
                                            </tr>
                                            <?
                                        }
                                    ?>
                                </tbody>
                                <?php
                                    if(isset($_GET['del'])) {
                                        $con=mysqli_connect('localhost','root','root','library');
                                        $sql1="delete from transaction where id=".$_GET['del'];
                                        $q1=mysqli_query($con,$sql1) or die(mysqli_error($con));
                                        if($q1){
                                            ?>
                                            <script>
                                                window.location.href='transaction.php';
                                            </script>
                                            <?
                                        }
                                        else {
                                            echo "Error";
                                        }
                                        echo "Salom";
                                    }
                                ?>
             </table>
            </div>
            <a href="transaction.php" class="btn btn-danger" >Back</a>
              </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/chart-area-demo.js"></script>
<script src="assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
<script src="js/datatables-simple-demo.js"></script>
<script type="text/javascript" src="./jquery.js" ></script>
<script type="text/javascript" >
    $(function(){
        $(".del").click(function(e){
            e.preventDefault();
            let a=confirm("Are you sure to Delete!");
            if (a==true) {
                let id=$(this).attr('href');
                window.location.href="?id="+id+"&del="+id;
                alert("Data Deleted.");
            }
        })
    })
    </script>
    </body>
</html>