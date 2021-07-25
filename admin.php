<?php
require_once("dbCode.php");
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="index.css" />
    <style>
        .page{
            width:250px;
        }
        .register-page{
            position:relative;
            width: 250px;
            text-align:center;
            padding: 45px;
            padding-top: 10px;
        }
        .register-form input{
            background: #5A5453;
            width: 100%;
            border: 0;
            margin: 0 0 15px;
            padding: 15px;
            box-sizing: border-box;
            font-size: 14px;
        }

        .register-form #submit {
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
    <h1>회원 가입</h1>
    <div class="page">
    <div class="register-page">
        <form class="register-form" action="register.php" method="post">
            <input type="text" name = "id" placeholder="ID (영어로)" />
            <input type="password" name="pw" placeholder="Password" />
            <input type="text" name="name" placeholder="이름" />
            <input type="text" name="code" placeholder="가입 코드 (수시로 변동)" />
            <input type="submit" id = "submit" value="가입"/>
        </form>
        <h3>비밀번호는 암호화되어 보관됩니다.</h3>
    </div>
    </div>
</body>
</html>