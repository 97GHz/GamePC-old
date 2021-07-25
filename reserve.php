<?php
session_start();
require_once('dbCode.php');
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <script>
        function OK(){
            alert("성공");
            location.replace("index.php");
        }
        function login_error(){
            alert("로그인 먼저 해야합니다.");
            location.replace("index.php");
        }
        function preempt_error(){
            alert("이미 예약되었습니다.");
            location.replace("index.php");
        }
    </script>

    <?php
        if(!isset($_SESSION['idx']) || !isset($_SESSION['name']) || !isset($_SESSION['id']))
            echo "<script>login_error()</script>;";

        if(reserve($_SESSION['idx'], $_GET['rtime'], $_GET['rpc']))
            echo "<script>OK()</script>;";
        else
            echo "<script>preempt_error()</script>;";
    ?>
</body>
</html>