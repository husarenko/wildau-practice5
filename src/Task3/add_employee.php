<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $position = $_POST['position'];
    $salary = $_POST['salary'];

    try {
        $pdo = new PDO('mysql:host=localhost;dbname=company_db;charset=utf8', 'root', '');
        $sql = "INSERT INTO employees (name, position, salary) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$name, $position, $salary]);
        echo "Employee added successfully.";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<form method="POST">
    Name: <input type="text" name="name" required><br>
    Position: <input type="text" name="position" required><br>
    Salary: <input type="text" name="salary" required><br>
    <button type="submit">Add Employee</button>
</form>