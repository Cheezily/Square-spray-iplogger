<?php

function showComments($q) {

  global $db;

  if (is_int($q)) {
    $query = "SELECT * FROM comments ORDER BY id DESC LIMIT :q";

    $statement = $db->prepare($query);
    $statement->bindParam(':q', $q, PDO::PARAM_INT);
    $statement->execute();

    return $statement->fetchAll();
  }
}