<?php require('./connection.php');
if(isset($_GET["id"])){
$id = $_GET["id"];

$query = "SELECT * FROM `student_info` where id = '$id' limit 1";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_array($result);
}
?>
<form action="update.php" method="post">
    <input type="text" name="id" value="<?php echo $id?>"hidden>
        Name: <input type="text"  name = "name" ><br><br>
        Phone: <input type="text" name="phone"><br><br>
        address: <input type="text" name="address"><br><br>
        <button>Update</button>
    </form>
<?PHP
    if(isset($_POST["id"]) &&isset($_POST["name"]) && isset($_POST["phone"]) && isset($_POST["address"])){
        $id = $_POST['id'];
        $name = $_POST["name"];
        $phone = $_POST["phone"];
        $address = $_POST["address"];

        $query = "UPDATE student_info SET name = '$name', phone = '$phone', address = '$address' WHERE id = '$id';";
        if($connection->query($query) == true){
            //redirect to a file that fetches all data
            header('location:fetch.php');
        }
        else {
            echo $connection -> error;
        }
    }?>