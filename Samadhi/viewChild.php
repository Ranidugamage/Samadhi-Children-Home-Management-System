<?php
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}


include("sql.php");
$queryForChildDetails = "SELECT * FROM `childdetails`";

$resultForChild = mysqli_query($connection, $queryForChildDetails);

$childArray = mysqli_fetch_all($resultForChild, MYSQLI_ASSOC);


if (isset($_POST['submitID'])) {

    $id = $_POST['submitID'];
    $queryForChildDetails = "DELETE FROM `childdetails` WHERE id = $id";

    $resultForChild = mysqli_query($connection, $queryForChildDetails);

    header("location: viewChild.php");
    exit();
}


if (isset($_POST['updateChild'])) {

    $id = mysqli_real_escape_string($connection, $_POST['childIDUpdate']);
    $image = mysqli_real_escape_string($connection, $_POST['image']);
    $fullName = mysqli_real_escape_string($connection, $_POST['fullName']);
    $birthday = mysqli_real_escape_string($connection, $_POST['birthDay']);
    $gender = mysqli_real_escape_string($connection, $_POST['Gender']);
    $queryForChildUpdate = "UPDATE `childdetails` SET `gender`='$gender',`birthdate`='$birthday',`fullName`='$fullName' WHERE  id = '$id'";

    $resultForChild = mysqli_query($connection, $queryForChildUpdate);
    echo print_r($resultForChild);
    header("location: viewChild.php");
    exit();
}




include("header.php");
?>

<div class="container-fluid mt-3 lg-mt-0">
    <div class="row  mt-lg-4 mx-1">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-center bg-success text-white fs-3 ">
                    CHILDERN DETAILS
                </div>

                <div class="card-body">
                    <table class="table table-striped" id="myTable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Child ID</th>
                                <th scope="col">Full Name</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Birthday</th>
                                <th scope="col" class="">Delete</th>
                                <th scope="col" class="">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count = 1 ?>
                            <?php foreach ($childArray as $child) : ?>
                                <tr onclick="myFunction(this)" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <th scope="row"><?php echo $count ?></th>
                                    <td><?php echo $child['id'] ?></td>
                                    <td><?php echo $child['fullName'] ?></td>
                                    <td><?php echo $child['gender'] ?></td>
                                    <td><?php echo $child['birthdate'] ?></td>
                                    <form action="viewChild.php" method="POST">
                                        <td class="text-danger"><button name="submitID" value="<?php echo $child['id'] ?>" type="submit" class="btn text-danger"><i class="bi bi-archive"></i></button></td>

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




<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Update Child</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3 needs-validation" novalidate action="viewChild.php" method="POST" id="myForm">
                    <div class="col-md-6">
                        <label  readonly class="form-control-plaintext" for="validationCustom01" class="form-label">Child ID</label>
                        <input type="text" class="form-control" id="validationCustom01" required name="childIDUpdate">
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

                    <div class="col-md-8 ">
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
                        <button class="btn btn-primary px-5 mt-3" name="updateChild" type="submit">Update Child</button>
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
    let selectedChildDetails = [];

    var exampleModal = document.getElementById('exampleModal')
    exampleModal.addEventListener('show.bs.modal', function(event) {
        // Button that triggered the modal
        var button = event.relatedTarget

    });


    function GetCellValues(rowNumber) {
        var table = document.getElementById('myTable');

        for (var c = 0, m = table.rows[rowNumber].cells.length; c < m; c++) {
            selectedChildDetails.push((table.rows[rowNumber].cells[c].innerHTML));
        }

        console.log(selectedChildDetails);
        document.getElementById("validationCustom01").value = selectedChildDetails[1];
        document.getElementById("validationCustom02").value = selectedChildDetails[2];
        document.getElementById("validationCustom03").value = selectedChildDetails[4];
    }





    function myFunction(x) {
        selectedChildDetails.splice(0, selectedChildDetails.length)
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