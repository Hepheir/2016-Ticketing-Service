<div class="container" style="padding-left: 8px;">
  <?php
    $seat_table = file($toROOT.'data/config/seat_table/table_info');
    $cols = str_replace(chr(13).chr(10), '',$seat_table[0]);
    $rows = str_replace(chr(13).chr(10), '',$seat_table[1]);
    echo '<label for="cols">행 (가로)</label><br><input id="cols" type="number" min="1" max="50" name="cols" value="'.$cols.'"><br><br>';
    echo '<label for="rows">열 (세로)</label><br><input id="rows" type="number" min="1" max="50" name="rows" value="'.$rows.'"><br><br>';
    echo '<input type="submit" value="수정하기">';
  ?>
</div>
