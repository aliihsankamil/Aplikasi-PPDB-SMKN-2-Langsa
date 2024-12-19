<!DOCTYPE html>
<html lang="en">

<head>
    <title>SMKN 2 LANGSA | PPDB</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="dist/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="dist/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="dist/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="dist/vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="dist/vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="dist/vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="dist/css/util.css">
    <link rel="stylesheet" type="text/css" href="dist/css/main.css">
</head>

<body>

<div class="limiter">
        <div class="container-login100" style="background-image: url('images/img-01.jpg');">
            <div class="wrap-login100 p-t-90 p-b-30">
                <form class="login100-form validate-form" method="post" name="login" action="proses.php">
                    <div class="login100-form-avatar">
                        <img src="images/avatar-01.png" alt="AVATAR">
                    </div>

                    <span class="login100-form-title p-t-20 p-b-45">
						SMK Negeri 2 Langsa
                    </span>

                    <p style="text-align: center;">
                    <?php  
                        if(isset($_GET['pesan'])){
                            if($_GET['pesan'] == "gagal"){
                                echo "<font color='red'>Username atau Password Salah</font>";
                            }
                        }
                    ?>
                    </p>

                    <div class="wrap-input100 validate-input m-b-10" data-validate="Username is required">
                        <input class="input100" type="text" name="username" placeholder="Username">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
							<i class="fa fa-user"></i>
						</span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-10" data-validate="Password is required">
                        <input class="input100" type="password" name="pass" placeholder="Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
                    </div>

                    <div class="container-login100-form-btn p-t-10">
                        <button class="login100-form-btn" type="submit">
							Login
						</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script src="dist/vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="dist/vendor/bootstrap/js/popper.js"></script>
    <script src="dist/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="dist/vendor/select2/select2.min.js"></script>
    <script src="dist/js/main.js"></script>

</body>
</html>