<?php
try {
   $config = require_once __DIR__ . '\..\config\dab.php';
   $db = new PDO("{$config['drive']}:host={$config['host']};dbname={$config['dbname']};port={$config['port']}", $config['user']);
} catch (\PDOexception $exception){

};