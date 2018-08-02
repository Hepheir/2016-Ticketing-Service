<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/table_color.css">
    <title>예매완료</title>
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
      div#table_container{
        width: 100%;
        margin: 8px 0 32px 0;
        overflow: auto;
        text-align: center;
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
        color: #2D9475;
        box-shadow: 0px 0px 32px gray;
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
    </style>
  </head>
  <body>
    <nav id="topnav">
      <div id="topnav_div" style="float:left;width:360px;height:36px;padding:8px;color:#ffffff;font-size:20px;">
        <a href="../ticket/">좌석선택</a> > <a onclick="window.history.back();">정보입력</a> > 예매완료
      </div>
    </nav>
    <div id="body_wrap">
      <h2 style="margin:0;">예매완료</h2>
      <hr>
      <?php
        $BOOK_INFO = file($toROOT.'data/p_info/'.$_POST['id']);
        $NAME = str_replace(chr(13).chr(10), '',$BOOK_INFO[0]);
        echo $_POST['id'].' '.$NAME;
      ?>
      로 좌석 예매가 완료되었습니다.
      <br>
      <br>
      혹시 예매를 취소하고 싶으시다면, '홈 - Ticket - 예매 조회하기' 로 들어가셔서 취소하실 수 있습니다.
      <br>
      <br>
      <br>
      <br>
      <input type="button" value="홈으로" onclick="window.location.replace('../../')">
    </div>
  </body>
</html>
