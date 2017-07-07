<?php

//connect to the database
try {
  $db = new PDO($connection, $dbusername, $dbpassword);
  //$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "DB Connected successfully";
} catch(PDOExceptipon $e) {
  echo "DB error: " . $e->getMessage();
  die();
}
