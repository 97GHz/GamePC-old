<?php
require_once("index_view.php");
require_once("dbCode.php");
session_start();
?>

<?php
  $daily = array("일","월","화","수","목","금","토");
  $w = date('w');
  $today = date("Y년 m월 d일");
  $today = $today."(".$daily[$w].")";
  $now = date("H:i:s");
  $dayoffdate = array(
    "2021-02-11", // 설날 그믐
    "2021-02-12", // 설날
    "2021-03-01", // 삼일절
    "2021-05-05", // 어린이날
    "2021-05-19", // 석가탄신일
    "2021-09-20", // 추석
    "2021-09-21", // 추석
    "2021-09-22" // 추석
    );
  $t = date("Y-m-d");
  $dayoff = false;
  if ($w == 0 || $w == 6)
    $dayoff = true;
  foreach($dayoffdate as $d){
    if(!strcmp($t, $d))
      $dayoff = true;
  }

  //$t = "2021-01-16"; /* 여기 삭제해야됨 */ 
?>

<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Game PC Reservation</title>
    <link rel="stylesheet" href="index.css" />
  </head>
  <body>
    <h1>Game PC Reservation</h1>
    <?php
      if (!isset($_SESSION['id']) || !isset($_SESSION['name']) || !isset($_SESSION['idx']))
        echo '<h2><a href="./login.php">로그인</a>이 필요합니다</h2>';
      else
        echo '<h2><a href="./logout.php">'.$_SESSION['name'].'</a>님</h2>';
    ?>
    <h3>오늘 일자: <?php echo $today;?></h3>
    <h3>현재 시각: <?php echo $now;?></h3>

    <table style="width: 100%">
      <thead>
        <tr>
          <td width="34%">Time</td>
          <td width="33%">PC</td>
          <td width="33%">Name</td>
        </tr>
      </thead>
      <tbody>
        <?php
          $timetable = getTimeTable($t);
          print_table($timetable, $dayoff);
        ?>
      </tbody>
    </table>



  </body>
</html>