<?php
  $toROOT = '../';
  include $toROOT.'action/table_drawer.php';

  if (isset($_POST['cancel'])){
    unlink($toROOT.'data/config/seat_table/part_'.$_POST['part'].'/selected\/'.$_POST['seat']);
    echo '<script>';
    echo 'alert("좌석 보호를 취소하였습니다.");';
    echo 'window.location.replace("'.$toROOT.'ticket/");';
    echo '</script>';
  }
  elseif (!isset($_POST['step']) || $_POST['step'] == 1) {
    include './select.php';
  }
  elseif ($_POST['step'] == 2) {
    if (!isset($_POST['part'])) {
      echo '<script>';
      echo 'alert("시간을 선택해주세요.");';
      echo 'window.location.replace("'.$toROOT.'ticket/");';
      echo '</script>';
    }
    elseif (!isset($_POST['seat'])) {
      echo '<form id="redirect" method="post"><input type="hidden" name="step" value="1"><input type="hidden" name="part" value="'.$_POST['part'].'"></form>';
      echo '<script>';
      echo 'alert("좌석을 선택해주세요.");';
      echo 'document.getElementById("redirect").submit();';
      echo '</script>';
    }
    else {
      if ($protect_seat = fopen($toROOT.'data/config/seat_table/part_'.$_POST['part'].'/selected\/'.$_POST['seat'],'x')){
        if (file_exists($toROOT.'data/config/seat_table/part_'.$_POST['part'].'/booked\/'.$_POST['seat'])){
          unlink($toROOT.'data/config/seat_table/part_'.$_POST['part'].'/selected\/'.$_POST['seat']);
          echo '<script>';
          echo 'alert("저런, 이미 누군가 예약해버린 자리인 듯 합니다. 아쉽네요.");';
          echo 'window.location.replace("'.$toROOT.'ticket/");';
          echo '</script>';
        }
        else {
          date_default_timezone_set("Asia/Seoul");
          if (date('a') == 'am'){
            $record_time = date('m').date('d').date('h').date('i');
          }
          else {
            $record_time = date('m').date('d').(date('h') + 12).date('i');
          }
          fwrite($protect_seat, $record_time);
          echo '<script>alert("선택하신 좌석이 성공적으로 보호처리 되었습니다.");</script>';
          include './inform.php';
        }
      }
      else{
        echo '<script>';
        echo 'alert("좌석 보호처리를... 실패했습니다..");';
        echo 'window.location.replace("'.$toROOT.'ticket/");';
        echo '</script>';
      }
    }
  }
  else{
    echo 'you dirty hacker.';
  }
?>
