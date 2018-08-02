<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/2014/REC-html5-20141028/">
<html>
<!-- Author information
* html, php, css, javascript
*   written by hepheir@gmail.com
*
* page designed by
*   hepheir@gmail.com - 김동주 & pseudonym0405@naver.com - 이현오 & ljhappy1201@naver.com - 이진호
*
* :: TICKETING_SELECT ::
-->
<head>
  <meta charset="utf-8">
	<meta name="author" content="hepheir">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--<meta name="theme-color" content="#8983F5">-->
  <link rel="stylesheet" href="../css/table_color.css" media="screen">
  <link rel="stylesheet" href="../css/ticketing/layout.css" media="screen">
  <link rel="stylesheet" href="../css/ticketing/color.css" media="screen">
  <script src="../js/ticketing/Header.js" charset="utf-8"></script>
  <script src="../js/ticketing/seatSelector.js" charset="utf-8"></script>
  <script src="../js/ticketing/seatTableSizing.js" charset="utf-8"></script>
  <title>좌석을 선택하세요</title>
</head>
<body onresize="topMenuToggle();seatTableSizing(cols,rows)">
  <div id="topHidden" class="hidden">
    수정/조회하기 페이지로 이동합니다
    <br>
    <input id="topHiddenButton" type="button" value="수정/조회하기" onclick="location.replace('./check/')"></input>
  </div>
  <div id="Header">
<!--[if (gt IE 9)|!(IE)]><!-->
    <div id="topMenuIcon" onclick="topHiddenToggle(drawerToggle)">
      <img width="100%" height="100%" src="../asset/icons/white_hamburger_64.png" alt="Menu" />
    </div>
<!--<![endif]-->
    <div id="topTitle">
      좌석을 선택하세요
    </div>
    <div id="topBack" onclick="window.location.replace('../')">
      뒤로
    </div>
    <div id="topMenuText">
      <a href="./check/">수정/조회하기</a>
    </div>
  </div>
  <table id="partSelect">
    <tr>
      <?php
      if (!isset($_GET['part']))
        header('Location: ?part=1');
      for ($i=1; $i <= str_replace(chr(13).chr(10),'',file('../data/setting/part_available')[0]); $i++) {
        if ($_GET['part'] == $i) {
          echo '<td class="part selectedPart">'.$i.'부</td>';
          continue;
        }
        echo '<td class="part" onclick="location.replace(\'?part='.$i.'\')">'.$i.'부</td>';
      }
      ?>
    </tr>
  </table>
  <div id="Content">
    <?php
    if (str_replace(chr(13).chr(10), '', file('../data/setting/notice')[0]) == 1)
      echo '<div id="noticeBoard">'.str_replace(chr(13).chr(10), '', file('../data/setting/notice')[1].'</div>');
    ?>
    <table id="seatTable">
      <caption id="seatTableCaption">Screen</caption>
      <?php
      date_default_timezone_set("Asia/Seoul");
      if (date('a') == 'am'){
        if (date('h') == 12)
          $record_time = date('m').date('d').'00'.date('i');
        else
          $record_time = date('m').date('d').date('h').date('i');
      }
      else
        $record_time = date('m').date('d').(date('h') + 12).date('i');

      $TABLE_SIZE = file('../data/setting/table_size');
      # PHP -> JavaScript
      echo '<script>var cols = '.$TABLE_SIZE[0].'; var rows = '.$TABLE_SIZE[1].'; var part = '.$_GET['part'].';</script>';

      for ($rows=1; $rows <= $TABLE_SIZE[1]; $rows++) {
        $cols_shift = 0;
        echo '<tr>';
        for ($cols=1; $cols <= $TABLE_SIZE[0]; $cols++) {
          #빈 공간
          if (file_exists('../data/seats/empty/'.chr($rows+64).$cols)) {
            echo '<td class="seatCell empty"></td>'.chr(13).chr(10);
            $cols_shift++;
          }

          #고장석
          elseif (file_exists('../data/seats/broken/'.chr($rows+64).($cols-$cols_shift)))
            echo '<td id="seatCell_'.chr($rows+64).($cols-$cols_shift).'" class="seatCell default_broken"></td>'.chr(13).chr(10);

          #VIP석
          elseif (file_exists('../data/seats/vip/'.$_GET['part'].'/'.chr($rows+64).($cols-$cols_shift)))
            echo '<td id="seatCell_'.chr($rows+64).($cols-$cols_shift).'" class="seatCell default_vip"></td>'.chr(13).chr(10);

          #오프라인 전용석
          elseif (file_exists('../data/seats/offline/'.$_GET['part'].'/'.chr($rows+64).($cols-$cols_shift)))
            echo '<td id="seatCell_'.chr($rows+64).($cols-$cols_shift).'" class="seatCell default_offline"></td>'.chr(13).chr(10);

          #예매된 좌석
          elseif (file_exists('../data/seats/booked/'.$_GET['part'].'/'.chr($rows+64).($cols-$cols_shift)))
            echo '<td id="seatCell_'.chr($rows+64).($cols-$cols_shift).'" class="seatCell default_booked"></td>'.chr(13).chr(10);

          #예매중인 좌석
          elseif (file_exists('../data/seats/selected/'.$_GET['part'].'/'.chr($rows+64).($cols-$cols_shift))){
            if ($record_time - file('../data/seats/selected/'.$_GET['part'].'/'.chr($rows+64).($cols-$cols_shift))[0] > file('../data/setting/part_available')[0]){
              unlink('../data/seats/selected/'.$_GET['part'].'/'.chr($rows+64).($cols-$cols_shift));
              echo '<td id="seatCell_'.chr($rows+64).($cols-$cols_shift).'" class="seatCell default_default" onclick="seatSelect(\''.chr($rows+64).($cols-$cols_shift).'\')"></td>'.chr(13).chr(10);
            }
            else
              echo '<td id="seatCell_'.chr($rows+64).($cols-$cols_shift).'" class="seatCell default_selected"></td>'.chr(13).chr(10);
          }

          #일반석
          else
            echo '<td id="seatCell_'.chr($rows+64).($cols-$cols_shift).'" class="seatCell default_default" onclick="seatSelect(\''.chr($rows+64).($cols-$cols_shift).'\')"></td>'.chr(13).chr(10);

          #복도
          if ($cols == $TABLE_SIZE[2])
            echo '<td class="seatCell hall"></td>'.chr(13).chr(10);
        }
        echo '</tr>'.chr(13).chr(10);
      }
      ?>
    </table>
    <div id="exampleContainer">
      <?php
      $EXAMPLE_SEAT = file('../data/setting/exampleSeat');
      if ($EXAMPLE_SEAT[0] == 1)
        echo '<i class="exampleWrap"><div class="exampleIcon default_default"></div><div class="exampleText">일반석</div></i>';
      if ($EXAMPLE_SEAT[1] == 1)
        echo '<i class="exampleWrap"><div class="exampleIcon default_broken"></div><div class="exampleText">고장</div></i>';
      if ($EXAMPLE_SEAT[2] == 1)
        echo '<i class="exampleWrap"><div class="exampleIcon default_vip"></div><div class="exampleText">VIP석</div></i>';
      if ($EXAMPLE_SEAT[3] == 1)
        echo '<i class="exampleWrap"><div class="exampleIcon default_booked"></div><div class="exampleText">예매됨</div></i>';
      if ($EXAMPLE_SEAT[4] == 1)
        echo '<i class="exampleWrap"><div class="exampleIcon default_selected"></div><div class="exampleText">예매중</div></i>';
      if ($EXAMPLE_SEAT[5] == 1)
        echo '<i class="exampleWrap"><div class="exampleIcon default_offline"></div><div class="exampleText">오프라인 예매 전용석</div></i>';
      ?>
    </div>
    <form id="seatForm" action="fill.php" method="post">
      <div id="hiddenSeatForm" class="hidden"></div>
      <input type="hidden" name="part" value="<?php echo $_GET['part']; ?>">
      <input id="seatFormButton" type="button" value="다음" onclick="seatFormSubmit()">
      <br>
      <br>
    </form>
  </div>
  <script type="text/javascript">
    var drawerToggle = 0;
    topMenuToggle();
    seatTableSizing(cols,rows);

    function seatFormSubmit(){
      if (pre_seat == undefined)
        alert('좌석을 선택하세요.');
      else if (confirm('선택하신 좌석은 '+part+'부 '+pre_seat+'석 입니다.'))
        document.getElementById('seatForm').submit();
    }
  </script>
</body>
</html>
