<?php
session_start();
require_once "db.php";

if (!isset($_SESSION['admin'])) {
    header("Location: ../client/login.php");
    exit;
}

// DELETE USER
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM users WHERE id=$id");
}

$users = $conn->query("SELECT id, username, email, address FROM users");
?>
<!DOCTYPE html>
<html>
<head><title>Manage Users</title></head>
<body>

<h2>Manage Users</h2>
<a href="admin_dashboard.php">⬅ Dashboard</a>

<table border="1" cellpadding="8">
<tr>
    <th>ID</th><th>Name</th><th>Email</th><th>Role</th><th>Action</th>
</tr>
<?php while($u=$users->fetch_assoc()){ ?>
<tr>
    <td><?= $u['id'] ?></td>
    <td><?= $u['username'] ?></td>
    <td><?= $u['email'] ?></td>
    <td><?= $u['address'] ?></td>
    <td>
        <a href="?delete=<?= $u['id'] ?>" onclick="return confirm('Delete user?')">Delete</a>
    </td>
</tr>
<?php } ?>
</table>

</body>
</html>
