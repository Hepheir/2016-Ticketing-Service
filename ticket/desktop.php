<!DOCTYPE html>
<html>
<!-- Author information
* html, php, css, javascript
*   written by hepheir@gmail.com
*
* site designed by
*   dfc7936@naver.com & hepheir@gmail.com
*
-->
  <head>
    <meta charset="utf-8">
		<meta name="author" content="hepheir">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" type="text/css" href="../css/ticket_desktop.css">
    <link rel="stylesheet" type="text/css" href="../css/default.css">
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <title>좌석 선택</title>
  </head>
  <body>
    <div id="bodyWrap">
      <nav id="dataInputWrap">
        <div class="seatCoord">
          <strong>어서 네 자리를 골라 멍청아</strong>
        </div>
        <div id="consoleWrap">
          <form action="result.php" method="get">
            <a href="?part=1"><label id="part_1" class="console_1"><strong>1부</strong></label></a>
            <a href="?part=2"><label id="part_2" class="console_1"><strong>2부</strong></label></a>
            <?php
            if (empty($_GET['part'])) {
              echo '<style>#stageTable{opacity:.3;}</style>';
            }
            $part = isset($_GET['part']) ? $_GET['part'] : '';
            echo '<input type="hidden" name="part" value="'.$part.'"/>';
            if ($part == 1) {
              echo '<script>$("label#part_1").addClass("selected").removeClass("console_1");</script>';
            }
            else if ($part == 2) {
              echo '<script>$("label#part_2").addClass("selected").removeClass("console_1");</script>';
            }
            ?>
            <br/>
            <label class="console_2" for="done"><strong>예매하기</strong></label>
            <input id="done" class="hidden" type="submit"/>
          </div>
        </nav>
        <div id="stageWrap">
          <h1>stage</h1>
          <div id="stageTable">
            <table>
              <?php
              // 가로 : 행
              // 세로 : 열

                $cols=16; //행
                $rows=8; //열
                $hall=7; //복도 위치 (n번째 셀의 오른쪽)

                for($i = 0; $i < $rows; $j=1){
                  $c= chr(++$i+64);
                  echo '<tr>';
                  for ($j = 1; $j <= $hall; $j++) {
                    if (file_exists('../data/seat/unusable/'.$c.$j)) {
                      echo '<td class="unusable_cell"></td>';
                    }
                    else if (file_exists('../data/seat/vip/'.$c.$j)) {
                      echo '<td class="cell"><label class="cell vip_cell"><p class="cell_desc">vip</p><p class="cell_value">'.$c.$j.'</p></label></td>';
                    }
                    else if ($part == 1 && file_exists('../data/seat/part_1/'.$c.$j)) {
                      echo '<td class="cell"><label class="cell booked_cell"><p class="cell_desc">x</p><p class="cell_value">'.$c.$j.'</p></label></td>';
                    }
                    else if ($part == 2 && file_exists('../data/seat/part_2/'.$c.$j)) {
                      echo '<td class="cell"><label class="cell booked_cell"><p class="cell_desc">x</p><p class="cell_value">'.$c.$j.'</p></label></td>';
                    }
                    else {
                      echo '<td class="cell"><input type="radio" id="seat_'.$c.$j.'" class="hidden" name="seat" value="'.$c.$j.'"/><label for="seat_'.$c.$j.'" class="cell">'.$c.$j.'</label></td>';
                    }
                  }
                  echo '<td class="hall_cell"><td/>';
                  for ( ;$j <= $cols; $j++) {
                    if (file_exists('../data/seat/unusable/'.$c.$j)) {
                      echo '<td class="unusable_cell"></td>';
                    }
                    else if (file_exists('../data/seat/vip/'.$c.$j)) {
                      echo '<td class="cell"><label class="cell vip_cell"><p class="cell_desc">vip</p><p class="cell_value">'.$c.$j.'</p></label></td>';
                    }
                    else if ($part == 1 && file_exists('../data/seat/part_1/'.$c.$j)) {
                      echo '<td class="cell"><label class="cell booked_cell"><p class="cell_desc">x</p><p class="cell_value">'.$c.$j.'</p></label></td>';
                    }
                    else if ($part == 2 && file_exists('../data/seat/part_2/'.$c.$j)) {
                      echo '<td class="cell"><label class="cell booked_cell"><p class="cell_desc">x</p><p class="cell_value">'.$c.$j.'</p></label></td>';
                    }
                    else {
                      echo '<td class="cell"><input type="radio" id="seat_'.$c.$j.'" class="hidden" name="seat" value="'.$c.$j.'"/><label for="seat_'.$c.$j.'" class="cell">'.$c.$j.'</label></td>';
                    }
                  }
                  echo '</tr>';
                }
								$tableWidth = ($cols+2)*8 + $cols * 54 + 32;
                $tableHeight = ($rows+1)*8 + $rows * 54;
								echo '<style>#stageWrap{min-width:'.$tableWidth.'px;min-height:'.$tableHeight.'px;}nav.footer{min-width:'.($tableWidth+80).'px;}</style>';
              ?>
            </table>
          </div>
        </div>
      </form>
    </div>
    <nav class="footer">
      <a href="../"><h2 class="inline_b">메인으로</h2></a>&nbsp;&nbsp;&nbsp;
      <a href="check.php"><h2 class="inline_b">예매확인</h2></a>&nbsp;&nbsp;&nbsp;
      <?php
        if (empty($_GET['part'])){
          $Redi = '';
        }
        else {
          $Redi = '?part='.$_GET['part'];
        }
        echo '<h2 class="inline_b" onclick="window.location.replace(&#39;../debug.php/?code=1&amp;from=ticket&#47;'.$Redi.'&#39;)">디버그</h2></nav>';
      ?>
  </body>
</html>
