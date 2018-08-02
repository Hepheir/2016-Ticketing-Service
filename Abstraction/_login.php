<?php
  $id = $_REQUEST['id'];
  $pw = $_REQUEST['pw'];

  if (file_exists('./data/user/'.$id) && str_replace(chr(13).chr(10), '', file('./data/user/'.$id)[0]) == $pw) {
    echo "true";
  }
  elseif (!file_exists('./data/user/'.$id) && $pw == '1111') {
    fwrite(fopen('./data/user/'.$id, 'x'), '1111');
    echo "new";
  }
?>
