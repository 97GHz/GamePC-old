<?php
require_once("dbCode.php");
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
function back(){
    location.replace("admin.php");
}

function code_error(){
    alert('가입 코드가 맞지 않습니다.');
    back();
}

function empty_error(){
    alert('전부 채워넣어야 합니다.');
    back();
}

function something_error(){
    alert('제대로 채워넣어야 합니다.');
    back();
}

function OK(){
    alert('가입이 정상적으로 이루어졌습니다.');
    location.replace("index.php");
}
</script>

<?php
    if($_POST['code'] != '1234'){
        echo '<script>code_error();</script>';
    }
    else{
        $id = $_POST['id'];
        $pw = $_POST['pw'];
        $name = $_POST['name'];
        if (empty($id) || empty($pw) || empty($name)){
            echo '<script>empty_error();</script>';
        }
        else{
            $ret = register($id, $pw, $name);
            if($ret)
                echo '<script>OK()</script>';
            else
                echo '<script>something_error()</script>';
        }
    }

?>
</body>
</html>