<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
  	<meta name="author" content="hepheir">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/table_color.css">
    <link rel="shortcut icon" href="../../favicon.ico">
    <title>예매조회</title>
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
      }
      input{
        width:132px;
        height:32px;
        font-size:18px;
        border:2px solid gray;
        border-radius:8px;
      }
      input[type=button]{
        float: left;
        height: 48px;
        font-size: 20px;
        font-weight: bold;
        padding: 4px 12px 8px 12px;
        border: none;
        border-radius: 2px;
        background: #7f7f7f;
        color: #ffffff;
        cursor: pointer;
      }
      input[type=button]:hover{
        background: #ffffff;
        color: #7f7f7f;
        box-shadow: 0px 0px 32px gray;
      }
      input[type=submit]{
        float: right;
        height: 48px;
        font-size: 20px;
        font-weight: bold;
        padding: 4px 12px 8px 12px;
        border: none;
        border-radius: 2px;
        background: #BD3229;
        color: #ffffff;
        cursor: pointer;
      }
      input[type=submit]:hover{
        background: #ffffff;
        color: #BD3229;
        box-shadow: 0px 0px 32px gray;
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
    </style>
  </head>
  <body>
    <nav id="topnav">
      <div id="topnav_div" style="float:left;width:360px;height:36px;padding:8px;color:#ffffff;font-size:20px;">
        네놈이 예매한 좌석을 보여주겠다.
      </div>
    </nav>
    <div id="body_wrap">
      <?php
        echo '<h2 style="margin:0;">'.$NAME.'님의 예매 정보</h2>';
        echo '<hr>';
        echo '<h3 style="margin:4px;">'.$PART.'부 '.$SEAT.'입니다.</h3>';
        echo '<div id="table_container">';
        point_table($PART,$SEAT);
        echo '</div>';
      ?>
      <br>
      <form action="./cancel.php" method="post">
        <?php
          echo '<input type="hidden" name="id" value="'.$_POST['id'].'">';
          echo '<input type="hidden" name="password" value="'.$_POST['password'].'">';
          echo '<input type="hidden" name="seat" value="'.$SEAT.'">';
        ?>
        <div class="console">
          <input type="submit" value="예매취소">
          <input type="button" value="홈으로" onclick="window.location.replace('../../')">
        </div>
      </form>
    </div>
  </body>
</html>
