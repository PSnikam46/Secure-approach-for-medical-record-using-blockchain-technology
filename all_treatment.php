<?php
    session_start(); 
    if(!isset($_SESSION['a_id'])){
        header("location: login.php");
    }
    include dirname(__FILE__).DIRECTORY_SEPARATOR.'config.php';
    include dirname(__FILE__).DIRECTORY_SEPARATOR.'validate_block.php';
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
                                        
                                        <?php
                                            if(isBlockValid())
                                                echo "<div class='alert alert-success alert-dismissible' role='alert'>
                                                        No tampering in data
                                                    </div>";
                                            else{
                                                echo "<div class='alert alert-danger alert-dismissible alert-mg-b-0' role='alert'>
                                                        There is tampering in Treatment system. ";
                                                    echo "TRreatment ID => ".$_SESSION['t_id'];
                                                    echo "</div>";
                                            }

                                        ?>
                                    </header>
                                    
                                    <div class="panel-body table-responsive">
                                        <table class="table convert-data-table table-striped">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Doctor</th>
                                                <th>Patient</th>
                                                <th>Treatment</th>
                                                <th>Upload Prescription</th>
                                                <th>See Prescription</th>
                                                <th>Time</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php

                                                $sql = "SELECT t_id, t_details, t_time,t_prescription_path,doctor.d_name, patient.p_name FROM `treatment` LEFT JOIN doctor ON doctor.d_id = treatment.d_id LEFT JOIN patient ON patient.p_id = treatment.p_id";
                                                $result = mysqli_query($con, $sql);
                                                while($row = mysqli_fetch_assoc($result)){
                                                    echo "<tr>";
                                                    echo "<td>".$row['t_id']."</td>";
                                                    echo "<td>".$row['d_name']."</td>";
                                                    echo "<td>".$row['p_name']."</td>";
                                                    echo "<td>".$row['t_details']."</td>";
                                                    echo "<td><form   enctype='multipart/form-data' action='add_treatment_action.php?t_id=".$row['t_id']."' method='POST' ><div style='display:flex;'><div style='width:50%;margin-right:10px;'> 
                                                          <label for='username'>Select PDF</label>
                                                          <input type='file' name='t_prescription_path' id='file' accept='application/pdf' required />
                                                              </div><div class='text-right' style='width:40%;'> <input type='submit'  class='btn btn-success mr-2' value='Submit Prescription'></div></form></td> ";
                                                     echo "<td><a href='./uploads/treatment/".$row['t_prescription_path']."'>".$row['t_prescription_path']."</a></td>";
                                                    echo "<td>".date('Y-m-d H:i', $row['t_time'])."</td>";
                                                    
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
