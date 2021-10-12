<?php
    session_start(); 
    if(isset($_SESSION['a_id'])){
        header("location: index.php");
    }
    
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- <link rel="shortcut icon" type="image/png" href="/imgs/favicon.png" /> -->
        <title>Login</title>

        <!-- inject:css -->
        <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
        <!-- endinject -->

        <!-- Main Style  -->
        <link rel="stylesheet" href="dist/css/main.css">

        <script src="assets/js/modernizr-custom.js"></script>
    </head>
    <body>

        <div class="sign-in-wrapper">
            <div class="sign-container">
                <div class="text-center">
                    <h2 class="logo"><img src="imgs/logo.png" width="130px" alt=""/></h2>
                    <h4>Login to Admin</h4>
                </div>

                <form class="sign-in-form" role="form" action="login_back.php" method="POST">
                    <div class="form-group">
                        <input type="email" name="a_email" class="form-control" placeholder="Email ID" required="">
                    </div>
                    <div class="form-group">
                        <input type="password" name="a_password" class="form-control" placeholder="Password" required="">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </form>
                <div class="text-center copyright-txt">
                    <small>Copyright © 2020</small>
                </div>
            </div>
        </div>

        <!-- inject:js -->
        <script src="bower_components/jquery/dist/jquery.min.js"></script>
        <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="bower_components/jquery.nicescroll/dist/jquery.nicescroll.min.js"></script>
        <script src="bower_components/autosize/dist/autosize.min.js"></script>
        <!-- endinject -->

        <!-- Common Script   -->
        <script src="dist/js/main.js"></script>

    </body>
</html>
