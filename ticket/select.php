<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
      echo '<link rel="shortcut icon" href="'.$toROOT.'favicon.ico">';
      echo '<link rel="stylesheet" href="'.$toROOT.'css/table_color.css">';
    ?>
    <style>
      html, body{
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
        text-align: center;
        overflow: auto;
      }
      p{
        margin: 0;
        padding: 0;
        line-height: 1em;
      }
      #topnav{
        position: fixed;
        width: calc(100% - 8px);
        height: 48px;
        padding-left: 8px;
        background: #5f5f5f;
        box-shadow: 0 4px 4px lightgray;
        overflow: hidden;
        text-align: left;
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
        height: 100%;
        overflow: auto;
        text-align: center;
      }
      caption{
        padding: 12px;
      }
      td, label#choosable{
        width: 32px;
        height: 32px;
        font-size: 0;
        margin: 0;
        padding: 0;
        border: 0;
      }
      input[type=submit]{
        float: right;
        font-size: 20px;
        font-weight: bold;
        padding: 8px 12px 8px 12px;
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
        font-size: 20px;
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
    <title>시간선택</title>
  </head>
  <body>
    <nav id="topnav">
      <div id="topnav_div" onmouseover="this.innerHTML = '훠후~~!'" onmouseout="this.innerHTML = '좌석선택 > <span>정보입력 > 예매완료</span>'" style="float:left;width:360px;height:36px;padding:8px;color:#ffffff;font-size:20px;">
        좌석선택 > <span>정보입력 > 예매완료</span>
      </div>
    </nav>
    <div id="body_wrap">
      <?php
        echo '<form id="part_refresh" method="post">';
        echo '<h2 style="margin:0">';
        echo '<select id="part_select" name="part" style="width:64px;height:32px;font-size:18px;border:2px solid gray;border-radius:8px;">';
        $table_info_fi = file($toROOT.'data/config/seat_table/table_info');
        $part_set = str_replace(chr(13).chr(10), '',$table_info_fi[3]);
        if (isset($_POST['part'])){
          if ($_POST['part'] == 1) {echo'<option value="1" selected>1부</option>';}
          else {echo'<option value="1">1부</option>';}
          if ($part_set <= 2) {
            if ($_POST['part'] == 2) {echo'<option value="2" selected>2부</option>';}
            else {echo'<option value="2">2부</option>';}
          }
          elseif ($part_set <= 3) {
            if ($_POST['part'] == 3) {echo'<option value="3" selected>3부</option>';}
            else {echo'<option value="3">3부</option>';}
          }
        }
        else{
          echo '<option value="0">선택</option>';
          echo '<option value="1">1부</option>';
          if ($part_set <= 2) {
            if ($_POST['part'] == 2) {echo'<option value="2" selected>2부</option>';}
            else {echo'<option value="2">2부</option>';}
          }
          elseif ($part_set <= 3) {
            if ($_POST['part'] == 3) {echo'<option value="3" selected>3부</option>';}
            else {echo'<option value="3">3부</option>';}
          }
        }
        echo '</select>';
        echo ' 좌석표 입니다.';
        echo '</h2>';
        echo '<input type="hidden" name="step" value="1">';
        echo '</form>';
        echo '<hr>';
        echo '<form method="post">';
        echo '<div id="table_container">';

        if (isset($_POST['part'])){
          input_table($_POST['part']);
          echo '<input type="hidden" name="part" value="'.$_POST['part'].'">';
        }
        else{
          echo '시간을 선택하세요.';
        }
        echo '</div>';
        echo '<br>';
        echo '<input type="hidden" name="step" value="2">';
      ?>
        <div class="console">
          <input type="submit" value="다음으로">
          <input type="button" value="홈으로" onclick="window.location.replace('../')">
        </div>
      </form>
    </div>
    <script src="../js/table_alert.js"></script>
    <script type="text/javascript">
      document.getElementById("part_select").onchange = function(){
      var part = this.children[this.selectedIndex].value;
      document.getElementById("part_refresh").submit();
    }
    </script>
  </body>
</html>
