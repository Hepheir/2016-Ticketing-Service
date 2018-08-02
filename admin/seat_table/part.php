<div class="container" style="padding-left: 8px;">
  <?php
    $seat_table = file($toROOT.'data/config/seat_table/table_info');
    $part = str_replace(chr(13).chr(10), '',$seat_table[3]);
    echo '<label for="part">몇 번에 나누어 공연할 것인지 지정 (최대 3부까지 활성화 가능)</label><br><br><input id="hall" type="number" min="1" max="3" name="part" value="'.$part.'"><br><br>';
    echo '<input type="submit" value="수정하기">';
  ?>
</div>
