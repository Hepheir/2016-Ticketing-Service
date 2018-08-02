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
    <header>
      <ul>
        <li>
          <div class="logo">logo</div>
        </li>
        <li>
          <a id="header" href="../">Official ticketing site</a>
        </li>
        <li class="fr">
          <?php
            if (empty($_GET['part'])){
              $Redi = '';
            }
            else {
              $Redi = '?part='.$_GET['part'];
            }
            echo '<a href="../debug.php/?code=1&amp;from=ticket&#47;'.$Redi.'">디버그</a>';
          ?>
        </li>
        <li class="fr">
          |
        </li>
        <li class="fr">
          <a href="check.php">조회하기</a>
        </li>
        <li class="fr">
          |
        </li>
        <li class="fr">
          <a href="../">메인으로</a>
        </li>
      </ul>
    </header>
    <div id="bodyWrap">
      <nav id="dataInputWrap">
        <div id="consoleWrap">
          <form action="result.php" method="get">
            <a href="?part=1"><label id="part_1" class="console_1"><strong>1부</strong></label></a>
            <a href="?part=2"><label id="part_2" class="console_1"><strong>2부</strong></label></a>
            <?php
              $part = isset($_GET['part']) ? $_GET['part'] : '';
              echo '<input type="hidden" name="part" value="'.$part.'"/>';
              if ($part == '') {
                echo '<script>function partAdd() {window.location.replace("?part=0");}</script><style>#stageTable{opacity:.3;}</style><div class="shadow" onclick="$(&#39;div.shadow&#39;).fadeOut(480);$(&#39;div.help&#39;).fadeOut(480);window.setTimeout(partAdd,500);"></div><div class="help" onclick="$(&#39;div.shadow&#39;).fadeOut(480);$(&#39;div.help&#39;).fadeOut(480);window.setTimeout(partAdd,500);"></div>';
              }
              else if ($part == 0) {
                echo '<style>#stageTable{opacity:.3;}</style>';
              }
              else if ($part == 1) {
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
								echo '<style>#stageWrap{min-width:'.$tableWidth.'px;}</style>';
              ?>
            </table>
          </div>
        </div>
      </form>
    </div>
  </body>
</html>
