<?php

function getDatabaseConnection() {
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=lab5;charset=utf8', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die("Помилка підключення до бази даних: " . $e->getMessage());
    }
}