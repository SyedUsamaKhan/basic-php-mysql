<?php include("process.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>

<header>
        <a href="display.php">Display Lists</a>
        <a href="add-edit-form.php">Add new user</a>        
    </header>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Lists</title>
    <?php

    $result ="select * from register_user";
    $query = mysqli_query($conn, $result);
    // $numRows =mysqli_num_rows($query);
    // echo $numRows;

    ?>
</head>

<body>
    <table>
        <thead>
            <th> Student ID</th>
            <th>Student Name</th>
            <th>Student Email</th>
            <th>Phone Number</th>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_array($query))  
            {
            ?>
            <tr>
                <td><?php echo $row['student_id']; ?></td>
                <td><?php echo $row['student_name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['phone_number']; ?></td>
                <td><a href="add-edit-form.php?action=edit&id=<?php echo $row['id']; ?>">Edit</a></td>
                <td><a href="display.php?action=delete&id=<?php echo $row['id']; ?>">Delete</a></td>
                <!-- <td>Delete</td> -->
            </tr>
            <?php } 
            ?>         
            <?php
                if(!empty($dataInsertSuccessfull)){
                    echo '<span>'. $dataInsertSuccessfull    .'</span>';
                }
            ?>
        </tbody>
    </table>
</body>

</html>