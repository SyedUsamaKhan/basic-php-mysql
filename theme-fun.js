function onSubmit() {

    let name = document.forms['add-edit-form']['student_name'].value;
    let email = document.forms['add-edit-form']['email'].value;
    let number = document.forms['add-edit-form']['phoneNumber'].value;

    if (name == "") {
        document.getElementById('nameError').innerHTML = "Name Field Is Requiredd <br>";
    }
    if (email == "") {
        document.getElementById('emailError').innerHTML = "Email Field Is Requiredd <br>";
    }
    if (number == "") {
        document.getElementById('numError').innerHTML = "Phone Field Is Requiredd <br>";
    }
    return false;
}