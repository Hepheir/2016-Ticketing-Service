<?php
include ('./account.php');
if (!login('2J19D08K9',$_POST['id']))
  header('Location: ../');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/2014/REC-html5-20141028/">
<html>
<!-- Author information
* html, php, css, javascript
*   written by hepheir@gmail.com
*
* page designed by
*   hepheir@gmail.com - 김동주 & pseudonym0405@naver.com - 이현오 & ljhappy1201@naver.com - 이진호
*
* :: ADMIN ::
-->
<head>
  <meta charset="utf-8">
	<meta name="author" content="hepheir">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--<meta name="theme-color" content="#8983F5">-->
  <link rel="stylesheet" href="../css/table_color.css" media="screen">
  <link rel="stylesheet" href="./layout.css" media="screen">
  <link rel="stylesheet" href="./color.css" media="screen">
  <script src="../js/ticketing/Header.js" charset="utf-8"></script>
  <script src="../js/ticketing/seatSelector.js" charset="utf-8"></script>
  <script src="../js/ticketing/seatTableSizing.js" charset="utf-8"></script>
  <title>설정</title>
</head>
<body>
  <table id="Layout">
    <tr>
      <td id="sideBar">
        <ul id="sideBarList">
          <li class="Spacing"></li>
          <li class="Category">예매 설정</li>
          <li class="Element">예매 활성화</li>
          <li class="Element">공연 횟수</li>
          <li class="Element">공지사항</li>
          <li class="Spacing"></li>
          <li class="Category">좌석표 설정</li>
          <li class="Element">좌석표 크기</li>
          <li class="Element">복도 위치 지정</li>
          <li class="Element">좌석 보호</li>
          <li class="Element">좌석표 설명</li>
          <li class="Spacing"></li>
          <li class="Category">디자인 설정</li>
          <li class="Element">메인 배경이미지</li>
          <li class="Element">홍보 페이지</li>
          <li class="Spacing"></li>
          <li class="Category">ss 페이지</li>
          <li class="Element">페이지</li>
        </ul>
      </td>
      <td id="ContentWrap">
        <div id="Header">
          <div id="topMenuIcon" onclick="sideBarToggle(sideBarStatus)">
            <img width="100%" height="100%" src="../asset/icons/white_hamburger_64.png" alt="Menu" />
          </div>
          <div id="topTitle">
            제어판
          </div>
          <div id="topBack" onclick="window.location.replace('../')">
            뒤로
          </div>
        </div>
        <div id="ContentSubWrap" onclick="sideBarStatus=0;sideBarToggle(sideBarStatus)">
          <div id="Content">
            아걀걁
            <br>
            my name
            <br>
            is
            <br>
            hawo
          </div>
        </div>
      </td>
    </tr>
  </table>
  <script type="text/javascript">
  var sideBarStatus = 0;
  function sideBarToggle(sbt){
    if (sbt % 2 == 0){
      document.getElementById('sideBar').style.display = 'none';
    }
    else{
      document.getElementById('sideBar').style.display = 'table-cell';
    }
    sideBarStatus++;
  }
  sideBarToggle(sideBarStatus);
  </script>
</body>
</html>
