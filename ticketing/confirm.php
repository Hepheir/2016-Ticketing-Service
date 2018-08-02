<?php
if (!isset($_POST['part']) || !isset($_POST['seat']) || !isset($_POST['id']) || !isset($_POST['name']) || !isset($_POST['password']))
  header('Location: ./');


if (file_exists('../data/list/'.$_POST['id'])) {
  if (str_replace(chr(13).chr(10), '', file('../data/list/'.$_POST['id'])[0]) == $_POST['name']) {
    if (str_replace(chr(13).chr(10), '', file('../data/list/'.$_POST['id'])[1]) == $_POST['password'])
      echo '<script>var a = 1;</script>';
    else
      echo '<script>var a = 2;</script>';
  }
  else
    echo '<script>var a = 3;</script>';
}
else {
  unlink('../data/seats/selected/'.$_POST['part'].'/'.$_['seat']);
  fwrite(fopen('../data/seats/booked/'.$_POST['part'].'/'.$_['seat'], 'x'), $_POST['id'].chr(13).chr(10).$_POST['name']);
  fwrite(fopen('../data/list/'.$_POST['id'], 'x'), $_POST['name'].chr(13).chr(10).$_POST['password'].chr(13).chr(10).$_POST['seat']);
  echo '<script>alert("성공적으로 예매 되었습니다.");window.location.replace("../")</script>';
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
  <title>예매 확인</title>
</head>
<body onresize="seatTableSizing(cols,rows)">
  <div id="Header">
    <div id="topTitle">
      예매 확인
    </div>
    <div id="topBack" onclick="window.location.replace('./')">
      뒤로
    </div>
  </div>
  <div id="Content">
    <form id="reForm" action="./confirm.php" method="post">
      <input type="hidden" name="part" value="<?php echo $_POST['part']; ?>">
      <input type="hidden" name="seat" value="<?php echo $_POST['seat']; ?>">
      <input type="hidden" name="id" value="<?php echo $_POST['id']; ?>">
      <input type="hidden" name="name" value="<?php echo $_POST['name']; ?>">
      <table id="userInfo">
        <tr>
          <td><label class="userInfoLabel" for="pwInput">비밀번호 :&nbsp;</label></td>
          <td><input id="pwInput" class="userInfoInput" type="password" name="password" value="<?php echo $_POST['password']; ?>"></td>
<!--[if (gt IE 9)|!(IE)]><!-->
          <td><div id="pwShow" onclick="passwordShow(passwordShowToggle)">비밀번호 보기</div></td>
<!--<![endif]-->
        </tr>
      </table>
    </form>
    <form id="cancelForm" action="./confirm.php" method="post" style="display:none;">
      <input type="hidden" name="part" value="<?php echo $_POST['part']; ?>">
      <input type="hidden" name="seat" value="<?php echo $_POST['seat']; ?>">
      <input type="hidden" name="id" value="<?php echo $_POST['id']; ?>">
      <input type="hidden" name="name" value="<?php echo $_POST['name']; ?>">
      <input type="hidden" name="cancel" value="true">
    </form>
  </div>
  <script type="text/javascript">
    <?php
    $TABLE_SIZE = file('../data/setting/table_size');
    echo 'var cols = '.$TABLE_SIZE[0].'; var rows = '.$TABLE_SIZE[1].';';
    ?>
    seatTableSizing(cols,rows);

    switch (a) {
      case 1: // ==name, ==password
        confirm("이전에 예매한 경력이 있습니다.\n이전 예매를 취소하고 새로 고른 좌석으로 다시 예매 할까요?") ? document.getElementById('reForm').submit() : document.getElementById('cancelForm').submit();
        break;

      case 2: // ==name, !=password
        confirm("이전에 예매한 경력이 있습니다.\n이전 예매를 취소하고 새로 고른 좌석으로 다시 예매 할까요?") ? alert('본인확인을 위해 이전 예매때 입력했던 비밀번호로 다시 입력해주세요.') : document.getElementById('cancelForm').submit();
        break;
      case 3: // !=name
        alert("해당 학번에 다른 이름으로 예매된 좌석이 있습니다.\n만약 도용이 의심된다면 <?php echo str_replace(file('../data/setting/help')[0]); ?>로 연락주시기 바랍니다.");
        window.location.replace('./');
        break;
      default:

    }
  </script>
</body>
</html>
