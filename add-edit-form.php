<?php include("process.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <title>Registration Form</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>    
    <header>
        <a href="display.php">Display Lists</a>
        <a href="add-edit-form.php">Add new user</a>        
    </header>


    <section class="main-container">
        <h2>Registeration Form</h2>        
        <?php             
            if (  !empty($idErr) ||
                  !empty($nameErr) ||
                  !empty($emailErr) 
            ){
                echo '<span class="error">'.$idErr. $nameErr .$emailErr.'</span>';
            }

            if( empty($dataInsertSuccessfull) ){
                ?>          
                <form method="post" action="add-edit-form.php">
                    <input type="text" name="action" value="<?php echo $action; ?>" />    

                    <?php 
                        if( $action == 'update' ){
                            echo '<input type="text"  name="id" value="'.$id.'" />    ';
                        }
                    ?>


                        <br/><br/><br/><br/>

                    <input type="number" name="student_id" placeholder="Student Id" value="<?php echo $studentId;?>"/>
                    <input type="text" name="student_name" placeholder="Full Name " value="<?php echo $studentName;?>"/>
                    <input type="email" name="email" placeholder="Email " value="<?php echo $email;?>"/>
                    <input type="number" name="phoneNumber" placeholder="Phone Number " value="<?php echo $phoneNumber;?>"/>
                    <input type="submit" name="submit" value="<?php echo ucfirst($action);?>" />
                </form>
                <?php  
            }
            else {
                echo '<span class="successfull">'.$dataInsertSuccessfull.'</span>';
            }
        ?>
    </section>



</body>

</html>