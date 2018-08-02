<?php
  $toROOT = '../';
  if (empty($_POST['secure'])){echo 'you dirty hacker';}
  elseif ($_POST['secure'] == '2J19D08K9'){
    $table_info_fo = fopen($toROOT.'data/config/seat_table/table_info', 'r+');
    $table_info_fi = file($toROOT.'data/config/seat_table/table_info');
    $cols = str_replace(chr(13).chr(10), '',$table_info_fi[0]);
    $rows = str_replace(chr(13).chr(10), '',$table_info_fi[1]);
    $hall = str_replace(chr(13).chr(10), '',$table_info_fi[2]);
    $part = str_replace(chr(13).chr(10), '',$table_info_fi[3]);
    switch ($_POST['opt']) {
      case '0': #크기설정
        fwrite($table_info_fo,$_POST['cols'].chr(13).chr(10).$_POST['rows'].chr(13).chr(10).$hall.chr(13).chr(10).$part);
        break;

      case '1': #시간설정
        fwrite($table_info_fo,$cols.chr(13).chr(10).$rows.chr(13).chr(10).$hall.chr(13).chr(10).$_POST['part']);
        break;

      case '2': #복도위치
        fwrite($table_info_fo,$cols.chr(13).chr(10).$rows.chr(13).chr(10).$_POST['hall_set'].chr(13).chr(10).$part);
        break;

      case '3': #사용불가석
        for ($i=1; $i <= $rows; $i++) {
          $rows_char = chr($i+64);
          for ($j=1; $j <= $cols; $j++) {
            if (isset($_POST['disabled_set_'.$rows_char.$j])) {
              fopen($toROOT.'data/config/seat_table/disabled/'.$rows_char.$j, 'c');
            }
            else {
              unlink($toROOT.'data/config/seat_table/disabled/'.$rows_char.$j);
            }
          }
        }
        break;

      case '4':
        for ($i=1; $i <= $rows; $i++) {
          $rows_char = chr($i+64);
          for ($j=1; $j <= $cols; $j++) {
            if (isset($_POST['vip_set_'.$rows_char.$j])) {
              fopen($toROOT.'data/config/seat_table/part_'.$_POST['part'].'/vip\/'.$rows_char.$j, 'c');
            }
            else {
              unlink($toROOT.'data/config/seat_table/part_'.$_POST['part'].'/vip\/'.$rows_char.$j);
            }
          }
        }
        break;

      case '10':
        $setting_fo = fopen($toROOT.'data/config/setting', 'w');
        fwrite($setting_fo,$_POST['toggle']);
        break;

      case '12':
        for ($i=1; $i <= $rows; $i++) {
          $rows_char = chr($i+64);
          for ($j=1; $j <= $cols; $j++) {
            if (isset($_POST[$rows_char.$j])) {
              unlink($toROOT.'data/config/seat_table/part_'.$_POST['part'].'/booked\/'.$rows_char.$j);
              unlink($toROOT.'data/p_info/'.$_POST[$rows_char.$j]);
            }
          }
        }
        break;

      case '13':
        $target_directory = $toROOT.'intro/';
        $target_file = $target_directory.basename($_FILES['file_upload']['name']);
        $file_type = pathinfo($target_file,PATHINFO_EXTENSION);
        if ($_POST['upload_mode'] == 0){
          $files = glob($target_directory.'*'); // get all file names
          foreach($files as $file){ // iterate files
            if(is_file($file))
              unlink($file); // delete file
          }
        }
        move_uploaded_file($_FILES['file_upload']['tmp_name'], $target_file);
        break;

      default:
        echo 'you dirty hacker';
        break;
    }
    echo '<form id="applied" action="'.$toROOT.'admin/" method="get"><input type="hidden" name="opt" value="'.$_POST['opt'].'">';
    if (isset($_POST['part'])){echo '<input type="hidden" name="part" value="'.$_POST['part'].'">';}
    echo '</form>';
    echo '<script>alert("적용되었습니다.");document.getElementById("applied").submit();</script>';
  }
  else{echo 'you dirty hacker';}
?>
