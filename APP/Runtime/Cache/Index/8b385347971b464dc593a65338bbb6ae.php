<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Winterfell</title>
    <link rel="stylesheet" type="text/css" href="/Public/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="/Public/css/Index/login.css" />
</head>
<body>
<div class="login_s">
    <div class="title">
        <h1 class="title_h1">Sign in to Winterfell</h1>
    </div>
    <div class="login_form">
        <form action="<?php echo U('Index/login_handle');?>" method="post">
            <div class="form-group">
                <label for="InputEmail">Email address</label>
                <input type="email" class="form-control" id="InputEmail" name="InputEmail" placeholder="Email">
            </div>
            <div class="form-group form_pass">
                <label for="InputPassword">Password
                    <a class="forget_pass" href="#">Forgot password?</a>
                </label>
                <input type="password" class="form-control" id="InputPassword" name="InputPassword" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-success btn-lg btn-block">Sign In</button>
        </form>
    </div>
</div>
</body>
</html>