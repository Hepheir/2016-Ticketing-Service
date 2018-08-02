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
    <link rel="stylesheet" type="text/css" href="../css/ticket_mobile.css">
    <link rel="stylesheet" type="text/css" href="../css/default.css">
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <title>좌석 선택</title>
    <script>
      var w = window.innerWidth;
      if (w < 440){
        document.write('<style>p.title{font-size: 24px;letter-spacing: 2px;}</style>');
      }
      else {
        document.write('<style>p.title{font-size: 32px;letter-spacing: 4px;}</style>');
      }
    </script>
  </head>
  <body>
    <script>
      window.scrollTo(0,1);
    </script>
    <?php
      if (!isset($_GET['part'])) {
        echo '<script>window.location.replace("./?part=1");</script>';
      }
    ?>
    <div id="bodyWrap">
      <div id="head">
        <div class="title"><p class="title">좌석을 선택하세요</p></div>
        <div class="question"></div>
        <div class="home" onclick="window.location.replace('../')"></div>
      </div>
      <div id="body">
        <div class="console">
          <div class="seatTableWrap">
            <div class="seatTable">
              <table class="mini">
                <?php
                  $part = isset($_GET['part']) ? $_GET['part'] : '';
                  if (empty($part)) {
                    $query = '?';
                  }
                  else {
                    $query = '?part='.$_GET['part'].'&';
                  }
                  for($i = 0; $i < $rows; $j=1){
                    $c= chr(++$i+64);
                    echo '<tr>';
                    for ($j = 1; $j <= $hall; $j++) {
                      if (file_exists('../data/seat/unusable/'.$c.$j)) {
                        echo '<td id="unusable_'.$c.$j.'" class="mini unusable_cell" onclick="location.replace(\''.$query.'focus[0]='.$i.'&focus[1]='.$j.'\')"></td>';
                      }
                      else if (file_exists('../data/seat/vip/'.$c.$j)) {
                        echo '<td id="vip_'.$c.$j.'" class="mini vip_cell" onclick="location.replace(\''.$query.'focus[0]='.$i.'&focus[1]='.$j.'\')"></td>';
                      }
                      else if ($part == 1 && file_exists('../data/seat/part_1/'.$c.$j)) {
                        echo '<td id="booked_'.$c.$j.'" class="mini booked_cell" onclick="location.replace(\'?part=1&focus[0]='.$i.'&focus[1]='.$j.'\')"></td>';
                      }
                      else if ($part == 2 && file_exists('../data/seat/part_2/'.$c.$j)) {
                        echo '<td id="booked_'.$c.$j.'" class="mini booked_cell" onclick="location.replace(\'?part=2&focus[0]='.$i.'&focus[1]='.$j.'\')"></td>';
                      }
                      else {
                        echo '<td id="'.$c.$j.'" class="mini cell" onclick="location.replace(\''.$query.'focus[0]='.$i.'&focus[1]='.$j.'\')"></td>';
                      }
                    }
                    echo '<td class="mini unusable_cell" onclick="location.replace(\''.$query.'focus[0]='.$i.'&focus[1]='.$j.'\')"></td>';
                    for ( ; $j <= $cols; $j++) {
                      if (file_exists('../data/seat/unusable/'.$c.$j)) {
                        echo '<td id="unusable_'.$c.$j.'" class="mini unusable_cell" onclick="location.replace(\''.$query.'focus[0]='.$i.'&focus[1]='.$j.'\')"></td>';
                      }
                      else if (file_exists('../data/seat/vip/'.$c.$j)) {
                        echo '<td id="vip_'.$c.$j.'" class="mini vip_cell" onclick="location.replace(\''.$query.'focus[0]='.$i.'&focus[1]='.$j.'\')"></td>';
                      }
                      else if ($part == 1 && file_exists('../data/seat/part_1/'.$c.$j)) {
                        echo '<td id="booked_'.$c.$j.'" class="mini booked_cell" onclick="location.replace(\'?part=1&focus[0]='.$i.'&focus[1]='.$j.'\')"></td>';
                      }
                      else if ($part == 2 && file_exists('../data/seat/part_2/'.$c.$j)) {
                        echo '<td id="booked_'.$c.$j.'" class="mini booked_cell" onclick="location.replace(\'?part=2&focus[0]='.$i.'&focus[1]='.$j.'\')"></td>';
                      }
                      else {
                        echo '<td id="'.$c.$j.'" class="mini cell" onclick="location.replace(\''.$query.'focus[0]='.$i.'&focus[1]='.$j.'\')"></td>';
                      }
                    }
                    echo '</tr>';
                  }
                ?>
              </table>
            </div>
          </div>
          <div class="toggle">
            <a id="part_1" class="toggle_part" href="?part=1"><p>1부</p></a>
            <a id="part_2" class="toggle_part" href="?part=2"><p>2부</p></a>
            <?php
              echo '<input type="hidden" name="part" value="'.$part.'"/>';
              if ($part == 1) {
                echo '<script>$("a#part_1").addClass("toggle_part_checked").removeClass("toggle_part");</script>';
              }
              else if ($part == 2) {
                echo '<script>$("a#part_2").addClass("toggle_part_checked").removeClass("toggle_part");</script>';
              }
            ?>
          </div>
        </div>
        <div class="seatTable_zoom_Wrap">
          <div class="seatTable_zoom">
            <table>
              <?php
                if (!isset($_GET['focus'])) {$focus = array(0,0);}else {$focus = $_GET['focus'];}
                if ($focus[0] > 2 && $focus[0] < $rows - 1) {
                  for ($i=$focus[0] - 2; $i <= $focus[0] + 2; ) {
                    echo'<tr class="seatTable_zoomed">';
                    $c= chr(++$i+63);
                    if ($focus[1] > 2 && $focus[1] < $cols - 1) {
                      for ($j = $focus[1] - 2; $j <= $focus[1] + 2; $j++) {
                        if (file_exists('../data/seat/unusable/'.$c.$j)) {
                          echo '<td class="seatTable_zoomed unusable_cell"></td>';

                        }
                        else if (file_exists('../data/seat/vip/'.$c.$j)) {
                          echo '<td class="seatTable_zoomed vip_cell"><label class="seatTable_zoomed" for="'.$c.$j.'">'.$c.$j.'</label></td>';
                          echo '<style>td#vip_'.$c.$j.'{background-color:#D0BDF5;}</style>';
                        }
                        else if ($part == 1 && file_exists('../data/seat/part_1/'.$c.$j)) {
                          echo '<td class="seatTable_zoomed booked_cell"><label class="seatTable_zoomed" for="'.$c.$j.'">'.$c.$j.'</label></td>';
                          echo '<style>td#booked_'.$c.$j.'{background-color:#FF6D82;}</style>';
                        }
                        else if ($part == 2 && file_exists('../data/seat/part_2/'.$c.$j)) {
                          echo '<td class="seatTable_zoomed booked_cell"><label class="seatTable_zoomed" for="'.$c.$j.'">'.$c.$j.'</label></td>';
                          echo '<style>td#booked_'.$c.$j.'{background-color:#FF6D82;}</style>';
                        }
                        else {
                          echo '<td class="seatTable_zoomed cell" onclick="window.location.replace(\'./result.php?part='.$part.'&seat='.$c.$j.'\')"><input type="radio" class="hidden" id="'.$c.$j.'" name="seat" value="'.$c.$j.'"><label class="seatTable_zoomed  cell" for="'.$c.$j.'">'.$c.$j.'</label></td>';
                          if ($part == 1) {
                            echo '<input type="hidden" name="part" value="1">';
                          }
                          else {
                            echo '<input type="hidden" name="part" value="2">';
                          }
                          echo '<style>td#'.$c.$j.'{background-color:#C4C4C4;}</style>';
                        }
                      }
                    }
                    elseif ($focus[1] <= 2) {
                      for ($j = 1; $j <= 5; $j++) {
                        if (file_exists('../data/seat/unusable/'.$c.$j)) {
                          echo '<td class="seatTable_zoomed unusable_cell"></td>';

                        }
                        else if (file_exists('../data/seat/vip/'.$c.$j)) {
                          echo '<td class="seatTable_zoomed vip_cell"><label class="seatTable_zoomed" for="'.$c.$j.'">'.$c.$j.'</label></td>';
                          echo '<style>td#vip_'.$c.$j.'{background-color:#D0BDF5;}</style>';
                        }
                        else if ($part == 1 && file_exists('../data/seat/part_1/'.$c.$j)) {
                          echo '<td class="seatTable_zoomed booked_cell"><label class="seatTable_zoomed" for="'.$c.$j.'">'.$c.$j.'</label></td>';
                          echo '<style>td#booked_'.$c.$j.'{background-color:#FF6D82;}</style>';
                        }
                        else if ($part == 2 && file_exists('../data/seat/part_2/'.$c.$j)) {
                          echo '<td class="seatTable_zoomed booked_cell"><label class="seatTable_zoomed" for="'.$c.$j.'">'.$c.$j.'</label></td>';
                          echo '<style>td#booked_'.$c.$j.'{background-color:#FF6D82;}</style>';
                        }
                        else {
                          echo '<td class="seatTable_zoomed cell" onclick="window.location.replace(\'./result.php?part='.$part.'&seat='.$c.$j.'\')"><input type="radio" class="hidden" id="'.$c.$j.'" name="seat" value="'.$c.$j.'"><label class="seatTable_zoomed  cell" for="'.$c.$j.'">'.$c.$j.'</label></td>';
                          if ($part == 1) {
                            echo '<input type="hidden" name="part" value="1">';
                          }
                          else {
                            echo '<input type="hidden" name="part" value="2">';
                          }
                          echo '<style>td#'.$c.$j.'{background-color:#C4C4C4;}</style>';
                        }
                      }
                    }
                    else {
                      for ($j = $cols - 4; $j <= $cols; $j++) {
                        if (file_exists('../data/seat/unusable/'.$c.$j)) {
                          echo '<td class="seatTable_zoomed unusable_cell"></td>';

                        }
                        else if (file_exists('../data/seat/vip/'.$c.$j)) {
                          echo '<td class="seatTable_zoomed vip_cell"><label class="seatTable_zoomed" for="'.$c.$j.'">'.$c.$j.'</label></td>';
                          echo '<style>td#vip_'.$c.$j.'{background-color:#D0BDF5;}</style>';
                        }
                        else if ($part == 1 && file_exists('../data/seat/part_1/'.$c.$j)) {
                          echo '<td class="seatTable_zoomed booked_cell"><label class="seatTable_zoomed" for="'.$c.$j.'">'.$c.$j.'</label></td>';
                          echo '<style>td#booked_'.$c.$j.'{background-color:#FF6D82;}</style>';
                        }
                        else if ($part == 2 && file_exists('../data/seat/part_2/'.$c.$j)) {
                          echo '<td class="seatTable_zoomed booked_cell"><label class="seatTable_zoomed" for="'.$c.$j.'">'.$c.$j.'</label></td>';
                          echo '<style>td#booked_'.$c.$j.'{background-color:#FF6D82;}</style>';
                        }
                        else {
                          echo '<td class="seatTable_zoomed cell" onclick="window.location.replace(\'./result.php?part='.$part.'&seat='.$c.$j.'\')"><input type="radio" class="hidden" id="'.$c.$j.'" name="seat" value="'.$c.$j.'"><label class="seatTable_zoomed  cell" for="'.$c.$j.'">'.$c.$j.'</label></td>';
                          if ($part == 1) {
                            echo '<input type="hidden" name="part" value="1">';
                          }
                          else {
                            echo '<input type="hidden" name="part" value="2">';
                          }
                          echo '<style>td#'.$c.$j.'{background-color:#C4C4C4;}</style>';
                        }
                      }
                    }
                    echo'</tr>';
                  }
                }
                elseif ($focus[0] <= 2) {
                  for ($i= 1; $i <= 5; ) {
                    echo'<tr class="seatTable_zoomed">';
                    $c= chr(++$i+63);
                    if ($focus[1] > 2 && $focus[1] < $cols - 1) {
                      for ($j = $focus[1] - 2; $j <= $focus[1] + 2; $j++) {
                        if (file_exists('../data/seat/unusable/'.$c.$j)) {
                          echo '<td class="seatTable_zoomed unusable_cell"></td>';

                        }
                        else if (file_exists('../data/seat/vip/'.$c.$j)) {
                          echo '<td class="seatTable_zoomed vip_cell"><label class="seatTable_zoomed" for="'.$c.$j.'">'.$c.$j.'</label></td>';
                          echo '<style>td#vip_'.$c.$j.'{background-color:#D0BDF5;}</style>';
                          }
                        else if ($part == 1 && file_exists('../data/seat/part_1/'.$c.$j)) {
                          echo '<td class="seatTable_zoomed booked_cell"><label class="seatTable_zoomed" for="'.$c.$j.'">'.$c.$j.'</label></td>';
                          echo '<style>td#booked_'.$c.$j.'{background-color:#FF6D82;}</style>';
                        }
                        else if ($part == 2 && file_exists('../data/seat/part_2/'.$c.$j)) {
                          echo '<td class="seatTable_zoomed booked_cell"><label class="seatTable_zoomed" for="'.$c.$j.'">'.$c.$j.'</label></td>';
                          echo '<style>td#booked_'.$c.$j.'{background-color:#FF6D82;}</style>';
                        }
                        else {
                          echo '<td class="seatTable_zoomed cell" onclick="window.location.replace(\'./result.php?part='.$part.'&seat='.$c.$j.'\')"><input type="radio" class="hidden" id="'.$c.$j.'" name="seat" value="'.$c.$j.'"><label class="seatTable_zoomed  cell" for="'.$c.$j.'">'.$c.$j.'</label></td>';
                          if ($part == 1) {
                            echo '<input type="hidden" name="part" value="1">';
                          }
                          else {
                            echo '<input type="hidden" name="part" value="2">';
                          }
                          echo '<style>td#'.$c.$j.'{background-color:#C4C4C4;}</style>';
                        }
                      }
                    }
                    elseif ($focus[1] <= 2) {
                      for ($j = 1; $j <= 5; $j++) {
                        if (file_exists('../data/seat/unusable/'.$c.$j)) {
                          echo '<td class="seatTable_zoomed unusable_cell"></td>';

                        }
                        else if (file_exists('../data/seat/vip/'.$c.$j)) {
                          echo '<td class="seatTable_zoomed vip_cell"><label class="seatTable_zoomed" for="'.$c.$j.'">'.$c.$j.'</label></td>';
                          echo '<style>td#vip_'.$c.$j.'{background-color:#D0BDF5;}</style>';
                        }
                        else if ($part == 1 && file_exists('../data/seat/part_1/'.$c.$j)) {
                          echo '<td class="seatTable_zoomed booked_cell"><label class="seatTable_zoomed" for="'.$c.$j.'">'.$c.$j.'</label></td>';
                          echo '<style>td#booked_'.$c.$j.'{background-color:#FF6D82;}</style>';
                        }
                        else if ($part == 2 && file_exists('../data/seat/part_2/'.$c.$j)) {
                          echo '<td class="seatTable_zoomed booked_cell"><label class="seatTable_zoomed" for="'.$c.$j.'">'.$c.$j.'</label></td>';
                          echo '<style>td#booked_'.$c.$j.'{background-color:#FF6D82;}</style>';
                        }
                        else {
                          echo '<td class="seatTable_zoomed cell" onclick="window.location.replace(\'./result.php?part='.$part.'&seat='.$c.$j.'\')"><input type="radio" class="hidden" id="'.$c.$j.'" name="seat" value="'.$c.$j.'"><label class="seatTable_zoomed  cell" for="'.$c.$j.'">'.$c.$j.'</label></td>';
                          if ($part == 1) {
                            echo '<input type="hidden" name="part" value="1">';
                          }
                          else {
                            echo '<input type="hidden" name="part" value="2">';
                          }
                          echo '<style>td#'.$c.$j.'{background-color:#C4C4C4;}</style>';
                        }
                      }
                    }
                    else {
                      for ($j = $cols - 4; $j <= $cols; $j++) {
                        if (file_exists('../data/seat/unusable/'.$c.$j)) {
                          echo '<td class="seatTable_zoomed unusable_cell"></td>';

                        }
                        else if (file_exists('../data/seat/vip/'.$c.$j)) {
                          echo '<td class="seatTable_zoomed vip_cell"><label class="seatTable_zoomed" for="'.$c.$j.'">'.$c.$j.'</label></td>';
                          echo '<style>td#vip_'.$c.$j.'{background-color:#D0BDF5;}</style>';
                        }
                        else if ($part == 1 && file_exists('../data/seat/part_1/'.$c.$j)) {
                          echo '<td class="seatTable_zoomed booked_cell"><label class="seatTable_zoomed" for="'.$c.$j.'">'.$c.$j.'</label></td>';
                          echo '<style>td#booked_'.$c.$j.'{background-color:#FF6D82;}</style>';
                        }
                        else if ($part == 2 && file_exists('../data/seat/part_2/'.$c.$j)) {
                          echo '<td class="seatTable_zoomed booked_cell"><label class="seatTable_zoomed" for="'.$c.$j.'">'.$c.$j.'</label></td>';
                          echo '<style>td#booked_'.$c.$j.'{background-color:#FF6D82;}</style>';
                        }
                        else {
                          echo '<td class="seatTable_zoomed cell" onclick="window.location.replace(\'./result.php?part='.$part.'&seat='.$c.$j.'\')"><input type="radio" class="hidden" id="'.$c.$j.'" name="seat" value="'.$c.$j.'"><label class="seatTable_zoomed  cell" for="'.$c.$j.'">'.$c.$j.'</label></td>';
                          if ($part == 1) {
                            echo '<input type="hidden" name="part" value="1">';
                          }
                          else {
                            echo '<input type="hidden" name="part" value="2">';
                          }
                          echo '<style>td#'.$c.$j.'{background-color:#C4C4C4;}</style>';
                        }
                      }
                    }
                    echo'</tr>';
                  }
                }
                else {
                  for ($i= $rows - 4; $i <= $rows; ) {
                    echo'<tr class="seatTable_zoomed">';
                    $c= chr(++$i+63);
                    if ($focus[1] > 2 && $focus[1] < $cols - 1) {
                      for ($j = $focus[1] - 2; $j <= $focus[1] + 2; $j++) {
                        if (file_exists('../data/seat/unusable/'.$c.$j)) {
                          echo '<td class="seatTable_zoomed unusable_cell"></td>';

                        }
                        else if (file_exists('../data/seat/vip/'.$c.$j)) {
                          echo '<td class="seatTable_zoomed vip_cell"><label class="seatTable_zoomed" for="'.$c.$j.'">'.$c.$j.'</label></td>';
                          echo '<style>td#vip_'.$c.$j.'{background-color:#D0BDF5;}</style>';
                        }
                        else if ($part == 1 && file_exists('../data/seat/part_1/'.$c.$j)) {
                          echo '<td class="seatTable_zoomed booked_cell"><label class="seatTable_zoomed" for="'.$c.$j.'">'.$c.$j.'</label></td>';
                          echo '<style>td#booked_'.$c.$j.'{background-color:#FF6D82;}</style>';
                        }
                        else if ($part == 2 && file_exists('../data/seat/part_2/'.$c.$j)) {
                          echo '<td class="seatTable_zoomed booked_cell"><label class="seatTable_zoomed" for="'.$c.$j.'">'.$c.$j.'</label></td>';
                          echo '<style>td#booked_'.$c.$j.'{background-color:#FF6D82;}</style>';
                        }
                        else {
                          echo '<td class="seatTable_zoomed cell" onclick="window.location.replace(\'./result.php?part='.$part.'&seat='.$c.$j.'\')"><input type="radio" class="hidden" id="'.$c.$j.'" name="seat" value="'.$c.$j.'"><label class="seatTable_zoomed  cell" for="'.$c.$j.'">'.$c.$j.'</label></td>';
                          if ($part == 1) {
                            echo '<input type="hidden" name="part" value="1">';
                          }
                          else {
                            echo '<input type="hidden" name="part" value="2">';
                          }
                          echo '<style>td#'.$c.$j.'{background-color:#C4C4C4;}</style>';
                        }
                      }
                    }
                    elseif ($focus[1] <= 2) {
                      for ($j = 1; $j <= 5; $j++) {
                        if (file_exists('../data/seat/unusable/'.$c.$j)) {
                          echo '<td class="seatTable_zoomed unusable_cell"></td>';

                        }
                        else if (file_exists('../data/seat/vip/'.$c.$j)) {
                          echo '<td class="seatTable_zoomed vip_cell"><label class="seatTable_zoomed" for="'.$c.$j.'">'.$c.$j.'</label></td>';
                          echo '<style>td#vip_'.$c.$j.'{background-color:#D0BDF5;}</style>';
                        }
                        else if ($part == 1 && file_exists('../data/seat/part_1/'.$c.$j)) {
                          echo '<td class="seatTable_zoomed booked_cell"><label class="seatTable_zoomed" for="'.$c.$j.'">'.$c.$j.'</label></td>';
                          echo '<style>td#booked_'.$c.$j.'{background-color:#FF6D82;}</style>';
                        }
                        else if ($part == 2 && file_exists('../data/seat/part_2/'.$c.$j)) {
                          echo '<td class="seatTable_zoomed booked_cell"><label class="seatTable_zoomed" for="'.$c.$j.'">'.$c.$j.'</label></td>';
                          echo '<style>td#booked_'.$c.$j.'{background-color:#FF6D82;}</style>';
                        }
                        else {
                          echo '<td class="seatTable_zoomed cell" onclick="window.location.replace(\'./result.php?part='.$part.'&seat='.$c.$j.'\')"><input type="radio" class="hidden" id="'.$c.$j.'" name="seat" value="'.$c.$j.'"><label class="seatTable_zoomed  cell" for="'.$c.$j.'">'.$c.$j.'</label></td>';
                          if ($part == 1) {
                            echo '<input type="hidden" name="part" value="1">';
                          }
                          else {
                            echo '<input type="hidden" name="part" value="2">';
                          }
                          echo '<style>td#'.$c.$j.'{background-color:#C4C4C4;}</style>';
                        }
                      }
                    }
                    else {
                      for ($j = $cols - 4; $j <= $cols; $j++) {
                        if (file_exists('../data/seat/unusable/'.$c.$j)) {
                          echo '<td class="seatTable_zoomed unusable_cell"></td>';

                        }
                        else if (file_exists('../data/seat/vip/'.$c.$j)) {
                          echo '<td class="seatTable_zoomed vip_cell"><label class="seatTable_zoomed" for="'.$c.$j.'">'.$c.$j.'</label></td>';
                          echo '<style>td#vip_'.$c.$j.'{background-color:#D0BDF5;}</style>';
                        }
                        else if ($part == 1 && file_exists('../data/seat/part_1/'.$c.$j)) {
                          echo '<td class="seatTable_zoomed booked_cell"><label class="seatTable_zoomed" for="'.$c.$j.'">'.$c.$j.'</label></td>';
                          echo '<style>td#booked_'.$c.$j.'{background-color:#FF6D82;}</style>';
                        }
                        else if ($part == 2 && file_exists('../data/seat/part_2/'.$c.$j)) {
                          echo '<td class="seatTable_zoomed booked_cell"><label class="seatTable_zoomed" for="'.$c.$j.'">'.$c.$j.'</label></td>';
                          echo '<style>td#booked_'.$c.$j.'{background-color:#FF6D82;}</style>';
                        }
                        else {
                          echo '<td class="seatTable_zoomed cell" onclick="window.location.replace(\'./result.php?part='.$part.'&seat='.$c.$j.'\')"><input type="radio" class="hidden" id="'.$c.$j.'" name="seat" value="'.$c.$j.'"><label class="seatTable_zoomed  cell" for="'.$c.$j.'">'.$c.$j.'</label></td>';
                          if ($part == 1) {
                            echo '<input type="hidden" name="part" value="1">';
                          }
                          else {
                            echo '<input type="hidden" name="part" value="2">';
                          }
                          echo '<style>td#'.$c.$j.'{background-color:#C4C4C4;}</style>';
                        }
                      }
                    }
                    echo'</tr>';
                  }
                }
              ?>
            </table>
          </div>
        </div>
      </div>
      <div id="foot">
        <h2>
          <ul>
            <li>
              <a href="../">메인으로</a>
            </li>
            <li>
              |
            </li>
            <li>
              <a href="check.php">예매확인</a>
            </li>
            <li>
              |
            </li>
            <li>
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
          </ul>
        </h2>
      </div>
    </div>
  </body>
</html>
