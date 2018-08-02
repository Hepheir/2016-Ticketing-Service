<?php
  $TABLE_INFO = file($toROOT.'data/config/seat_table/table_info');
  #[0]cols ,[1]rows ,[2]:hall, [3]:좌석 보호 지속시간
  #내부에서 샤용되는 변수나 이름은 소문자, 외부에서 사용될 수 있는 변수명이나 불러온 파일에 해당하는 변수명, 클래스 이름은 대문자로
//    $TABLE_INFO[0] = str_replace(chr(13).chr(10), '', $TABLE_INFO[0]);
//    $TABLE_INFO[1] = str_replace(chr(13).chr(10), '', $TABLE_INFO[1]);
//    $TABLE_INFO[2] = str_replace(chr(13).chr(10), '', $TABLE_INFO[2]);

  $cols = str_replace(chr(13).chr(10), '',$TABLE_INFO[0]);
  $rows = str_replace(chr(13).chr(10), '',$TABLE_INFO[1]);
  $hall = str_replace(chr(13).chr(10), '',$TABLE_INFO[2]);

  date_default_timezone_set("Asia/Seoul");
  if (date('a') == 'am'){$record_time = date('m').date('d').date('h').date('i');}
  else {$record_time = date('m').date('d').(date('h') + 12).date('i');}


  function default_table($PART) {
    global $toROOT;
    global $TABLE_INFO;
    global $record_time;
    echo '<table class="default" style="display:inline-table;text-transform:uppercase">';
    echo '<caption class="default">screen</caption>';
    for ($rows=1; $rows <= $TABLE_INFO[1]; $rows++) {
      $rows_char = chr($rows+64); #열번호를 숫자에서 알파벳 문자로 바꿔줌
      $cols_shift = 0; #빈 구역만큼 좌석번호를 오른쪽으로 쉬프팅
      echo '<tr>';
      for ($cols=1; $cols <= $TABLE_INFO[0]; $cols++) {
        if (file_exists($toROOT.'data/config/seat_table/disabled/'.$rows_char.$cols)) {
          echo '<td id="disabled" class="default"></td>';
          $cols_shift++;
        }
        elseif (file_exists($toROOT.'data/config/seat_table/part_'.$PART.'/vip\/'.$rows_char.($cols-$cols_shift))) {
          echo '<td id="vip" class="default">vip<br><span class="default">'.$rows_char.($cols-$cols_shift).'</span></td>';
        }
        elseif (file_exists($toROOT.'data/config/seat_table/part_'.$PART.'/booked\/'.$rows_char.($cols-$cols_shift))) {
          echo '<td id="booked" class="default">x<br><span class="default">'.$rows_char.($cols-$cols_shift).'</span></td>';
        }
        elseif (file_exists($toROOT.'data/config/seat_table/part_'.$PART.'/selected\/'.$rows_char.($cols-$cols_shift))) {
          $theFile = fopen($toROOT.'data/config/seat_table/part_'.$PART.'/selected\/'.$rows_char.($cols-$cols_shift), "r");
          if (fgets($theFile) < ($record_time - $TABLE_INFO[3])){
            fclose($theFile);
            unlink($toROOT.'data/config/seat_table/part_'.$PART.'/selected\/'.$rows_char.($cols-$cols_shift));
            echo '<td id="choosable" class="default">'.$rows_char.($cols-$cols_shift).'</td>';
          }
          else {
            fclose($theFile);
            echo '<td id="selected" class="default">!<br><span class="default">'.$rows_char.($cols-$cols_shift).'</span></td>';
          }
        }
        else{
          echo '<td id="choosable" class="default">'.$rows_char.($cols-$cols_shift).'</td>';
        }
        if ($cols==$TABLE_INFO[2]) {
          echo '<td id="HALL" class="default"></td>';
        }
      }
      echo '</tr>';
    }
    echo '</table>';
  }

  function point_table($PART,$SEAT) {
    global $toROOT;
    global $TABLE_INFO;
    echo '<table class="default" style="display:inline-table;text-transform:uppercase">';
    echo '<caption class="default">screen</caption>';
    for ($rows=1; $rows <= $TABLE_INFO[1]; $rows++) {
      $rows_char = chr($rows+64); #열번호를 숫자에서 알파벳 문자로 바꿔줌
      $cols_shift = 0; #빈 구역만큼 좌석번호를 오른쪽으로 쉬프팅
      echo '<tr>';
      for ($cols=1; $cols <= $TABLE_INFO[0]; $cols++) {
        if (file_exists($toROOT.'data/config/seat_table/disabled/'.$rows_char.$cols)) {
          echo '<td id="disabled" class="default"></td>';
          $cols_shift++;
        }
        elseif ($rows_char.($cols-$cols_shift) == $SEAT) {
          echo '<td id="pinned" class="point">'.$rows_char.($cols-$cols_shift).'</td>';
        }
        else{
          echo '<td id="not_pinned" class="point">'.$rows_char.($cols-$cols_shift).'</td>';
        }
        if ($cols==$TABLE_INFO[2]) {
          echo '<td id="HALL" class="point"></td>';
        }
      }
      echo '</tr>';
    }
    echo '</table>';
  }

  #input[type=radio]
  function input_table($PART) {
    global $toROOT;
    global $TABLE_INFO;
    global $record_time;
    echo '<table class="input" style="display:inline-table;text-transform:uppercase">';
    echo '<caption class="input">screen</caption>';
    for ($rows=1; $rows <= $TABLE_INFO[1]; $rows++) {
      $rows_char = chr($rows+64);
      $cols_shift = 0;
      echo '<tr>';
      for ($cols=1; $cols <= $TABLE_INFO[0]; $cols++) {
        if (file_exists($toROOT.'data/config/seat_table/disabled/'.$rows_char.$cols)) {
          echo '<td id="disabled" class="input"></td>';
          $cols_shift++;
        }
        elseif (file_exists($toROOT.'data/config/seat_table/part_'.$PART.'/vip\/'.$rows_char.($cols-$cols_shift))) {
          echo '<td id="vip" class="input">vip<br><span class="input">'.$rows_char.($cols-$cols_shift).'</span></td>';
        }
        elseif (file_exists($toROOT.'data/config/seat_table/part_'.$PART.'/booked\/'.$rows_char.($cols-$cols_shift))) {
          echo '<td id="booked" class="input">x<br><span class="input">'.$rows_char.($cols-$cols_shift).'</span></td>';
        }
        elseif (file_exists($toROOT.'data/config/seat_table/part_'.$PART.'/selected\/'.$rows_char.($cols-$cols_shift))) {
          $theFile = fopen($toROOT.'data/config/seat_table/part_'.$PART.'/selected\/'.$rows_char.($cols-$cols_shift), "r");
          if (fgets($theFile) < ($record_time - $TABLE_INFO[3])){
            fclose($theFile);
            unlink($toROOT.'data/config/seat_table/part_'.$PART.'/selected\/'.$rows_char.($cols-$cols_shift));
            echo '<td id="choosable" class="input" style="padding:0;">
            <input id="input_'.$rows_char.($cols-$cols_shift).'" type="radio" name="seat" value="'.$rows_char.($cols-$cols_shift).'" style="display:none">
            <label id="choosable" for="input_'.$rows_char.($cols-$cols_shift).'" style="display:block;width:100%;height:100%;margin:0;">'.$rows_char.($cols-$cols_shift).'</label>
            </td>';
          }
          else {
            fclose($theFile);
            echo '<td id="selected" class="input">!<br><span class="input">'.$rows_char.($cols-$cols_shift).'</span></td>';
          }
        }
        else{
          echo '<td id="choosable" class="input" style="padding:0;">
          <input id="input_'.$rows_char.($cols-$cols_shift).'" type="radio" name="seat" value="'.$rows_char.($cols-$cols_shift).'" style="display:none">
          <label id="choosable" for="input_'.$rows_char.($cols-$cols_shift).'" style="display:block;width:100%;height:100%;margin:0;">'.$rows_char.($cols-$cols_shift).'</label>
          </td>';
        }
        if ($cols==$TABLE_INFO[2]) {
          echo '<td id="HALL" class="input"></td>';
        }
      }
      echo '</tr>';
    }
    echo '</table>';
  }

  function count_table($PART){
    global $toROOT;
    global $TABLE_INFO;
    $available_seats = 0;
    for ($rows=1; $rows <= $TABLE_INFO[1]; $rows++) {
      $rows_char = chr($rows+64);
      for ($cols=1; $cols <= $TABLE_INFO[0]; $cols++) {
        if (file_exists($toROOT.'data/config/seat_table/disabled/'.$rows_char.$cols)) {
          continue;
        }
        elseif (file_exists($toROOT.'data/config/seat_table/part_'.$PART.'/vip\/'.$rows_char.$cols)) {
          continue;
        }
        elseif (file_exists($toROOT.'data/config/seat_table/part_'.$PART.'/booked\/'.$rows_char.$cols)) {
          continue;
        }
        elseif (file_exists($toROOT.'data/config/seat_table/part_'.$PART.'/selected\/'.$rows_char.$cols)) {
          continue;
        }
        $available_seats++;
      }
    }
    return $available_seats;
  }
  #min-height, min-width를 구하기 쉽게 해주는 함수. 첫 번째 parameter에는 변의 길이, 두 번째에는 표의 칸 사이 간격을 입력해주면 된다.
  function min_table($side,$border){
    global $TABLE_INFO;
    if ($TABLE_INFO[2] == -1){$min_width = $side * $TABLE_INFO[0] + $border * ($TABLE_INFO[0] + 1);}
    else {$min_width = $side * ($TABLE_INFO[0] + 1) + $border * ($TABLE_INFO[0] + 1);}
    $min_height = $side * ($TABLE_INFO[1] + 1) + $border * ($TABLE_INFO[1] + 1);
    return 'min-width:'.$min_width.'px; min-height:'.$min_height.'px;';
  }

?>
