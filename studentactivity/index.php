<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

include 'config.php';

$sql = "SELECT * FROM activities";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Activities</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Student Activities</h1>
        <a href="create.php" class="create-button">Create New Activity</a>
        <a href="logout.php" class="logout-button">Logout</a> <!-- Logout link -->
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Roll Number</th>
                <th>Department</th>
                <th>Email</th>
                <th>Event</th>
                <th>Organized By</th>
                <th>Event Date</th>
                <th>Actions</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['roll_number']}</td>
                        <td>{$row['department']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['event']}</td>
                        <td>{$row['organized_by']}</td>
                        <td>{$row['event_date']}</td>
                        <td class='actions'>
                            <a href='edit.php?id={$row['id']}'>Edit</a>
                            <a href='delete.php?id={$row['id']}'>Delete</a>
                        </td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='9'>No activities found</td></tr>";
            }
            $conn->close();
            ?>
        </table>
    </div>
</body>
</html>
