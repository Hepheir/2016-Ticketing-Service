<?php
ini_set('display_errors','off');
$ID = $_GET['id'];
$NAME = $_GET['name'];
$PART = $_GET['part'];
$SEAT = $_GET['seat'];

$SEAT_STATUS = file('./data/part'.$PART.'/'.$SEAT)[0];
$TABLE_SETTING = file('./data/table_setting');

if ($SEAT == 'cancel') {
  $USER_DATA = file('./data/user/'.$ID);
  // Rewrite : User Data based Seat info
  $PART = str_replace(chr(13).chr(10), '', $USER_DATA[1]);
  $SEAT = str_replace(chr(13).chr(10), '', $USER_DATA[2]);

  // Empty User data
  fwrite(fopen('./data/user/'.$ID, 'w'), $NAME.chr(13).chr(10).'');
  // Empty Seat
  fwrite(fopen('./data/part'.$PART.'/'.$SEAT, 'w'), '0');
  echo '예매를 취소하였습니다.';
}

elseif ($SEAT_STATUS == 0) {
  fwrite(fopen('./data/part'.$PART.'/'.$SEAT, 'w'), '2'.chr(13).chr(10).$ID);

  // if user already has a seat booked (0 : name, 1 : part, 2: seat)
  $SAVED_PART = str_replace(chr(13).chr(10), '', file('./data/user/'.$ID)[1]);
  if ($SAVED_PART != '') {
    $SAVED_SEAT = str_replace(chr(13).chr(10), '', file('./data/user/'.$ID)[2]);
    fwrite(fopen('./data/part'.$SAVED_PART.'/'.$SAVED_SEAT, 'w'), '0');
    echo '이전 좌석 ('.$SAVED_PART.'부 '.$SAVED_SEAT.') 예매를 취소하고 새로운 좌석으로 예매하였습니다.';
  }
  else
    echo '성공적으로 예매되었습니다.';

  // Renew User data
  fwrite(fopen('./data/user/'.$ID, 'w'), $NAME.chr(13).chr(10).$PART.chr(13).chr(10).$SEAT);
}

elseif ($SEAT_STATUS == 2) {
  $SAVED_PART = str_replace(chr(13).chr(10), '', file('./data/user/'.$ID)[1]);
  $SAVED_SEAT = str_replace(chr(13).chr(10), '', file('./data/user/'.$ID)[2]);
  if ($SAVED_PART == $PART && $SAVED_SEAT == $SEAT)
    echo '저장되었습니다.';
  else
    echo '이미 예매된 좌석입니다.';
}


else
  echo '음.. 버그 발생? 아마도';

?>
