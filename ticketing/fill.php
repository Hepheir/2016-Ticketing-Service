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
$toRoot = '../';
$PROTECTION = file($toRoot.'data/setting/protection');
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
  unlink($toRoot.'data/seats/selected/'.$_GET['part'].'/'.$_GET['seat']);
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

if (file_exists($toRoot.'data/seats/selected/'.$_POST['part'].'/'.$_POST['seat'])){
  if ($record_time - file($toRoot.'data/seats/selected/'.$_POST['part'].'/'.$_POST['seat'])[0] > $PROTECTION[0]) {
    unlink($toRoot.'data/seats/selected/'.$_POST['part'].'/'.$_POST['seat']);
    $SELECTED = fopen($toRoot.'data/seats/selected/'.$_POST['part'].'/'.$_POST['seat'], 'x');

    fwrite($SELECTED, $record_time);
    echo "<script>alert('선택하신 좌석은 ".$PROTECTION[0]."분간 보호됩니다.');</script>";
  }
}
else if (file_exists($toRoot.'data/seats/booked/'.$_POST['part'].'/'.$_POST['seat'])){
  echo '<script>alert("좌석 보호 지속시간이 끝난사이 다른 누군가에게 예매 되어버린 모양입니다.\n유감입니다.");window.location.replace("./")</script>';
}
else{
  $SELECTED = fopen($toRoot.'data/seats/selected/'.$_POST['part'].'/'.$_POST['seat'], 'x');

  fwrite($SELECTED, $record_time);
  echo "<script>alert('선택하신 좌석은 ".$PROTECTION[0]."분간 보호됩니다.');</script>";
}
?>
<head>
  <meta charset="utf-8">
	<meta name="author" content="hepheir">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--<meta name="theme-color" content="#8983F5">-->
  <link rel="stylesheet" href="../css/ticketing/layout.css" media="screen">
  <link rel="stylesheet" href="../css/ticketing/color.css" media="screen">
  <link rel="stylesheet" href="../css/table_color.css" media="screen">
  <script src="../js/ticketing/Header.js" charset="utf-8"></script>
  <title>좌석을 선택하세요</title>
</head>
<body onresize="topMenuToggle()">
  <div id="topHidden" class="hidden">
    수정/조회하기 페이지로 이동합니다
    <br>
    <input id="topHiddenButton" type="button" value="수정/조회하기" onclick="location.replace('./check/')"></input>
  </div>
  <div id="Header">
<!--[if (gt IE 9)|!(IE)]><!-->
    <div id="topMenuIcon" onclick="topHiddenToggle(drawerToggle)">
      <img width="100%" height="100%" src="../asset/icons/white_hamburger_64.png" alt="Menu" />
    </div>
<!--<![endif]-->
    <div id="topTitle">
      정보를 입력하세요
    </div>
    <div id="topBack" onclick="window.location.replace('../')">
      뒤로
    </div>
    <div id="topMenuText">
      <a href="./check/">수정/조회하기</a>
    </div>
  </div>
  <div id="Content">
    <form id="seatForm" action=".html" method="post">
      <input id="seatFormButton" type="button" value="다음">
      <br>
      <br>
    </form>
  </div>
  <script type="text/javascript">
    var drawerToggle = 0;
    topMenuToggle();
  </script>
</body>
</html>
