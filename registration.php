<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
</head>

<body>
    <?php
    include 'connection.php';
    if (isset($_POST['submit'])) {

        $studentId = $_POST['studentId'];
        $studentName = $_POST['studentName'];
        $studentEmail = $_POST['studentEmail'];
        $studentNumber = $_POST['studentNumber'];

        $inQuery = "insert into student_registration(student_id,student_name,student_email,phone_number)values('$studentId','$studentName','$studentEmail','$studentNumber')";
        $query = mysqli_query($conct, $inQuery);
        if ($query) {
            echo 'Data Insert Successfully';
        } else {

            echo "Error: " . $inQuery . "<br>" . mysqli_error($conct);
        }
    }

    ?>

    <section class="main-container">
        <form method="post">
            <input type="text" name="studentId" placeholder="Student Id" />
            <input type="text" name="studentName" placeholder="Full Name " />
            <input type="email" name="studentEmail" placeholder="Your Email" />
            <input type="number" name="studentNumber" placeholder="Your Phone Number" />
            <input type="submit" name="submit" value="submit">
        </form>
    </section>
</body>

</html>