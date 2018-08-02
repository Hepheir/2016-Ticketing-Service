<?php
$toSeats = $toRoot.'data/seats/';
$TABLE_SIZE = file($toRoot.'data/setting/table_size');
# $TABLE_SIZE[0] = str_replace(chr(13).chr(10), '',$PART_AVAILABLE[0]); //가로
# $TABLE_SIZE[1] = str_replace(chr(13).chr(10), '',$PART_AVAILABLE[1]); //세로
# $TABLE_SIZE[2] = str_replace(chr(13).chr(10), '',$PART_AVAILABLE[2]); //복도

#timezone
date_default_timezone_set("Asia/Seoul");
if (date('a') == 'am'){
  if (date('h') == 12) {
    $record_time = date('m').date('d').'00'.date('i');
  }
  else {
    $record_time = date('m').date('d').date('h').date('i');
  }
}
else {$record_time = date('m').date('d').(date('h') + 12).date('i');}

function default_table($PART){
  global $toRoot;
  global $toSeats;
  global $TABLE_SIZE;
  global $record_time;

  echo '<script src="'.$toRoot.'js/table_drawer.js" charset="utf-8"></script>'.chr(13).chr(10);
  echo '<style>.default_example{display:inline-block;vertical-align:bottom;width:16px;height:16px;margin:4px 2px 0 0;cursor:default;}#default_exampleContainer{height:40px;margin:0;padding:4px;font-size:14px;color:inherit;line-height:1em;}i.default_exampleWrap{display:inline-block;width:auto;height:auto;font-style: normal;}</style>'.chr(13).chr(10);
  echo '<div id="defaultTableWrap">'.chr(13).chr(10);
  echo '<table class="default">'.chr(13).chr(10);
  echo '<caption class="default">Screen</caption>'.chr(13).chr(10);
  for ($rows=1; $rows <= $TABLE_SIZE[1]; $rows++) {
    $cols_shift = 0;
    echo '<tr>';
    for ($cols=1; $cols <= $TABLE_SIZE[0]; $cols++) {
      #빈 공간
      if (file_exists($toSeats.'empty/'.chr($rows+64).$cols)) {
        echo '<td class="default empty"></td>'.chr(13).chr(10);
        $cols_shift++;
      }

      #고장석
      elseif (file_exists($toSeats.'broken/'.chr($rows+64).($cols-$cols_shift)))
        echo '<td id="default_'.chr($rows+64).($cols-$cols_shift).'" class="default default_broken"></td>'.chr(13).chr(10);

      #VIP석
      elseif (file_exists($toSeats.'vip/'.$PART.'/'.chr($rows+64).($cols-$cols_shift)))
        echo '<td id="default_'.chr($rows+64).($cols-$cols_shift).'" class="default default_vip"></td>'.chr(13).chr(10);

      #오프라인 전용석
      elseif (file_exists($toSeats.'offline/'.$PART.'/'.chr($rows+64).($cols-$cols_shift)))
        echo '<td id="default_'.chr($rows+64).($cols-$cols_shift).'" class="default default_offline"></td>'.chr(13).chr(10);

      #예매된 좌석
      elseif (file_exists($toSeats.'booked/'.$PART.'/'.chr($rows+64).($cols-$cols_shift)))
        echo '<td id="default_'.chr($rows+64).($cols-$cols_shift).'" class="default default_booked"></td>'.chr(13).chr(10);

      #예매중인 좌석
      elseif (file_exists($toSeats.'selected/'.$PART.'/'.chr($rows+64).($cols-$cols_shift))){
        if ($record_time - file($toSeats.'selected/'.$PART.'/'.chr($rows+64).($cols-$cols_shift))[0] > file($toRoot.'data/setting/part_available')[0]){
          unlink($toSeats.'selected/'.$PART.'/'.chr($rows+64).($cols-$cols_shift));
          echo '<td id="default_'.chr($rows+64).($cols-$cols_shift).'" class="default default_default" onclick="default_table(\''.chr($rows+64).($cols-$cols_shift).'\')"></td>'.chr(13).chr(10);
        }
        else
          echo '<td id="default_'.chr($rows+64).($cols-$cols_shift).'" class="default default_selected"></td>'.chr(13).chr(10);
      }

      #일반석
      else
        echo '<td id="default_'.chr($rows+64).($cols-$cols_shift).'" class="default default_default" onclick="default_table(\''.chr($rows+64).($cols-$cols_shift).'\')"></td>'.chr(13).chr(10);

      #복도
      if ($cols == $TABLE_SIZE[2])
        echo '<td class="default hall"></td>'.chr(13).chr(10);
    }
    echo '</tr>'.chr(13).chr(10);
  }
  echo '</table>'.chr(13).chr(10);
  echo '</div>'.chr(13).chr(10);
  echo '<div id="default_exampleContainer"><i class="default_exampleWrap"><div class="default_example default_default"></div>일반석&nbsp;&nbsp;&nbsp;</i><i class="default_exampleWrap"><div class="default_example default_broken"></div>고장</td>&nbsp;&nbsp;&nbsp;</i><i class="default_exampleWrap"><div class="default_example default_vip"></div>VIP석</td>&nbsp;&nbsp;&nbsp;</i><i class="default_exampleWrap"><div class="default_example default_booked"></div>예매됨</td>&nbsp;&nbsp;&nbsp;</i><i class="default_exampleWrap"><div class="default_example default_selected"></div>예매중</td>&nbsp;&nbsp;&nbsp;</i><i class="default_exampleWrap"><div class="default_example default_offline"></div>오프라인 예매 전용석</div></i>'.chr(13).chr(10);
  echo '<div id="hiddenSeatForm" style="display:none"></div>'.chr(13).chr(10);
}
function pinned_table($SEAT){
  global $toSeats;
  global $TABLE_SIZE;

  echo '<div id="pinnedTableWrap">'.chr(13).chr(10);
  echo '<table class="pinned">'.chr(13).chr(10);
  echo '<caption class="pinned">Screen</caption>'.chr(13).chr(10);
  for ($rows=1; $rows <= $TABLE_SIZE[1]; $rows++) {
    $cols_shift = 0;
    echo '<tr>';
    for ($cols=1; $cols <= $TABLE_SIZE[0]; $cols++) {
      #빈 공간
      if (file_exists($toSeats.'empty/'.chr($rows+64).$cols)) {
        echo '<td class="pinned empty"></td>'.chr(13).chr(10);
        $cols_shift++;
      }
      #지정석
      else if ($SEAT == chr($rows+64).($cols-$cols_shift))
        echo '<td id="pinned_'.chr($rows+64).($cols-$cols_shift).'" class="pinned pinned_pinned"></td>'.chr(13).chr(10);

      #일반석
      else
        echo '<td id="pinned_'.chr($rows+64).($cols-$cols_shift).'" class="pinned pinned_default"></td>'.chr(13).chr(10);

      #복도
      if ($cols == $TABLE_SIZE[2])
        echo '<td class="pinned hall"></td>'.chr(13).chr(10);
    }
    echo '</tr>'.chr(13).chr(10);
  }
  echo '</table>'.chr(13).chr(10);
  echo '</div>'.chr(13).chr(10);
}
?>
