<?php
  $toROOT = '../';
  if (empty($_POST['secure'])){echo 'you dirty hacker';}
  elseif ($_POST['secure'] == '2J19D08K9'){
    switch ($_POST['opt']) {
      case '0':
        $table_info_fo = fopen($toROOT.'data/config/seat_table/table_info', 'r+');
        $table_info_fi = file($toROOT.'data/config/seat_table/table_info');
        $hall = str_replace(chr(13).chr(10), '',$table_info_fi[2]);
        $part = str_replace(chr(13).chr(10), '',$table_info_fi[3]);
        fwrite($table_info_fo,$_POST['cols'].chr(13).chr(10).$_POST['rows'].chr(13).chr(10).$hall.chr(13).chr(10).$part);
        break;

      case '1':
        $table_info_fo = fopen($toROOT.'data/config/seat_table/table_info', 'r+');
        $table_info_fi = file($toROOT.'data/config/seat_table/table_info');
        $cols = str_replace(chr(13).chr(10), '',$table_info_fi[0]);
        $rows = str_replace(chr(13).chr(10), '',$table_info_fi[1]);
        $hall = str_replace(chr(13).chr(10), '',$table_info_fi[2]);
        fwrite($table_info_fo,$cols.chr(13).chr(10).$rows.chr(13).chr(10).$hall.chr(13).chr(10).$_POST['part']);
        break;

      case '2':
        $table_info_fo = fopen($toROOT.'data/config/seat_table/table_info', 'r+');
        $table_info_fi = file($toROOT.'data/config/seat_table/table_info');
        $cols = str_replace(chr(13).chr(10), '',$table_info_fi[0]);
        $rows = str_replace(chr(13).chr(10), '',$table_info_fi[1]);
        $part = str_replace(chr(13).chr(10), '',$table_info_fi[3]);
        fwrite($table_info_fo,$cols.chr(13).chr(10).$rows.chr(13).chr(10).$_POST['hall_set'].chr(13).chr(10).$part);
        break;

      default:
        break;
    }
    echo '<form id="applied" action="'.$toROOT.'admin/" method="get"><input type="hidden" name="opt" value="'.$_POST['opt'].'"></form>';
    echo '<script>alert("적용되었습니다.");document.getElementById("applied").submit();</script>';
  }
  else{echo 'you dirty hacker';}
?>
