<?php
$db = mysqli_connect('localhost', 'root', '', 'company');
if (isset($_POST["btn"])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $db->query("call manufecturer_m('$name','$address','$contact')");
    header("location:$_SERVER[PHP_SELF]");
}
if (isset($_POST['addproduct'])) {
    $nam = $_POST['p_name'];
    $price = $_POST['prp'];
    $p = $_POST['pro_b'];
    $db->query("call product_p('$nam','$price','$p')");
    header("location:$_SERVER[PHP_SELF]");
}
if (isset($_POST['delete'])) {
    $del = $_POST['del'];
    $db->query("delete from manufacturer where id=$del");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manufacturer</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f4f8;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .container {
            width: 40%;
            margin: 30px auto;
            padding: 20px;
            background-color: #008080;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        h2, h3 {
            text-align: center;
            color:#FFFFFF;
            font-size: 24px;
            margin-bottom: 20px;
        }

        form {
            margin-bottom: 30px;
            padding: 20px;
            background-color: #fafafa;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        form div {
            margin-bottom: 15px;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
            display: inline-block;
            color: #555;
        }

        input[type="text"], select, button {
            width: 100%;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
            font-size: 16px;
            background-color: #f9f9f9;
            transition: border 0.3s ease;
        }

        input[type="text"]:focus, select:focus {
            border-color: #4CAF50;
            outline: none;
        }

        button {
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
            cursor: pointer;
            border: none;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #45a049;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .table-container {
            margin-top: 30px;
        }

        .delete-form {
            margin-top: 20px;
            text-align: center;
        }

        .delete-form select {
            width: 50%;
        }

        /* Responsiveness */
        @media (max-width: 768px) {
            .container {
                width: 90%;
            }

            table, th, td {
                font-size: 14px;
            }

            button {
                font-size: 14px;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <!-- Brand -->
        <div class="form-container">
            <h2>menufecturer table</h2>
            <form action="" method="post">
                <div>
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" required>
                </div>
                <div>
                    <label for="address">Address:</label>
                    <input type="text" name="address" id="address" required>
                </div>
                <div>
                    <label for="contact">Contact No:</label>
                    <input type="text" name="contact" id="contact" required>
                </div>
                <button type="submit" name="btn">Submit</button>
            </form>
        </div>

        <!-- Product Form -->
        <div class="form-container">
            <h3>Product Form</h3>
            <form action="" method="post">
                <table>
                    <tr>
                        <td><label for="p_name">Product Name:</label></td>
                        <td><input type="text" name="p_name" required /></td>
                    </tr>
                    <tr>
                        <td><label for="prp">Price:</label></td>
                        <td><input type="text" name="prp" required /></td>
                    </tr>
                    <tr>
                        <td><label for="pro_b">Manufacturer:</label></td>
                        <td>
                            <select name="pro_b" id="bran" required>
                                <?php
                                $pro = $db->query("select * from manufacturer");
                                while (list($_mid, $_nname) = $pro->fetch_row()) {
                                    echo "<option value='$_mid'>$_nname</option>";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><button type="submit" name="addproduct">Submit</button></td>
                    </tr>
                </table>
            </form>
        </div>

        <!-- Delete brand -->
        <div class="delete-form">
            <form action="" method="post">
                <label for="del">Select menufecturer to Delete:</label>
                <select name="del" id="bran" required>
                    <?php
                    $pro = $db->query("select * from manufacturer");
                    while (list($_mid, $_nname) = $pro->fetch_row()) {
                        echo "<option value='$_mid'>$_nname</option>";
                    }
                    ?>
                </select>
                <button type="submit" name="delete">Delete</button>
            </form>
        </div>

        <!-- Product Details Table -->
        <div class="table-container">
            <h3>Product Details</h3>
            <table>
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Brand Name</th>
                        <th>Address</th>
                        <th>Contact</th>
                        <th>Product Name</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $counter = 1;
                    $user = $db->query("SELECT * FROM display_product");
                    while (list($name, $address, $contact, $p_name, $price) = $user->fetch_row()) {
                        $sl = $counter++;
                        echo "<tr>
                                <td>$sl</td>
                                <td>$name</td>
                                <td>$address</td>
                                <td>$contact</td>
                                <td>$p_name</td>
                                <td>$price</td>
                              </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- Conditional Data Table -->
        <div class="table-container">
            <h3>Conditional</h3>
            <table>
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Brand Name</th>
                        <th>Address</th>
                        <th>Contact</th>
                        <th>Product Name</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $counter = 1;
                    $user = $db->query("SELECT * FROM conditional");
                    while (list($name, $address, $contact, $p_name, $price) = $user->fetch_row()) {
                        $sl = $counter++;
                        echo "<tr>
                                <td>$sl</td>
                                <td>$name</td>
                                <td>$address</td>
                                <td>$contact</td>
                                <td>$p_name</td>
                                <td>$price</td>
                              </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>
