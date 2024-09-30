<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['job_title'] = htmlspecialchars($_POST['job_title']);
    $_SESSION['company'] = htmlspecialchars($_POST['company']);
    $_SESSION['years_experience'] = htmlspecialchars($_POST['years_experience']);
    $_SESSION['responsibilities'] = htmlspecialchars($_POST['responsibilities']);
    
    header('Location: job_application_review.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Step 3: Work Experience</title>
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
    <h1>Step 3: Work Experience</h1>
    <form method="POST" action="job_application_step3.php">
        <label>Previous Job Title:</label>
        <input type="text" name="job_title" required><br>
        <label>Company Name:</label>
        <input type="text" name="company" required><br>
        <label>Years of Experience:</label>
        <input type="text" name="years_experience" required><br>
        <label>Key Responsibilities:</label>
        <input type="text" name="responsibilities" required><br>
        <input type="submit" value="Next">
    </form>
</body>
</html>
