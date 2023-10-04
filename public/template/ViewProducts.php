<!DOCTYPE html>
<html>
<head>
    <title>Products List</title>
    <link rel="stylesheet" href="style.css">
    <style>
        table {
            background-color: #ffffff6b;
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .heading{
            border: 2px solid;
            background: linear-gradient(90deg, rgb(36, 0, 0) 0%, rgb(121, 9, 9) 35%, rgb(175 38 38) 100%);
            margin-top: 30px;
            margin-left: 0px;
            margin-right: 0px;
            text-align: center;
            color: white;
        }    

    </style>
</head>
<body class="mainBody">
    <div class="heading">
        <h2>Products List</h2>
    </div>
    <br>
    <table>
        <tr>
            <th>ID</th>
            <th>Product Name</th>
            <th>Image</th>
            <th>Price</th>
            <thstyle="width: 100px;">      </th>
        </tr>
        <?php
        // Connect to the database
        $conn = new mysqli("localhost", "root", "", "db_products");
        
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        // Query the database for products
        $sql = "SELECT * FROM products";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            // iterate through each row of the result 
            while ($row = $result->fetch_assoc()) {
                // add new table row for each product
                echo "<tr>";

                //output of product id in a table data cell
                echo "<td>" . $row["product_id"] . "</td>";
                
                //output of product name in a table data cell
                echo "<td>" . $row["product_name"] . "</td>";
                
                //output of product image, width set to 100px
                echo "<td><img src='" . $row["target_file"] . "' width='100'></td>";
                
                //output of product price 
                echo "<td>$" . $row["product_price"] . "</td>";
                
                // end table row 
                echo "</tr>";
            }
        } else {
            // display message if no products available
            echo "<tr><td colspan='4'>No products found</td></tr>";
        }
        
        $conn->close();
        ?>
    </table>
</body>
</html>
