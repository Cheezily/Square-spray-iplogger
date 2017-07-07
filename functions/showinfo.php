<?php

function showInfo($q) {

  global $db;

  if (is_int($q)) {
    $query = "SELECT * FROM access ORDER BY id DESC LIMIT :q";

    $statement = $db->prepare($query);
    $statement->bindParam(':q', $q, PDO::PARAM_INT);
    $statement->execute();

    return $statement->fetchAll();
  }
}
