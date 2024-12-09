<?php
$db = mysqli_connect('localhost', 'root', '', 'company');

if (isset($_GET['deleteid'])) {
    $delete_Id = $_GET['deleteid'];
    
    $sql = "DELETE FROM employee_data WHERE id = $delete_Id";
    if (mysqli_query($db, $sql) == TRUE) {
        header('location:dbconnection.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Table</title>
    <style> 
         body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            padding: 20px;
            margin: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        table th {
            background-color: #4CAF50;
            color: white;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        table tr:hover {
            background-color: #ddd;
        }

        h1 {
            text-align: center;
            color: #333;
        }

         a {
            text-decoration: none;
            color: red;
        }

        a:hover {
            color: darkred;
        } 
    </style> 
</head>
<body>

<h1>Employee Data</h1>

<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Action</th>
        <th>update</th>
        
    </tr>

    <?php
    
    $db = mysqli_connect('localhost', 'root', '', 'company');
    $users = $db->query("SELECT * FROM employee_data");
    $counter=1;
    while ($row = $users->fetch_row()) {
        list($id, $name, $email) = $row;
        $id=  $counter++;
        echo "<tr>
                <td>$id</td>
                <td>$name</td>
                <td>$email</td>
                <td>
                    <a href='dbconnection.php?deleteid=$id'>Delete</a>
                </td>
                <td>
                    <a href='edit_update.php?updateid=$id'>Edit</a>
                </td>
              </tr>";
    }
    ?>
</table>

</body>
</html>
