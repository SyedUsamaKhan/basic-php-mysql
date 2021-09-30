<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'connection.php'; ?>
    <title>Registration Form</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>


    <?php

    if (isset($_POST['submit'])) {
        $studentId = $_POST['student_id'];
        $studentName = $_POST['student_name'];
        $email = $_POST['email'];
        $phoneNumber = $_POST['phone_number'];

        $insertQuery = "Insert Into  register_user(student_id,student_name,email,phone_number)Values('$studentId','$studentName','$email','$phoneNumber')";
        // echo $insertQuery;
        $iQuery = mysqli_query($conn, $insertQuery);
        if ($iQuery) {
    ?>
            <script>
                alert(' Data Inserted SuccessFully');
            </script>
        <?php
        } else {
            echo "Error: " . $iQuery . "<br>" . mysqli_error($conn);
        ?>
            <script>
                alert('Data Inserted Failed');
            </script>
    <?php
        }
    }

    ?>
    <section class="main-container">
        <h2>Registeration Form</h2>
        <form method="post">
            <input type="number" name="student_id" placeholder="Student Id" />
            <input type="text" name="student_name" placeholder="Full Name " />
            <input type="email" name="email" placeholder="Email " />
            <input type="number" name="phone_number" placeholder="Phone Number " />
            <input type="submit" name="submit" value="Register" />
        </form>
        <a href="display.php">Display Lists</a>
    </section>



</body>

</html>