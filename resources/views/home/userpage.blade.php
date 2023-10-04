<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="home/css/style.css">
  
</head>

<body class="mainBody">
    

<!---Header Section-->
 @include('home.header')
<!------------------->
<!--Section containing list of items-->

<section>
        <div class="container">
            <div class="body">
                <h1>Choose Your Favourite Snacks!</h1>
            </div>
            <div class="list">
                <div class="itemsContainer">
                    <?php
                    //PHP code to fetch and display the products from DB
                    // Connect to the database
                    $conn = new mysqli("localhost", "root", "", "db_products");

                    // Checking connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Query to the database for products
                    //Selecting all the products from the database table products
                    $sql = "SELECT * FROM products";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Looping through the products to display them
                        while ($row = $result->fetch_assoc()) {
                            echo "<div class='items'>";
                            echo "<a href=''><img class='img' src='" . $row["target_file"] . "' alt='" . $row["product_name"] . "'></a>";
                            echo "<div class='itemName'><h2>" . $row["product_name"] . "<br> $" . $row["product_price"] . "</h2></div>";
                            echo "</div>";
                        }
                    } else {
                        // Display this message if no products found
                        echo "<div class='items'><div class='itemName'><h2>No products found</h2></div></div>";
                    }

                    $conn->close();
                    ?>
                </div>
            </div>
        </div>
    </section>
    
    <!--Section that will display added items to cart-->
    <div class="viewOrder">
        <h1>VIEW ORDER</h1>
    </div>

    
    <script src="scripts.js"></script>
</body>
</html>