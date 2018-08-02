<?php
  $seat_table = file('../data/config/seat_table');
  $cols = str_replace(chr(13).chr(10), '',$seat_table[0]);
  $rows = str_replace(chr(13).chr(10), '',$seat_table[1]);
  $hall = str_replace(chr(13).chr(10), '',$seat_table[2]);

  require_once '../opensource/Mobile_Detect.php';
  $detect = new Mobile_Detect;

  if ( $detect->isMobile() ) {
    include 'mobile.php';
  }
  else{
    include 'desktop.php';
  }
?>
