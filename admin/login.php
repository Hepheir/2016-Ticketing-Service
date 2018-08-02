<?php
  if (isset($_POST['id'])){
    session_start();
    $_SESSION['id'] = $_POST['id'];
    $_SESSION['pw'] = $_POST['pw'];
    echo '<script>location.replace("../admin/");</script>';
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>관리자 로그인</title>
    <style>
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
      #body_wrap{
        display: inline-block;
        text-align: left;
        width: calc(100% - 24px);
        max-width: 720px;
        margin: 0;
        padding: 60px 12px 12px 12px;
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
      input[type=button]{
        float: left;
        font-size: 20px;
        height: 48px;
        font-weight: bold;
        padding: 8px 12px 8px 12px;
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
    </style>
  </head>
  <body>
    <nav id="topnav">
      <div id="topnav_div" style="float:left;width:360px;height:36px;padding:8px;color:#ffffff;font-size:20px;">
        로그인
      </div>
    </nav>
    <div id="body_wrap">
      <form id="login" action="./login.php" method="post">
        <br><br>
        <p>아이디</p>
        <input type="text" name="id">
        <br><br>
        <p>비밀번호</p>
        <input type="password" name="pw">
        <br><br><br>
        <input type="submit" value="로그인">
      </form>
      <input type="button" value="홈으로" onclick="window.location.replace('../')">
    </div>
  </body>
</html>
