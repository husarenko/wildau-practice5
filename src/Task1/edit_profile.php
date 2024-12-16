<?php
session_start();
if (!isset($_SESSION['authenticated'])) {
    header('Location: index.php');
    exit;
}

require_once '../database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_SESSION['username'];
    $email = $_POST['email'];

    $pdo = getDatabaseConnection();

    try {
        $stmt = $pdo->prepare("UPDATE users SET email = :email WHERE username = :username");
        $stmt->execute(['email' => $email, 'username' => $username]);
        echo "Дані успішно оновлено!";
    } catch (PDOException $e) {
        echo "Помилка: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Редагування профілю</title>
</head>

<body>
    <form action="edit_profile.php" method="POST">
        <input type="email" name="email" placeholder="Новий Email" required>
        <button type="submit">Оновити</button>
    </form>
</body>

</html>