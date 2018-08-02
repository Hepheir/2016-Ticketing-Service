<!DOCTYPE html>
<html>
<!-- Author information
* html, php, css, javascript
*   written by hepheir@gmail.com
*
* site designed by
*   dfc7936@naver.com & hepheir@gmail.com
*
-->
  <head>
    <meta charset="utf-8">
		<meta name="author" content="hepheir">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" type="text/css" href="../css/ticket_result.css">
    <link rel="stylesheet" type="text/css" href="../css/default.css">
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <title>예매확인</title>
  </head>
  <body>
    <?php
    if (empty($_GET['part']) && empty($_GET['seat'])) {
      echo '<script>alert("뭐라도 좀 고르고 예매하세요.");window.location.replace("../ticket");</script>';
    }
    else if (empty($_GET['part'])) {
      echo '<script>alert("시간을 선택하시지 않으셨습니다.");window.location.replace("../ticket");</script>';
    }
    else if (empty($_GET['seat'])) {
      echo '<script>alert("좌석을 선택하시지 않으셨습니다.");window.location.replace("../ticket/?part='.$_GET['part'].'");</script>';
    }
    if (file_exists('../data/seat/part_'.$_GET['part'].'/'.$_GET['seat'])) {
      echo '<script>alert("저런.. 그 짧은 찰나의 순간에, 다른 누군가가 먼저 예약한 모양입니다. 죄송합니다.");window.location.replace("../ticket");</script>';
    }
    fopen('../data/seat/part_'.$_GET['part'].'/'.$_GET['seat'], 'x');
    ?>
    <div id="bodyWrap">
      <div id="containerWrap">
        <h1>예매 확인</h1>
        <form action="confirm.php" method="post">
          <?php
            echo '<input type="hidden" name="part" value="'.$_GET['part'].'"><input type="hidden" name="seat" value="'.$_GET['seat'].'">';
            echo '<h2>선택하신 좌석은 '.$_GET['part'].'부, '.$_GET['seat'].' 입니다.</h2>';
          ?>
          <p>학번과 이름을 입력해주세요.</p>
          <p>
            <label for="id">학번: </label>
            <input type="text" id="id" name="id"> &nbsp;
            <label for="name">이름: </label>
            <input type="text" id="name" name="name"/>
          </p>
          <br>
          <p>예매 확인을 위한 연락수단을 입력해주세요. (싫으면 안 써도 되지만...)</p>
          <p><input type="text" id="info" name="info" value="이메일, 휴대폰 등..."/></p>
          <br>
          <input id="confirm" class="hidden" type="submit"/><label class="submit" for="confirm">확인</label>
          <label class="submit" for="cancel">취소</label>
        </form>
        <form action="cancel.php" method="post">
          <?php
            echo '<input type="hidden" name="part" value="'.$_GET['part'].'"><input type="hidden" name="seat" value="'.$_GET['seat'].'">';
          ?>
          <input id="cancel" class="hidden" type="submit"/>
        </form>
      </div>
    </div>
  </body>
</html>
