<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'connection.php'; ?>
    <title>Update Form</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <section class="main-container">
        <h2>Update Form</h2>
        <?php
        $ids = $_GET['id'];
        $dataFtch = "Select * from register_user where id={$ids}";
        $query = mysqli_query($conn, $dataFtch);
        $data = mysqli_fetch_array($query);
        // echo '<pre>';echo var_dump($data);die();

        if (isset($_POST['submit'])) {
            $id = $_GET['id'];
            $studentId = $_POST['student_id'];
            $studentName = $_POST['student_name'];
            $email = $_POST['email'];
            $phoneNumber = $_POST['phone_number'];

            $updateQuery = "update  register_user set student_id='$studentId',student_name='$studentName', email='$email',phone_number='$phoneNumber' where id=$id ";
            // echo $insertQuery;
            $upQuery = mysqli_query($conn, $updateQuery);
            if ($upQuery) {
        ?>
                <script>
                    alert(' Data Updated SuccessFully');
                </script>
            <?php
            } else {
                // echo mysqli_error($iQuery);
            ?>
                <script>
                    alert('Data not Updated');
                </script>
        <?php
            }
        }
        ?>
        <form method="post">
            <input type="number" name="student_id" value="<?php echo $data['student_id'];  ?>" placeholder="Student Id" />
            <input type="text" name="student_name" value="<?php echo $data['student_name'];  ?>" placeholder="Full Name " />
            <input type="email" name="email" value="<?php echo $data['email'];  ?>" placeholder="Email " />
            <input type="number" name="phone_number" value="<?php echo $data['phone_number'];  ?>" placeholder="Phone Number " />
            <input type="submit" name="submit" value="Update" />
        </form>
    </section>



</body>

</html>