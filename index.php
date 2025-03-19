<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = htmlspecialchars($_POST['fname']);
    $lname = htmlspecialchars($_POST['lname']);
    $email = htmlspecialchars($_POST['email']);
    $mobile = htmlspecialchars($_POST['mobile']);
    $dob = htmlspecialchars($_POST['dob']);
    $passport = htmlspecialchars($_POST['passport']);
    $country = htmlspecialchars($_POST['country']);

    $visa_details = [
        "USA" => ["message" => "Visa required for most applicants.", "cost" => 150],
        "Canada" => ["message" => "Visa required unless you have an eTA.", "cost" => 100],
        "India" => ["message" => "Visa required before travel.", "cost" => 50],
        "UK" => ["message" => "Visa depends on the duration of stay.", "cost" => 120],
        "Australia" => ["message" => "eVisa available for eligible travelers.", "cost" => 130]
    ];

    if (array_key_exists($country, $visa_details)) {
        $visa_message = $visa_details[$country]['message'];
        $visa_cost = $visa_details[$country]['cost'];
        $success_message = "Visa Successfully Processed!";
    } else {
        $visa_message = "Invalid country selection.";
        $visa_cost = 0;
        $success_message = "Visa Application Failed!";
    }

    echo "
    <html>
    <head>
        <title>Visa Application Result</title>
        <style>
            * {
                box-sizing: border-box;
                font-family: Arial, sans-serif;
            }
            body {
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
                background: #e3f2fd; /* Light blue background */
                padding: 20px;
            }
            .container {
                background: white;
                max-width: 500px;
                width: 100%;
                padding: 25px;
                border-radius: 12px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
                text-align: center;
            }
            .result-box {
                background: #f8f9fa;
                padding: 15px;
                border-radius: 8px;
                margin-top: 15px;
            }
            .success-message {
                font-size: 18px;
                font-weight: bold;
                color: green;
                margin-top: 10px;
            }
            .error-message {
                font-size: 18px;
                font-weight: bold;
                color: red;
                margin-top: 10px;
            }
            .back-button {
                display: inline-block;
                margin-top: 15px;
                padding: 10px 20px;
                background: #007BFF;
                color: white;
                text-decoration: none;
                border-radius: 5px;
            }
            .back-button:hover {
                background: #0056b3;
            }
        </style>
    </head>
    <body>
        <div class='container'>
            <h2>Visa Application Status</h2>
            <div class='result-box'>
                <p><strong>Name:</strong> $fname $lname</p>
                <p><strong>Email:</strong> $email</p>
                <p><strong>Mobile:</strong> $mobile</p>
                <p><strong>Date of Birth:</strong> $dob</p>
                <p><strong>Passport Number:</strong> $passport</p>
                <p><strong>Country Selected:</strong> $country</p>
                <p><strong>Visa Requirement:</strong> $visa_message</p>
                <p><strong>Visa Cost:</strong> $$visa_cost</p>
                <p class='".($visa_cost > 0 ? "success-message" : "error-message")."'>$success_message</p>
            </div>
            <a href='index.html' class='back-button'>Back to Form</a>
        </div>
    </body>
    </html>";
}
?>
