<?php

session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}


include("sql.php");
$queryForStaffdDetails = "SELECT * FROM `staff`";

$resultForStaff = mysqli_query($connection, $queryForStaffdDetails);

$staffArray = mysqli_fetch_all($resultForStaff, MYSQLI_ASSOC);


if (isset($_POST['submitID'])) {

    $id = $_POST['submitID'];
    $queryForStaffDetails = "DELETE FROM `staff` WHERE staffid = $id";

    $resultForStaffUpdate = mysqli_query($connection, $queryForStaffDetails);

    header("location: viewStaff.php");
    exit();
}


if (isset($_POST['updateStaff'])) {

    $id = mysqli_real_escape_string($connection, $_POST['staffIDUpdate']);
    $fullName = mysqli_real_escape_string($connection, $_POST['fullName']);
    $contactNo = mysqli_real_escape_string($connection, $_POST['contactNo']);
    $address = mysqli_real_escape_string($connection, $_POST['address']);
    $birthDay = mysqli_real_escape_string($connection, $_POST['birthDay']);
    $NIC = mysqli_real_escape_string($connection, $_POST['NIC']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $post = mysqli_real_escape_string($connection, $_POST['post']);
    $queryForStaffUpdate = "UPDATE `staff` SET `Name`='$fullName',`ContactNo`='$contactNo',`Address`='$address',`birthDay`='$birthDay',`NIC`='$NIC',`gender`='$gender',`email`='$email',`post`='$post' WHERE `staffid`= $id";

    $resultForStaff = mysqli_query($connection, $queryForStaffUpdate);
    header("location: viewStaff.php");
    exit();
}




include("header.php");
?>

<div class="container-fluid mt-3 lg-mt-0">
    <div class="row  mt-lg-4 mx-1">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-center bg-info text-muted fs-3 ">
                    STAFF DETAILS
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-striped" id="myTable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Staff ID</th>
                                <th scope="col">Full Name</th>
                                <th scope="col">NIC</th>
                                <th scope="col">Contact No:</th>
                                <th scope="col">Birthday</th>
                                <th scope="col">Address</th>
                                <th scope="col">Email</th>
                                <th scope="col">Post</th>
                                <th scope="col" class="">Delete</th>
                                <th scope="col" class="">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count = 1 ?>
                            <?php foreach ($staffArray as $staff) : ?>
                                <tr onclick="myFunction(this)" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <th scope="row"><?php echo $count ?></th>
                                    <td><?php echo $staff['staffid'] ?></td>
                                    <td><?php echo $staff['Name'] ?></td>
                                    <td><?php echo $staff['NIC'] ?></td>
                                    <td><?php echo $staff['ContactNo'] ?></td>
                                    <td><?php echo $staff['birthDay'] ?></td>
                                    <td><?php echo $staff['Address'] ?></td>
                                    <td><?php echo $staff['email'] ?></td>
                                    <td><?php echo $staff['post'] ?></td>
                                    <form action="viewStaff.php" method="POST">
                                        <td class="text-danger"><button name="submitID" value="<?php echo $staff['staffid'] ?>" type="submit" class="btn text-danger"><i class="bi bi-archive"></i></button></td>

                                    </form>
                                    <td><i class="bi bi-pen-fill text-primary"></i></td>
                                </tr>
                                <?php $count++ ?>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Update Staff Member</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3 needs-validation" novalidate action="viewStaff.php" method="POST" id="myForm">
                    <div class="col-md-6">
                        <label for="validationCustom01" class="form-label">Staff ID</label>
                        <input  readonly class="form-control-plaintext" type="text" class="form-control" id="validationCustom01" required name="staffIDUpdate">
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Please provide a valid Name.
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom02" class="form-label">Full name</label>
                        <input type="text" class="form-control" id="validationCustom02" required name="fullName">
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Please provide a valid Full Name.
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="validationCustom03" class="form-label">Contact No:</label>
                        <input type="tel" class="form-control" id="validationCustom03" required name="contactNo">
                        <div class="invalid-feedback">
                            Please provide a contact number.
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="validationCustom03" class="form-label">Address</label>
                        <input type="text" class="form-control" id="validationCustom04" required name="address">
                        <div class="invalid-feedback">
                            Please provide a address.
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="validationCustom04" class="form-label">NIC</label>
                        <input type="text" class="form-control" id="validationCustom05" required name="NIC">
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
                        <button class="btn btn-primary px-5 mt-3" name="updateStaff" type="submit">Update Staff</button>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>


<script>
    let selectedStaffDetails = [];

    var exampleModal = document.getElementById('exampleModal')
    exampleModal.addEventListener('show.bs.modal', function(event) {
        // Button that triggered the modal
        var button = event.relatedTarget

    });


    function GetCellValues(rowNumber) {
        var table = document.getElementById('myTable');

        for (var c = 0, m = table.rows[rowNumber].cells.length; c < m; c++) {
            selectedStaffDetails.push((table.rows[rowNumber].cells[c].innerHTML));
        }

        console.log(selectedStaffDetails);
        document.getElementById("validationCustom01").value = selectedStaffDetails[1];
        document.getElementById("validationCustom02").value = selectedStaffDetails[2];
        document.getElementById("validationCustom03").value = selectedStaffDetails[4];
        document.getElementById("validationCustom04").value = selectedStaffDetails[6];
        document.getElementById("validationCustom05").value = selectedStaffDetails[3];
        document.getElementById("validationCustom06").value = selectedStaffDetails[5];
        document.getElementById("validationCustom07").value = selectedStaffDetails[7];
    }





    function myFunction(x) {
        selectedStaffDetails.splice(0, selectedStaffDetails.length)
        GetCellValues(x.rowIndex);
    }

    // Example starter JavaScript for disabling form submissions if there are invalid fields
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




<?php
include("footer.php");
?>