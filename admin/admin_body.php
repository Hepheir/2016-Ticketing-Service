<title>관리페이지</title>
<style media="screen" charset="UTF-8">
  html, body{
    width: 100%;
    height: 100%;
    margin: 0;
    padding: 0;
    text-align: center;
    overflow: auto;
    font-size: 16px;
  }
  input{
    width:132px;
    height:32px;
    font-size:18px;
    border:2px solid gray;
    border-radius:8px;
  }
  input[type=submit]{
    float: right;
    height: 48px;
    font-size: 20px;
    font-weight: bold;
    padding: 4px 12px 8px 12px;
    border: none;
    border-radius: 2px;
    background: #3ABF97;
    color: #ffffff;
    cursor: pointer;
  }
  input[type=submit]:hover{
    background: #ffffff;
    color: #2D9475;
    box-shadow: 0px 0px 32px gray;
  }
  input[type=button]{
    float: left;
    height: 48px;
    font-size: 20px;
    font-weight: bold;
    padding: 4px 12px 8px 12px;
    border: none;
    border-radius: 2px;
    background: #3ABF97;
    color: #ffffff;
    cursor: pointer;
  }
  input[type=button]:hover{
    background: #ffffff;
    color: #3ABF97;
    box-shadow: 0px 0px 32px gray;
  }
  hr{
    border: solid 1px gray;
  }
  nav.features{
    width: 200px;
    height: 100%;
    float: left;
    background: #efefef;
  }
  ul.list{
    margin-right: 8px;
    width: calc(100% - 16px);
    text-align: left;
    text-indent: 16px;
    padding: 0;
  }
  h1, h3{
    margin: 0;
  }
  h1{
    font-size: 28px;
  }
  li{
    margin: 6px 0 6px 0;
  }
  div.body_wrap{
    width: calc(100% - 232px);
    height: calc(100% - 32px);
    float: left;
    background: #ffffff;
    text-align:left;
    padding:16px;
    overflow: auto;
  }
  .pointer{
    cursor: pointer;
  }
</style>
</head>
<body>
<nav class="features">
  <ul class="list">
    <li><h1 style="position: relative; top:8px;left:-4px;">관리페이지</h1></li>
    <li><hr style="margin-top:4px;"></li><br>
    <li style="text-transform: uppercase;"><?php echo $_SESSION['id']; ?> 로 로그인 함</li>
    <li class="pointer"><a href="./logout.php" style="font-size:.7em;color:inherit;text-decoration:none;">- 로그아웃 하기</a></li>
    <li><hr style="margin-top:4px;"></li>
    <li><h3>좌석표 설정</h3></li>
    <li class="pointer" onclick="window.location.replace('?opt=0')">- 크기설정</li>
    <li class="pointer" onclick="window.location.replace('?opt=1')">- 시간설정</li>
    <li class="pointer" onclick="window.location.replace('?opt=2')">- 복도위치</li>
    <li class="pointer" onclick="window.location.replace('?opt=3')">- 사용불가석</li>
    <li class="pointer" onclick="window.location.replace('?opt=4')">- vip석</li>
    <hr>
    <li><h3>공연정보</h3></li>
    <li class="pointer" onclick="window.location.replace('?opt=10')">- 예매현황</li>
    <li class="pointer" onclick="window.location.replace('?opt=11')">- 홍보페이지</li>
    <hr>
    <li><h3>기타기능</h3></li>
    <li class="pointer" onclick="window.location.replace('?opt=20')">- 디버그</li>
    <li class="pointer" onclick="window.location.replace('?opt=22')">- 개발자 정보</li>
    <li class="pointer" onclick="window.location.replace('?opt=21')">- 좌석표 오류</li>
    <li class="pointer" onclick="window.location.replace('?opt=23')">- 기타</li>
  </ul>
</nav>
<?php
  echo '<div class="body_wrap">';
  echo '<div class="container_wrap" style="width: calc(100% - 16px);margin:0;padding:8px;">';
  echo '<form id="apply" action="./apply.php" method="post">';
  echo '<input type="hidden" name="secure" value="2J19D08K9">';

  if (!isset($_GET['opt'])) {
    echo '<div class="opt_name">';
    echo '<h1 style="margin-left:16px;display:inline-block;letter-spacing:2px;">설정</h1>';
    echo '<p style="margin-left:48px;display:inline-block">- 메인페이지</p>';
    echo '<hr></div>';
    echo '관리관리 후하후하!';
  }
  else{
    echo '<input type="hidden" name="opt" value="'.$_GET['opt'].'">';
    switch ($_GET['opt']) {
      case '0':
        echo '<div class="opt_name">';
        echo '<h1 style="margin-left:16px;display:inline-block;letter-spacing:2px;">좌석표 설정</h1>';
        echo '<p style="margin-left:32px;display:inline-block">- 크기설정</p><hr></div>';
        include './seat_table/size.php';
        break;
      case '1':
        echo '<div class="opt_name">';
        echo '<h1 style="margin-left:16px;display:inline-block;letter-spacing:2px;">좌석표 설정</h1>';
        echo '<p style="margin-left:32px;display:inline-block">- 시간설정</p><hr></div>';
        include './seat_table/part.php';
        break;

      case '2':
        echo '<div class="opt_name">';
        echo '<h1 style="margin-left:16px;display:inline-block;letter-spacing:2px;">좌석표 설정</h1>';
        echo '<p style="margin-left:32px;display:inline-block">- 복도위치</p><hr></div>';
        include './seat_table/hall.php';
        break;

      case '3':
        echo '<div class="opt_name">';
        echo '<h1 style="margin-left:16px;display:inline-block;letter-spacing:2px;">좌석표 설정</h1>';
        echo '<p style="margin-left:32px;display:inline-block">- 사용불가석</p><hr></div>';
        include './seat_table/disabled.php';
        break;

      case '4':
        echo '<div class="opt_name">';
        echo '<h1 style="margin-left:16px;display:inline-block;letter-spacing:2px;">좌석표 설정</h1>';
        echo '<p style="margin-left:32px;display:inline-block">- vip석</p><hr></div>';
        include './seat_table/vip_set.php';
        break;

      default:
        break;
    }
  }
  echo '</form></div>';
?>
