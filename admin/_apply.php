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

    case 4: # 선택 불가 좌석 설정 (parameters : seat_1,seat_2,...,seat_n)
      ini_set('display_errors','off');
      $SEAT_LIST = $_GET['seats'];
      $SEAT_ARR = array();
      $PART_ARR = array();

      // Seat list : string -> array
      $j = 0;
      $PART_ARR[$j] = $SEAT_LIST[0];
      for ($i=1; $SEAT_LIST[$i] != null; $i++) {
        if ($SEAT_LIST[$i] == ',') {
          $j++;
          $SEAT_ARR[$j] = '';
          $i++;
          $PART_ARR[$j] = $SEAT_LIST[$i];
          continue;
        }
        $SEAT_ARR[$j] = $SEAT_ARR[$j].$SEAT_LIST[$i];
      }

      // refresh empty_cell
      $TABLE_SETTING = file('../data/table_setting');

      for ($part=1; $part <= str_replace(chr(13).chr(10), '', file('../data/part_available')[0]); $part++) {
        for ($row = 1; $row <= $TABLE_SETTING[1]; $row++) {
          $row_chr = chr($row+64);
          for ($col = 1; $col <= $TABLE_SETTING[0]; $col++) {
            if (!file_exists('../data/part'.$part.'/'.$row_chr.$col))
              fwrite(fopen('../data/part'.$part.'/'.$row_chr.$col, 'x'), '0');

            if (str_replace(chr(13).chr(10), '',file('../data/part'.$part.'/'.$row_chr.$col)[0]) != 2) {
              fwrite(fopen('../data/part'.$part.'/'.$row_chr.$col, 'w'), '0');
              for ($i = 0; $SEAT_ARR[$i] != null; $i++) {
                if ($SEAT_ARR[$i] == $row_chr.$col && $part == $PART_ARR[$i]) {
                  fwrite(fopen('../data/part'.$part.'/'.$row_chr.$col, 'w'), '1');
                  break;
                }
              }
            }

          }
        }
      }

      echo '적용되었습니다.';
      break;

    default:
      # code...
      break;

  }
}
?>
