<?php
  ini_set('display_errors','off');

  $id = $_REQUEST['id'];

  $party = str_replace(chr(13).chr(10), '', file('./data/user/'.$id)[2]);

  # Search for party master
  if (substr($party, 0, 6) != 'master') {
    $id_master = substr($party, 0, 5);
    if (substr(str_replace(chr(13).chr(10), '', file('./data/user/'.$id_master)[2]), 0, 6) != 'master')
      $id_master = substr($party, 6, 5);
  }
  else
    $id_master = $id;

  $time = str_replace(chr(13).chr(10), '', file('./data/user/'.$id_master)[3]);
  $seat = str_replace(chr(13).chr(10), '', file('./data/user/'.$id_master)[4]);

  echo $party.';'.$time.';'.$seat.';'.$id_master.';';
?>
