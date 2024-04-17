<?php
  $query = "CREATE TABLE IF NOT EXISTS `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `email` char(50) NOT NULL UNIQUE,
  `name` char(50) NOT NULL,
  `password` char(255) NOT NULL,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
);";

  mysqli_query($connect, $query);
  ?>
