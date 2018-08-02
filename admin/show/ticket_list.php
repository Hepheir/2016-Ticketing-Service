<div class="container" style="padding-left: 8px;">
  <style media="screen">
    table{
      border-spacing: 4px;
    }
    td{
      width: 72px;
      height: 24px;
      padding: 0;
      font-size: 16px;
      text-align: center;
      font-weight: bold;
    }
  </style>
  <p>
    귀찮아서 백업기능을 만들어 두지 않았습니다. 삭제할 때에는 신중하게 삭제해주세요.
  </p>
  <table style="display:inline-table;text-transform:uppercase">
    <tr>
      <td>시간</td>
      <td>좌석</td>
      <td>학번</td>
      <td>이름</td>
      <td>삭제</td>
    </tr>
    <?php
    $TABLE_INFO = file($toROOT.'data/config/seat_table/table_info');
    global $toROOT;
    for ($rows=1; $rows <= $TABLE_INFO[1]; $rows++) {
      $rows_char = chr($rows+64);
      for ($cols=1; $cols <= $TABLE_INFO[0]; $cols++) {
        for ($PART=1; $PART <= 3; $PART++) {
          if (file_exists($toROOT.'data/config/seat_table/part_'.$PART.'/booked\/'.$rows_char.$cols)) {
            $seat_data = file($toROOT.'data/config/seat_table/part_'.$PART.'/booked\/'.$rows_char.$cols);
            echo '<tr>';
            echo '<td>'.$PART.'부</td>';
            echo '<td>'.$rows_char.$cols.'</td>';
            echo '<td>'.$seat_data[0].'</td>';
            echo '<td>'.$seat_data[1].'</td>';
            echo '<td style="padding: 2px;"><input type="hidden" name="part" value="'.$PART.'"><input type="checkbox" name="'.$rows_char.$cols.'" value="'.str_replace(chr(13).chr(10), '',$seat_data[0]).'" style="height:100%;"></td>';
            echo '</tr>';
          }
        }
      }
    }
    ?>
  </table>
  <br><br><br>
  <input type="submit" value="삭제하기" style="background: red;">
  <br><br><br>
</div>
