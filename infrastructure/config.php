<?php
$host = 'localhost';
$dbname = 'produtos-base';
$username = 'root';
$password = '';

$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
