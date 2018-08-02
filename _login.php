<?php
$ID = $_GET['id'];
$NAME = $_GET['name'];
date_default_timezone_set("Asia/Seoul");

if (!file_exists('./data/user/'.$ID)) {
  // New User : Create Profile
  fwrite(fopen('./data/user/'.$ID ,'x'), $NAME.chr(13).chr(10).''.chr(13).chr(10).'');
  fwrite(fopen('./login_log.txt', 'a'), chr(13).chr(10).date('Y-m-d h:i:sa').' '.$ID.' '.$NAME.' - created user profile, logged in');
  echo 'true';
}
else {
  if(str_replace(chr(13).chr(10), '',file('./data/user/'.$ID)[0]) == $NAME) {
    echo 'true';
    fwrite(fopen('./login_log.txt', 'a'), chr(13).chr(10).date('Y-m-d h:i:sa').' '.$ID.' '.$NAME.' - logged in');
  }
  else {
    echo 'false';
    fwrite(fopen('./login_log.txt', 'a'), chr(13).chr(10).date('Y-m-d h:i:sa').' '.$ID.' '.$NAME.' - tried to login as '.$NAME.'. but failed due to wrong name');
  }
}
?>
