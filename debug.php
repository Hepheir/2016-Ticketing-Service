<?php
  $error_code = $_GET['code'];
  // error_code == 1, 좌석 예매중 오류로 선택불가능한 좌석 발생
  if ($error_code == 1) {
    for ($p=1; $p <= 2; $p++) {
      for ($i=1; $i <= 10 ; $i++) {
        $c= chr($i+64);
        for ($j=1; $j <= 16; $j++) {
          if (fgets(fopen('data/seat/part_'.$p.'/'.$c.$j, 'r')) == "") {
            unlink('data/seat/part_'.$p.'/'.$c.$j);
  }}}}}
  // error_code == 2, P_info 작성중 오류로 빈 파일이 작성됨
  else if ($error_code == 2) {
    for ($i=1; $i <= 3; $i++) {
      for ($j=1; $j < 10; $j++) {
        for ($n=1; $n < 10; $n++) {
          if (fgets(fopen('data/p_info/'.$i.'0'.$j.'0'.$n, 'r')) == "") {
            unlink('data/p_info/'.$i.'0'.$j.'0'.$n);
        }}
        for ($n=10; $n < 50; $n++) {
          if (fgets(fopen('data/p_info/'.$i.'0'.$j.$n, 'r')) == "") {
            unlink('data/p_info/'.$i.'0'.$j.$n);
      }}}
      for ($j=10; $j < 15; $j++) {
        for ($n=1; $n < 10; $n++) {
          if (fgets(fopen('data/p_info/'.$i.$j.'0'.$n, 'r')) == "") {
            unlink('data/p_info/'.$i.$j.'0'.$n);
        }}
        for ( ; $n < 50; $n++) {
          if (fgets(fopen('data/p_info/'.$i.$j.$n)) == "") {
            unlink('data/p_info/'.$i.$j.$n);
  }}}}}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
  	<meta name="author" content="hepheir">
    <title>완전 디버그 특화 페이지</title>
  </head>
  <body>
    <?php
      if (!empty($_GET['from'])) {
        echo '<script>alert("디버깅 완료");window.location.replace("../'.$_GET['from'].'")</script>';
      }
      echo '어디서 오셨수';
    ?>
  </body>
</html>
