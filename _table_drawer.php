<?php
ini_set('display_errors','off');
$PART = $_GET['part'];
$USER_DATA = file('./data/user/'.$_GET['id']);
$TABLE_SETTING = file('./data/table_setting');
if (str_replace(chr(13).chr(10), '', $USER_DATA[1]) == $PART) {
  $SAVED_SEAT = str_replace(chr(13).chr(10), '', $USER_DATA[2]);
}
else {
  $SAVED_SEAT = '';
}

for ($row = 1; $row <= $TABLE_SETTING[1]; $row++) {
  $row_chr = chr($row+64);
  // col_shift : 빈 칸에 의해 밀린 칸 수 만큼 col을 Shift하기 위한 변수
  $col_shift = 0;

  $EMPTY_CELL = file('./data/empty_cell/'.$row_chr);

  echo '<ul class="row">';
  echo '<li class="row-chr">'.$row_chr.'</li>';

  for ($col = 1; $col <= $TABLE_SETTING[0]; $col++) {
    if ($EMPTY_CELL[$col] == 1) {
      // 1이면 빈 칸이다.
      echo '<li class="col-empty"></li>';
      $col_shift++;
      continue;
    }
    // 빈 칸에 의해 밀려버린 col를 한 루프동안 원래대로 shifting 함.
    $col -= $col_shift;

    $SEAT_STATUS = file('./data/part'.$PART.'/'.$row_chr.$col)[0];

    if ($SEAT_STATUS == 0)
      echo '<li class="col" seat="'.$row_chr.$col.'" onclick="SelectSeat(\''.$row_chr.$col.'\')">'.$row_chr.$col.'</li>';

    elseif ($SEAT_STATUS == 1)
      echo '<li class="col-unselectable" seat="'.$row_chr.$col.'">X</li>';

    elseif ($SEAT_STATUS == 2) {
      if ($row_chr.$col == $SAVED_SEAT)
        echo '<li class="col selected" seat="'.$row_chr.$col.'" onclick="SelectSeat(\''.$row_chr.$col.'\')">'.$row_chr.$col.'</li>';
      else
        echo '<li class="col-booked" seat="'.$row_chr.$col.'">'.$row_chr.$col.'</li>';
    }

    // 위 에서 shifting한 col을 for문의 연산에 지장이 없도록 기존 값으로 돌려놓음
    $col += $col_shift;
  }
  echo '</ul>';
  echo '<br>';
}
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';
echo '<hidden class="js-saved-seat">'.$SAVED_SEAT.'</hidden>';
?>
