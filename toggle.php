<?php
$conn = new mysqli("localhost", "root", "", "my_webpage");
if ($conn->connect_error) {
    die(json_encode(['success' => false, 'error' => 'DB connection']));
}

$id = $_POST['id'];

$stmt = $conn->prepare("SELECT status FROM users WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->bind_result($status);
$stmt->fetch();
$stmt->close();

$newStatus = $status == 1 ? 0 : 1;

$update = $conn->prepare("UPDATE users SET status = ? WHERE id = ?");
$update->bind_param("ii", $newStatus, $id);
$update->execute();
$update->close();

echo json_encode(['success' => true, 'newStatus' => $newStatus]);
