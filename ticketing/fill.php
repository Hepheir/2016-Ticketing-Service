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
  <script src="../js/ticketing/seatTableSizing.js" charset="utf-8"></script>
  <script src="../js/ticketing/seatSubmitter.js" charset="utf-8"></script>
  <title>예매중!! - 정보입력 :: <?php echo $_POST['part']; ?>부 <?php echo $_POST['seat']; ?></title>
</head>
<body onresize="topMenuToggle();seatTableSizing(cols,rows)">
  <div id="topHidden" class="hidden">
    수정/조회하기 페이지로 이동합니다
    <br>
    <input id="topHiddenButton" type="button" value="수정/조회하기" onclick="location.replace('./fill.php?<?php echo 'part='.$_POST['part'].'&#38;seat='.$_POST['seat'];?>&#38;cancel=check')"></input>
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
    <div id="topBack" onclick="window.location.replace('./fill.php?<?php echo 'part='.$_POST['part'].'&#38;seat='.$_POST['seat'];?>&#38;cancel=')">
      뒤로
    </div>
    <div id="topMenuText">
      <a href="./fill.php?<?php echo 'part='.$_POST['part'].'&#38;seat='.$_POST['seat'];?>&#38;cancel=check">수정/조회하기</a>
    </div>
  </div>
  <div id="Content">
    <?php
    if (str_replace(chr(13).chr(10), '', file('../data/setting/notice')[0]) == 1)
      echo '<div id="noticeBoard">'.str_replace(chr(13).chr(10), '', file('../data/setting/notice')[1].'</div>');
    ?>
    <hr>
    <table id="seatTable">
      <caption id="seatTableCaption">Screen</caption>
      <?php
      $TABLE_SIZE = file('../data/setting/table_size');
      # PHP -> JavaScript
      echo '<script>var cols = '.$TABLE_SIZE[0].'; var rows = '.$TABLE_SIZE[1].';</script>';

      for ($rows=1; $rows <= $TABLE_SIZE[1]; $rows++) {
        $cols_shift = 0;
        echo '<tr>';
        for ($cols=1; $cols <= $TABLE_SIZE[0]; $cols++) {
          #빈 공간
          if (file_exists('../data/seats/empty/'.chr($rows+64).$cols)) {
            echo '<td class="seatCell empty"></td>'.chr(13).chr(10);
            $cols_shift++;
          }

          #선택한 좌석
          elseif (chr($rows+64).($cols-$cols_shift) == $_POST['seat'])
            echo '<td id="seatCell_'.chr($rows+64).($cols-$cols_shift).'" class="seatCell pinned_pinned"></td>'.chr(13).chr(10);

          #일반석, #예매중인 좌석, #예매된 좌석, #오프라인 전용석, #VIP석, #고장석
          else
            echo '<td id="seatCell_'.chr($rows+64).($cols-$cols_shift).'" class="seatCell pinned_default"></td>'.chr(13).chr(10);

          #복도
          if ($cols == $TABLE_SIZE[2])
            echo '<td class="seatCell hall"></td>'.chr(13).chr(10);
        }
        echo '</tr>'.chr(13).chr(10);
      }
      ?>
    </table>
    <div id="tableFolder" onclick="pinnedTableFold(tableViewToggle)"></div>
    <hr>
    <form id="seatForm" action="confirm.php" method="post">
      <table id="userInfo">
        <tr>
          <td><label class="userInfoLabel" for="idInput">학 번 : </label></td>
          <td colspan="2"><input id="idInput" class="userInfoInput" type="number" min="10101" max="31440" name="id" value=""></td>
        </tr>
        <tr>
          <td><label class="userInfoLabel" for="nameInput">이 름 : </label></td>
          <td colspan="2"><input id="nameInput" class="userInfoInput" type="text" name="name" value=""></td>
        </tr>
        <tr>
          <td><label class="userInfoLabel" for="pwInput">비밀번호 : </label></td>
          <td><input id="pwInput" class="userInfoInput" type="password" name="pw" value=""></td>
<!--[if (gt IE 9)|!(IE)]><!-->
          <td><div id="pwShow" onclick="passwordShow(passwordShowToggle)">비밀번호 보기</div></td>
<!--<![endif]-->
        </tr>
      </table>
      <input id="seatFormButton" type="button" value="다음" onclick="seatSubmit()">
      <br>
      <br>
    </form>
  </div>
  <script type="text/javascript">
    var drawerToggle = 0;
    var tableViewToggle = 0;
    var passwordShowToggle = 0;
    topMenuToggle();
    pinnedTableFold(tableViewToggle);
    seatTableSizing(cols,rows);
    function passwordShow(t){
      if (t % 2 == 0){
        document.getElementById("pwInput").type = "text";
        document.getElementById("pwShow").innerHTML = "비밀번호 숨기기";
      }
      else{
        document.getElementById("pwInput").type = "password";
        document.getElementById("pwShow").innerHTML = "비밀번호 보기";
      }
      passwordShowToggle++;
    }
    function pinnedTableFold(t){
      if (t % 2 == 1){
        document.getElementById("seatTable").className = "";
        document.getElementById("tableFolder").innerHTML = "좌석표 접기";
      }
      else{
        document.getElementById("seatTable").className = "hidden";
        document.getElementById("tableFolder").innerHTML = "좌석표 보기";
      }
      tableViewToggle++;
    }
  </script>
</body>
</html>
