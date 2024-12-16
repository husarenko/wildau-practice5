<?php
$pdo = new PDO('mysql:host=localhost;dbname=company_db;charset=utf8', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] == 'add') {
    $name = $_POST['name'];
    $position = $_POST['position'];
    $salary = $_POST['salary'];

    $stmt = $pdo->prepare("INSERT INTO employees (name, position, salary) VALUES (?, ?, ?)");
    $stmt->execute([$name, $position, $salary]);
    echo "Працівника додано!<br>";
}

$stmt = $pdo->query("SELECT * FROM employees");
$employees = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt_avg_salary = $pdo->query("SELECT AVG(salary) AS avg_salary FROM employees");
$avg_salary = $stmt_avg_salary->fetch(PDO::FETCH_ASSOC)['avg_salary'];

$stmt_count_positions = $pdo->query("SELECT position, COUNT(*) AS count FROM employees GROUP BY position");
$positions_count = $stmt_count_positions->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Додати нового працівника</h2>
<form action="index.php" method="post">
    <input type="hidden" name="action" value="add">
    <label for="name">Ім'я:</label>
    <input type="text" name="name" required><br>

    <label for="position">Посада:</label>
    <input type="text" name="position" required><br>

    <label for="salary">Зарплата:</label>
    <input type="number" name="salary" required><br>

    <input type="submit" value="Додати працівника">
</form>

<h2>Список працівників</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Ім'я</th>
        <th>Посада</th>
        <th>Зарплата</th>
        <th>Дії</th>
    </tr>
    <?php foreach ($employees as $employee): ?>
        <tr>
            <td><?php echo $employee['id']; ?></td>
            <td><?php echo $employee['name']; ?></td>
            <td><?php echo $employee['position']; ?></td>
            <td><?php echo $employee['salary']; ?></td>
            <td>
                <a href="edit_employee.php?id=<?php echo $employee['id']; ?>">Редагувати</a> |
                <a href="delete_employee.php?id=<?php echo $employee['id']; ?>">Видалити</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<h3>Статистика</h3>
<p><strong>Середня зарплата всіх працівників:</strong> <?php echo number_format($avg_salary, 2); ?> грн</p>

<h4>Кількість працівників на кожній посаді:</h4>
<table border="1">
    <tr>
        <th>Посада</th>
        <th>Кількість працівників</th>
    </tr>
    <?php foreach ($positions_count as $position): ?>
        <tr>
            <td><?php echo $position['position']; ?></td>
            <td><?php echo $position['count']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>