<?php $toROOT = "../../";

  if ($READ_INFO = file($toROOT.'data/p_info/'.$_POST['id'])){
    $true_password = str_replace(chr(13).chr(10), '',$READ_INFO[1]);
    $NAME = str_replace(chr(13).chr(10), '',$READ_INFO[0]);
    $PART = str_replace(chr(13).chr(10), '',$READ_INFO[2]);
    $SEAT = str_replace(chr(13).chr(10), '',$READ_INFO[3]);
    if ($_POST['password'] == $true_password) {
      if (unlink($toROOT.'data/config/seat_table/part_'.$PART.'/booked\/'.$_POST['seat']) && unlink($toROOT.'data/p_info/'.$_POST['id'])) {
        echo '<script>';
        echo 'alert("성공적으로 예매를 취소하였습니다.");';
        echo 'window.location.replace("'.$toROOT.'");';
        echo '</script>';
      }
      else {
        echo '<script>';
        echo 'alert("데이터 삭제를 실패한 것 같습니다. 010-2463-1852로 제보해주시면 정말 고맙겠습니다.");';
        echo 'window.history.back();';
        echo '</script>';
      }
    }
    else {
      echo '<script>';
      echo 'alert("틀린 비밀번호 입력했다. 못 보여준다.");';
      echo 'window.history.back();';
      echo '</script>';
    }
  }
  else {
    echo '<script>';
    echo 'alert("예매를 취소하는 과정에서 뭔가 오류가 발생한 모양입니다. 010-2463-1852로 제보해주시면 정말 고맙겠습니다.");';
    echo 'window.history.back();';
    echo '</script>';
  }
?>
