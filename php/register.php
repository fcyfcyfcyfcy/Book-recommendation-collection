<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>书籍推荐收藏注册界面</title>
        <link rel="shortcut icon" href="../img/favicon.ico"/>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css" media="screen">
        <link rel="stylesheet" type="text/css" href="../css/all.css">
        <link rel="stylesheet" type="text/css" href="../css/login.css">
        <script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
    </head>
    <body screen_capture_injected="true">
        <div class="container">
            <form class="col-sm-offset-4 col-sm-4 form-horizontal" role="form" method="post">
                <div class="panel panel-default" method="post">
                    <div class="panel-heading">
                        <p>注册信息</p>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="fa fa-user"></span>
                                </span>
                                <input type="text" class="form-control" id="username" name="username" placeholder="请输入用户名" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="fa fa-lock"></span>
                                </span>
                                <input type="password" class="form-control" name="password" placeholder="请输入密码" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="fa fa-lock"></span>
                                </span>
                                <input type="password" class="form-control" name="repassword" placeholder="请再次输入密码" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block" id="register" name="submit">注册</button>
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-info col-sm-2 col-sm-offset-7" onclick="window.location.href='login.php'">登录</button>
                            <button type="button" class="btn btn-info col-sm-2 col-sm-offset-1" onclick="window.location.href='../index.html'">游客</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <script type="text/javascript" src="../js/bootstrap.min.js"></script>
        <!-- <script type="text/javascript" src="../js/register.js"></script> -->
    </body>
</head>
</html>

<?php 
$link = mysqli_connect('127.0.0.1', 'root', '', 'login');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}else {
    if (isset($_POST['submit'])){
        if ($_POST['password'] == $_POST['repassword']){
    $query = "insert into user (user_name,password) values('{$_POST['username']}','{$_POST['password']}')";
    $result=mysqli_query($link, $query);
    header("Location:login.php");
        }else {
            echo "<script>alert('两次输入密码不一致！')</script>";
        }
    }
}
?>