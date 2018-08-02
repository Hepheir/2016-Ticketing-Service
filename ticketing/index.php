<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/2014/REC-html5-20141028/">
<html>
<!-- Author information
* html, php, css, javascript
*   written by hepheir@gmail.com
*
* page designed by
*   ljhappy1201@naver.com - 이진호 & hepheir@gmail.com - 김동주
*
* :: TICKETING_SELECT ::
-->
<?php $toRoot = '../'; ?>
<head>
  <meta charset="utf-8">
	<meta name="author" content="hepheir">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/ticketing/select.css" media="screen">
  <link rel="stylesheet" href="../css/support.css" media="screen">
  <link rel="stylesheet" href="../css/table_color.css" media="screen">
  <script src="../js/ticketing/select.js" charset="utf-8"></script>
</head>
<body onresize="tableResize(cols, rows)">
  <div id="topHidden" class="hidden">
    수정/조회하기 페이지로 이동합니다
    <br>
    <input type="button" value="수정/조회하기" onclick="location.replace('./check/')"></input>
  </div>
  <div class="Header">
<!--[if (gt IE 9)|!(IE)]><!-->
    <div id="topIcon" class="topIcon fl" onclick="topDrawer(drawerToggle)">
      <img width="100%" height="100%" src="../asset/icons/white_hamburger_64.png" alt="Menu" />
    </div>
<!--<![endif]-->
    <div id="topText" class="topText fl">
      좌석을 선택하세요
    </div>
    <div id="toHome" class="toHome fr" onclick="window.location.replace('../')">
      뒤로
    </div>
    <div class="topMenu fr">
      <a href="./check/">수정/조회하기</a>
    </div>
  </div>
  <form action="./fill.php" method="post">
    <?php
    $PART_AVAILABLE = file($toRoot.'data/setting/part_available');
    if (!isset($_GET['part'])) {
      header('Location: ?part=1');
      end();
    }
    if (str_replace(chr(13).chr(10), '',$PART_AVAILABLE[0]) == 1)
      echo '<table class="choosePart hidden">';
    else
      echo '<table class="choosePart">';
    ?>
      <tr>
        <?php
        for ($i=1; $i <= str_replace(chr(13).chr(10), '',$PART_AVAILABLE[0]); $i++) {
          if ($_GET['part'] == $i)
            echo '<td id="part_'.$i.'" class="choosePart selectedPart" onclick="window.location.replace(\'?part='.$i.'\')">'.$i.'부</td>';
          else
            echo '<td id="part_'.$i.'" class="choosePart" onclick="window.location.replace(\'?part='.$i.'\')">'.$i.'부</td>';
        }
        ?>
      </tr>
    </table>
    <div class="TableContainer">
      <?php
      include $toRoot.'php/table_drawer.php';
      default_table($_GET['part']);
      echo '<script>var cols = '.$TABLE_SIZE[0].'; var rows = '.$TABLE_SIZE[1].';</script>';
      ?>
    </div>
    <div id="nextWrap">
      <div class="toNext fr">다음</div>
    </div>
  </form>
  <script type="text/javascript">
    var drawerToggle = 0; //작은 화면에서 나타나는 햄버거 매뉴버튼을 눌렀을때 div#topHidden의 토글러 매개변수
    tableResize(cols, rows);
  </script>
</body>
</html>
