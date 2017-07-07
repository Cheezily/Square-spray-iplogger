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
    <h2>Leave a comment for others! I'm just seeing who hits here...</h2>
  </header>
  <br>

  <?php if (!empty($userinfo['ip_address'])) { ?>
    <div class='commentForm'>
      <form method='post' action=''>
        <input type='text' name='comment' placeholder="Leave a Comment For Others!">
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

  <div class='target' id='target'></div>

  <script type='text/javascript'>
    var maxStars = 50;
    var startingStars = 10;
    var starBurst = 15;
    var startX = Math.floor(screen.availWidth/10);
    var startY = Math.floor(screen.availHeight/10)
    var starSpeed = Math.floor(screen.availWidth/1400);
    var sizePxGrowth = 2;
    var shadowGrowth = .2;
    var borderGrowth = .1;
    var stars = [];
    var target = document.getElementById("target");
    var body = document.body;
    var dragX = 0;
    var dragY = 0;

    var delay = (1/30)*10;
    var starChance = .1;
    var movementMultiplier = .013;
    var spreadMult = 5;

    function makeStars(override, spreadMult = 1) {

    //i only want it to make a star on a small number of attempts
    if(Math.random() < starChance || override) {
      var direction = Math.floor(Math.random() * 360);
      var color = "rgb(" + Math.floor(Math.random() * 255) +
                  ", " + Math.floor(Math.random() * 255) +
                  ", " + Math.floor(Math.random() * 255) +
                  ")";

      var star = {xPos: startX,
                  yPos: startY,
                  width: 1,
                  height: 1,
                  direction: direction,
                  moveX: spreadMult * Math.floor(Math.cos(direction) * starSpeed) + Math.floor(Math.random() * 5 - 2.5),
                  moveY: spreadMult * Math.floor(Math.sin(direction) * starSpeed) + Math.floor(Math.random() * 5 - 5),
                  color: color,
                  shadow: .5,
                  border: 1,
                };
    stars.push(star);
    }
    }


    function showStars() {
    var starDivs = '';

    for (var i = 0; i < stars.length; i++) {

      starDivs += "<div class='star' id='" + i +"' style='" +
                    "top: " + stars[i].yPos + "px;" +
                    "left: " + stars[i].xPos + "px;" +
                    "width: " + Math.floor(stars[i].width) + "px;" +
                    "height: " + Math.floor(stars[i].height) + "px;" +
                    "background: " + stars[i].color + ";" +
                    "border: " + stars[i].border + "px solid #000;" +
                    //"box-shadow: "+ Math.floor(stars[i].shadow) +"px "+ Math.floor(stars[i].shadow) +"px " + /*Math.floor(stars[i].shadow)*/ 2 + "px #000;" +
                    "'></div>";

      moveStar(i);
      deleteCheck(stars[i], i);
    }

    target.innerHTML = starDivs;

    setTimeout(function() {
      showStars();
    }, delay);

    if (stars.length < maxStars) {
      makeStars();
    }
    }


    function moveStar(i) {
    stars[i].xPos += stars[i].moveX + dragX * stars[i].width;
    stars[i].yPos += stars[i].moveY + dragY * stars[i].width;
    stars[i].width += sizePxGrowth;
    stars[i].height += sizePxGrowth;
    stars[i].shadow += shadowGrowth;
    stars[i].border += borderGrowth;
    }


    function deleteCheck(star, i) {
    if (star.xPos > screen.availWidth * 1.3 ||
        star.yPos > screen.availHeight * 1.3 ||
        star.xPos < -screen.availHeight * 1.3 ||
        star.yPos < -screen.availWidth * 1.3 ||
        star.width > screen.availHeight * .8) {
          stars.splice(i, 1);
        }
    }

    document.onmousemove = function(event) {

    if (event.clientX > startX) {dragX = movementMultiplier;}
    if (event.clientX < startX) {dragX = -movementMultiplier;}
    if (event.clientY > startY) {dragY = movementMultiplier;}
    if (event.clientY < startY) {dragY = -movementMultiplier;}
    if (event.clientX == startX) {dragX = dragX * .5;}
    if (event.clientY == startY) {dragY = dragY * .5;}
    startX = event.clientX;
    startY = event.clientY;
    }

    body.onmousedown = function() {
    for (var i = 0; i < starBurst; i++) {
      makeStars(true, spreadMult);
    }
    }

    for (var i = 0; i < startingStars; i++) {
    makeStars(true, spreadMult);
    }

    showStars();
  </script>
</body>
</html>
