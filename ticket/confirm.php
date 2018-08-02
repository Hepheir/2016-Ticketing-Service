<?php
if (empty($_POST['name']) || empty($_POST['id'])){
echo '<script>alert("학번 또는 이름을 입력하지 않으셨습니다.");window.history.back()</script>';
}if (empty($_POST['pw'])){
echo '<script>alert("비밀번호를 입력하지 않으셨습니다.");window.history.back()</script>';
}

  $part = $_POST['part'];
  $seat = $_POST['seat'];
  $name = $_POST['name'];
  $pw = $_POST['pw'];
  $id = $_POST['id'];
  if (!empty($_POST['info'])){
    $info = $_POST['info'];
  }
  else{
    $info = 'N/A';
  }
  if (file_exists('../data/p_info/'.$id)){
    unlink('../data/seat/part_'.$_POST['part'].'/'.$_POST['seat']);
    echo '<script>alert("동일 학번으로 중복예매는 불가능합니다.");window.location.replace("../ticket/?part='.$_POST['part'].'")</script>';
  }
  else{
    $file_seat = fopen('../data/seat/part_'.$part.'/'.$seat, 'w');
    $file_p_info = fopen('../data/p_info/'.$id, 'a');
    if (!fwrite($file_seat,$id)){
      echo '<script>alert("에러 발생 (이거뜨면 김동주한테 연락좀. 010-2463-1852임)");window.location.replace("../ticket")</script>';
    }
    if(!fwrite($file_p_info,$name.chr(13).chr(10).$pw.chr(13).chr(10).$info.chr(13).chr(10).$part.'부 '.$seat)){
      echo '<script>alert("에러 발생 (이거뜨면 김동주한테 연락좀. 010-2463-1852임)");window.location.replace("../ticket")</script>';
    }
    echo '<script>alert("성공적으로 예매되었습니다.");window.location.replace("../");</script>';
  }
?>
