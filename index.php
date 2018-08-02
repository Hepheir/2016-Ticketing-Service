<?php
  $toROOT = './';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/2014/REC-html5-20141028/">
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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="./favicon.ico">
  <style media="screen">
    @charset "UTF-8";
    html, body{
      width: 100%;
      height: 100%;
      margin: 0;
      padding: 0;
      font-family: arial;
    }
    p{
      margin:0;
      padding: 0;
      line-height: 1.2em;
    }
    a{
      margin: 0;
      text-decoration: none;
      color:inherit;
    }
    .hidden{
      display: none;
    }
    div.shadow{
      position: fixed;
      top : 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: black;
      opacity: .4;
      z-index: 999;
    }
    p.menu_text{
      text-transform: uppercase;
      letter-spacing: -0.1em;
    }
    #background{
      width: calc(100% + 8px);
      height: calc(100% + 8px);
      margin: -4px -4px -4px -4px;
      position: fixed;
      <?php
      echo "background-image: url('".$toROOT."data/images/Background.jpg');";
      ?>
      background-size: cover;
      background-position: center;
      -webkit-filter: blur(3px);
    }
    .shadow{
      width: 100%;
      height: 100%;
      background-color: black;
      opacity: .3;
    }
    #bodyWrap{
      position: fixed;
      margin: 0 0 0 calc(100% * 2 / 27);

      width: calc(100% * 25 / 27);
      height:100%;
      color: white;
    	overflow-y: auto;
    }
    div.bodyClearfix{
      height: calc(90% - 6em);
      min-height: 110px;
    	margin-right: calc(100% * 2 / 27);
    }
    div.MMC_logo{
      width: 36px;
      height: 36px;
      padding: 32px calc(50% - 18px) 12px calc(50% - 18px);
      <?php
      echo "background-image: url('".$toROOT."data/images/MMC_logo.png');";
      ?>
      background-size: contain;
      background-repeat: no-repeat;
      background-origin: content-box;
    }
    .menu{
      width: 100%;
    }
    td.menu_td{
      width: calc(100% * 9 / 23);
      text-align: center;
    }
    td.menu_Ltd{
      width: calc(100% * 7 / 23);
      text-align: left;
    }
    td.menu_Rtd{
      width: calc(100% * 7 / 23);
      text-align: right;
    }
    #MMC_desc{
      text-transform: uppercase;
      min-height: 100px;
      font-size: 1.8em;
      font-weight: 600;
    }
    #lyricWrap{
    	padding-top: 48px;
    	width:100%;
    	height: 900px;
    	font-size: 16px;
    }
    .circle{
    	width:48px;
    	height:48px;
    	opacity: .4;
    	float:right;
    	-webkit-border-radius: 32px;
    	color:black;
    	background-color:white;
    }
    span.titleCap{
    	font-size: 0.7em;
    }
  </style>
  <script src="http://code.jquery.com/jquery-latest.js"></script>
  <title>UNIT &amp; MMC</title>
  <script>
  var delayTime = 640; // 요소들이 나타나는데에 걸리는 시간 (단위: ms = 1/1000 second)

	var status = 0;
	function setStatus(){ // 애니매이션이 끝났는지 아닌지의 상태
		status = 1;
	}
  function performance(){
    $('div.MMC_logo').delay(delayTime).fadeIn(delayTime);
    $('p.menu_1').delay(delayTime * 2).fadeIn(delayTime);
    $('p.menu_2').delay(delayTime * 3).fadeIn(delayTime);
    $('p.menu_3').delay(delayTime * 4).fadeIn(delayTime);
    $('p.MMC_desc_1').delay(delayTime * 5).fadeIn(delayTime * 2);
    $('p.MMC_desc_2').delay(delayTime * 5).fadeIn(delayTime * 2);
    $('p.MMC_desc_3').delay(delayTime * 5).fadeIn(delayTime * 2);
   	setTimeout(setStatus,delayTime * 6); // 모든 애니메이션이 실행 된 후 div.sketch가 나타날 수 있게 끔 설정
  }
		function guide(){
      if(status==0){ //애니메이션 보기 싫을 때 빠른 스킵
        $('div.MMC_logo').show();
        $('p.menu_1').show();
        $('p.menu_2').show();
        $('p.menu_3').show();
        $('p.MMC_desc_1').show();
        $('p.MMC_desc_2').show();
        $('p.MMC_desc_3').show();
        setTimeout(setStatus,delayTime);
      }
		}

		//창 크기에 따른 폰트 사이즈 조절
		var w = window.innerWidth;
    if (w < 350){
      document.write('<style>body{font-size:18px;}.variable{display:none;}</style>');
    }
    else if (w < 400){
      document.write('<style>body{font-size:16px;}</style>');
    }
		else if(w < 560){
			document.write('<style>body{font-size:18px;}</style>');
		}
    else if(w < 610){
      document.write('<style>body{font-size:18px;}</style>');
    }
		else if (w < 710){
			document.write('<style>body{font-size:20px;}</style>');
    }
    else{
      document.write('<style>body{font-size:24px;}</style>');
    };

		//중국어 시간에 쓰셈
		function singMode(){
			$('div.bodyClearfix').fadeOut(delayTime);
			$('#MMC_desc').fadeOut(delayTime);
			status = 0;
			$('#lyricWrap').delay(delayTime).fadeIn(delayTime);
		}
  </script>
</head>
<body>
  <div id="background">
    <div class="shadow"></div>
  </div>
  <div id="bodyWrap" onclick="guide();">
    <div class="bodyClearfix">
      <header>
        <div class="MMC_logo hidden" onclick="window.location.replace('http://www.facebook.com/bojeongmmc/')"></div>
        <nav class="menu">
          <table class="menu">
            <?php
            echo '<td class="menu_Ltd"><a title="예매하기" href="'.$toROOT.'gate.php">';
              echo '<p class="menu_text menu_1 hidden">tickets</p>';
            echo '</a></td>';
            echo '<td class="menu_td"><a title="상영작/연극 소개" href="'.$toROOT.'info/">';
            ?>
              <p class="menu_text menu_2 hidden">introduction</p>
            </a></td>
            <td class="menu_Rtd"><a title="비트랑 클라우드와는 클라스가 다른 보정 최강 자율동아리" href="http://project-unit.tistory.com" target="_blank">
              <p class="menu_text menu_3 hidden"><span class="variable">team </span>unit</p>
            </a></td>
          </table>
        </nav>
      </header>
    </div>
    <div id="MMC_desc">
      <p class="MMC_desc_1 hidden">movie</p>
      <?php
      echo '<p class="MMC_desc_2 hidden">m<span onclick="location.replace(\''.$toROOT.'admin/\')">a<span>nufactur<span onclick="singMode()">i</span>ng</p>';
      ?>
      <p class="MMC_desc_3 hidden">club</p>
    </div>
		<div id="lyricWrap" class="hidden">
			<h2 title="원곡 - 인연 (박신양)" onclick="location.reload();">야경 &nbsp; <span class="titleCap">-윤종신-</span></h2>
			<br/>
			<p>다 올라왔어 한눈에 들어온</p>
			<p>나의 도시가 아름답구나</p>
			<p>방금전까지 날 괴롭히던</p>
			<p>그 미로같던 두통같던 그곳이</p>
			<p>이토록 아름답다니</p>
			<br/>
			<p>저기 어디쯤인가 아직거기살고있니</p>
			<p>모두들안녕히 잘 계신지</p>
			<p>이렇게 넓은 세상에 우리 만난건</p>
			<p>그것만으로도 소중해</p>
			<p>여기서보니 내가 겪은일</p>
			<p>아주 조금한 일 일뿐이야</p>
			<p>수많은 불빛 그속에 모두</p>
			<p>사랑하고 미워하고 실망하고</p>
			<p>그 중에 내 것들 하나</p>
			<br/>
			<p>저기 어디쯤인가 우리 이별했던곳</p>
			<p>유난히 택시 안잡히던날</p>
			<p>택시 뒷창으로 보인 마지막모습</p>
			<p>멀어질때까지 바라본</p>
			<p>모두변했겠지 내가 변한것만큼</p>
			<p>그래도 간직하고 있어</p>
			<p>너의 그 미소가 나를 향할때 느꼈던</p>
			<p>그 포근했던 그 머물것같았던</p>
			<br/>
			<p>여기어디쯤인가 우리 자주만난곳</p>
			<p>많은 약속이 오고갔던곳</p>
			<p>마치 너의 목소리가 바람에 실려</p>
			<p>왜 잊지 못하냐고 묻네</p>
			<br/>
			<p>우리 언제쯤인가 마주칠수 있겠지</p>
			<p>저 불빛속을 거닐다보면</p>
			<p>먼저 알아본사람 나였으면해</p>
			<p>난 언제나 바라봤기에</p>
			<p>언제나</p>
		</div>
  </div>
  <script>
  performance();
  </script>
</body>
</html>
