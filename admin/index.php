<?php
  $toROOT = '../';
  include $toROOT.'action/table_drawer.php';
  include $toROOT.'action/admin_table_drawer.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="author" content="hepheir@gmail.com">
    <link rel="stylesheet" href="../css/table_color.css">
    <link rel="shortcut icon" href="../favicon.ico">
    <?php
      session_start();
      include './members.php';
      if (!isset($_SESSION['id'])){
        echo '<meta http-equiv="refresh" content="0;url=login.php">';
      }
      elseif (isset($MEMBER[$_SESSION['id']])) {
        if ($MEMBER[$_SESSION['id']] == $_SESSION['pw']) {
          include './admin_body.php';
        }
        else {
          session_destroy();
          echo '<script>alert("응 아니야.");</script>';
          echo '<meta http-equiv="refresh" content="0;url=login.php">';
        }
      }
      else {
        session_destroy();
        echo '<script>alert("응 아니야.");</script>';
        echo '<meta http-equiv="refresh" content="0;url=login.php">';
      }
?>
  </body>
</html>
