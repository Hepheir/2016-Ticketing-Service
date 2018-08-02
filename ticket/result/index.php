<?php
  $toROOT = '../../';
  if (!isset($_POST['id'])){echo '<script>alert("학번을 입력해주세요.");window.history.back();</script>';}
  elseif (!isset($_POST['name'])){echo '<script>alert("이름을 입력해주세요.");window.history.back();</script>';}
  elseif (!isset($_POST['password'])){echo '<script>alert("비밀번호을 입력해주세요.");window.history.back();</script>';}
  elseif (!isset($_POST['part'])){echo '<script>alert("you dirty hacker");window.history.back();</script>';}
  elseif (!isset($_POST['seat'])){echo '<script>alert("you dirty hacker");window.history.back();</script>';}
  elseif (file_exists($toROOT.'data/p_info/'.$_POST['id'])){
    echo '<script>alert("동일 학번으로 중복하여 예매할 수 없습니다.");window.location.replace("'.$toROOT.'ticket/");</script>';
  }
  else {
    if ($seat_file = fopen($toROOT.'data/config/seat_table/part_'.$_POST['part'].'/booked\/'.$_POST['seat'],'x')) {
      if (fwrite($seat_file,$_POST['id'].chr(13).chr(10).$_POST['name'])){
        if ($p_info_file = fopen($toROOT.'data/p_info/'.$_POST['id'],'x')){
          if (fwrite($p_info_file,$_POST['name'].chr(13).chr(10).$_POST['password'].chr(13).chr(10).$_POST['part'].chr(13).chr(10).$_POST['seat'])) {
            echo '<script>alert("성공적으로 예매되었습니다.");</script>';
          }
          else {
            echo '<script>alert("에러발생. 010-2463-1852로 보고해주시면 ㄳㄳ");</script>';
            unlink($toROOT.'data/config/seat_table/part_'.$_POST['part'].'/booked\/'.$_POST['seat']);
            unlink($toROOT.'data/p_info'.$_POST['id']);
          }
        }
        else {
          echo '<script>alert("에러발생. 010-2463-1852로 보고해주시면 ㄳㄳ");</script>';
          unlink($toROOT.'data/config/seat_table/part_'.$_POST['part'].'/booked\/'.$_POST['seat']);
          unlink($toROOT.'data/p_info'.$_POST['id']);
        }
      }
      else {
        echo '<script>alert("에러발생. 010-2463-1852로 보고해주시면 ㄳㄳ");</script>';
        unlink($toROOT.'data/config/seat_table/part_'.$_POST['part'].'/booked\/'.$_POST['seat']);
        unlink($toROOT.'data/p_info'.$_POST['id']);
      }
      unlink($toROOT.'data/config/seat_table/part_'.$_POST['part'].'/selected\/'.$_POST['seat']);
      include $toROOT.'action/table_drawer.php';
      include './show.php';
    }

  }
?>
