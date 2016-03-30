<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Winterfell</title>
    <link rel="stylesheet" type="text/css" href="/Public/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="/Public/css/Index/index.css" />
    <!--<link rel="stylesheet" type="text/css" href="/Public/css/index.css" />-->
</head>
<body class="bodys">
<div class="sign_in">
    <a href="<?php echo U('Index/login');?>" class="btn btn-success" role="button">Sign in</a>
</div>
<div class="sign_up">
    <form action="<?php echo U('Index/sign_up');?>" method="post">
        <div class="form-group">
            <input type="text" class="form-control" id="inputUsername" name="inputUsername" placeholder="Username">
        </div>
        <div class="form-group">
            <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="Email">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="inputNikename" name="inputNikename" placeholder="Nikename">
        </div>
        <div class="form-group">
            <!--<label for="inputPassword">Password</label>-->
            <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-success btn-lg btn-block">Sign Up</button>
    </form>
</div>
</body>
</html>