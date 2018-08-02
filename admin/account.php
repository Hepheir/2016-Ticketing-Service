<?php
#유저 리스트
$MEMBER = array('mcthemax');

function login($key, $member){
  global $MEMBER;
  if (!secure($key))
    return false;
  for ($i=0; $i < count($MEMBER); $i++) {
    if ($member == $MEMBER[$i])
      return true;
  }
  return false;
}
function secure($key){
  if ($key == '2J19D08K9')
    return true;
  return false;
}
?>
