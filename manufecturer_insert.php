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
        $del=$_POST['del'];
        $db->query("delete from manufacturer where id=$del");
          
    }


    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>manufacturer</title>
    </head>

    <body>
        <div class="form-container">
            <h2>manufecturer</h2>
            <form action="" method="post">
                <div>
                    <label for="name">Name:</label><br>
                    <input type="text" name="name" id="name" required>
                </div>
                <div>
                    <label for="address">address:</label><br>
                    <input type="text" name="address" id="address" required>
                </div>
                <div>
                    <label for="contact">contact no:</label><br>
                    <input type="text" name="contact" id="contact" required>
                </div>
                <div>
                    <button type="submit" name="btn">Submit</button>
                </div>
            </form>

            <h3>product table</h3>
            <form action="" method="post">
                <table>

                    <tr>
                        <td><label for="pname">Name</label></td>
                        <td><input type="text" name="p_name" /></td>
                    </tr>
                    <tr>
                        <td><label for="">PRICE</label></td>
                        <td><input type="text" name="prp" id=""></td>
                    </tr>
                    <tr>

                        <td><label for="pro">Product</label></td>
                        <td>

                            <select name="pro_b" id="bran">
                                <?php
                                $pro = $db->query("select * from manufacturer ");
                                while (list($_mid, $_nname) = $pro->fetch_row()) {
                                    echo "<option value='$_mid'>$_nname</option>";
                                }
                                ?>

                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="Submit" name="addproduct" value="Submit" /></td>
                    </tr>
                </table>
            </form>

            <br>
         <!-- trigger -->
            <form action="" method="post">
                Brand
                <select name="del" id="bran">
                    <?php
                    $pro = $db->query("select * from manufacturer ");
                    while (list($_mid, $_nname) = $pro->fetch_row()) {
                        echo "<option value='$_mid'>$_nname</option>";
                    }
                    ?>

                </select>
                <input type="submit" value="Delete" name="delete">

            </form>
            <!-- view -->
            <div class="table-container">
                <h3>product_details table</h3>
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
                        $db = mysqli_connect('localhost', 'root', '', 'company');
                        if (!$db) {
                            die("Connection failed: " . mysqli_connect_error());
                        } else {
                            $counter = 1;
                            $user = $db->query("SELECT * FROM display_product");
                            
                            while (list($name, $address,$contact, $p_name, $price) = $user->fetch_row()) {
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
                        }

                        ?>
                    </tbody>
                </table>

            </div>


            <h1>view conditional data</h1>

            <div class="table-container">
                <h3>conditional_data table</h3>
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
                        $db = mysqli_connect('localhost', 'root', '', 'company');
                        if (!$db) {
                            die("Connection failed: " . mysqli_connect_error());
                        } else {
                            $counter = 1;
                            $user = $db->query("SELECT * FROM conditional_data");
                            
                            while (list($name, $address,$contact, $p_name, $price) = $user->fetch_row()) {
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
                        }

                        ?>
                    </tbody>
                </table>

            </div>
    </body>

    </html>