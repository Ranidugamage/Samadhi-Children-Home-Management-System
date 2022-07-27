<?php

session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}

include("header.php");
include("sql.php");

$queryForRecentDonations = "SELECT * FROM `donationcashdetails` ORDER BY date DESC";

$resultForRecentDonations = mysqli_query($connection, $queryForRecentDonations);

$recentDonationsArray = mysqli_fetch_all($resultForRecentDonations, MYSQLI_ASSOC);

?>

<div class="row  mt-lg-4 mx-1 mt-2">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header text-center bg-success text-white fs-3 ">
                <div class="row align-items-center">
                    <div class="col-5 col-lg-9">
                         Donations
                    </div>
                    <div class="col-7 col-lg-3">
                        <input class="form-control me-2" type="search" placeholder="Search" id="searchInput">
                    </div>
                </div>
            </div>

            <div class="card-body ">
                <table class="table table-striped " id="dataTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Donor Name</th>
                            <th scope="col">Contact Number</th>
                            <th scope="col">Donation Type</th>
                            <th scope="col">Cash Amount</th>
                            <th scope="col">Item Quantity</th>
                            <th scope="col">Item Details</th>
                            <th scope="col" class="d-none d-lg-block">Donation Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 1 ?>
                        <?php foreach ($recentDonationsArray as $recentDonation) : ?>
                            <tr>
                                <th scope="row"><?php echo $count ?></th>
                                <td class="text-uppercase"><?php echo $recentDonation['donorName'] ?></td>
                                <td class="text-uppercase"><?php echo $recentDonation['contact'] ?></td>
                                <td class="text-uppercase"><?php echo $recentDonation['type'] ?></td>
                                <td class="text-uppercase"><?php echo $recentDonation['cashAmount'] ?></td>
                                <td class="text-uppercase"><?php echo $recentDonation['quantity'] ?></td>
                                <td class="text-uppercase"><?php echo $recentDonation['itemDetails'] ?></td>
                                <td class="d-none d-lg-block text-uppercase"><?php echo $recentDonation['date'] ?></td>
                            </tr>

                            <?php $count++ ?>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    function filterTable() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("dataTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

    document.getElementById("searchInput").addEventListener("keyup",filterTable);
</script>


<?php include("footer.php"); ?>