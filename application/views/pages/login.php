<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Login - CIrekmed_MaaDeSu</title>
    <meta name="description" content="aptk_MaaDeSu.com">
    <meta name="author" content="MaaDeSu">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo base_url("resources/bootstrap/css/bootstrap.min.css");?>" rel="stylesheet">    
    <link href="<?php echo base_url("resources/fontawesome/css/all.min.css");?>" rel="stylesheet">
    <link href="<?php echo base_url("resources/css/style.css");?>" rel="stylesheet">
    <style type="text/css">
        .admin-form{
            margin-top: 20px;
            margin-left: 6%;
        }
        #b{
            background-color: aliceblue;
        }
        body{
            background-image: url(https://cdn.pixabay.com/photo/2021/11/20/03/35/doctor-6810776_960_720.png);
            background-size: cover;
        }
    </style>
</head>
<body>
    <div class="admin-form">
        <div class="widget worange">
            <div class="widget-head">
                <i class="fa fa-lock"></i>  Login - CI rekmed_MaaDeSu.com
            </div>
            <div class="widget-content">
                <div class="padd">
                    <hr>
                    <div id="b" class="container"><h5 align="center"><b>Login User:</b></h5></div>
                    <div class="text-center"><?php if (isset($error)) echo "<div class='label label-warning'>$error</div>"?></div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url('index.php/login/submitLogin');?>" autocomplete="off">
                        <div class="container">
                            <div class="container">
                                <div class="container">
                        <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </span>
                                            <input type="text" size="50" class="form-control" id="username" name="username" placeholder="username" required>
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-unlock"></i></span>
                                            </span>
                                            <input type="password" size="50" class="form-control" id="password" name="password" placeholder="password" required>
                                        </div>
                                    <div class="text-center">
                                    <br>
                                    <input name="Login" value="Login" type="submit" class="btn btn-danger">
                                    <input type="reset" class="btn btn-default">
                                <!-- </div> -->
                                    </div>
                                <!-- </div>
                                </div>
                            </div> -->
                            </div>
                        </div>
                        </div>
                        </div>
                    </form>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="widget-foot">&copy; www.rekmed_MaaDeSu.com</div>
        </div>
    </div>
    <script src="<?php echo base_url("resources/js/jquery.js");?>"></script>
    <script src="<?php echo base_url("resources/js/bootstrap.min.js");?>"></script>
</body>
</html>