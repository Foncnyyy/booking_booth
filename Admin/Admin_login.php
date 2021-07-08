
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Booth Square</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- icheck bootstrap -->
        <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Kanit:400" rel="stylesheet">
        <link rel="stylesheet" href="assets/dist/css/mystyle.css?v=<?= date('YmdHis') ?>">
    </head>
    <style>
        .hold-transition{          
            background-image: url("bg.PNG");
            background-repeat: no-repeat;

            background-size: 100% ;
        }
        body  {
            background-image: url("bg.png");
            background-color: #222;           
        }
    </style>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo"></div> 
            <div class="card">
                <div class="card-body login-card-body">
                    <center><img width="80 px" src="logoss.png"><br>
                    <h3><b>Booth Square</b></h3> <br></center><br>

                    <form class="text-center" action="chk_admin.php" method="post" > 
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="a_username" id="a_username" placeholder="Username">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                <span class="fas fa-user text-danger"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" name="a_password" id="a_password" placeholder="Password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock text-danger"></span>
                                </div>
                            </div>
                        </div>                     
                        <div class="social-auth-links text-center mb-3">
                            <button type="submit" class="btn btn-danger btn-block">เข้าสู่ระบบ</button>     
                        </div>
                    </form>     
                </div>
            </div>
        </div>

        <!-- jQuery -->
        <script src="assets/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        <script src="assets/dist/js/myapp.js?v=<?= date('ymdHis') ?>"></script>

    </body>
</html>
