<?php

function saveInfo($userInfo) {

<<<<<<< HEAD
	if(empty($_GET['ignore'])) {
		global $db;

	    $ip_address = isset($userInfo['ip']) ? $userInfo['ip'] : '';
	    $city = isset($userInfo['city']) ? $userInfo['city'] : '';
	    $region = isset($userInfo['region']) ? $userInfo['region'] : '';
	    $country = isset($userInfo['country']) ? $userInfo['country'] : '';
	    $organization = isset($userInfo['org']) ? $userInfo['org'] : '';

	    //echo $ip_address."<br />".$city."<br />".$region."<br />".$country;

	    $query = "INSERT INTO access (ip_address, city, region, country, organization) ".
	      "VALUES (:ip_address, :city, :region, :country, :organization)";
	    $statement = $db->prepare($query);
	    $statement->bindValue(':ip_address', $ip_address);
	    $statement->bindValue(':city', $city);
	    $statement->bindValue(':region', $region);
	    $statement->bindValue(':country', $country);
	    $statement->bindValue(':organization', $organization);

	    $statement->execute();
	}

  
=======
  global $db;

  $ip_address = isset($userInfo['ip']) ? $userInfo['ip'] : '';
  $city = isset($userInfo['city']) ? $userInfo['city'] : '';
  $region = isset($userInfo['region']) ? $userInfo['region'] : '';
  $country = isset($userInfo['country']) ? $userInfo['country'] : '';
  $organization = isset($userInfo['org']) ? $userInfo['org'] : '';

  //echo $ip_address."<br />".$city."<br />".$region."<br />".$country;

  $query = "INSERT INTO access (ip_address, city, region, country, organization) ".
    "VALUES (:ip_address, :city, :region, :country, :organization)";
  $statement = $db->prepare($query);
  $statement->bindValue(':ip_address', $ip_address);
  $statement->bindValue(':city', $city);
  $statement->bindValue(':region', $region);
  $statement->bindValue(':country', $country);
  $statement->bindValue(':organization', $organization);

  $statement->execute();
>>>>>>> 47e5ff9193e4b711a0c1ca78754bd2389f163c6e
}
