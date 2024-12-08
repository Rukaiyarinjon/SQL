<?php
$db = mysqli_connect('localhost', 'root', '', 'company');
if (isset($_GET['updateid'])){
    $getid = $_GET['updateid'];
    $sql = "SELECT * FROM employee_data WHERE id=$getid";
    $query = mysqli_query($db, $sql);
    $data = mysqli_fetch_assoc($query);
    $id = $data['id'];
    $name = $data['name'];
    $email = $data['email'];
}

if (isset($_POST['edit'])){
    $db = mysqli_connect('localhost', 'root', '', 'company');
    $_id = $_POST['id'];
    $_name = $_POST['name'];
    $_email = $_POST['email'];

    $sql1 ="UPDATE employee_data SET name='$_name',
                                        email='$_email' where id =$_id ";
   if(mysqli_query($db , $sql1) == TRUE){
    header('location:dbconnection.php');
    echo "DATA update";
   }else{
    echo $sql1. "Data not update";

   }                                     

}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit</title>
</head>
<body>
    <form action="" method="POST">
        ID:<br>
       <input hidden type="text" name="id" value="<?php echo $id ?>" ><br><br>
         Name:<br>
        <input type ="text" name ="name" value="<?php echo $name ?>"><br><br>
        Email:<br>
        <input type ="text" name ="email" value="<?php echo $email ?>"><br><br>
        <button type="submit" name="edit" class="btn btn-success">submit edit</button>

    </form>
</body>
</html>