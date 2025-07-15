<?php

$servername = "localhost"; 
$username = "root";        
$password = "";            
$dbname = "contact_form";  


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])) {
    
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    
    if (!empty($name) && !empty($email) && !empty($message)) {
        
        $stmt = $conn->prepare("INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)");
        if ($stmt) {
            $stmt->bind_param("sss", $name, $email, $message);

    
            if ($stmt->execute()) {
                echo "Thank you! Your message has been sent.";
            } else {
                echo "Error: Unable to submit your message. Please try again later.";
            }

            
            $stmt->close();
        } else {
            echo "Error: Unable to prepare the statement.";
        }
    } else {
        echo "Please fill in all the fields.";
    }
} else {
    echo "Invalid form submission.";
}


$conn->close();
?>
