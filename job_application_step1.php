<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['fullname'] = htmlspecialchars($_POST['fullname']);
    $_SESSION['phone'] = htmlspecialchars($_POST['phone']);
    
    header('Location: job_application_step2.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Step 1: Personal Information</title>
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
        input[type="text"], input[type="email"] {
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
    <h1>Step 1: Personal Information</h1>
    <form method="POST" action="job_application_step1.php">
        <label>Full Name:</label>
        <input type="text" name="fullname" required><br>
        <label>Email:</label>
        <input type="email" name="email" value="<?php echo htmlspecialchars($_SESSION['email']); ?>" readonly><br>
        <label>Phone Number:</label>
        <input type="text" name="phone" required><br>
        <input type="submit" value="Next">
    </form>
</body>
</html>
