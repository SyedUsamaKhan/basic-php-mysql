<?php include 'connection.php'; 
    function deleteId($id){
        
        global $conn, $dataInsertSuccessfull, $idErr;

        $deleteQuery = "delete  from register_user where id=$id ";
        $query = mysqli_query($conn, $deleteQuery);
        if ($query) {
            $dataInsertSuccessfull = 'Data Deleted SuccessFully';            
        } else {
            $idErr = "Error: " . $query . "<br>" . mysqli_error($conn); 
        }
    }

    // Declaring Variable For input fields and errors

    
    // For input Fields    
    $id = 0;
    $studentId = "";
    $studentName = "";    
    $email = "";
    $phoneNumber = "";
    
    // For Errors
    $idErr ="";
    $nameErr = "";
    $emailErr ="";
    $selectData ="";
    $confirm = "";

    $dataInsertSuccessfull ="";    

    // echo "<pre>"; print_r($_REQUEST); die();

    $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : "";
    
    if ($action == "add") {
        $student_id = isset($_POST['student_id']) ? $_POST['student_id'] : "";//ternery conidtion(one line condition for if else)
        $student_name = isset($_POST['student_name']) ? $_POST['student_name'] : "";
        $email = isset($_POST['email']) ? $_POST['email'] : "";
        $phoneNumber = isset($_POST['phoneNumber']) ? $_POST['phoneNumber'] : "";
        
        

        // $studentId = $student_id;
        if (empty($student_id)) {
            $idErr = "* Id". " Field Is Required" . "<br>";
        } else {
            $studentId = test_input( $student_id);
        }
        

        if (empty($student_name)) {
            $nameErr = "* Name ".  "Field Is Required". "<br>" ;
        } else {
            $studentName = $student_name;
        }
        
        // $studentName = $student_name;
        // $email = $email;
        if (empty($email)) {
            $emailErr ="* Email ". "Field Is Required" ."<br>" ;
        } else {
            $email = $email;
        }
        

        // Insert Data Start  When error empty 
        if (
            empty($idErr) &&
            empty($nameErr) &&
            empty($emailErr)
        ) {
            // insert query
            $insertQuery = "Insert Into  register_user(student_id,student_name,email,phone_number)Values('$studentId','$studentName','$email','$phoneNumber')";
            // echo $insertQuery;
            $iQuery = mysqli_query($conn, $insertQuery);
            if ($iQuery) {
                $dataInsertSuccessfull = "Data Inserted Successfully";
            } else {
                $idErr = "Error: " . $iQuery . "<br>" . mysqli_error($conn);                
            }
        }
        // Insert Data End  When error empty 

    }
    else if( $action == "edit"){        
        $id = $_GET['id'];        
        $dataFtch = "Select * from register_user where id={$id}";
        $query = mysqli_query($conn, $dataFtch);
        $data = mysqli_fetch_array($query);
        // echo '<pre>';echo var_dump($data);die();
        if( isset($data['id']) ){
            $studentId = $data['student_id'];
            $studentName = $data['student_name'];
            $email = $data['email'];
            $phoneNumber = $data['phone_number'];
        }

        $action = "update";
    }
    else if( $action == "update"){
        $id = isset($_POST['id']) ? $_POST['id'] : 0;
        $student_id = isset($_POST['student_id']) ? $_POST['student_id'] : "";
        $student_name = isset($_POST['student_name']) ? $_POST['student_name'] : "";
        $email = isset($_POST['email']) ? $_POST['email'] : "";
        $phoneNumber = isset($_POST['phoneNumber']) ? $_POST['phoneNumber'] : "";

        $updateQuery = "update  register_user set student_id='$student_id',student_name='$student_name', email='$email',phone_number='$phoneNumber' where id=$id ";
        // echo $updateQuery; die();
        $upQuery = mysqli_query($conn, $updateQuery);
        if ($upQuery) {
            $dataInsertSuccessfull = 'Data Updated SuccessFully';            
        } else {
            $idErr = "Error: " . $upQuery . "<br>" . mysqli_error($conn); 
        }
    }
    else if( $action == "delete" ){
        $id = $_GET['id'];

        $selectData = "select *  from  register_user where id ={$id} ";
        $query = mysqli_query($conn,$selectData);
        $slctquery = mysqli_fetch_array($query);
        if(strpos($slctquery['student_name'], "admin" ) !== false ){
            $confirm1MsgBeforeDelete = "display.php?action=delete2&id=". $slctquery['id'];
        }
        else{
            deleteId($id);
        }
    }
    else if ($action =="delete2"){
        $id = $_GET['id'];
        deleteId($id);   
    }
    else{
        $action = "add";
    }
    ?>