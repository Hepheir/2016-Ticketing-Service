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
  <link rel="stylesheet" href="../css/ticketing/layout.css" media="screen">
  <link rel="stylesheet" href="../css/ticketing/color.css" media="screen">
  <link rel="stylesheet" href="../css/table_color.css" media="screen">
  <script src="../js/ticketing/Header.js" charset="utf-8"></script>
  <title>좌석을 선택하세요</title>
</head>
<body onresize="topMenuToggle()">
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
      for ($i=1; $i <= str_replace(chr(13).chr(10),'',file('../data/setting/part_available')[0]); $i++)
        echo '<td class="part">'.$i.'부</td>';
      ?>
    </tr>
  </table>
  <div id="Content">
    <form id="seatForm" action="fill.php" method="post">
      <input id="seatFormButton" type="button" value="다음">
      <br>
      <br>
    </form>
  </div>
  <script type="text/javascript">
    var drawerToggle = 0;
    topMenuToggle();
  </script>
</body>
</html>
