<?php
$db= mysqli_connect('localhost', 'root', '', 'industry');

if(isset($_POST['btnSubmit'])){
    $name = $_POST['nname'];
    $contact = $_POST['contact'];
    $db->query("call add_data('$name','$contact')");
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
    <form>
        <table>
            
            <tr>
                <td><label for="pname">Name</label></td>
                <td><input type="text" name="price"/></td>
            </tr>
            <tr>
                
            <td><label for="pro">Product</label></td>

            <td>
                <select name="pro" id="bran">
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
</body>
</html>
