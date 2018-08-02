<?php
if ($_GET['key'] == 'hepheir') {
  $CODE = $_GET['code'];
  switch ($CODE) {
    case 1: # 좌석표 크기 설정 (parameters : col, row)
      if (fwrite(fopen('../data/table_setting', 'w'), $_GET['col'].chr(13).chr(10).$_GET['row']))
        echo 'Successful';
      else
        echo 'Fail';
      break;

    case 2: # 공연 시간 설정 (parameters : part)
      if (fwrite(fopen('../data/part_available', 'w'), $_GET['part']))
        echo 'Successful';
      else
        echo 'Fail';
      break;

    case 3: # 빈 좌석 설정 (parameters : seat_1,seat_2,...,seat_n)
      ini_set('display_errors','off');
      $SEAT_LIST = $_GET['seats'];
      $SEAT_ARR = array();

      // Seat list : string -> array
      $j = 0;
      for ($i=0; $SEAT_LIST[$i] != null; $i++) {
        if ($SEAT_LIST[$i] == ',') {
          $j++;
          $SEAT_ARR[$j] = '';
          continue;
        }
        $SEAT_ARR[$j] = $SEAT_ARR[$j].$SEAT_LIST[$i];
      }

      // refresh empty_cell
      $TABLE_SETTING = file('../data/table_setting');

      for ($row = 1; $row <= $TABLE_SETTING[1]; $row++) {
        $row_chr = chr($row+64);
        for ($col = 1; $col <= $TABLE_SETTING[0]; $col++) {
          unlink('../data/empty_cell/'.$row_chr.$col);
          for ($i=0; $SEAT_ARR[$i] != null ; $i++) {
            if ($SEAT_ARR[$i] == $row_chr.$col) {
              fopen('../data/empty_cell/'.$row_chr.$col, 'x');
            }
          }
        }
      }
      echo '적용되었습니다.';
      break;

    case 4:
      # code...
      break;

    default:
      # code...
      break;

  }
}
?>
