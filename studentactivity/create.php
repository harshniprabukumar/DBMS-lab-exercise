<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $roll_number = $_POST['roll_number'];
    $department = $_POST['department'];
    $email = $_POST['email'];
    $event = $_POST['event'];
    $organized_by = $_POST['organized_by'];
    $event_date = $_POST['event_date'];

    $sql = "INSERT INTO activities (name, roll_number, department, email, event, organized_by, event_date)
            VALUES ('$name', '$roll_number', '$department', '$email', '$event', '$organized_by', '$event_date')";

    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Activity</title>
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
        <h1>Create Activity</h1>
        <form method="POST" action="create.php">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            <label for="roll_number">Roll Number:</label>
            <input type="text" id="roll_number" name="roll_number" required>
            <label for="department">Department:</label>
            <input type="text" id="department" name="department" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="event">Event:</label>
            <input type="text" id="event" name="event" required>
            <label for="organized_by">Organized By:</label>
            <input type="text" id="organized_by" name="organized_by" required>
            <label for="event_date">Event Date:</label>
            <input type="date" id="event_date" name="event_date" required>
            <button type="submit">Create Activity</button>
        </form>
    </div>
</body>
</html>
