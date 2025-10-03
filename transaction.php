<?php include_once('header.php');?>
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
<?php include_once('footer.php');?>
      