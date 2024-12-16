<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        $pdo = new PDO('mysql:host=localhost;dbname=lab5', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['authenticated'] = true;
            $_SESSION['username'] = $user['username'];
            header('Location: index.php');
        } else {
            echo "Невірний логін або пароль.";
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
