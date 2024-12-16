<?php
require_once '../database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $cost = $_POST['cost'];
    $kol = $_POST['kol'];
    $date = $_POST['date'];

    $pdo = getDatabaseConnection();

    try {
        $sql = "INSERT INTO tov (name, cost, kol, date) VALUES (:name, :cost, :kol, :date)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['name' => $name, 'cost' => $cost, 'kol' => $kol, 'date' => $date]);
        echo "Запис успішно додано!";
        header('Location: index.php');
    } catch (PDOException $e) {
        die("Помилка: " . $e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Додати товар</title>
</head>

<body>
    <h1>Додати товар</h1>
    <form action="insert.php" method="POST">
        <input type="text" name="name" placeholder="Назва товару" required>
        <input type="number" name="cost" placeholder="Вартість" required>
        <input type="number" name="kol" placeholder="Кількість" required>
        <input type="date" name="date" required>
        <button type="submit">Додати</button>
    </form>
</body>

</html>