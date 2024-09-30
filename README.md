# Lab3-RecruitmentWebsite

Task 1: User Authentication System
User Registration Form:

An HTML form collects the username, email, and password.
The password is hashed using password_hash() before being stored in users.json.
Login Form:

An HTML form collects the username and password.
The credentials are validated against the stored data in users.json.
If correct, a PHP session is initiated, and the user is redirected to the job application form.
Remember Me Feature Using Cookies:

A "Remember Me" checkbox is included in the login form.
If checked, the username is stored in a cookie that expires in 7 days.
The username field is pre-filled with the cookie value if it exists.
Task 2: Multi-step Job Application Form
Step 1: Personal Information Form:

The form collects personal information: Full Name, Email (pre-filled), and Phone Number.
Data is validated and sanitized, then stored in PHP sessions.
Step 2: Educational Background Form:

The form collects educational details: Degree, Field of Study, Institution, and Graduation Year.
Inputs are validated, sanitized, and stored in sessions.
Step 3: Work Experience Form:

The form collects work experience details: Job Title, Company, Years of Experience, and Responsibilities.
Inputs are validated and stored in sessions.
Navigation and Session Management:

"Previous" and "Next" buttons for navigation between steps.
Data is stored in sessions as the user navigates through steps.
Task 3: Review and Submit
Review Page:

A review page displays all collected information using session data.
Users can navigate back to any step to edit their information.
Final Submission:

On submission, the application is stored in applications.json.
A confirmation message is displayed (you can simulate the confirmation email as needed).
Task 4: Logout and Session Management
Logout Functionality:
A "Logout" button ends the session and redirects the user to the login page.
Any cookies set for the "Remember Me" feature are cleared on logout.
