<?php 
include 'connection.php';

$id = $_GET['id'];
$deleteQuery = "delete  from register_user where id=$id ";
$query = mysqli_query($conn,    $deleteQuery);

?>