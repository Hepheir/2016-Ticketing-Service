<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
  <head>
    <meta charset="utf-8">
  	<meta name="author" content="hepheir">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
      echo '<link rel="shortcut icon" href="'.$toROOT.'favicon.ico">';
    ?>
    <title>010-2463-1852</title>
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
        background: #3ABF97;
        color: #ffffff;
        cursor: pointer;
      }
      input[type=submit]:hover{
        background: #ffffff;
        color: #2D9475;
        box-shadow: 0px 0px 32px gray;
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
      <h2 style="margin:0;">학번과 암호를 입력하거라.</h2>
      <hr>
      <br>
      <form method="post">
        <label for="id">학번을 입력하시오</label>
        <br>
        <input style="margin-top:8px" type="number" min="10101" max="31449" name="id" id="id">
        <br>
        <br>
        <label for="pw">비밀번호도 입력하시오</label>
        <br>
        <input style="margin-top:8px" type="password" name="password" id="pw">
        <br>
        <br>
        <br>
        <input type="hidden" name="login" value="1">
        <div class="console">
          <input type="submit" value="조회하기">
          <input type="button" value="홈으로" onclick="window.location.replace('../../')">
        </div>
      </form>
    </div>
  </body>
</html>
