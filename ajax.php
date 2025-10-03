<?php
$con = mysqli_connect('localhost', 'root', 'root', 'library') or die(mysqli_connect_error());


if (isset($_POST['ser_author'])) {
    $sql="select * from author where first_name like '%".$_POST['ser_author']."%' or last_name like '%".$_POST['ser_author']."%'";
    $q=mysqli_query($con,$sql) or die(mysqli_error($con));
    while ($row=mysqli_fetch_array($q)) {
       ?>
       <option value="<?echo $row['id']?>"><?echo $row['first_name']." ".$row['last_name']?></option>
       <?
    }
}

if (isset($_POST['ser_book'])) {
    $search = trim($_POST['ser_book']);
    $search = mysqli_real_escape_string($con, $search);

    $sql = "select id, title from book where title like '%$search%' limit 10";
    $q   = mysqli_query($con, $sql) or die(mysqli_error($con));

    while ($row = mysqli_fetch_assoc($q)) {
        ?>
        <option value="<?php echo $row['id']; ?>">
            <?php echo htmlspecialchars($row['title']); ?>
        </option>
        <?php
    }
}

if (isset($_POST['ser_staff'])) {
    $search = trim($_POST['ser_staff']);
    $search = mysqli_real_escape_string($con, $search);

    $sql = "select id, first_name, last_name 
            from staff 
            where first_name like '%$search%' or last_name like '%$search%'
            limit 10";
    $q   = mysqli_query($con, $sql) or die(mysqli_error($con));

    while ($row = mysqli_fetch_assoc($q)) {
        ?>
        <option value="<?php echo $row['id']; ?>">
            <?php echo htmlspecialchars($row['first_name'] . " " . $row['last_name']); ?>
        </option>
        <?php
    }
}
if (isset($_POST['ser_all'])) {
    $sql="select book.*, author.first_name,author.last_name from book left join author on author.id=book.author_id where book.title like '%".$_POST['ser_all']."%' or book.genre like '%".$_POST['ser_all']."%' or author.first_name like '%".$_POST['ser_all']."%' or author.last_name like '%".$_POST['ser_all']."%' or book.isbn like '%".$_POST['ser_all']."%' ";
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
}

if(isset($_POST['author_ser'])){
    $sql="select * from author where first_name like '%".$_POST['author_ser']."%' or last_name like '%".$_POST['author_ser']."%' or nationality like '%".$_POST['author_ser']."%' or birth_date like '%".$_POST['author_ser']."%' ";
    $q=mysqli_query($con,$sql) or die(mysqli_error($con));
    $i=1;
    while ($row=mysqli_fetch_array($q)) {
        ?>
        <tr>
            <td><?echo $i;$i++;?></td>
            <td><?echo $row['first_name']?></td>
            <td><?echo $row['last_name']?></td>
            <td><?echo $row['nationality']?></td>
            <td><?echo $row['birth_date']?></td>
            <td>
                <a href="author_edit.php?uid=<?echo $row['id']?>" class="btn btn-warning" ><i class="fas fa-edit" ></i></a>
            </td>
        </tr>
        <?
    }
}

if (isset($_POST['staff_ser'])) {
    $sql="select * from staff where first_name like '%".$_POST['staff_ser']."%' or last_name like '%".$_POST['staff_ser']."%' or position like '%".$_POST['staff_ser']."%' or phone like '%".$_POST['staff_ser']."%' or email like '%".$_POST['staff_ser']."%' or  hiredate like '%".$_POST['staff_ser']."%' ";
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
}
$current_date=date("Y-m-d");
if (isset($_POST['member_ser'])) {
    $sql="select * from member where first_name like '%".$_POST['member_ser']."%' or last_name like '%".$_POST['member_ser']."%' or address like '%".$_POST['member_ser']."%' or phone like '%".$_POST['member_ser']."%' or email like '%".$_POST['member_ser']."%' or start_date like '%".$_POST['member_ser']."%' or expiry_date like '%".$_POST['member_ser']."%' ";
    $q=mysqli_query($con,$sql) or die(mysqli_error($con));
    $i=1;
    while ($row=mysqli_fetch_array($q)) {
        ?>
        <tr <?php
               if ($row['expiry_date']<=$current_date) {
                   ?>class="table-danger"<?
               }
             ?> >
            <td><?echo $i;$i++;?></td>
            <td><?echo $row['first_name']?></td>
            <td><?echo $row['last_name']?></td>
            <td><?echo $row['address']?></td>
            <td><?echo $row['phone']?></td>
            <td><?echo $row['email']?></td>
            <td><?echo $row['start_date']?></td>
            <td><?echo $row['expiry_date']?></td>
            <td>
                <a href="add_transaction.php?id=<?echo $row['id']?>" class="btn btn-success" >Order</a>
                <a href="member_edit.php?uid=<?echo $row['id']?>" class="btn btn-warning" ><i class="fas fa-edit" ></i></a>
                <a href="<?echo $row['id']?>" class="btn btn-danger del"><i class="fas fa-trash" ></i></a>
            </td>
        </tr>
        <?
    }
}

if (isset($_POST['t_ser'])) {
    $sql="select book.title,member.first_name as m_name,member.last_name as m_surname,staff.first_name as s_name,staff.position as s_position,datediff(transaction.return_date,transaction.borrow_date) as due_date,transaction.*,transaction.id as id from transaction left join book on transaction.book_id=book.id left join member on transaction.member_id=member.id left join staff on transaction.staff_id=staff.id where book.title like '%".$_POST['t_ser']."%' or member.first_name like '%".$_POST['t_ser']."%' or  member.last_name like '%".$_POST['t_ser']."%' or staff.first_name like '%".$_POST['t_ser']."%' or staff.position like '%".$_POST['t_ser']."%' or datediff(transaction.return_date,transaction.borrow_date) like '%".$_POST['t_ser']."%' ";
    $q=mysqli_query($con,$sql) or die(mysqli_error($con));
    $i=1;
    while ($row=mysqli_fetch_array($q)) {
        ?>
        <tr <?php
               if ($row['expiry_date']<=$current_date) {
                   ?>class="table-danger"<?
               }
             ?>>
            <td><?echo $i;$i++;?></td>
            <td><?echo $row['title']?></td>
            <td><?echo $row['m_name']?></td>
            <td><?echo $row['m_surname']?></td>
            <td><?echo $row['s_name']?></td>
            <td><?echo $row['s_position']?></td>    
            <td><?echo $row['due_date']?> days</td>  
            <td>
               <a href="transaction_view.php?id=<?echo $row['id']?>" class="btn btn-info" ><i class="fas fa-eye" ></i></a>
            </td>
        </tr>
        <?
    }
}
