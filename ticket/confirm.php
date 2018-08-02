<?php
  $part = $_POST['part'];
  $seat = $_POST['seat'];
  $name = $_POST['name'];
  $id = $_POST['id'];
  $info = $_POST['info'];

  $file_seat = fopen('../data/seat/part_'.$part.'/'.$seat, 'w');
  $file_p_info = fopen('../data/p_info/'.$id, 'a');
  if (!fwrite($file_seat,$id.chr(13).chr(10))){
    echo '<script>alert("에러 발생 (이거뜨면 김동주한테 연락좀. 010-2463-1852임)");window.location.replace("../ticket")</script>';
  }
  if(!fwrite($file_p_info,$name.chr(13).chr(10).$info.chr(13).chr(10).$part.'부 '.$seat)){
    echo '<script>alert("에러 발생 (이거뜨면 김동주한테 연락좀. 010-2463-1852임)");window.location.replace("../ticket")</script>';
  }
  echo '<script>alert("성공적으로 예매되었습니다.");window.location.replace("../");</script>';
?>
