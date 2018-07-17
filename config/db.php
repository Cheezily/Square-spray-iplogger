<?php
<<<<<<< HEAD
=======

>>>>>>> 47e5ff9193e4b711a0c1ca78754bd2389f163c6e
//connect to the database
try {
  $db = new PDO($connection, $dbusername, $dbpassword);
  //$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "DB Connected successfully";
} catch(PDOExceptipon $e) {
  echo "DB error: " . $e->getMessage();
  die();
}
