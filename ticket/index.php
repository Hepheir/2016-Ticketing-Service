<?php
  $toROOT = '../';
  include $toROOT.'action/table_drawer.php';

  if (!isset($_POST['step']) || $_POST['step'] == 1) {
    include './select.php';
  }
  elseif ($_POST['step'] == 2) {
    if (!isset($_POST['part'])) {
      echo '<script>';
      echo 'alert("시간을 선택해주세요.");';
      echo 'window.history.back();';
      echo '</script>';
    }
    elseif (!isset($_POST['seat'])) {
      echo '<script>';
      echo 'alert("좌석을 선택해주세요.");';
      echo 'window.history.back();';
      echo '</script>';
    }
    else {
      if ($protect_seat = fopen($toROOT.'/data/config/seat_table/part_'.$_POST['part'].'/selected\/'.$_POST['seat'],'x')){
        date_default_timezone_set("Asia/Seoul");
        $record_time = date('h:i');
        fwrite($protect_seat, $record_time);
        echo '<script>alert("선택하신 좌석이 성공적으로 보호처리 되었습니다.");</script>';
        include './inform.php';
      }
      else{
        echo '<script>';
        echo 'alert("좌석 보호처리를... 실패했습니다.. 끄흙흙ㅠㅠ");';
        echo 'window.history.back();';
        echo '</script>';
      }

    }
  }
  else{
    echo 'you dirty hacker.';
  }
?>
