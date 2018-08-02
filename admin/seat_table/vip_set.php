<div class="container" style="padding-left: 8px;text-align:center;">
  <style media="screen">
    table{
      border-spacing: 8px;
    }
    td{
      width: 24px;
      height: 24px;
      padding: 0;
      font-size:0px;
    }
    input[type=checkbox]{
      width: inherit;
    }
  </style>
</form>
<form id="vip_part" method="get">
  <input type="hidden" name="opt" value="4">
  <?php
    echo '<br><select id="vip_part_select" name="part" style="width:64px;height:32px;float:left;font-size:18px;border:2px solid gray;border-radius:8px;">';
    $table_info_fi = file($toROOT.'data/config/seat_table/table_info');
    $part_set = str_replace(chr(13).chr(10), '',$table_info_fi[3]);
    if (isset($_GET['part'])){
      if ($_GET['part'] == 1) {echo'<option value="1" selected>1부</option>';}
      else {echo'<option value="1">1부</option>';}
      if ($part_set <= 2) {
        if ($_GET['part'] == 2) {echo'<option value="2" selected>2부</option>';}
        else {echo'<option value="2">2부</option>';}
      }
      elseif ($part_set <= 3) {
        if ($_GET['part'] == 3) {echo'<option value="3" selected>3부</option>';}
        else {echo'<option value="3">3부</option>';}
      }
    }
    else{
      echo '<option value="0">선택</option>';
      echo '<option value="1">1부</option>';
      if ($part_set <= 2) {
        echo'<option value="2">2부</option>';
      }
      elseif ($part_set <= 3) {
        echo'<option value="3">3부</option>';
      }
    }
    echo '</select><br><br>';
    echo '</form><form id="apply" action="./apply.php" method="post">';
    if (isset($_GET['part'])){
      vip_set_table($_GET['part']);

      echo '<br><br><br><input type="submit" value="수정하기">';
    }
    else {
      echo '<br><p style="float:left;">시간을 선택하시오</p><br>';
    }
  ?>
  <script type="text/javascript">
    document.getElementById("vip_part_select").onchange = function(){
      var part = this.children[this.selectedIndex].value;
      document.getElementById("vip_part").submit();
    }
  </script>
</div>
