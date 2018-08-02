<?php
$PASS_KEY = '국카스텐';
session_start();

if (isset($_GET['logout'])) {
  session_destroy();
  header('Location: ../');
}

if (!isset($_GET['key']) || $_GET['key'] != $PASS_KEY) {
  if (!isset($_SESSION['key']) || $_SESSION['key'] != $PASS_KEY) {
    session_destroy();
    header('Location: ../');
  }
  // if this codes passes here, your login is succcessful
}
else {
  $_SESSION['key'] = $PASS_KEY;
  header('Location: ./');
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
		<meta name="theme-color" content="#FFFFFF">
    <title>관리자 페이지</title>
    <link rel="stylesheet" href="../css/xml.css">
    <link rel="stylesheet" href="./style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  </head>
  <body>
    <ul class="card_board">
      <li class="small-card" onclick="location.assign('?logout=true')">
        <icon>lock_open</icon>
        <span>logout</span>
      </li>
      <li class="card opt1">
        <p class="card-title" onclick="A(1)">
          <icon class="card-title__icon">settings_overscan</icon>
          <span class="card-title__text">좌석표 크기</span>
          <icon class="card-title__toggle">arrow_drop_down</icon>
        </p>
        <hr>
        <div class="option_info">좌석표의 행 (가로), 열 (세로) 칸 개수를 설정.<br>빈 칸도 하나의 칸으로 계산되므로 빈 칸을 포함하여 입력 할 것.</div>
        <div class="option_desc">
          <p>가로 칸 개수 : <input id="opt1_col" type="number" min="1" max="999" placeholder="Column" value="<?php echo str_replace(chr(13).chr(10), '', file('../data/table_setting')[0]); ?>"></p>
          <p>세로 줄 개수 : <input id="opt1_row" type="number" min="1" max="999" placeholder="Row" value="<?php echo str_replace(chr(13).chr(10), '', file('../data/table_setting')[1]); ?>"></p>
          <button class="option_apply" onclick="B('code=1&col='+document.querySelector('#opt1_col').value+'&row='+document.querySelector('#opt1_row').value);">적용</button>
        </div>
      </li>
      <li class="card opt2">
        <p class="card-title" onclick="A(2)">
          <icon class="card-title__icon">access_time</icon>
          <span class="card-title__text">공연 횟수</span>
          <icon class="card-title__toggle">arrow_drop_down</icon>
        </p>
        <hr>
        <div class="option_info">공연 횟수를 설정.<br>예매 화면에서 몇 부까지 예매가 가능하게 할 것인지 지정하는 기능이다.</div>
        <div class="option_desc">
          <p>공연 횟수 : <input id="opt2_part" type="number" min="1" max="999" placeholder="Part" value="<?php echo str_replace(chr(13).chr(10), '', file('../data/part_available')[0]); ?>"></p>
          <button class="option_apply" onclick="B('code=2&part='+document.querySelector('#opt2_part').value)">적용</button>
        </div>
      </li>
      <li class="card opt3">
        <p class="card-title" onclick="A(3)">
          <icon class="card-title__icon">crop_free</icon>
          <span class="card-title__text">좌석표 빈 칸 배치</span>
          <icon class="card-title__toggle">arrow_drop_down</icon>
        </p>
        <hr>
        <div class="option_desc">
          <div class="option_info">빈 칸으로 표시할 영역을 지정.
            <br>공연 장소의 여건에 따라 모양을 맞출 수 있음. (예: 복도 표현)
            <br>한 열의 좌석을 출력 할 때, 빈 좌석이 있으면 해당 좌석번호를 그 다음칸에 출력함. (예 : A4 A5 A6 -[A5 위치에 빈 칸 추가]-> A4 [빈칸] A5)
          </div>
          <div class="table_wrap">
            <?php
              // ini_set('display_errors','off');
              $TABLE_SETTING = file('../data/table_setting');

              for ($row = 1; $row <= $TABLE_SETTING[1]; $row++) {
                $row_chr = chr($row+64);

                echo '<ul class="emtpy__row">';
                echo '<li class="emtpy__row-chr">'.$row_chr.'</li>';

                for ($col = 1; $col <= $TABLE_SETTING[0]; $col++) {
                  if (file_exists('../data/empty_cell/'.$row_chr.$col)) {
                    // 1이면 빈 칸이다.
                    echo '<li class="emtpy__col"><input class="empty__checkbox" type="checkbox" name="'.$row_chr.$col.'" checked></li>';
                    continue;
                  }

                  echo '<li class="emtpy__col"><input class="empty__checkbox" type="checkbox" name="'.$row_chr.$col.'"></li>';
                }
                echo '</ul>';
                echo '<br>';
              }
            ?>
          </div>
          <button class="option_apply" onclick="B('code=3&seats='+C())">적용</button>
        </div>
        <script type="text/javascript" role="count checked seats">
          function C () {
            var ckd = document.getElementsByClassName('empty__checkbox');
            var ept_seats = '';
            for (var i = 0; i < ckd.length; i++) {
              if (ckd[i].checked) {
                ept_seats += ckd[i].name+',';
              }
            }
            return ept_seats;
          }
        </script>
      </li>
      <li class="card opt4">
        <p class="card-title" onclick="A(4)">
          <icon class="card-title__icon">cancel</icon>
          <span class="card-title__text">선택 불가 좌석</span>
          <icon class="card-title__toggle">arrow_drop_down</icon>
        </p>
        <hr>

        <div class="option_desc">
          <div class="option_info">선택 할 수 없는 좌석을 지정.<br>VIP석이나 오프라인 예매 전용석은 이 기능으로 지정하면 된다.</div>
        </div>
        <button class="option_apply" onclick="B('code=4&part='+document.querySelector('#opt2_part').value)">적용</button>
      </li>

      <!-- <li class="card opt0">
        <p class="card-title" onclick="A(0)">
          <icon class="card-title__icon">apps</icon>
          <span class="card-title__text">좌석표 크기</span>
          <icon class="card-title__toggle">arrow_drop_down</icon>
        </p>
        <hr>
        <div class="option_info"></div>
        <div class="option_desc">
        </div>
        <button class="option_apply" onclick="B('code=&='+document.querySelector('#opt').value)">적용</button>
      </li> -->

    </ul>
  </body>
  <script type="text/javascript" role="card opener">
    function A (n) {
      if (document.querySelector('.opt'+n+' .card-title .card-title__toggle').innerHTML == 'arrow_drop_down') {
        document.querySelector('.opt'+n).classList.add('opened');
        document.querySelector('.opt'+n+' .card-title .card-title__toggle').innerHTML = 'arrow_drop_up';
      }
      else {
        document.querySelector('.opt'+n).classList.remove('opened');
        document.querySelector('.opt'+n+' .card-title .card-title__toggle').innerHTML = 'arrow_drop_down';
      }
    }
  </script>
  <script type="text/javascript" role="[Ajax] Applying">
    function B (b) {
      this.xhttp = new XMLHttpRequest();
      this.xhttp.open('GET', './_apply.php?key=hepheir&'+b,false);
      this.xhttp.send();
      alert(this.xhttp.responseText);
    }
  </script>
</html>
