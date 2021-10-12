<?php
    session_start(); 
    if(!isset($_SESSION['a_id'])){
        header("location: login.php");
    }
    include dirname(__FILE__).DIRECTORY_SEPARATOR.'config.php';
?>
    <?php include 'includes/header.php';    ?>

            <!--main content start-->
            <div id="content" class="ui-content ui-content-aside-overlay">
                

                <div class="ui-content-body">

                    <div class="ui-container">

                        <div class="row">
                            <div class="col-sm-12">
                                <section class="panel">
                                    <header class="panel-heading panel-border">
                                        All Doctors
                                    
                                    </header>
                                    <div class="panel-body table-responsive">
                                        <table class="table convert-data-table table-striped">
                                            <thead>
                                            <tr>
                                                <th>Doctor ID</th>
                                                <th>Doctor Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Degree</th>
                                                <th>Photo</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php

                                                $sql = "SELECT `d_id`, `d_name`, `d_phone`, `d_email`, `d_password`, `d_degree`, `d_photo` FROM `doctor`";
                                                $result = mysqli_query($con, $sql);
                                                while($row = mysqli_fetch_assoc($result)){
                                                    echo "<tr>";
                                                    echo "<td>".$row['d_id']."</td>";
                                                    echo "<td>".$row['d_name']."</td>";
                                                    echo "<td>".$row['d_email']."</td>";
                                                    echo "<td>".$row['d_phone']."</td>";
                                                    echo "<td>".$row['d_degree']."</td>";
                                                    echo "<td><img style='width:100px' src='uploads/doctor/".$row['d_photo']."'/></td>";
                                                    echo "</tr>";
                                                }

                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </section>
                            </div>

                        </div>

                        


                    </div>

                </div>
            </div>
            <!--main content end-->

            <!--footer start-->
            <?php include 'includes/footer.php';    ?>
            <!--footer end-->

        </div>

        <!-- inject:js -->
        <script src="bower_components/jquery/dist/jquery.min.js"></script>
        <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="bower_components/jquery.nicescroll/dist/jquery.nicescroll.min.js"></script>
        <script src="bower_components/autosize/dist/autosize.min.js"></script>
        <!-- endinject -->

        <!--Data Table-->
        <script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="bower_components/datatables-tabletools/js/dataTables.tableTools.js"></script>
        <script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
        <script src="bower_components/datatables-colvis/js/dataTables.colVis.js"></script>
        <script src="bower_components/datatables-responsive/js/dataTables.responsive.js"></script>
        <script src="bower_components/datatables-scroller/js/dataTables.scroller.js"></script>

        <!--init data tables-->
        <script src="assets/js/init-datatables.js"></script>

        <!-- Common Script   -->
        <script src="dist/js/main.js"></script>

    </body>
</html>
