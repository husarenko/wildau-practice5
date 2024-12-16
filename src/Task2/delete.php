<?php
require_once '../database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    $pdo = getDatabaseConnection();

    try {
        $sql = "DELETE FROM tov WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        echo "Запис успішно видалено!";
        header('Location: index.php');
    } catch (PDOException $e) {
        die("Помилка: " . $e->getMessage());
    }
}
