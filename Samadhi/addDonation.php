<?php

include("sql.php");

$isAdded = false;
$isFailed = false;
session_start();
if (!empty($_SESSION['success'])) {
    $isAdded = true;
    unset($_SESSION['success']);
}


if (isset($_POST['submit'])) {

    $quantity;
    $amount;
    $details;

    if(isset($_POST['quantity'])){
        $quantity = mysqli_real_escape_string($connection, $_POST['quantity']);
    }else{
        $quantity=0;
    }

    if(isset($_POST['amount'])){
        $amount = mysqli_real_escape_string($connection, $_POST['amount']);   
    }else{
        $amount=0;
    }

    if(isset($_POST['details'])){
        $details = mysqli_real_escape_string($connection, $_POST['details']);
    }else{
        $details="nothing";
    }
    
      
   


    $fullName = mysqli_real_escape_string($connection, $_POST['fullName']);
    $contact = mysqli_real_escape_string($connection, $_POST['contactNo']);
    $type = mysqli_real_escape_string($connection, $_POST['type']);
    $address = mysqli_real_escape_string($connection, $_POST['address']);
    $date = date("Y-m-d")." ".date("h:i:s");

    $sql = "INSERT INTO `donationcashdetails`( `cashAmount`, `date`, `donorName`, `type`, `contact`, `address`, `quantity`, `itemDetails`) VALUES ('$amount','$date','$fullName','$type','$contact','$address','$quantity','$details')";

    $result = mysqli_query($connection, $sql);

    if ($result) {
        $_SESSION['success'] = 'Data Saved to Database';
        $isFailed = false;
        header("location: addDonation.php");
        exit();
    } else {
        $isFailed = true;
    }
}





include("header.php");


?>

<div class="container-fluid">


    <div class="card mt-lg-5 mt-4 w-100 mb-5">

        <div class="card-header text-secondary fw-3 h5">
        <i class="fas fa-male ps-2"></i> ADD DONATION
        </div>
        <div class="card-body">
            <form class="row g-3 needs-validation" novalidate action="addDonation.php" method="POST" id="myForm">
               
                <div class="col-md-6">
                    <label for="validationCustom02" class="form-label">Full name</label>
                    <input pattern="^(?![ .]+$)[a-zA-Z .]*" type="text" class="form-control" id="validationCustom01" required name="fullName">
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    <div class="invalid-feedback">
                        Please provide a valid Full Name.
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="validationCustom03" class="form-label">Contact Number</label>
                    <input pattern="[0-9]{10}" type="tel" class="form-control" id="validationCustom02" required name="contactNo">
                    <div class="invalid-feedback">
                        Please provide a valid contact number.
                    </div>
                </div>

               


                <div class="col-md-6">
                    <label for="validationCustom03" class="form-label">Address</label>
                    <textarea pattern="^(?![ .]+$)[a-zA-Z .]*" class="form-control" id="exampleFormControlTextarea1" rows="1" required name="address"></textarea>
                    <div class="invalid-feedback">
                        Please provide a valid address.
                    </div>
                </div>


                <div class="col-md-6 ">
                    <label for="validationCustom03" class="form-label">Donation Type</label>
                    <select name="type" class="form-select" id="donationType">
                        <option selected value="cash">Cash</option>
                        <option value="item">Item</option>
                        <option value="both">Both</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="validationCustom03" class="form-label">Amount (Rs.)</label>
                    <input type="number" class="form-control" id="validationCustom03" required name="amount">
                    <div class="invalid-feedback">
                        Please provide a valid contact number.
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="validationCustom03" class="form-label">Quantity</label>
                    <input type="number" class="form-control" id="validationCustom04" required name="quantity">
                    <div class="invalid-feedback">
                        Please provide a valid contact number.
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="validationCustom03" class="form-label">Item Details</label>
                    <input pattern="^(?![ .]+$)[a-zA-Z .]*" type="text" class="form-control" id="validationCustom05" required name="details">
                    <div class="invalid-feedback">
                        Please provide a valid contact number.
                    </div>
                </div>

                <div class="col-12">
                    <button class="btn btn-primary px-5 mt-3" name="submit" type="submit">Add Donation</button>
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


   

    document.getElementById("validationCustom05").disabled = true; 
    document.getElementById("validationCustom04").disabled = true;
    document.getElementById("donationType").addEventListener("change",()=>{

        const amountInput = document.getElementById("validationCustom03");
        const quantityInput = document.getElementById("validationCustom04");
        const itemDetails = document.getElementById("validationCustom05");


        if(document.getElementById("donationType").value === "cash"){
            quantityInput.disabled = true; 
            itemDetails.disabled = true; 
            amountInput.disabled = false; 
        }else if(document.getElementById("donationType").value === "item"){
            amountInput.disabled = true; 
            quantityInput.disabled = false; 
            itemDetails.disabled = false; 
        }else if(document.getElementById("donationType").value === "both"){
            amountInput.disabled = false; 
            quantityInput.disabled = false; 
            itemDetails.disabled = false; 
        }
        
    });



</script>

<?php include("footer.php"); ?>