<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test</title>
<?php
    echo '<link rel="stylesheet" href="'.$toROOT.'css/ticket_mobile.css">';
    echo '<link rel="stylesheet" href="'.$toROOT.'css/table_color.css">';
    include $toROOT.'action/table_drawer.php';
?>
  </head>
  <body>
  <?php
    if(isset($_POST['step'])){
      if ($_POST['step'] == 3) {echo '<form action="'.$toROOT.'ticket/result/" method="post">';}
      else {echo '<form action="" method="post">';}
    }
    else {echo '<form action="" method="post">';}

    echo'<ul>';
    if (!isset($_POST['step'])||$_POST['step'] == 1) {
      if (!isset($_GET['part'])) {$PART = 1;}
      else{$PART = $_GET['part'];}
      echo '<li class="title">시간 선택</li>';
      echo '<li class="default_table_container">';
      echo '<p class="table_title">'.$PART.'부 좌석표</p>';
      echo '<div class="default_table_container">';
      echo '<div class="table_wrap" style="'.min_table(12,4).'">';
      echo default_table($PART);
      echo '</div>';
      echo '</div>';
      echo '</li>';
      echo '<li class="part_selection">';
      if ($PART == 1) {echo '<div class="choice_part_1"><a href="?part=1" class="checked">1부<br>잔여석: '.count_table(1).'</a></div>';}
      else {echo '<div class="choice_part_1"><a href="?part=1">1부<br>잔여석: '.count_table(1).'</a></div>';}
      if ($PART == 2) {echo '<div class="choice_part_2"><a href="?part=2" class="checked">2부<br>잔여석: '.count_table(2).'</a></div>';}
      else {echo '<div class="choice_part_2"><a href="?part=2">2부<br>잔여석: '.count_table(2).'</a></div>';}
      if ($PART == 3) {echo '<div class="choice_part_3"><a href="?part=3" class="checked">3부<br>잔여석: '.count_table(3).'</a></div>';}
      else {echo '<div class="choice_part_3"><a href="?part=3">3부<br>잔여석: '.count_table(3).'</a></div>';}
      echo '</li>';
      echo '<li class="back" onclick="location.replace(\'../\')">돌아가기</li>';
      echo '<li class="next"><label for="submit">다음으로</label></li>';
      echo '<input type="hidden" name="part" value="'.$PART.'"><input type="hidden" name="step" value="2"><input id="submit" type="submit" style="display:none">';
    }
    elseif ($_POST['step'] == 2) {
      $PART = $_POST['part'];
      echo '<li class="title">좌석 선택</li>';
      echo '<li class="input_table_container">';
      echo '<div class="input_table_container">';
      echo '<div class="table_wrap" style="'.min_table(56,4).'">';
      echo input_table($PART);
      echo '</div>';
      echo '</div>';
      echo '</li>';
      echo '<li class="back" onclick="window.history.back();">이전으로</li>';
      echo '<li class="next"><label for="submit">다음으로</label></li>';
      echo '<input type="hidden" name="part" value="'.$PART.'"><input type="hidden" name="step" value="3"><input id="submit" type="submit" style="display:none">';
    }
    elseif ($_POST['step'] == 3) {
      $PART = $_POST['part'];
      if (!isset($_POST['seat'])) {
        echo '<script>alert("좌석을 선택해주세요.");window.history.back();</script>';
      }
      $SEAT = $_POST['seat'];
      echo '<li class="title">예매 확인</li>';
      echo '<li class="pinned_table_container">pinned_table';
      echo '<p>시간 : '.$PART.'  좌석 : '.$SEAT.'</p>';
      echo '</li>';
      echo '<li class="p_info">';
      echo '<p>학번</p>';
      echo '<input id="id" type="text" name="id">';
      echo '<p>이름</p>';
      echo '<input id="name" type="text" name="name">';
      echo '<p>비밀번호</p>';
      echo '<input id="pw" type="password" name="pw">';
      echo '</li>';
      echo '<li class="back" onclick="window.history.back();">이전으로</li>';
      echo '<li class="next"><label for="submit">예매하기</label></li>';
      echo '<input type="hidden" name="part" value="'.$PART.'"><input type="hidden" name="seat" value="'.$SEAT.'"><input id="submit" type="submit" style="display:none">';
    }
    echo'</ul>';
    echo '</form>';
  ?>
  </body>
</html>
