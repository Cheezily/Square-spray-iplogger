<?php

function showComments($q) {

  global $db;

  if (is_int($q)) {
<<<<<<< HEAD
    $query = "SELECT id, ip_address, comment, datetime FROM comments WHERE LENGTH(comment) > 0 AND comment NOT REGEXP '^[0-9]+' ORDER BY id DESC LIMIT :q";
=======
    $query = "SELECT * FROM comments ORDER BY id DESC LIMIT :q";
>>>>>>> 47e5ff9193e4b711a0c1ca78754bd2389f163c6e

    $statement = $db->prepare($query);
    $statement->bindParam(':q', $q, PDO::PARAM_INT);
    $statement->execute();

    return $statement->fetchAll();
  }
}