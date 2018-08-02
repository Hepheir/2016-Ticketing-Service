<div class="container" style="padding-left: 8px;">
  <?php
    $setting = file($toROOT.'data/config/setting');
    echo '<p>서로 다른 예매자가 동시에 같은 좌석을 선택 할 수 없도록 좌석을 보호하는 것을 <br>몇 분간 지속 시킬 것인지 설정.</p>';
    echo '<input type="number" min="1" name="protection" value="'.(str_replace(chr(13).chr(10),'',$setting[1])).'"><br><br>';
    echo '<input type="submit" value="수정하기">';
  ?>
</div>
