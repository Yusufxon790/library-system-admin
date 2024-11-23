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
    <body class="sb-nav-fixed" style="overflow-x:hidden;" >
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Library Admin-Panel </a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="login_check.php">Edit Login & Password</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="book.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Books
                            </a>
                            <a class="nav-link" href="author.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Authors
                            </a>
                            <a class="nav-link" href="staff.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Staffs
                            </a>
                            <a class="nav-link" href="member.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Members
                            </a>
                            <a class="nav-link" href="transaction.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Transactions
                            </a>

                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Library
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                <div class="container-fluid p-0" style="overflow-x:hidden;" >
                <div class="d-flex justify-content-between mx-3">
                        <h1 class="h3 my-4"><strong>Transactions</strong></h1>
                        <form class=" form-inline">
                         <div class="input-group mt-3">
                            <input class="form-control t_ser" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                            <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                         </div>
                        </form>
                    </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                       <div class="mx-3 table-responsive-xl">
                          <table class="table table-striped table-dark table-hover" >
                            <thead class="table table-dark" >
                                <tr>
                                    <th>No</th>
                                    <th>Book Name</th>
                                    <th>Member Name</th>
                                    <th>Member Surname</th>
                                    <th>Staff Name</th>
                                    <th>Staff Position</th>
                                    <th>Due Date</th>
                                    <th>Return Date</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody class="tbody" >
                                <?php
                                $current_date=date("Y-m-d");
                                    $con=mysqli_connect('localhost','root','root','library');
                                    $sql="select book.title,member.first_name as m_name,member.last_name as m_surname,staff.first_name as s_name,staff.position as s_position,datediff(transaction.return_date,transaction.borrow_date) as due_date,transaction.*,transaction.id as id from transaction left join book on transaction.book_id=book.id left join member on transaction.member_id=member.id left join staff on transaction.staff_id=staff.id";
                                    $q=mysqli_query($con,$sql) or die(mysqli_error($con));
                                    $i=1;
                                    while ($row=mysqli_fetch_array($q)) {
                                        ?>
                                        <tr  <?php
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
                                            <td><?echo $row['s_name']?></td>
                                            <td><?echo $row['s_position']?></td>    
                                            <td><?echo $row['due_date']?> days</td>  
                                            <td><?echo $row['return_date']?></td>  
                                            <td>
                                               <a href="transaction_view.php?id=<?echo $row['id']?>" class="btn btn-info" ><i class="fas fa-eye" ></i></a>
                                            </td>
                                        </tr>
                                        <?
                                    }
                                ?>
                            </tbody>
                          </table>
                        
                       </div>
                        
                    </div>
                </div>

           </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                         
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <script type="text/javascript" src="./jquery.js" ></script>
        <script>
            $(function(){
                $(".t_ser").keyup(function(){
                    $.post(
                        'ajax.php',{t_ser:$(".t_ser").val()},
                        function(t_data){
                            $(".tbody").html(t_data);
                        }
                    )
                })
            })
        </script>
    </body>
</html>
