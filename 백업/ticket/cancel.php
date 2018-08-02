<?php
  $part = $_POST['part'];
  $seat = $_POST['seat'];

  if (unlink('../data/seat/part_'.$_POST['part'].'/'.$_POST['seat'])) {
    echo '<script>alert("예매를 취소하였습니다.");window.location.replace("../ticket")</script>';
  }
  else{
    echo '<script>alert("에러 발생 (이거뜨면 김동주한테 연락좀. 010-2463-1852임)");window.location.replace("../ticket")</script>';
  }
?>
