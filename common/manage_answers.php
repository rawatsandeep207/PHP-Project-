<?php
session_start();
require_once "db.php";

if (!isset($_SESSION['admin'])) {
    header("Location: ../client/login.php");
    exit;
}

// DELETE ANSWER
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM answers WHERE id=$id");
}

$answers = $conn->query("
    SELECT a.id, a.answer, u.username, q.title 
    FROM answers a
    JOIN users u ON a.user_id = u.id
    JOIN questions q ON a.question_id = q.id
");
?>
<!DOCTYPE html>
<html>
<head><title>Manage Answers</title></head>
<body>

<h2>Manage Answers</h2>
<a href="admin_dashboard.php">⬅ Dashboard</a>

<table border="1" cellpadding="8">
<tr>
    <th>ID</th><th>Answer</th><th>User</th><th>Question</th><th>Action</th>
</tr>
<?php while($a=$answers->fetch_assoc()){ ?>
<tr>
    <td><?= $a['id'] ?></td>
    <td><?= $a['answer'] ?></td>
    <td><?= $a['username'] ?></td>
    <td><?= $a['title'] ?></td>
    <td>
        <a href="?delete=<?= $a['id'] ?>" onclick="return confirm('Delete answer?')">Delete</a>
    </td>
</tr>
<?php } ?>
</table>

</body>
</html>
