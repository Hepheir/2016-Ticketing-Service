<div class="container" style="padding-left: 8px;">
  <style media="screen">
    td#select{
      width: 12px;
    }
    td{
      width: 32px;
      height: 32px;
      font-size:0px;
    }
    input[type=radio]{
      width: inherit;
    }
  </style>
  <?php
    $seat_table = file($toROOT.'data/config/seat_table/table_info');
    $hall = str_replace(chr(13).chr(10), '',$seat_table[2]);
    hall_set_table();
    echo '<br><br><input type="submit" value="수정하기">';
  ?>
</div>
