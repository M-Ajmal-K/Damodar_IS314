<?php
//Checking Request method if it is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Retrieving product details that was entered in the form
    $product_name = $_POST["product_name"];
    $product_price = $_POST["product_price"];
    
    //Fetch the name of the product image uploaded
    $product_image = $_FILES["product_image"]["name"];

    //This is the target Directory of the uploaded image 
    $target_directory = "img/";

    //Create full path for the target image
    $target_file = $target_directory . basename($product_image);
    
    // Connect to the database
    $conn = new mysqli("localhost", "root", "", "db_products");
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Moving uploaded image to target directory
    move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_file);
    
    // Insert product data into the database
    $sql = "INSERT INTO products (product_name, target_file, product_price) VALUES ('$product_name', '$target_file', '$product_price')";
    
    //Checking if query execution was succesful
    if ($conn->query($sql) === TRUE) {
        //if successful query execution
        //Redirect to page with Succesful Message
        header("Location: ProductSuccessful.html");
    } else {
        //if query fails, display error message
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    // DB connection closed
    $conn->close();
}
?>
