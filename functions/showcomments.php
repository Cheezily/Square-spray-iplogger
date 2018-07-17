<?php

function showComments($q) {

  global $db;

  if (is_int($q)) {
    $query = "SELECT id, ip_address, comment, datetime FROM comments WHERE LENGTH(comment) > 0 AND comment NOT REGEXP '^[0-9]+' ORDER BY id DESC LIMIT :q";

    $statement = $db->prepare($query);
    $statement->bindParam(':q', $q, PDO::PARAM_INT);
    $statement->execute();

    return $statement->fetchAll();
  }
}