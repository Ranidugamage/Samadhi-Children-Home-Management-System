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


    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $fullName = mysqli_real_escape_string($connection, $_POST['fullName']);
    $birthday = mysqli_real_escape_string($connection, $_POST['birthDay']);
    $gender = mysqli_real_escape_string($connection, $_POST['Gender']);


    $sql = "INSERT INTO `childdetails`( `fullName`,`name`, `gender`, `birthdate`) VALUES ('$fullName','$name','$gender','$birthday')";

    $result = mysqli_query($connection, $sql);

    if ($result) {
        $_SESSION['success'] = 'Data Saved to Database';
        $isFailed = false;
        header("location: addchild.php");
        exit();
    } else {
        $isFailed = true;
    }
}





include("header.php");


?>

<div class="container-fluid">


    <div class="card mt-lg-5 mt-4 w-100">

        <div class="card-header text-success fw-3 h5">
            <i class="fas fa-child ps-2 "></i> ADD CHILD
        </div>
        <div class="card-body">
            <form class="row g-3 needs-validation" novalidate action="addchild.php" method="POST" id="myForm">
                <div class="col-md-6">
                    <label for="validationCustom01" class="form-label">Name with initials</label>
                    <input pattern="^(?![ .]+$)[a-zA-Z .]*" type="text" class="form-control" id="validationCustom01" required name="name">
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    <div class="invalid-feedback">
                        Please provide a valid Name.
                    </div>
                </div>
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
                    <label for="validationCustom03" class="form-label">Birthday</label>
                    <input type="date" class="form-control" id="validationCustom03" required name="birthDay">
                    <div class="invalid-feedback">
                        Please provide a bithday.
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="validationCustom03" class="form-label">Image</label>
                    <input type="file" class="form-control" id="validationCustom04" required name="image">
                    <div class="invalid-feedback">
                        Please provide a image.
                    </div>
                </div>

                <div class="col-md-6 ">
                    <label class="form-label">Gender</label>
                    <div class="d-flex align-items-center border p-1 rounded">
                        <div class="form-check px-4">
                            <input class="form-check-input" checked type="radio" name="Gender" value="male" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Male
                            </label>
                        </div>
                        <div class="form-check px-4">
                            <input class="form-check-input" type="radio" name="Gender" value="female" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Female
                            </label>
                        </div>
                        <div class="form-check px-4">
                            <input class="form-check-input" type="radio" name="Gender" value="other" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Other
                            </label>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <button class="btn btn-primary px-5 mt-3" name="submit" type="submit">Add Child</button>
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


</script>

<?php include("footer.php"); ?>