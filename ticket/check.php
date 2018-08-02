<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/ticket_check.css">
    <link rel="stylesheet" type="text/css" href="../css/default.css">
    <title>예매정보 확인</title>
  </head>
  <body>
    <div id="bodyWrap">
      <form action="" method="post">
        <input type="hidden" name="try" value="1">

        <label for="id">학번</label>
        <input id="id" type="text" name="id">

        <label for="pw">비번</label>
        <input id="pw" type="password" name="pw">
        <label for="submit">확인하기</label>
        <input id="submit" type="submit" class="hidden">
      </form>
      <?php
        if (!empty($_POST['id']) && !empty($_POST['pw'])) {
          $id = $_POST['id'];
          $pw = $_POST['pw'];
          if (! empty($p_info = file('../data/p_info/'.$id))) {
            $p_pw = str_replace(chr(13).chr(10), '',$p_info[1]);
            $p_name = str_replace(chr(13).chr(10), '',$p_info[0]);
            if ($p_pw == $pw) {
              echo '<script>alert("'.$p_name.' 님이 선택하신 좌석은 '.$p_info[3].'입니다.");</script>';
            }
            else {
              echo '<script>alert('.$p_pw.', '.$p_name.');alert("비밀번호가 일치하지 않습니다.");</script>';
            }
          }
          else {
            echo '<script>alert("해당 학번으로 예매된 정보가 없습니다.");</script>';
          }
        }
        else if (!empty($_POST['try'])) {
          echo '<script>alert("학번이랑 비밀번호 모두 입력해주세요.");</script>';
        }
      ?>
      <a href="../ticket/"><h2>돌아가기</h2></a>
      <p>지속적인 문제발생 혹은 학번 도용 문제는 010-2463-1852로 문의주세요.</p>
    </div>
  </body>
</html>
