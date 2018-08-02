<?php $toROOT = '../../';
  if (!isset($_POST['login'])) {
    include './login.php';
  }
  else {
    if (!isset($_POST['id'])) {
      echo '<script>';
      echo 'alert("학번 적어라");';
      echo 'window.history.back();';
      echo '</script>';
    }
    else {
      if (!file_exists($toROOT.'data/p_info/'.$_POST['id'])) {
        echo '<script>';
        echo 'alert("해당 학번의 예매 이력이 없다");';
        echo 'window.history.back();';
        echo '</script>';
      }
      elseif (!isset($_POST['password'])) {
        echo '<script>';
        echo 'alert("비밀번호도 적어");';
        echo 'window.history.back();';
        echo '</script>';
      }
      else {
        if ($READ_INFO = file($toROOT.'data/p_info/'.$_POST['id'])){
          $true_password = str_replace(chr(13).chr(10), '',$READ_INFO[1]);
          $NAME = str_replace(chr(13).chr(10), '',$READ_INFO[0]);
          $PART = str_replace(chr(13).chr(10), '',$READ_INFO[2]);
          $SEAT = str_replace(chr(13).chr(10), '',$READ_INFO[3]);
          if ($_POST['password'] == $true_password) {
            include $toROOT.'action/table_drawer.php';
            include './profile.php';
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
          echo 'alert("제대로 입력해봐");';
          echo 'window.history.back();';
          echo '</script>';
        }
      }
    }
  }
?>
