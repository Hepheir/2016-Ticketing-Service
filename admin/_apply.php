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

    case 3:
      # code...
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
