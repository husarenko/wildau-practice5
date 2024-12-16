<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Головна</title>
</head>
<body>
    <?php if (!isset($_SESSION['authenticated'])): ?>
        <form action="login.php" method="POST">
            <input type="text" name="username" placeholder="Логін" required>
            <input type="password" name="password" placeholder="Пароль" required>
            <button type="submit">Увійти</button>
        </form>
        <a href="register.php">Реєстрація</a>
    <?php else: ?>
        <h1>Вітаємо, <?php echo $_SESSION['username']; ?>!</h1>
        <a href="edit_profile.php">Редагувати профіль</a>
        <a href="logout.php">Вийти</a>
    <?php endif; ?>
</body>
</html>
