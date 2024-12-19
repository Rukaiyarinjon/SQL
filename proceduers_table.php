<?php
$db= mysqli_connect('localhost', 'root', '', 'industry');

if(isset($_POST['btnSubmit'])){
    $name = $_POST['nname'];
    $contact = $_POST['contact'];
    $db->query("call brand_add('$name','$contact')");
}


if(isset($_POST['addproduct'])) {
    $nam=$_POST['p_name'];
    $price=$_POST['prp'];
    $br_name = $_POST['pro_b'];
    $db->query("call product_add('$nam','$br_name','$price')");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form</title>
</head>
<body>
    <h3>Brand Table</h3>
    <form action="" method="post">
        <table>
            <tr>
                <td><label for="nname">Name</label></td>
                <td><input type ="text" name="nname"/></td>
            </tr>

            <tr>
                <td><label for="contact">Contact</label></td>
                <td><input type="text" name="contact"/></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="btnSubmit" value="submit"/></td>
            </tr>
        </table>

    </form>

    <h3>product table</h3>
    <form action="" method="post">
        <table>
            
            <tr>
                <td><label for="pname">Name</label></td>
                <td><input type="text" name="p_name"/></td>
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
                    $pro = $db->query("select * from brand");
                    while(list($_mid,$_nname) = $pro->fetch_row()){
                        echo "<option value='$_mid'>$_nname</option>";
                    }                    
                    ?>
                  
                </select>
            </td>
        
            </tr>
            <tr>
                <td><input type="Submit" name="addproduct" value="Submit"/></td>
            </tr>
        </table>
    </form>
    <div class="table-container">
        <h3>product_details table</h3>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>contact</th>
                    <th>p_name</th>
                    <th>price</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $db= mysqli_connect('localhost', 'root', '', 'industry');

                
                if (!$db) {
                    die("Connection failed: " . mysqli_connect_error());
                } else {
                    $user = $db->query("SELECT * FROM products_details");
                    $counter = 1;
                    while (list($Name,$contact,$p_name,$price) = $user->fetch_row()) {
                        $sl=$counter++;
                        echo "<tr>
                            <td>$sl</td>
                            <td>$Name</td>
                            <td>$contact</td>
                            <td>$p_name</td>
                            <td>$price</td>
                        </tr>";
                       
                    }
                }
                
                ?>
            </tbody>
        </table>
        
        <!-- view -->

</body>
</html>
