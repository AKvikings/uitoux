<?php
// Start the session    
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UI to UX</title>
    <link rel="icon" type="image/png" href="./assets/images/logo.png">
    <!-- roboto google font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap"
        rel="stylesheet">
    <!--bootstrap-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.css">
    <!-- Styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/header-mobile.css">
    <!-- external js -->
    <link rel="stylesheet" href="vendor/owl-carousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="vendor/select2/css/select2.min.css">

    <!-- font - fontawesome -->
	<link rel="stylesheet" href="vendor/fontawesome/css/all.min.css">
</head>

<body>
    <div class="site">
        <!-- header -->
        <?php include "./header.php";?>
        <!-- site body -->
        <div class="site__body">
            <div class="block-space block-space--layout--after-header"></div>
            <div class="block">
                <div class="container container--max--lg">
                    <div class="row">
                        <div class="col-md-2 d-flex"></div>
                        <div class="col-md-8 d-flex">
                            <div class="card flex-grow-1 mb-md-0 mr-0 mr-lg-3 ml-0 ml-lg-4">
                                <?php
                                
                                if(isset($_SESSION['error'])){
                                ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong><?=$_SESSION['error']?></strong> 
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                <?php
                                } 
                                unset($_SESSION['error']);
                                ?>
                                <div class="card-body card-body--padding--2">
                                    <h3 class="card-title">Login</h3>
                                    <form action="./server/verify-login.php" method="POST">
                                        <div class="form-group"><label for="signin-email">Email address</label> <input
                                                id="signin-email" type="email" name="username" class="form-control"
                                                placeholder="admin@exampl.com" value="admin@exampl.com"/></div>
                                        <div class="form-group">
                                            <label for="signin-password">Password</label> <input id="signin-password"
                                                type="password" class="form-control" name="password" value="admin@123" placeholder="Password" />
                                            <small class="form-text text-muted"><a href="">Forgot password?</a></small>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <span class="input-check form-check-input">
                                                    <span class="input-check__body">
                                                        <input class="input-check__input" type="checkbox"
                                                            id="signin-remember" /> <span class="input-check__box"></span>
                                                        <span class="input-check__icon">
                                                            <svg width="9px" height="7px">
                                                                <path
                                                                    d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z">
                                                                </path>
                                                            </svg>
                                                        </span>
                                                    </span>
                                                </span>
                                                <label class="form-check-label" for="signin-remember">Remember Me</label>
                                            </div>
                                        </div>
                                        <div class="form-group mb-0"><button type="submit"
                                                class="btn btn-primary mt-3">Login</button></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 d-flex"></div>

                    </div>
                </div>
            </div>
            <div class="block-space block-space--layout--before-footer"></div>
        </div>
        <!-- end site body-->
        <!-- site__footer -->
        <?php include "./footer.html"; ?>
        <!-- site__footer / end -->
    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/owl-carousel/owl.carousel.min.js"></script>
    <script src="vendor/select2/js/select2.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>

