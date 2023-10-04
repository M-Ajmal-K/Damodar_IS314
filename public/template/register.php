<?php

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Retrieve inputs from the form
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    //Password is hashed using bcrypt
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    // Connect to the database
    $conn = new mysqli('localhost', 'root', '', 'users'); 

    // Checking connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the user already exists
    $check_sql = "SELECT * FROM user WHERE email = ?";
    $stmt = $conn->prepare($check_sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "User with this email already exists. Please choose a different email. <a href='register.html'>Go back</a>";
    } else {
        // Inserting user data into the database
        $insert_sql = "INSERT INTO user (first_name, last_name, email, phone, password) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($insert_sql);
        $stmt->bind_param("sssss", $first_name, $last_name, $email, $phone, $password);
        
        //execute the inserted query
        if ($stmt->execute()) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $stmt->error;
        }
    }

    $stmt->close();
    $conn->close();
}
?>

