<?php
    session_start(); 
    if(!isset($_SESSION['a_id'])){
        header("location: login.php");
    }

    $page = 'index';


    include dirname(__FILE__).DIRECTORY_SEPARATOR.'config.php';
?>
        <?php include 'includes/header.php';    ?>

            <!--main content start-->
            <div id="content" class="ui-content">
                <div class="ui-content-body">

                    <div class="ui-container">
                        <div class="row">
                            
                            <div class="col-md-12">
                                <div class="panel">
                                    <header class="panel-heading">
                                        Add Patient
                                    </header>
                                    <div class="panel-body">
                                        <div class="form">
                                            <form class="cmxform form-horizontal " method="post" action="add_patient_back.php" enctype="multipart/form-data">
                                                <div class="form-group ">
                                                    <label for="username" class="control-label col-lg-3">Name</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control " name="p_name" type="text" required />
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="username" class="control-label col-lg-3">Email</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control " name="p_email" type="email" required />
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="username" class="control-label col-lg-3">Phone</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control " name="p_phone" type="tel" required />
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="username" class="control-label col-lg-3">Password</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control " name="p_password" type="password" required />
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="username" class="control-label col-lg-3">Address</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control " name="p_address" type="text" required />
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="username" class="control-label col-lg-3">Select Photo</label>
                                                    <div class="col-lg-6">
                                                        <input type="file" name="p_photo" id="file" accept="image/*" required />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-lg-offset-3 col-lg-6">
                                                        <button class="btn btn-primary" type="submit">Add Patient</button>
                                                        <button class="btn btn-default" type="button">Cancel</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
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

        <script src="dist/js/main.js"></script>

        <!-- Bootstrap Date Range Picker Dependencies -->
        <script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
        <script src="assets/js/init-datepicker.js"></script>

        <!--From validation  -->
        <script src="bower_components/jquery-validation/dist/jquery.validate.min.js"></script>
        <script src="assets/js/init-validation.js"></script>
        

    </body>
</html>
