<?php

session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}

include("sql.php");

$isAdded = false;
$isFailed = false;
if (!empty($_SESSION['success'])) {
    $isAdded = true;
    unset($_SESSION['success']);
}


if (isset($_POST['submit'])) {


    
    $fullName = mysqli_real_escape_string($connection, $_POST['fullName']);
    $contactNo = mysqli_real_escape_string($connection, $_POST['contactNo']);
    $address = mysqli_real_escape_string($connection, $_POST['address']);
    $birthDay = mysqli_real_escape_string($connection, $_POST['birthDay']);
    $NIC = mysqli_real_escape_string($connection, $_POST['NIC']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $post = mysqli_real_escape_string($connection, $_POST['post']);
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $queryForStaffAdd = "INSERT INTO `staff`(`Name`, `ContactNo`, `Address`,`birthDay`, `NIC`, `email`, `post`, `username`, `password`) VALUES ('$fullName','$contactNo','$address','$birthDay','$NIC','$email','$post','$username','$password')";

    $resultForStaff = mysqli_query($connection, $queryForStaffAdd);

    if ($resultForStaff) {
        $_SESSION['success'] = 'Data Saved to Database';
        $isFailed = false;
        header("location: addStaff.php");
        exit();
    } else {
        $isFailed = true;
    }
}





include("header.php");


?>

<div class="container-fluid">


    <div class="card mt-lg-5 mt-4 w-100">

        <div class="card-header text-danger fw-3 h5">
            <i class="fas fa-user-friends ps-2"></i> ADD STAFF MEMBER
        </div>
        <div class="card-body">
            <form class="row g-3 needs-validation" novalidate action="addStaff.php" method="POST" id="myForm">
                
                <div class="col-md-6">
                    <label for="validationCustom02" class="form-label">Full name</label>
                    <input pattern="^(?![ .]+$)[a-zA-Z .]*" type="text" class="form-control" id="validationCustom02" required name="fullName">
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    <div class="invalid-feedback">
                        Please provide a valid Full Name.
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="validationCustom03" class="form-label">Contact No:</label>
                    <input pattern="[0-9]{10}" type="tel" class="form-control" id="validationCustom03" required name="contactNo">
                    <div class="invalid-feedback">
                        Please provide a contact number.
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="validationCustom03" class="form-label">Address</label>
                    <input pattern="^(?![ .]+$)[a-zA-Z .,]*" type="text" class="form-control" id="validationCustom04" required name="address">
                    <div class="invalid-feedback">
                        Please provide a address.
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="validationCustom04" class="form-label">NIC</label>
                    <input pattern="([0-9]{9}[x|X|v|V]|[0-9]{12})" type="text" class="form-control" id="validationCustom05" required name="NIC">
                    <div class="invalid-feedback">
                        Please provide a valid NIC.
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="validationCustom05" class="form-label">Birthday</label>
                    <input type="date" class="form-control" id="validationCustom06" required name="birthDay">
                    <div class="invalid-feedback">
                        Please provide a birthday.
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="validationCustom06" class="form-label">Email</label>
                    <input type="email" class="form-control" id="validationCustom07" required name="email">
                    <div class="invalid-feedback">
                        Please provide a vaild email.
                    </div>
                </div>


                <div class="col-md-6">
                    <label for="validationCustom01" class="form-label">Username</label>
                    <input readonly type="text" class="form-control" id="validationCustom08" required name="username">
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    <div class="invalid-feedback">
                        Please provide a valid Username.
                    </div>
                </div>


                <div class="col-md-6">
                    <label for="validationCustom01" class="form-label">Password</label>
                    <input pattern="^(?![ .]+$)[a-zA-Z .,]{8,15}" type="text" class="form-control" id="validationCustom09" required name="password">
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    <div class="invalid-feedback">
                        Password should include 8-15 charactors.Both numbers and letters are valid.
                    </div>
                </div>


                <div class="col-md-6">
                    <label for="validationCustom05" class="form-label">Post</label>
                    <select class="form-select" aria-label="Default select example" name="post">
                        <option selected value="Admin">Admin</option>
                        <option value="Principal">Principal</option>
                        <option value="Matron">Matron</option>
                    </select>
                    <div class="invalid-feedback">
                        Please provide a post.
                    </div>
                </div>


                <div class="col-12">
                    <button class="btn btn-primary px-5 mt-3" name="submit" type="submit">Add Staff</button>
                </div>

                <?php if ($isAdded) : ?>
                    <div class="card-text mb-0">
                        <div class="alert alert-success alert-dismissible" role="alert" id="liveAlert">
                            <strong>Added!</strong> Successfully added the data.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                <?php elseif ($isFailed) : ?>
                    <div class="card-text mb-0">
                        <div class="alert alert-danger alert-dismissible" role="alert" id="liveAlert">
                            <strong>Error!</strong> Cannot add the data.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>

                <?php endif ?>
            </form>
        </div>
    </div>





</div>

<script>
    (function() {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()



    document.getElementById("validationCustom07").addEventListener("keyup",()=>{

        document.getElementById("validationCustom08").value = document.getElementById("validationCustom07").value;

    });




</script>

<?php include("footer.php"); ?>