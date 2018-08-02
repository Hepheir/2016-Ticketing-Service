<?php
  $id = $_REQUEST['id'];
  $pw = $_REQUEST['pw'];
  $user_info = $_REQUEST['info'];

  $user_pw = str_replace(chr(13).chr(10), '', file('./data/user/'.$id)[0]);

  if ($user_pw == $pw)
    fwrite(fopen('./data/user/'.$id, 'r+'), $user_pw.chr(13).chr(10).$user_info);
?>
