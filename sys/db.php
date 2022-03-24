<?php

try {
	$dbh = new PDO('mysql:dbname=shop;host=localhost', 'root', '');
} catch (PDOException $e) {
	die($e->getMessage());
}