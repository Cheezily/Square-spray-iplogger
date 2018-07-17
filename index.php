<?php
<<<<<<< HEAD
error_reporting(-1);
ini_set("display_errors", "1");
ini_set("log_errors", 1);
ini_set("error_log", "/tmp/php-error.log");

=======
>>>>>>> 47e5ff9193e4b711a0c1ca78754bd2389f163c6e

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
<<<<<<< HEAD
    $display = showInfo(400);
=======
    $display = showInfo(50);
>>>>>>> 47e5ff9193e4b711a0c1ca78754bd2389f163c6e
  }

  if (isset($_GET['c']) && is_int($_GET['c'])) {
    $commentList = showComments($_GET['c']);
  } else {
<<<<<<< HEAD
    $commentList = showComments(16);
=======
    $commentList = showComments(12);
>>>>>>> 47e5ff9193e4b711a0c1ca78754bd2389f163c6e
  }
?>

<!doctype html>
<html>
<head>
  <title>Welcome!</title>
<<<<<<< HEAD
  <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/animate.css@3.5.2/animate.min.css"
    integrity="sha384-OHBBOqpYHNsIqQy8hL1U+8OXf9hH6QRxi0+EODezv82DfnZoV7qoHAZDwMwEJvSw"
    crossorigin="anonymous">
=======
>>>>>>> 47e5ff9193e4b711a0c1ca78754bd2389f163c6e
  <style>
    body {
      font-family: sans-serif;
      font-size: 14px;
      color: coral;
      margin: 0;
      padding: 0;
      background: black;
<<<<<<< HEAD
      overflow-y: scroll;
      overflow-x: hidden;
    }

    a{
    	color: skyblue;
=======
      overflow: scroll;
>>>>>>> 47e5ff9193e4b711a0c1ca78754bd2389f163c6e
    }

    header {
      margin-top: 0;
      padding: 4px 0 0 20px;
      background: black;
      height: 35px;
    }

    h2 {
      margin: 0;
      font-size: 1.8em;
      color: coral;
    }

    table {
      margin: 15px auto;
      text-align: center;
      min-width: 1000px;
      border-collapse: collapse;
    }

    th {
      font-size: 16px;
      padding: 3px;
    }

    .legend {
      background: none;
      border-bottom: 1px solid #bbb;
    }

    .id {
      width: 100px;
    }

    .ip {
      width: 170px;
    }

    .when {
      width: 230px;
    }

    .city, .region {
      width: 165px;
    }

    .country {
      width: 100px;
    }

    .row, .commentForm {
      background: rgba(50,50,50,.9);
    }

    .row:nth-of-type(2n+0), th {
      background: rgba(20,20,20,.9);
    }

    td {
      margin: 0;
      height: 20px;
<<<<<<< HEAD
      font-size: 14px;
=======
>>>>>>> 47e5ff9193e4b711a0c1ca78754bd2389f163c6e
    }

    .commentForm {
      width: 800px;
      margin: 0 auto;
      border: 4px solid coral;
      border-radius: 5px;
      padding: 5px;
<<<<<<< HEAD
      animation-name: color_change;
      animation-duration: 2.5s;
      animation-iteration-count: infinite;
      animation-direction: alternate;
    }

    @-webkit-keyframes color_change {
      0% { border: 6px solid blue; }
      25% { border: 6px solid green; }
      50% { border: 6px solid yellow; }
      75% { border: 6px solid white; }
      100% { border: 6px solid red; }
    }
    @-moz-keyframes color_change {
      0% { border: 6px solid blue; }
      25% { border: 6px solid green; }
      50% { border: 6px solid yellow; }
      75% { border: 6px solid white; }
      100% { border: 6px solid red; }
    }
    @-ms-keyframes color_change {
      0% { border: 6px solid blue; }
      25% { border: 6px solid green; }
      50% { border: 6px solid yellow; }
      75% { border: 6px solid white; }
      100% { border: 6px solid red; }
    }
    @-o-keyframes color_change {
      0% { border: 6px solid blue; }
      25% { border: 6px solid green; }
      50% { border: 6px solid yellow; }
      75% { border: 6px solid white; }
      100% { border: 6px solid red; }
    }
    @keyframes color_change {
      0% { border: 6px solid blue; }
      25% { border: 6px solid green; }
      50% { border: 6px solid yellow; }
      75% { border: 6px solid white; }
      100% { border: 6px solid red; }
=======
>>>>>>> 47e5ff9193e4b711a0c1ca78754bd2389f163c6e
    }

    input[type="submit"] {
      background: coral;
      color: white;
      border-radius: 4px;
      border: none;
<<<<<<< HEAD
      height: 40px;
      width: 110px;
      margin-left: 10px;
      font-size: 22px;
=======
      height: 30px;
      width: 90px;
      margin-left: 10px;
      font-weight: bold;
>>>>>>> 47e5ff9193e4b711a0c1ca78754bd2389f163c6e
    }

    .commentForm h3 {
      margin-top: 0;
    }

    input[type='text'] {
      width: 610px;
<<<<<<< HEAD
      height: 36px;
      border-radius: 4px;
      border: 1px solid coral;
      font-size: 1.3em;
      margin-top: 3px;
=======
      height: 25px;
      border-radius: 4px;
      border: 1px solid coral;
>>>>>>> 47e5ff9193e4b711a0c1ca78754bd2389f163c6e
    }

    .comment {
      max-width: 300px;
    }

    .target {
      width: 100%;
      height: 100%;
      background: none;
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      margin: 0 auto;
      z-index: -9999;
<<<<<<< HEAD
      opacity: .9;
=======
      opacity: .5;
>>>>>>> 47e5ff9193e4b711a0c1ca78754bd2389f163c6e
    }

    .star {
      position: absolute;
<<<<<<< HEAD
      background: none;
      border: 1px solid #fff;
      border-radius: 50%;
    }

=======
    }
>>>>>>> 47e5ff9193e4b711a0c1ca78754bd2389f163c6e
  </style>
</head>

<body>
<<<<<<< HEAD
  <header class='greeting' >
    <h2>Leave a comment for others (留言)! I'm just seeing who hits here... 
    	<a href='https://github.com/Cheezily/Square-spray-iplogger'>(Github)</a>
    </h2>
=======
  <header class='greeting'>
    <h2>Leave a comment for others! I'm just seeing who hits here...</h2>
>>>>>>> 47e5ff9193e4b711a0c1ca78754bd2389f163c6e
  </header>
  <br>

  <?php if (!empty($userinfo['ip_address'])) { ?>
<<<<<<< HEAD
    <div class="animated tada">
      <div class='commentForm'>
        <form method='post' action=''>
          <input type='text' name='comment' placeholder="Leave a Comment For Others! / 留言!">
          <input type='hidden' name='from' value='<?php
              echo $ip_address;
            ?>'>
          <input class='submit' type='submit' name='submit_comment' value='Submit'>
        </form>
      </div>
=======
    <div class='commentForm'>
      <form method='post' action=''>
        <input type='text' name='comment' placeholder="Leave a Comment For Others!">
        <input type='hidden' name='from' value='<?php
            echo $ip_address;
          ?>'>
        <input class='submit' type='submit' name='submit_comment' value='Submit'>
      </form>
>>>>>>> 47e5ff9193e4b711a0c1ca78754bd2389f163c6e
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
<<<<<<< HEAD
    var maxStars = 40;
    var startingStars = 25;
    var starBurst = 25;
    var startX = Math.floor(screen.availWidth/50);
    var startY = Math.floor(screen.availHeight/50)
    var starSpeed = Math.floor(screen.availWidth/1000);
    var sizePxGrowth = 1.3;
    var shadowGrowth = .2;
    var borderGrowth = .1;
    var opacity = 1;
=======
    var maxStars = 50;
    var startingStars = 10;
    var starBurst = 15;
    var startX = Math.floor(screen.availWidth/10);
    var startY = Math.floor(screen.availHeight/10)
    var starSpeed = Math.floor(screen.availWidth/1400);
    var sizePxGrowth = 2;
    var shadowGrowth = .2;
    var borderGrowth = .1;
>>>>>>> 47e5ff9193e4b711a0c1ca78754bd2389f163c6e
    var stars = [];
    var target = document.getElementById("target");
    var body = document.body;
    var dragX = 0;
    var dragY = 0;

<<<<<<< HEAD
    var delay = (1/15)*100;
    var starChance = .12;
    var movementMultiplier = .01;
=======
    var delay = (1/30)*10;
    var starChance = .1;
    var movementMultiplier = .013;
>>>>>>> 47e5ff9193e4b711a0c1ca78754bd2389f163c6e
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
<<<<<<< HEAD
                  moveX: spreadMult * Math.floor(Math.cos(direction) * starSpeed) + Math.floor(Math.random() * 5 - 1.5),
                  moveY: spreadMult * Math.floor(Math.sin(direction) * starSpeed) + Math.floor(Math.random() * 5 - 1.5),
                  color: color,
                  shadow: .5,
                  border: 1,
                  opacity: opacity,
                  bgnum: Math.floor(Math.random() * 17) + 1,
=======
                  moveX: spreadMult * Math.floor(Math.cos(direction) * starSpeed) + Math.floor(Math.random() * 5 - 2.5),
                  moveY: spreadMult * Math.floor(Math.sin(direction) * starSpeed) + Math.floor(Math.random() * 5 - 5),
                  color: color,
                  shadow: .5,
                  border: 1,
>>>>>>> 47e5ff9193e4b711a0c1ca78754bd2389f163c6e
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
<<<<<<< HEAD
                    "border: " + stars[i].border + "px solid " + stars[i].color + ";" +
                    "opacity:" + stars[i].opacity + ";" +
=======
                    "background: " + stars[i].color + ";" +
                    "border: " + stars[i].border + "px solid #000;" +
>>>>>>> 47e5ff9193e4b711a0c1ca78754bd2389f163c6e
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
<<<<<<< HEAD

      var burstChance = .003;
      if(Math.random() < burstChance) {
        for (var i = 0; i < starBurst; i++) {
          makeStars(true, spreadMult);
        }
      }
=======
>>>>>>> 47e5ff9193e4b711a0c1ca78754bd2389f163c6e
    }
    }


    function moveStar(i) {
    stars[i].xPos += stars[i].moveX + dragX * stars[i].width;
    stars[i].yPos += stars[i].moveY + dragY * stars[i].width;
    stars[i].width += sizePxGrowth;
    stars[i].height += sizePxGrowth;
    stars[i].shadow += shadowGrowth;
    stars[i].border += borderGrowth;
<<<<<<< HEAD
    stars[i].opacity -= .006;
=======
>>>>>>> 47e5ff9193e4b711a0c1ca78754bd2389f163c6e
    }


    function deleteCheck(star, i) {
    if (star.xPos > screen.availWidth * 1.3 ||
        star.yPos > screen.availHeight * 1.3 ||
        star.xPos < -screen.availHeight * 1.3 ||
        star.yPos < -screen.availWidth * 1.3 ||
<<<<<<< HEAD
        star.opacity < .01 ||
        star.width > screen.availHeight * .9) {
=======
        star.width > screen.availHeight * .8) {
>>>>>>> 47e5ff9193e4b711a0c1ca78754bd2389f163c6e
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

<<<<<<< HEAD
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-92837500-4', 'auto');
    ga('send', 'pageview');

  </script>
=======
>>>>>>> 47e5ff9193e4b711a0c1ca78754bd2389f163c6e
</body>
</html>
