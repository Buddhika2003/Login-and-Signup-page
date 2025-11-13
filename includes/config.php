<?php
$host = 'localhost';
$db   = 'IT2133';
$user = 'root';
$pass = '';
$chrs = 'utf8mb4';
$attr = "mysql:host=$host;dbname=$db;charset=$chrs";
$opts =
[
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  PDO::ATTR_EMULATE_PREPARES   => FALSE
];

try {
  $pdo = new PDO($attr, $user, $pass, $opts);
}
catch (PDOException $e) {
  throw new PDOException($e->getMessage());
}
?>