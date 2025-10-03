<?php include_once('header.php');?>
            <div id="layoutSidenav_content">
                <main>
                <div class="container-fluid p-0" style="overflow-x:hidden;" >
                <div class="d-flex justify-content-between mx-3">
                        <h1 class="h3 my-4"><strong>Staffs</strong></h1>
                        <form class=" form-inline">
                         <div class="input-group mt-3">
                            <input class="form-control staff_ser" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                            <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                         </div>
                        </form>
                    </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                       <div class="mx-3 table-responsive-xl">
                          <table class="table table-striped table-secondary" >
                            <thead class="table table-dark" >
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Surname</th>
                                    <th>Position</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Hiredate</th>
                                    <th style="width: 200px;" ><a href="add_staff.php" class="btn btn-primary" >Add Staff</a></th>
                                </tr>
                            </thead>
                            <tbody class="tbody" >
                                <?php
                                    $con=mysqli_connect('localhost','root','root','library');
                                    $sql="select * from staff";
                                    $q=mysqli_query($con,$sql) or die(mysqli_error($con));
                                    $i=1;
                                    while ($row=mysqli_fetch_array($q)) {
                                        ?>
                                        <tr>
                                            <td><?echo $i;$i++;?></td>
                                            <td><?echo $row['first_name']?></td>
                                            <td><?echo $row['last_name']?></td>
                                            <td><?echo $row['position']?></td>
                                            <td><?echo $row['phone']?></td>
                                            <td><?echo $row['email']?></td>
                                            <td><?echo $row['hiredate']?></td>
                                            <td>
                                                <a href="staff_edit.php?uid=<?echo $row['id']?>" class="btn btn-warning" ><i class="fas fa-edit" ></i></a>
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
                                $sql1="delete from staff where id=".$_GET['del'];
                                $q1=mysqli_query($con,$sql1) or die(mysqli_error($con));
                                if($q1){
                                    ?>
                                    <script>
                                        window.location.href="staff.php";
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
<?php include_once('footer.php');?>
    