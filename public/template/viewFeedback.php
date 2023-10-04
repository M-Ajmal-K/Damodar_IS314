<?php
// Connect to the database
$conn = new mysqli("localhost", "root", "", "db_feedback");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query the database for feedbacks
$sql = "SELECT * FROM tbl_feedback";
$result = $conn->query($sql);

$feedbacks = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $feedbacks[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Customer Feedbacks</title>
    <link rel="stylesheet" href="style.css">
    <style>
        table {
        
            margin-left: 350px;
            border-collapse: collapse;
            width: 50%;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        td {
            background-color: white;
        }
        th {
            background-color: white;
        }
        .heading{
            color: white;
            border: 2px solid white;
            background-color: #cd1d1d2b;
            margin-top: 130px;
            margin-left: 350px;
            padding: 10px;
            margin-right: 410px;
            text-align: center;
        }
    </style>
</head>
<body class="mainBody">
<header>
        <div class="menu">
            <div class="logo">
                <a href="/"><img src= "img/DC_Logo.png" alt="Logo"></a>
            </div>
            <nav id="nav">
                <ul>
                    <li><a href="AdminPage.html">Admin Dashboard</a></li>
                    <li><a href="ManageProducts.html">Manage Products</a></li>
                    <li><a class="active" href="viewFeedback.php">View Feedbacks</a></li>
                </ul>
                <div class="buttons">
                    <button id="logoutButton" class="btn_logout"><h3>Logout</h3></button>
                </div>
            </nav>
        </div>
    </header>

    <div class="heading"> <h2>Customer Feedbacks</h2></div>
    <br>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Message</th>
        </tr>
        <?php foreach ($feedbacks as $feedback): ?>
        <tr>
            <!--Table fetching all the data fields-->
            <td><?php echo $feedback['id']; ?>           </td>
            <td><?php echo $feedback['fldName']; ?>      </td>
            <td><?php echo $feedback['fldEmail']; ?>     </td>
            <td><?php echo $feedback['fldPhone']; ?>     </td>
            <td><?php echo $feedback['fldMessage']; ?>   </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
