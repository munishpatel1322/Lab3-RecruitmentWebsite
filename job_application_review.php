<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

$currentStep = 4;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['logout'])) {
        header('Location: logout.php');
        exit;
    }

    $application = [
        'fullname' => $_SESSION['fullname'],
        'email' => $_SESSION['username'],
        'phone' => $_SESSION['phone'],
        'degree' => $_SESSION['degree'],
        'field' => $_SESSION['field'],
        'institution' => $_SESSION['institution'],
        'graduation' => $_SESSION['graduation'],
        'job_title' => $_SESSION['job_title'],
        'company' => $_SESSION['company'],
        'years_experience' => $_SESSION['years_experience'],
        'responsibilities' => $_SESSION['responsibilities'],
    ];
    
    $applications = json_decode(file_get_contents('applications.json'), true) ?? [];
    $applications[] = $application;
    file_put_contents('applications.json', json_encode($applications));

    // Clear session data after submission
    session_unset();
    session_destroy();
    
    echo "<h1>Application Submitted Successfully!</h1>";
    echo "<p>Thank you for your application.</p>";
    
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Review Your Application</title>
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
        p {
            margin: 10px 0;
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
    <div class="container">
        <h1>Review Your Application</h1>
        <div class="progress-indicator">
            <ul>
                <li class="<?php echo ($currentStep == 1) ? 'active' : ''; ?>">Step 1: Personal Info</li>
                <li class="<?php echo ($currentStep == 2) ? 'active' : ''; ?>">Step 2: Education</li>
                <li class="<?php echo ($currentStep == 3) ? 'active' : ''; ?>">Step 3: Work Experience</li>
                <li class="<?php echo ($currentStep == 4) ? 'active' : ''; ?>">Step 4: Review</li>
            </ul>
        </div>
        
        <h2>Your Information:</h2>
        <p><strong>Full Name:</strong> <?php echo htmlspecialchars($_SESSION['fullname']); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($_SESSION['username']); ?></p>
        <p><strong>Phone:</strong> <?php echo htmlspecialchars($_SESSION['phone']); ?></p>
        <p><strong>Highest Degree:</strong> <?php echo htmlspecialchars($_SESSION['degree']); ?></p>
        <p><strong>Field of Study:</strong> <?php echo htmlspecialchars($_SESSION['field']); ?></p>
        <p><strong>Name of Institution:</strong> <?php echo htmlspecialchars($_SESSION['institution']); ?></p>
        <p><strong>Year of Graduation:</strong> <?php echo htmlspecialchars($_SESSION['graduation']); ?></p>
        <p><strong>Previous Job Title:</strong> <?php echo htmlspecialchars($_SESSION['job_title']); ?></p>
        <p><strong>Company Name:</strong> <?php echo htmlspecialchars($_SESSION['company']); ?></p>
        <p><strong>Years of Experience:</strong> <?php echo htmlspecialchars($_SESSION['years_experience']); ?></p>
        <p><strong>Key Responsibilities:</strong> <?php echo htmlspecialchars($_SESSION['responsibilities']); ?></p>

        <form method="POST" action="job_application_review.php">
            <input type="submit" name="submit" value="Submit Application">
            <a href="job_application_step3.php"><button type="button">Edit Step 3</button></a>
            <a href="job_application_step2.php"><button type="button">Edit Step 2</button></a>
            <a href="job_application_step1.php"><button type="button">Edit Step 1</button></a>
            <input type="submit" name="logout" value="Logout">
        </form>
    </div>
</body>
</html>
