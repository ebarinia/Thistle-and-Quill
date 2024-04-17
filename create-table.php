<?php
  $query = "CREATE TABLE IF NOT EXISTS `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `email` char(50) NOT NULL UNIQUE,
  `name` char(50) NOT NULL,
  `password` char(255) NOT NULL,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
);";

  $query = "CREATE TABLE IF NOT EXISTS `books` (
    `id` int unsigned NOT NULL AUTO_INCREMENT,
    `name` char(255) NOT NULL,
    `author` char(50) NOT NULL,
    `publisher` char(50) NOT NULL,
    `price` float NOT NULL,
    `synopsis` char(3000) NOT NULL,
    `image` char(255) NOT NULL,
    PRIMARY KEY (`id`)
  );";

mysqli_query($connect, $query);
?>
