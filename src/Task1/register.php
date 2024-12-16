<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];

    try {
        $pdo = new PDO('mysql:host=localhost;dbname=lab5', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username OR email = :email");
        $stmt->execute(['username' => $username, 'email' => $email]);
        if ($stmt->rowCount() > 0) {
            echo "Користувач із таким логіном або email уже існує.";
        } else {
            $stmt = $pdo->prepare("INSERT INTO users (username, password, email) VALUES (:username, :password, :email)");
            $stmt->execute(['username' => $username, 'password' => $password, 'email' => $email]);
            echo "Реєстрація успішна!";
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>
<form action="register.php" method="POST">
    <input type="text" name="username" placeholder="Логін" required>
    <input type="password" name="password" placeholder="Пароль" required>
    <input type="email" name="email" placeholder="Email" required>
    <button type="submit">Реєстрація</button>
</form>