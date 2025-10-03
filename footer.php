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
            });
            $(function(){
                $(".ser_all").keyup(function(){
                    $.post(
                        'ajax.php',{ser_all:$(".ser_all").val()},
                        function(find_data){
                            $(".tbody").html(find_data);
                        }
                    )
                })
            });
            $(function(){
                $(".author_ser").keyup(function(){
                    $.post(
                        'ajax.php',{author_ser:$(".author_ser").val()},
                        function(author_data){
                            $(".tbody").html(author_data);
                        }
                    )
                })
            });
            $(function(){
                $(".staff_ser").keyup(function(){
                    $.post(
                        'ajax.php',{staff_ser:$(".staff_ser").val()},
                        function(staff_data){
                            $(".tbody").html(staff_data);
                        }
                    )
                })
            });
            $(function(){
                $(".member_ser").keyup(function(){
                    $.post(
                        'ajax.php',{member_ser:$(".member_ser").val()},
                        function(member_data){
                            $(".tbody").html(member_data);
                        }
                    )
                })
            });
            $(function(){
                $(".t_ser").keyup(function(){
                    $.post(
                        'ajax.php',{t_ser:$(".t_ser").val()},
                        function(t_data){
                            $(".tbody").html(t_data);
                        }
                    )
                })
            });
        </script>
    </body>
</html>