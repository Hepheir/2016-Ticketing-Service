<?php
  $TABLE_INFO = file($toROOT.'data/config/seat_table/table_info');
  date_default_timezone_set("Asia/Seoul");
  if (date('a') == 'am'){
    if (date('h') == 12) {$record_time = date('m').date('d').(date('h') - 1).date('i');}
    else {$record_time = date('m').date('d').date('h').date('i');}
  }
  else {$record_time = date('m').date('d').(date('h') + 12).date('i');}

  function hall_set_table() {
    global $TABLE_INFO;
    global $toROOT;
    echo '<table class="hall_set" style="display:inline-table;text-transform:uppercase">';
    echo '<caption class="hall_set">screen</caption>';
    for ($rows=1; $rows == 1; $rows++) {
      $rows_char = chr($rows+64);
      $cols_shift = 0;
      echo '<tr>';
      for ($cols=1; $cols <= $TABLE_INFO[0]; $cols++) {
        if (file_exists($toROOT.'data/config/seat_table/disabled/'.$rows_char.$cols)) {
          echo '<td class="hall_set" id="disabled"></td>';
          $cols_shift++;
        }
        else {
          echo '<td class="hall_set" id="not_pinned">'.$rows_char.($cols-$cols_shift).'</td>';
        }
        if ($cols < $TABLE_INFO[0]) {
          echo '<td class="hall_set" id="select" rowspan="'.$TABLE_INFO[1].'"><input type="radio" name="hall" value="'.$cols.'"></td>';
        }
      }
      echo '</tr>';
    }
    for ($rows=2; $rows <= $TABLE_INFO[1]; $rows++) {
      $rows_char = chr($rows+64); #열번호를 숫자에서 알파벳 문자로 바꿔줌
      $cols_shift = 0; #빈 구역만큼 좌석번호를 오른쪽으로 쉬프팅
      echo '<tr>';
      for ($cols=1; $cols <= $TABLE_INFO[0]; $cols++) {
        if (file_exists($toROOT.'data/config/seat_table/disabled/'.$rows_char.$cols)) {
          echo '<td class="hall_set" id="disabled"></td>';
          $cols_shift++;
        }
        else{
          echo '<td class="hall_set" id="not_pinned">'.$rows_char.($cols-$cols_shift).'</td>';
        }
      }
      echo '</tr>';
    }
    echo '</table>';
  }
?>
