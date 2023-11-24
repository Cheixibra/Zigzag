<?php
if(isset($_GET["id"])){
    $id = $_GET["id"];

    $servername= "localhost";
    $username = "root";
    $password ="root"; 
    $database="projet00_db";

    //Create connection
    $connection = new mysqli($servername, $username, $password, $database);

    $sql="DELETE FROM projet WHERE id=$id";
    $connection->query($sql);
}
 header("location: /crud/index.php");
 exit;
?>