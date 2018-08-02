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
  <p>
    주의 : 예매기능을 활성화 한 상태에서 이 설정을 바꾸면 큰 혼란을 초래할 수 있습니다.
  </p>
  <?php
    disabled_set_table();
    echo '<br><br><input type="submit" value="수정하기">';
  ?>
</div>
