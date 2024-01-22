<?php
session_start();

$user = 'toto';
$pass = 'salut';
$host = '127.0.0.1';
$db   = 'cnc';

$pdo = new PDO("mysql:host=$host;dbname=$db;", $user, $pass);
