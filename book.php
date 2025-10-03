<?php include_once('header.php');?>
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
                                    <th>Book Name</th>
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
            </div>
<?php include_once('footer.php');?>
