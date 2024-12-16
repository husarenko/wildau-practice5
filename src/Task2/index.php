<?php
require_once '../database.php';

$pdo = getDatabaseConnection();

try {
    $sql = "SELECT * FROM tov";
    $result = $pdo->query($sql);
} catch (PDOException $e) {
    die("Помилка при отриманні даних: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Список товарів</title>
</head>

<body>
    <h1>Список товарів</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Назва</th>
            <th>Вартість</th>
            <th>Кількість</th>
            <th>Дата</th>
        </tr>
        <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['id']); ?></td>
                <td><?php echo htmlspecialchars($row['name']); ?></td>
                <td><?php echo htmlspecialchars($row['cost']); ?></td>
                <td><?php echo htmlspecialchars($row['kol']); ?></td>
                <td><?php echo htmlspecialchars($row['date']); ?></td>
            </tr>
        <?php endwhile; ?>
    </table>

    <form action="delete.php" method="POST">
        <input type="number" name="id" placeholder="ID для видалення" required>
        <button type="submit">Видалити запис</button>
    </form>

    <form action="insert.php" method="GET">
        <button type="submit">Додати запис</button>
    </form>
</body>

</html>