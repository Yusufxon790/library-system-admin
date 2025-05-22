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
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="./bootstrap-5.3/css/bootstrap.css">
        <link rel="stylesheet" href="./font/all.css">
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed" style="overflow-x:hidden;" >
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-md  me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Brand-->
            <a class="navbar-brand ms-auto ps-3" href="index.html">Library Admin-Panel </a>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto  me-3 me-lg-0 ">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="login_check.php">Edit Login & Password</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
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
                        <h1 class="h3 my-4"><strong>Books</strong></h1>
                        <form class=" form-inline">
                         <div class="input-group mt-3">
                            <input class="form-control ser_all" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                            <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                         </div>
                        </form>
                    </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                       <div class="mx-3 table-responsive-xl ">
                          <table class="table table-striped table-dark" >
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th >ISBN</th>
                                    <th>Genre</th>
                                    <th style="width: 200px;" ><a href="add_book.php" class="btn btn-primary" >Add books</a></th>
                                </tr>
                            </thead>
                            <tbody class="tbody" >
                               <?php
                               $con=mysqli_connect('localhost','root','root','library');
                               $sql="select book.*, author.first_name,author.last_name from book left join author on author.id=book.author_id";
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
                                       <td>
                                           <a href="book_view.php?id=<?echo $row['id']?>" class="btn btn-info" ><i class="fas fa-eye" ></i></a>
                                           <a href="book_edit.php?uid=<?echo $row['id']?>" class="btn btn-warning" ><i class="fas fa-edit" ></i></a>
                                           <a href="<?echo $row['id']?>" class="btn btn-danger del" ><i class="fas fa-trash" ></i></a>
                                       </td>
                                   </tr>
                                   <?
                               }
                               ?>
                            </tbody>

                            <?php
                               if (isset($_GET['del'])) {
                                $con=mysqli_connect('localhost','root','root','library');
                                $sql1="delete from book where id=".$_GET['del'];
                                $q1=mysqli_query($con,$sql1) or die(mysqli_error($con));
                                if($q1){
                                    ?>
                                    <script>
                                        window.location.href="book.php";
                                    </script>
                                    <?
                                }
                                else {
                                    echo "Error";
                                }
                               }
                            ?>
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
        <script type="text/javascript" >
            $(function(){
                $(".del").click(function(e){
                    e.preventDefault();
                    let a=confirm("Are you sure to Delete!");
                    if (a==true) {
                        let id=$(this).attr('href');
                        window.location.href="?del="+id;
                        alert("Data Deleted.");
                    }
                })
            })
            $(function(){
                $(".ser_all").keyup(function(){
                    $.post(
                        'ajax.php',{ser_all:$(".ser_all").val()},
                        function(find_data){
                            $(".tbody").html(find_data);
                        }
                    )
                })
            })
        </script>
    </body>
</html>