<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/2014/REC-html5-20141028/">
<html>
<!-- Author information
* html, php, css, javascript
*   written by hepheir@gmail.com
*
* page designed by
*   hepheir@gmail.com - 김동주 & ljhappy1201@naver.com - 이진호
*
* :: TICKETING_FILL ::
-->
<?php
$toRoot = '../'; $toSetting = $toRoot.'data/setting/'; $toSeats = $toRoot.'data/seats/';
$PROTECTION = file($toSetting.'protection');
#timezone
date_default_timezone_set("Asia/Seoul");
if (date('a') == 'am'){
  if (date('h') == 12) {
    $record_time = date('m').date('d').'00'.date('i');
  }
  else {
    $record_time = date('m').date('d').date('h').date('i');
  }
}
else {$record_time = date('m').date('d').(date('h') + 12).date('i');}


if (isset($_GET['cancel'])) {
  unlink($toSeats.'selected/'.$_GET['part'].'/'.$_GET['seat']);
  if ($_GET['cancel'] == 'check')
    echo '<script>alert("좌석 보호가 취소되었습니다.");window.location.replace("./check/")</script>';
  else
    echo '<script>alert("좌석 보호가 취소되었습니다.");window.location.replace("./")</script>';
}
else if (!isset($_POST['part']) || !isset($_POST['seat']))
  echo '<script>window.location.replace("./")</script>';
else {
  if (!isset($_COOKIE[$_POST['part'].$_POST['seat']]))
    setcookie($_POST['part'].$_POST['seat'], $record_time, time() + (60*$PROTECTION[0]), "/");
  echo "<script>var seat = '".$_POST['seat']."'; var part = ".$_POST['part'].";</script>";
}

#create seat protection

if (file_exists($toSeats.'selected/'.$_POST['part'].'/'.$_POST['seat'])){
  if ($record_time - file($toSeats.'selected/'.$_POST['part'].'/'.$_POST['seat'])[0] > $PROTECTION[0]) {
    unlink($toSeats.'selected/'.$_POST['part'].'/'.$_POST['seat']);
    $SELECTED = fopen($toSeats.'selected/'.$_POST['part'].'/'.$_POST['seat'], 'x');

    fwrite($SELECTED, $record_time);
    echo "<script>alert('선택하신 좌석은 ".$PROTECTION[0]."분간 보호됩니다.');</script>";
  }
}
else if (file_exists($toSeats.'booked/'.$_POST['part'].'/'.$_POST['seat'])){
  echo '<script>alert("좌석 보호 지속시간이 끝난사이 다른 누군가에게 예매 되어버린 모양입니다.\n유감입니다.");window.location.replace("./")</script>';
}
else{
  $SELECTED = fopen($toSeats.'selected/'.$_POST['part'].'/'.$_POST['seat'], 'x');

  fwrite($SELECTED, $record_time);
  echo "<script>alert('선택하신 좌석은 ".$PROTECTION[0]."분간 보호됩니다.');</script>";
}
?>
<head>
  <meta charset="utf-8">
	<meta name="author" content="hepheir">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/support.css" media="screen">
  <link rel="stylesheet" href="../css/ticketing/fill.css" media="screen"><link rel="stylesheet" href="../data/setting/style/ticketing/ticketing.css" media="screen">
  <link rel="stylesheet" href="../css/table_color.css" media="screen">
  <script src="../js/ticketing/fill.js" charset="utf-8"></script>
  <title>정보 입력</title>
</head>
<body onresize="tableResize(cols, rows)">
  <div id="topHidden" class="hidden">
    수정/조회하기 페이지로 이동합니다
    <br>
    <input id="topHiddenButton" type="button" value="수정/조회하기" onclick="location.replace('./fill.php?<?php echo 'part='.$_POST['part'].'&#38;seat='.$_POST['seat'];?>&#38;cancel=check')"></input>
  </div>
  <div id="Header">
<!--[if (gt IE 9)|!(IE)]><!-->
    <div id="topIcon" onclick="topDrawer(drawerToggle)">
      <img width="100%" height="100%" src="../asset/icons/white_hamburger_64.png" alt="Menu" />
    </div>
<!--<![endif]-->
    <div id="topText" class="fl">
      정보를 입력하세요
    </div>
    <div id="toHome" class="fr" onclick="window.location.replace('./fill.php?<?php echo 'part='.$_POST['part'].'&#38;seat='.$_POST['seat'];?>&#38;cancel=')">
      뒤로
    </div>
    <div id="topMenu" class="fr">
      <a onclick="window.location.replace('./fill.php?<?php echo 'part='.$_POST['part'].'&#38;seat='.$_POST['seat'];?>&#38;cancel=')">수정/조회하기</a>
    </div>
  </div>
  <div id="TableContainer" class="TableContainer">
    <?php
    include $toRoot.'php/table_drawer.php';
    pinned_table($_POST['seat']);
    ?>
  </div>
  <form id="confirmForm" action="./confirm.php" method="post">
    <div id="UserInformation">
      <?php
      echo '<script>var cols = '.$TABLE_SIZE[0].'; var rows = '.$TABLE_SIZE[1].';</script>';
      echo '<input type="hidden" name="part" value="'.$_POST['part'].'"/>';
      echo '<input type="hidden" name="seat" value="'.$_POST['seat'].'"/>';
      ?>
      <label for="id">학&nbsp;&nbsp;번 : &nbsp;&nbsp;&nbsp;</label>
      <input id="id" class="fillInput" type="number" min="10101" max="31440" name="id" value="">
      <br>
      <br>
      <label for="name">이&nbsp;&nbsp;&nbsp;름 : &nbsp;&nbsp;</label>
      <input id="name" class="fillInput" type="text" name="name" value="">
      <br>
      <br>
      <label for="password">비밀번호 : </label>
      <input id="password" class="fillInput" type="password" name="password" value="">
    </div>
    <div id="nextWrap">
      <div id="toNext" class="fr" onclick="document.getElementById('confirmForm').submit()">예매하기</div>
    </div>
  </form>
  <br><br><br>
  <script type="text/javascript">
    var drawerToggle = 0; //작은 화면에서 나타나는 햄버거 매뉴버튼을 눌렀을때 div#topHidden의 토글러 매개변수
    tableResize(cols, rows);
  </script>
</body>
</html>
