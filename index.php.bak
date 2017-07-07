<?php

  require_once('config/config.php');
  require_once('config/db.php');
  require_once('functions/getinfo.php');
  require_once('functions/saveinfo.php');
  require_once('functions/showinfo.php');
  require_once('functions/showcomments.php');
  require_once('functions/savecomments.php');

  $userinfo = getInfo();

  if (empty($_POST['submit_comment']) && empty($_GET['comment'])) {
    saveInfo($userinfo['full_info']);
  } else {
    saveComments($userinfo['ip_address'], htmlspecialchars($_POST['comment']));
    header("Location: index.php");
  }


  if (isset($_GET['q']) && is_int($_GET['q'])) {
    $display = showInfo($_GET['q']);
  } else {
    $display = showInfo(50);
  }

  if (isset($_GET['c']) && is_int($_GET['c'])) {
    $commentList = showComments($_GET['c']);
  } else {
    $commentList = showComments(12);
  }
?>

<!doctype html>
<html>
<head>
  <title>Welcome!</title>
  <link rel='stylesheet' href='main.css'>
</head>

<body>
  <header class='greeting'>
    <h2>Just seeing who is hitting here while I get some things figured out!</h2>
  </header>
  <br>

  <?php if (!empty($userinfo['ip_address'])) { ?>
    <div class='commentForm'>
      <h3>Please leave a comment for others who land here!</h3>
      <form method='post' action=''>
        <label for='comment'><b>Comment: </b></label>
        <input type='text' name='comment'>
        <input type='hidden' name='from' value='<?php 
            echo $ip_address;
          ?>'>
        <input class='submit' type='submit' name='submit_comment' value='Submit'>
      </form>
    </div>
  <?php } ?>

  <hr>

  <h2>Comments</h2>
  <div class='comments'>
    <table>
      <thead class='legend'>
        <th>Comment #</th>
        <th>IP Address</th>
        <th>Comment</th>
        <th>When</th>
      </thead>
      <?php
        forEach($commentList as $row) {
          echo "<tr class='row'>";
          echo "<td class='id'>".$row['id']."</td>";
          echo "<td class='ip'>".$row['ip_address']."</td>";
          echo "<td class='comment'>".$row['comment']."</td>";
          echo "<td class='when'>".date("M j, Y g:i:s A T",strtotime($row['datetime']))."</td>";
          echo "</tr>";
        }
      ?>
    </table>
  </div>

  <hr>
  
  <h2>Total Hits</h2>
  <table>
    <thead class='legend'>
      <th>Hit</th>
      <th>IP Address</th>
      <th>City</th>
      <th>Region</th>
      <th>Country</th>
      <th>Organization</th>
      <th>When</th>
    </thead>
    <?php
      forEach($display as $row) {
        echo "<tr class='row'>";
        echo "<td class='id'>".$row['id']."</td>";
        echo "<td class='ip'>".$row['ip_address']."</td>";
        echo "<td class='city'>".$row['city']."</td>";
        echo "<td class='region'>".$row['region']."</td>";
        echo "<td class='country'>".$row['country']."</td>";
        echo "<td class='organization'>".$row['organization']."</td>";
        echo "<td class='when'>".date("M j, Y g:i:s A T",strtotime($row['datetime']))."</td>";
        echo "</tr>";
      }
     ?>
  </table>
</body>
</html>
