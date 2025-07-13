<?php
// اتصال بقاعدة البيانات
$conn = new mysqli("localhost", "root", "", "my_webpage");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// إضافة بيانات النموذج
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $stmt = $conn->prepare("INSERT INTO users (name, age) VALUES (?, ?)");
    $stmt->bind_param("si", $name, $age);
    $stmt->execute();
    $stmt->close();
}

// جلب البيانات من الجدول
$result = $conn->query("SELECT * FROM users");
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Form</title>
    <style>
        body { font-family: Arial; margin: 40px; }
        form { margin-bottom: 20px; }
        input { margin-right: 10px; padding: 5px; }
        table { width: 60%; border-collapse: collapse; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: center; }
        .btn-toggle { cursor: pointer; background-color: #007bff; color: white; border: none; padding: 5px 10px; }
    </style>
</head>
<body>

<h2>Submit Your Info</h2>

<form method="POST">
    <input type="text" name="name" placeholder="Name" required>
    <input type="number" name="age" placeholder="Age" required>
    <button type="submit">Submit</button>
</form>

<h3>All Users</h3>
<table>
    <thead>
        <tr><th>ID</th><th>Name</th><th>Age</th><th>Status</th><th>Action</th></tr>
    </thead>
    <tbody id="userTable">
        <?php while($row = $result->fetch_assoc()): ?>
        <tr id="row-<?= $row['id'] ?>">
            <td><?= $row['id'] ?></td>
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td><?= $row['age'] ?></td>
            <td id="status-<?= $row['id'] ?>"><?= $row['status'] ?></td>
            <td><button class="btn-toggle" onclick="toggleStatus(<?= $row['id'] ?>)">Toggle</button></td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<script>
function toggleStatus(id) {
    fetch('toggle.php', {
        method: 'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: 'id=' + id
    })
    .then(res => res.json())
    .then(data => {
        if(data.success) {
            document.getElementById('status-' + id).innerText = data.newStatus;
        }
    });
}
</script>

</body>
</html>
