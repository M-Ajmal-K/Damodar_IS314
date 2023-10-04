<?php
//check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //get the email and password from the form
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Connect to the database
    $conn = new mysqli("localhost", "root", "", "users");

    // Check connection
    if ($conn->connect_error) {
        //display this if connection failed
        die("Connection failed: " . $conn->connect_error);
    }

    // Use prepared statement to prevent SQL injection
    //defense mechanism against SQL injection by separating SQL code from the user input
    $stmt = $conn->prepare("SELECT * FROM user WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $stored_password = $row["password"];
        if (password_verify($password, $stored_password)) {
            session_start();
            $_SESSION['user_email'] = $email;
            header("Location: home.php");
            exit();
        } else {
            //display error message for invalid password
            echo "Invalid password. <a href='login.html'>Go back</a>";
        }
    } else {
        //display error message for unregistered user
        echo "User not registered. <a href='login.html'>Go back</a>";
    }

    //close DB connection and prepared statement
    $stmt->close();
    $conn->close();
}
?>

