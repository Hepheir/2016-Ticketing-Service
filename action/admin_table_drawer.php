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
          if ($cols == $TABLE_INFO[2]) {
            echo '<td class="hall_set" id="select" rowspan="'.$TABLE_INFO[1].'"><input type="radio" name="hall_set" value="'.$cols.'" checked=""></td>';
          }
          else {
            echo '<td class="hall_set" id="select" rowspan="'.$TABLE_INFO[1].'"><input type="radio" name="hall_set" value="'.$cols.'"></td>';
          }
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
  function disabled_set_table(){
    global $TABLE_INFO;
    global $toROOT;
    echo '<table class="disabled_set" style="display:inline-table;text-transform:uppercase">';
    echo '<caption class="disabled_set">screen</caption>';
    for ($rows=1; $rows <= $TABLE_INFO[1]; $rows++) {
      $rows_char = chr($rows+64);
      echo '<tr>';
      for ($cols=1; $cols <= $TABLE_INFO[0]; $cols++) {
        if (file_exists($toROOT.'data/config/seat_table/disabled/'.$rows_char.$cols)) {
          echo '<td class="disabled_set" id="disabled"><input type="checkbox" name="disabled_set_'.$rows_char.$cols.'" value="'.$rows_char.$cols.'" checked=""></td>';
        }
        else {
          echo '<td class="disabled_set" id="not_pinned"><input type="checkbox" name="disabled_set_'.$rows_char.$cols.'" value="'.$rows_char.$cols.'"></td>';
        }
        if ($cols == $TABLE_INFO[2]) {
          echo '<td id="disabled"></td>';
        }
      }
      echo '</tr>';
    }
    echo '</table>';
  }
  function vip_set_table($PART){
    global $TABLE_INFO;
    global $toROOT;
    echo '<input type="hidden" name="part" value="'.$PART.'">';
    echo '<table class="vip_set" style="display:inline-table;text-transform:uppercase">';
    echo '<caption class="vip_set">screen</caption>';
    for ($rows=1; $rows <= $TABLE_INFO[1]; $rows++) {
      $rows_char = chr($rows+64);
      $cols_shift = 0;
      echo '<tr>';
      for ($cols=1; $cols <= $TABLE_INFO[0]; $cols++) {
        if (file_exists($toROOT.'data/config/seat_table/disabled/'.$rows_char.$cols)) {
          echo '<td id="disabled" class="default"></td>';
          $cols_shift++;
        }
        elseif (file_exists($toROOT.'data/config/seat_table/part_'.$PART.'/vip\/'.$rows_char.($cols - $cols_shift))) {
          echo '<td class="vip_set" id="vip" style="opacity: 1; cursor: inherit;"><input type="checkbox" name="vip_set_'.$rows_char.($cols - $cols_shift).'" value="'.$rows_char.($cols - $cols_shift).'" checked=""></td>';
        }
        else {
          echo '<td class="vip_set" id="not_pinned"><input type="checkbox" name="vip_set_'.$rows_char.($cols - $cols_shift).'" value="'.$rows_char.($cols - $cols_shift).'"></td>';
        }
        if ($cols == $TABLE_INFO[2]) {
          echo '<td id="disabled"></td>';
        }
      }
      echo '</tr>';
    }
    echo '</table>';
  }
  function status_table($PART){
    global $TABLE_INFO;
    global $toROOT;
    echo '<input type="hidden" name="part" value="'.$PART.'">';
    echo '<table class="status" style="display:inline-table;text-transform:uppercase">';
    echo '<caption class="status">screen</caption>';
    for ($rows=1; $rows <= $TABLE_INFO[1]; $rows++) {
      $rows_char = chr($rows+64);
      $cols_shift = 0;
      echo '<tr>';
      for ($cols=1; $cols <= $TABLE_INFO[0]; $cols++) {
        if (file_exists($toROOT.'data/config/seat_table/disabled/'.$rows_char.$cols)) {
          echo '<td id="disabled"></td>';
          $cols_shift++;
        }
        elseif (file_exists($toROOT.'data/config/seat_table/part_'.$PART.'/vip\/'.$rows_char.($cols - $cols_shift))) {
          echo '<td id="vip"></td>';
        }
        elseif (file_exists($toROOT.'data/config/seat_table/part_'.$PART.'/booked\/'.$rows_char.($cols - $cols_shift))) {
          $seat_data = file($toROOT.'data/config/seat_table/part_'.$PART.'/booked\/'.$rows_char.($cols - $cols_shift));
          echo '<td class="status" id="pinned" title="'.$rows_char.($cols - $cols_shift).chr(13).chr(10).$seat_data[0].$seat_data[1].'">'.$seat_data[0].'<br>'.$seat_data[1].'</td>';
        }
        else {
          echo '<td class="status" id="not_pinned"></td>';
        }
        if ($cols == $TABLE_INFO[2]) {
          echo '<td id="disabled"></td>';
        }
      }
      echo '</tr>';
    }
    echo '</table>';
  }
?>
