<?php
require_once("dbCode.php");
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="index.css" />
    <style>
        .page{
            width:250px;
        }
        .login-page{
            position:relative;
            width: 250px;
            text-align:center;
            padding: 45px;
            padding-top: 10px;
        }
        .login-form input{
            background: #5A5453;
            width: 100%;
            border: 0;
            margin: 0 0 15px;
            padding: 15px;
            box-sizing: border-box;
            font-size: 14px;
        }

        .login-form #submit {
            background-color:#4A4443;
            width: 100%;
            border: 0;
            padding: 15px;
            color: #FFFFFF;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <h1>Login</h1>
    <div class="page">
    <div class="login-page">
        <form class="login-form" action="auth.php" method="post">
            <input type="text" name = "id" placeholder="ID" />
            <input type="password" name="pw" placeholder="Password" />
            <input type="submit" id = "submit" value="Login"/>
        </form>
        <h3><a href="admin.php">회원가입</a></h3>
    </div>
    </div>
</body>
</html>