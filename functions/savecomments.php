<?php

function saveComments($ip_address, $comment) {

    global $db;

  $query = "INSERT INTO comments (ip_address, comment) ".
    "VALUES (:ip_address, :comment)";
  $statement = $db->prepare($query);
  $statement->bindValue(':ip_address', $ip_address);
  $statement->bindValue(':comment', $comment);

  $statement->execute();
}