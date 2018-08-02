<?php $toROOT = './';$toggler = file($toROOT.'data/config/setting'); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
  <head>
    <meta charset="utf-8">
  	<meta name="author" content="hepheir">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./favicon.ico">
    <title>서브 메인페이지</title>
    <style media="screen">
      html, body{
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
        text-align: center;
        overflow: auto;
        font-family: "맑은 고딕";
      }
      #topnav{
        display: block;
        position: fixed;
        top: 0;
        left: 0;
        width: calc(100% - 8px);
        height: 48px;
        padding-left: 8px;
        text-align: left;
        background: #5f5f5f;
        -webkit-box-shadow: 0 4px 4px lightgray;
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
      input[type=button]{
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
      input[type=button]:hover{
        background: #ffffff;
        color: #3ABF97;
        box-shadow: 0px 0px 32px gray;
      }
    </style>
  </head>
  <body>
    <div id="topnav">
      <div id="topnav_div" style="float:left;width:360px;height:36px;padding:8px;color:#ffffff;font-size:20px;">
        게이트웨이
      </div>
    </div>
    <div id="body_wrap">
      <h2 style="margin:0;">이 사이트는</h2>
      <hr>
      <p>
        연극영화부 MMC와 자율동아리 UNIT이 함께하는 프로젝트의 결과물 입니다.
      </p>
      <br>
      <br>
      <br>
      <h2 style="margin:0;">예매하려면 여기로</h2>
      <hr>
      <?php
        if ($toggler[0] == 0){
          echo '<p>현재 예매기능이 활성화 되어있지 않습니다.</p></script>';
        }
        else {
          echo '<br><p><input type="button" value="예매하러 가기" onclick="window.location.replace(\'./ticket/\')"></p>';
        }
      ?>
      <br>
      <br>
      <br>
      <br>
      <br>
      <h2 style="margin:0;">내가 예매한 좌석 확인하기</h2>
      <hr>
      <p>
        참고로 예매취소는 여기서 할 수 있다.
      </p>
      <br>
      <p>
        <input type="button" value="취소 / 조회하기" onclick="window.location.replace('./ticket/check/')">
      </p>
      <br>
      <br>
      <br>
      <br>
      <br>
      <h2 style="margin:0;">메인으로 돌아가기</h2>
      <hr>
      <p>
        <a href="./" style="text-decoration:underline;">클릭 클릭 클릭 클릭 클릭 클릭</a>
      </p>
      <br>
      <br>
      <br>
    </div>
  </body>
</html>
