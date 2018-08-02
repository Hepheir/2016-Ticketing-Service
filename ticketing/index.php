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
<head>
  <meta charset="utf-8">
	<meta name="author" content="hepheir">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/ticketing/select.css" media="screen">
  <link rel="stylesheet" href="../css/support.css" media="screen">
  <script src="../js/ticketing/select.js" charset="utf-8"></script>
</head>
<body onresize="screenResize()">
  <div class="Header">
    <div id="topIcon" class="topIcon fl">
      <img width="100%" height="100%" src="../asset/icons/white_hamburger_64.png" alt="Menu" />
      <div class="topSubMenu">
        <div class="balloonTop"></div>
        <div class="balloonMain">

        </div>
        <div class="balloonBottom"></div>
      </div>
    </div>
    <div id="topText" class="topText fl">
      좌석을 선택하세요
    </div>
    <div id="toHome" class="toHome fr" onclick="window.location.replace('../')">
      뒤로
    </div>
    <div class="topMenu fr">
      수정/조회하기
    </div>
  </div>
  <div class="TableContainer">
<?php
  $toRoot = '../';
  include $toRoot.'php/table_drawer.php';
  default_table(1);
?>
  </div>
  <script type="text/javascript">
    screenResize();
  </script>
</body>
</html>
