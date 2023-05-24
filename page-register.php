<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Gymove - Fitness Bootstrap Admin Dashboard</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <link href="/dash/css/style.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
					
					<div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <?php if(isset($_SESSION ["register_success"])) {?>
                                        <div class="alert alert-success"><?=$_SESSION ["register_success"]?></div>
                                    <?php } unset($_SESSION ["register_success"]); ?>
									<div class="text-center mb-3">
										<a href="index.html"><img src="images/logo-full.png" alt=""></a>
									</div>
                                    <h4 class="text-center mb-4 text-white">Sign up your account</h4>
                                    <form action="page_register_post.php" method="POST">
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Username</strong></label>
                                            <input type="text" class="form-control" placeholder="username" name="user_name" value="<?=(isset($_SESSION["old_user_name"])?$_SESSION["old_user_name"]:'');unset($_SESSION["old_user_name"]);?>">
                                            <?php if(isset($_SESSION["user_name_err"])){?>
                                                <div class="alert alert-warning mt-2">
                                                    <?=$_SESSION["user_name_err"]?>
                                                </div>

                                            <?php }unset($_SESSION["user_name_err"]) ?>
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Email</strong></label>
                                            <input type="text" class="form-control" placeholder="hello@example.com" name="email" value="<?=(isset($_SESSION["old_email"])?$_SESSION["old_email"]:'');unset($_SESSION["old_email"]);?>">
                                            <?php if(isset($_SESSION["email_error_message"])){?>
                                                <div class="alert alert-warning mt-2">
                                                    <?=$_SESSION["email_error_message"]?>
                                                </div>

                                            <?php }unset($_SESSION["email_error_message"]) ?>
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Password</strong></label>
                                            <input type="password" class="form-control"  name="password" value="<?=(isset($_SESSION["old_password"])?$_SESSION["old_password"]:'');unset($_SESSION["old_password"]);?>">

                                            <?php if(isset($_SESSION["password_error_message"])){?>
                                                <div class="alert alert-warning mt-2">
                                                    <?=$_SESSION["password_error_message"]?>
                                                </div>

                                            <?php }unset($_SESSION["password_error_message"]) ?>
                                        </div>
                                        <div class="text-center mt-4">
                                            <button type="submit" class="btn bg-white text-primary btn-block">Sign me up</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p class="text-white">Already have an account? <a class="text-white" href="page-login.php">Sign in</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!--**********************************
	Scripts
***********************************-->
<!-- Required vendors -->
<script src="/dash/vendor/global/global.min.js"></script>
<script src="/dash/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="/dash/js/custom.min.js"></script>
<script src="/dash/js/deznav-init.js"></script>

</body>
</html>