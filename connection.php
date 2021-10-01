<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbName = "students";

$conn = mysqli_connect($servername, $username, $password,$dbName);

if ($conn) {
?>
    <script>
        console.log('Connection Successfull');
    </script>
<?php
} else {
?>
    <script>
        console.log('Connection Error');
    </script>
<?php
}


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>