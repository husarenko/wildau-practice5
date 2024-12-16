<?php
$pdo = new PDO('mysql:host=localhost;dbname=company_db;charset=utf8', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $position = $_POST['position'];
    $salary = $_POST['salary'];

    $stmt = $pdo->prepare("UPDATE employees SET name = ?, position = ?, salary = ? WHERE id = ?");
    $stmt->execute([$name, $position, $salary, $id]);

    header("Location: index.php");
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM employees WHERE id = ?");
    $stmt->execute([$id]);
    $employee = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<h2>Редагувати працівника</h2>
<form action="edit_employee.php" method="post">
    <input type="hidden" name="id" value="<?php echo $employee['id']; ?>">
    <label for="name">Ім'я:</label>
    <input type="text" name="name" value="<?php echo $employee['name']; ?>" required><br>

    <label for="position">Посада:</label>
    <input type="text" name="position" value="<?php echo $employee['position']; ?>" required><br>

    <label for="salary">Зарплата:</label>
    <input type="number" name="salary" value="<?php echo $employee['salary']; ?>" required><br>

    <input type="submit" value="Зберегти зміни">
</form>