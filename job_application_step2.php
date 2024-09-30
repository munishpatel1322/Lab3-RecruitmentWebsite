<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['degree'] = htmlspecialchars($_POST['degree']);
    $_SESSION['field'] = htmlspecialchars($_POST['field']);
    $_SESSION['institution'] = htmlspecialchars($_POST['institution']);
    $_SESSION['graduation'] = htmlspecialchars($_POST['graduation']);
    
    header('Location: job_application_step3.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Step 2: Educational Background</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 50%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }
        h1 {
            text-align: center;
        }
        label {
            font-weight: bold;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Step 2: Educational Background</h1>
    <form method="POST" action="job_application_step2.php">
        <label>Highest Degree:</label>
        <input type="text" name="degree" required><br>
        <label>Field of Study:</label>
        <input type="text" name="field" required><br>
        <label>Name of Institution:</label>
        <input type="text" name="institution" required><br>
        <label>Year of Graduation:</label>
        <input type="text" name="graduation" required><br>
        <input type="submit" value="Next">
    </form>
</body>
</html>
