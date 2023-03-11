<!-- to connect with connection.php -->
<?php require('./connection.php');?> 

<!-- html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="form.php" method="get">
        Name: <input type="text" name="name"><br><br>
        Phone: <input type="text" name="phone"><br><br>
        address: <input type="text" name="address"><br><br>
        <input type="submit">
    </form>

    <!-- php code -->
    <?php
        if(isset($_GET["name"]) && isset($_GET["phone"]) && isset($_GET["address"])){
            $name = $_GET["name"];
            $phone = $_GET["phone"];
            $address = $_GET["address"];
            $id = rand(1, 100);
        
        // query insert into student_info with values
        $query = "INSERT INTO `student_info` VALUES('$name', '$phone', '$address', '$id');";

        echo "<br>";
        echo "<br>"; 

        if($connection->query($query) == true){
            //redirect to a file that fetches all data
            header('location:fetch.php');
        }
        else {
            echo $connection -> error;
        }
    }
    ?>
</body>
</html>