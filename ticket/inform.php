<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/table_color.css">
    <title>정보입력</title>
    <style media="screen">
      html, body{
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
        text-align: center;
        overflow: auto;
      }
      #topnav{
        position: fixed;
        width: calc(100% - 8px);
        height: 48px;
        padding-left: 8px;
        text-align: left;
        background: #5f5f5f;
        box-shadow: 0 4px 4px lightgray;
        overflow: hidden;
      }
      span{
        opacity: .4;
      }
      #body_wrap{
        display: inline-block;
        text-align: left;
        width: calc(100% - 24px);
        max-width: 720px;
        margin: 0;
        padding: 60px 12px 12px 12px;
      }
      p{
        margin: 0;
        padding: 0;
        line-height: 1em;
      }
      a{
        text-decoration: inherit;
        color:inherit;
        cursor: pointer;
      }
      div#table_container{
        width: 100%;
        margin: 8px 0 32px 0;
        overflow: auto;
        text-align: center;
      }
      caption{
        padding: 12px;
      }
      td{
        width: 32px;
        height: 32px;
        font-size: 0;
      }
      input{
        width:132px;
        height:32px;
        font-size:18px;
        border:2px solid gray;
        border-radius:8px;
      }
      #inform{
        padding: 16px 0 16px 16px;
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
      #alertbox{
        margin: 8px;
        padding: 4px 4px 4px 8px;
        border: 2px solid lightgray;
        background-color: #FFFBAC;
        color: #6f6f6f;
        font-weight: bold;
        border-radius: 8px;
      }
    </style>
  </head>
  <body>
    <nav id="topnav">
      <div id="topnav_div" style="float:left;width:360px;height:36px;padding:8px;color:#ffffff;font-size:20px;">
        <a onclick="document.getElementById('cancel').submit();">좌석선택</a> > 정보입력 > <span>예매완료</span>
      </div>
    </nav>
    <div id="body_wrap">
      <?php
        echo '<div id="alertbox">주의 : 중복 예약을 막기위한 좌석 보호는 '.$TABLE_INFO[3].'분간만 지속됩니다.</div>';
        echo '<form action="./result/" method="post">';

        echo '<h2 style="margin:0;">선택하신 좌석은 '.$_POST['part'].'부 '.$_POST['seat'].'입니다.</h2>';
        echo '<hr>';
        echo '<input type="hidden" name="part" value="'.$_POST['part'].'">';
        echo '<input type="hidden" name="seat" value="'.$_POST['seat'].'">';
        echo '<div id="table_container">';
        point_table($_POST['part'],$_POST['seat']);
        echo '</div>';
      ?>
        <hr>
        <h2 style="margin:0;">예매자 정보를 입력해주세요.</h2>
        <div id="inform">
          <label for="id">학번</label>
          <br>
          <input id="id" type="text" name="id">
          <br>
          <br>
          <label for="name">이름</label>
          <br>
          <input id="name" type="text" name="name">
          <br>
          <br>
          <label for="pw">비밀번호<br>(예매조회, 예매취소시 본인확인용)</label>
          <br>
          <input id="pw" type="password" name="password">
          <br>
          <br>
        </div>
        <div class="console">
          <input type="submit" value="다음으로">
          <input type="button" value="이전으로" onclick="document.getElementById('cancel').submit();">
        </div>
        <br>
        <br>
        <br>
      </form>
      <form id="cancel" method="post">
        <input type="hidden" name="cancel" value="1">
        <?php
          echo '<input type="hidden" name="part" value="'.$_POST['part'].'">';
          echo '<input type="hidden" name="seat" value="'.$_POST['seat'].'">';
        ?>
      </form>
    </div>
  </body>
</html>
