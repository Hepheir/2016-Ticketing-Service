<div class="container" style="padding-left: 8px;">
  <br><br>
  <?php
    $toggler = file($toROOT.'data/config/setting');
    if ($toggler[0] == 0){
      echo '<label for="on">활성</label>';
      echo '<input id="on" type="radio" name="toggle" value="1">';
      echo '<label for="off">비활성</label>';
      echo '<input id="off" type="radio" name="toggle" value="0" checked="">';
    }
    else {
      echo '<label for="on">활성</label>';
      echo '<input id="on" type="radio" name="toggle" value="1" checked="">';
      echo '<label for="off">비활성</label>';
      echo '<input id="off" type="radio" name="toggle" value="0">';
    }
  ?>
  <br><br><br>
  <input type="submit" value="수정하기">
</div>
