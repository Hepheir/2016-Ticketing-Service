<?php
$AVAILABLE_PART = file('./data/part_available');

for ($i = 1; $i <= $AVAILABLE_PART[0]; $i++) {
  echo '<li class="part-container__item" onclick="header_item_select('.$i.')">'.$i.'부</li>';
}
?>
