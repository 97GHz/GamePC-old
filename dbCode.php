<?php
function db_connect()
{
    $db_host = 'localhost';
    $db_user = 'gamepc';
    $db_pw = '###########';
    $db_name = 'gamepc';
    $conn = mysqli_connect($db_host, $db_user, $db_pw, $db_name);
    if (!$conn)
        echo "<h1>FATAL ERROR : CANNOT ACCESS DB</h1>";
    return $conn;
}

function getTimeTable($today)
{
    $conn = db_connect();
    $sql = "SELECT account.idx, account.name, reservation.rtime, reservation.rpc FROM account LEFT JOIN reservation ON account.idx = reservation.idx WHERE reservation.rdate = DATE('".$today."');";
    $sql_result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($sql_result);

    $table_data = [
        1 => [
            1=>null,
            2=>null,
            3=>null,
            4=>null,
            5=>null,
            6=>null,
            7=>null,
            8=>null
        ],
        2 => [
            1=>null,
            2=>null,
            3=>null,
            4=>null,
            5=>null,
            6=>null,
            7=>null,
            8=>null
        ],
        3 => [
            1=>null,
            2=>null,
            3=>null,
            4=>null,
            5=>null,
            6=>null,
            7=>null,
            8=>null
        ],
        4 => [
            1=>null,
            2=>null,
            3=>null,
            4=>null,
            5=>null,
            6=>null,
            7=>null,
            8=>null
        ]
    ];
    
    for ($i = 0; $i < $count; $i++)
    {
        $result = mysqli_fetch_array($sql_result);
        $table_data[$result['rtime']][$result['rpc']] = array($result['idx'], $result['name']);
    }
    return $table_data;
}

function register($id, $pw, $name)
{
    $conn = db_connect();
    $enc_pw = password_hash($pw, PASSWORD_DEFAULT);
    $sql = "INSERT into account(id, pw, name) VALUES('".$id."', '".$enc_pw."', '".$name."');";
    if(!mysqli_query($conn, $sql))
        return false;
    else
        return true;
}

function login($id, $pw)
{
    $conn = db_connect();
    $sql = "SELECT idx, name, pw FROM account WHERE id = '".$id."';";
    $sql_result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($sql_result);
    if ($count == 0)
        return 1; //NO ID
    else
    {
        $result = mysqli_fetch_array($sql_result);
        $enc_pw = $result['pw'];
        if(password_verify($pw, $enc_pw))
        {
            $idx = $result['idx'];
            $name = $result['name'];
    
            session_start();
            $_SESSION['idx'] = $idx;
            $_SESSION['name'] = $name;
            $_SESSION['id'] = $id;

            mysqli_query($conn, "INSERT INTO login_log(idx) VALUES(".$idx.");");
            return 0; //OK
        }
        else
        {
            return 2; //NO PW
        }
    }
}

function reserve($idx, $rtime, $rpc)
{
    $rdate = date("Y-m-d"); 
    //$rdate = "2021-01-16"; // 여기 삭제 지워야됨
    $conn = db_connect();
    $sql = "SELECT * FROM reservation WHERE rdate = DATE('".$rdate."') and rtime = ".$rtime." and rpc = ".$rpc.";";
    $sql_result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($sql_result);
    if($count == 0)
    {
        $sql = "INSERT INTO reservation(idx, rdate, rtime, rpc) VALUES(".$idx.", DATE('".$rdate."'), ".$rtime.", ".$rpc.");";
        $sql_result = mysqli_query($conn, $sql);
        return true;
    }
    else
    {
        return false;
    }
}

?>