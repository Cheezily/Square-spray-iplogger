<?php
$dbhost = 'localhost';
$dbname = 'db';
$dbusername = 'root';
$dbpassword = 'pw';

$connection = "mysql:host=$dbhost;dbname=$dbname";


function dd($thing) {
  echo "<br />";
  echo "<pre>";
  var_dump($thing);
  echo "</pre>";
}
