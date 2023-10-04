<!DOCTYPE html>
<html>
<head>
    <title>User List</title>
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
        <h2>User List</h2>
    </div>
    <br>
    <table>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <thstyle="width: 100px;">      </th>
        </tr>
        <?php
        // Connect to the database
        $conn = new mysqli("localhost", "root", "", "users");
        
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        // Query the database for products
        $sql = "SELECT * FROM user";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            // iterate through each row of the result 
            while ($row = $result->fetch_assoc()) {
                // add new table row for each product
                echo "<tr>";

                //output of product id in a table data cell
                echo "<td>" . $row["id"] . "</td>";
                
                //output of product name in a table data cell
                echo "<td>" . $row["first_name"] . "</td>";
                
                //output of product name in a table data cell
                echo "<td>" . $row["last_name"] . "</td>";
                
                //output of product price 
                echo "<td>" . $row["email"] . "</td>";
                
                // end table row 
                echo "</tr>";
            }
        } else {
            // display message if no products available
            echo "<tr><td colspan='4'>No users found</td></tr>";
        }
        
        $conn->close();
        ?>
    </table>
</body>
</html>