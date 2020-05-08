<?php
require "../config.php";

try{
  $pdo = new \PDO('mysql:host='.DB_HOST.';dbname='.DB_SCHEMA, DB_USER, DB_PASS, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

  $sql = "CREATE TABLE posts(
    `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `author_id` INT(11),
    `title` VARCHAR(80),
    `body` TEXT,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (author_id) REFERENCES users(id)
  )";

  $pdo->exec($sql);
  echo "Table MyGuests created successfully";
}catch(PDOExeption $e){
  echo $sql . "<br>" . $e->getMessage();
}
$pdo = null;

 ?>
