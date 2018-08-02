<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test</title>
<?php
    echo '<link rel="stylesheet" href="'.$_toROOT.'css/mobile_new.css">';
    include $_toROOT.'action/table_drawer.php';
?>
  </head>
  <body>
    <form action="" method="post">
    <ul>
      <?php
        if (!isset($_POST['step'])||$_POST['step'] == 1) {
          echo '<li class="title">시간 선택</li>';
          echo '<li class="table_container">';
          echo '<p class="table_title">1부 좌석표</p>';
          echo 'table_drawer';
          echo '</li>';
          echo '<li class="part_selection">';
          echo '<div class="choice_part_1"><input id="select_part_1" type="radio" name="part" value="1" style="display:none"><label for="select_part_1">1부<br>잔여석: 32</label></div>';
          echo '<div class="choice_part_2"><input id="select_part_2" type="radio" name="part" value="2" style="display:none"><label for="select_part_2">2부<br>잔여석: 6</label></div>';
          echo '<div class="choice_part_3"><input id="select_part_3" type="radio" name="part" value="3" style="display:none"><label for="select_part_3">3부<br>잔여석: 0</label></div>';
          echo '</li>';
          echo '<li class="back" onclick="location.replace(\'../\')">돌아가기</li>';
          echo '<li class="next"><label for="submit">다음으로</label></li>';
          echo '<input id="submit" type="submit" style="display:none">';
        }
        elseif ($_POST['step'] == 2) {
          # code...
        }
        elseif ($_POST['step'] == 3) {
          # code...
        }
      ?>
    </ul>
    </form>
  </body>
</html>
