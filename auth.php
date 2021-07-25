<?php
require_once("dbCode.php");
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<script>
function OK(){
    location.replace("index.php");
}
function id_error(){
    alert("아이디가 없습니다.");
    location.replace("login.php");
}

function pw_error(){
    alert("패스워드가 틀렸습니다.");
    location.replace("login.php");
}
</script>
    
<?php
$ret = login($_POST['id'], $_POST['pw']);
if($ret == 0){
    echo '<script>OK();</script>';
}
else if($ret == 1){
    echo '<script>id_error();</script>';
}
else{
    echo '<script>pw_error();</script>';
}
?>

</body>
</html>