<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

include 'config.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $roll_number = $_POST['roll_number'];
    $department = $_POST['department'];
    $email = $_POST['email'];
    $event = $_POST['event'];
    $organized_by = $_POST['organized_by'];
    $event_date = $_POST['event_date'];

    $sql = "UPDATE activities SET name='$name', roll_number='$roll_number', department='$department', email='$email', event='$event', organized_by='$organized_by', event_date='$event_date' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$sql = "SELECT * FROM activities WHERE id='$id'";
$result = $conn->query($sql);
$activity = $result->fetch_assoc();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Activity</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        input[type="date"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Activity</h1>
        <form method="POST" action="edit.php?id=<?php echo $id; ?>">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $activity['name']; ?>" required><br>
            <label for="roll_number">Roll Number:</label>
            <input type="text" id="roll_number" name="roll_number" value="<?php echo $activity['roll_number']; ?>" required><br>
            <label for="department">Department:</label>
            <input type="text" id="department" name="department" value="<?php echo $activity['department']; ?>" required><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $activity['email']; ?>" required><br>
            <label for="event">Event:</label>
            <input type="text" id="event" name="event" value="<?php echo $activity['event']; ?>" required><br>
            <label for="organized_by">Organized By:</label>
            <input type="text" id="organized_by" name="organized_by" value="<?php echo $activity['organized_by']; ?>" required><br>
            <label for="event_date">Event Date:</label>
            <input type="date" id="event_date" name="event_date" value="<?php echo $activity['event_date']; ?>" required><br>
            <button type="submit">Update Activity</button>
        </form>
    </div>
</body>
</html>
