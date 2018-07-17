<?php
<<<<<<< HEAD
$dbhost = '';
$dbname = '';
$dbusername = '';
$dbpassword = '';
=======
$dbhost = 'localhost';
$dbname = 'db';
$dbusername = 'root';
$dbpassword = 'pw';
>>>>>>> 47e5ff9193e4b711a0c1ca78754bd2389f163c6e

$connection = "mysql:host=$dbhost;dbname=$dbname";


function dd($thing) {
  echo "<br />";
  echo "<pre>";
  var_dump($thing);
  echo "</pre>";
}
