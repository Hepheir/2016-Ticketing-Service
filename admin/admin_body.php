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
    overflow: auto;
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
    <li style="text-transform: uppercase;"><?php echo $_SESSION['id']; ?> <span style="font-size:.8em;">로 로그인 함</span></li>
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
    <li class="pointer" onclick="window.location.replace('?opt=10')">- 예매기능<br> &nbsp; &nbsp; &nbsp;활성/비활성</li>
    <li class="pointer" onclick="window.location.replace('?opt=11')">- 예매현황</li>
    <li class="pointer" onclick="window.location.replace('?opt=12')">- 예매자 관리</li>
    <li class="pointer" onclick="window.location.replace('?opt=13')">- 홍보페이지</li>
    <hr>
    <li><h3>기타기능</h3></li>
    <li class="pointer" onclick="window.location.replace('?opt=20')">- 개발자 정보</li>
    <hr>
    <li><h3><a href="../" style="text-decoration:none;color:inherit;" onmouseover="this.innerHTML = '잠깐! 기다려봐'" onmouseout="this.innerHTML = '메인으로'" on title="보안을 위해서 되도록 로그아웃 기능을 이용해주세요">메인으로</a></h3></li>
  </ul>
</nav>
<?php
  echo '<div class="body_wrap">';
  echo '<div class="container_wrap" style="width: calc(100% - 16px);margin:0;padding:8px;">';
  echo '<form id="apply" action="./apply.php" method="post">';

  if (!isset($_GET['opt'])) {
    echo '<div class="opt_name">';
    echo '<h1 style="margin-left:16px;display:inline-block;letter-spacing:2px;">설정</h1>';
    echo '<p style="margin-left:48px;display:inline-block">- 메인페이지</p>';
    echo '<hr></div>';
    echo '관리관리 후하후하!';
  }
  else{
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

      case '10':
        echo '<div class="opt_name">';
        echo '<h1 style="margin-left:16px;display:inline-block;letter-spacing:2px;">공연정보</h1>';
        echo '<p style="margin-left:32px;display:inline-block">- 예매기능 활성/비활성</p><hr></div>';
        include './show/toggle_ticketing.php';
        break;

      case '11':
        echo '<div class="opt_name">';
        echo '<h1 style="margin-left:16px;display:inline-block;letter-spacing:2px;">공연정보</h1>';
        echo '<p style="margin-left:32px;display:inline-block">- 예매현황</p><hr></div>';
        include './show/status.php';
        break;

      case '12':
        echo '<div class="opt_name">';
        echo '<h1 style="margin-left:16px;display:inline-block;letter-spacing:2px;">공연정보</h1>';
        echo '<p style="margin-left:32px;display:inline-block">- 예매자 관리</p><hr></div>';
        include './show/ticket_list.php';
        break;

      case '13':
        echo '</form>';
        echo '<form action="./apply.php" method="post" enctype="multipart/form-data">';
        echo '<div class="opt_name">';
        echo '<h1 style="margin-left:16px;display:inline-block;letter-spacing:2px;">공연정보</h1>';
        echo '<p style="margin-left:32px;display:inline-block">- 홍보페이지</p><hr></div>';
        echo '<div class="container" style="padding-left: 8px;">';
        echo '<p>주의 : 이 기능은 좀 위험하면서 중요한 작업을 담당합니다.</p>';
        echo '<p>>> intro/ 디렉토리 안에 파일을 업로드 합니다. (예 : index.html)</p>';
        echo '<input type="file" name="file_upload" id="file_upload" style="width:auto;"><br><br>';
        echo '<input id="reset" type="radio" name="upload_mode" value="0" style="position:relative;top:4px;width:16px;height:16px;"><label for="reset">초기화</label><br>';
        echo '<input id="add" type="radio" name="upload_mode" value="1" style="position:relative;top:4px;width:16px;height:16px;" checked=""><label for="add">추가</label><br>';
        echo '<br><br><input type="submit" value="업로드">';
        echo '</div>';
        break;

      case '20':
        echo '<div class="opt_name">';
        echo '<h1 style="margin-left:16px;display:inline-block;letter-spacing:2px;">기타기능</h1>';
        echo '<p style="margin-left:32px;display:inline-block">- 개발자 정보</p><hr></div>';
        echo '<div class="container" style="padding-left: 8px;">';
        include $toROOT.'data/developer.html';
        echo '</div>';

      default:
        break;
    }
  }
  echo '<input type="hidden" name="secure" value="2J19D08K9">';
  if (isset($_GET['opt'])) {echo '<input type="hidden" name="opt" value="'.$_GET['opt'].'">';}
  echo '</form></div>';
?>
