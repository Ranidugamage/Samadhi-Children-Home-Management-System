<?php

session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}

include("./sql.php");
include("./donationCount.php");

$year=2021;

if($_POST){
  if($_POST['year']){
    $year = $_POST['year'];
  }
}

$donationCount = getCountOfDonationsByMonth($year);

////////////////////////////////////////////////dashboard counts //////////////////////////////////////
$query = "SELECT SUM(cashAmount) AS totalCash FROM donationcashdetails;";

$result = mysqli_query($connection, $query);

$totalCashArray = mysqli_fetch_assoc($result);

$totalCash = $totalCashArray['totalCash'];


$queryForTotalChildCount = "SELECT COUNT(id) AS childCount FROM childdetails;";

$resultForTotalChildCount = mysqli_query($connection, $queryForTotalChildCount);

$totalChildCountArray = mysqli_fetch_assoc($resultForTotalChildCount);

$totalChild = $totalChildCountArray['childCount'];


$queryForTotalStaffCount = "SELECT COUNT(staffId) AS staffCount FROM staff;";

$resultForTotalStaffCount = mysqli_query($connection, $queryForTotalStaffCount);

$totalStaffCountArray = mysqli_fetch_assoc($resultForTotalStaffCount);

$totalStaff = $totalStaffCountArray['staffCount'];


$queryForTotalLaborCount = "SELECT COUNT(laborId) AS laborCount FROM labor;";

$resultForTotalLaborCount = mysqli_query($connection, $queryForTotalLaborCount);

$totalLaborCountArray = mysqli_fetch_assoc($resultForTotalLaborCount);

$totalLabor = $totalLaborCountArray['laborCount'];

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$queryForRecentDonations = "SELECT * FROM `donationcashdetails` ORDER BY date DESC";

$resultForRecentDonations = mysqli_query($connection, $queryForRecentDonations);

$recentDonationsArray = mysqli_fetch_all($resultForRecentDonations, MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="styles.css">
  <title>SAMADHI CHILDREN'S HOME</title>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark  pb-lg-2">
    <div class="container-fluid">
      <a class="navbar-brand ms-3 fs-3" href="home.php">SAMADHI</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-lg-none">
          <div class="accordion accordion-flush mt-4 mt-lg-0" id="accordionFlushExample">
            <div class="accordion-item border-0 ">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed bg-dark text-light" type="button" data-bs-toggle="collapse" aria-expanded="false">
                  <i class="fas fa-tachometer-alt pe-2"></i> OVERVIEW
                </button>
              </h2>
            </div>
            <div class="accordion-item  border-0">
              <h2 class="accordion-header " id="flush-headingOne">
                <button class="accordion-button collapsed bg-dark text-light" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                  <i class="fas fa-hand-holding-usd pe-2"></i>DONATIONS
                </button>
              </h2>
              <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body bg-dark text-light ps-5">ADD DONATION</div>
                <div class="accordion-body bg-dark text-light ps-5">VIEW DONATION</div>
              </div>
            </div>
            <div class="accordion-item  border-0">
              <h2 class="accordion-header " id="flush-headingTwo">
                <button class="accordion-button collapsed bg-dark text-light" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                  <i class="fas fa-child pe-2"></i>CHILD
                </button>
              </h2>
              <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body bg-dark text-light ps-5"><button>ADD CHILD</button></div>
                <a href="viewChild.php " class="text-decoration-none"><div class="accordion-body bg-dark text-light ps-5">View CHILD</div></a>
              </div>
            </div>
            <div class="accordion-item  border-0">
              <h2 class="accordion-header" id="flush-headingThree">
                <button class="accordion-button collapsed bg-dark text-light" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                  <i class="fas fa-user-friends pe-2"></i> STAFF
                </button>
              </h2>
              <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body bg-dark text-light ps-5">ADD STAFF</div>
                <div class="accordion-body bg-dark text-light ps-5">View STAFF</div>
              </div>
            </div>



            <div class="accordion-item  border-0">
              <h2 class="accordion-header" id="flush-headingFour">
                <button class="accordion-button collapsed bg-dark text-light" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseThree">
                  <i class="fas fa-male pe-2"></i>LABORS
                </button>
              </h2>
              <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body bg-dark text-light ps-5">ADD LABORS</div>
                <div class="accordion-body bg-dark text-light ps-5">VIEW LABORS</div>
                <div class="accordion-body bg-dark text-light ps-5">VIEW LABORS SALARY</div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed bg-dark text-light" type="button" data-bs-toggle="collapse" aria-expanded="false">
                <a class="text-decoration-none text-white" href="logout.php"><i class="fas fa-power-off pe-2"></i>LOGOUT</a>
                </button>
              </h2>
            </div>

          </div>
        </ul>
      </div>
    </div>

  </nav>

  <div class="d-flex h-90 w-100 " style="overflow:hidden;">
    <div class=" w-15 bg-dark d-none d-lg-block">

      <div class="accordion accordion-flush " id="accordionFlushExample">
        <div class="accordion-item border-0">
          <h2 class="accordion-header">
            <button onClick="location.href='./home.php'" class="accordion-button collapsed bg-dark text-light" type="button" data-bs-toggle="collapse" aria-expanded="false">
            <a class="text-decoration-none text-white" href="home.php"> <i class="fas fa-tachometer-alt pe-2"></i> OVERVIEW</a>
            </button>
          </h2>
        </div>
        <div class="accordion-item  border-0">
          <h2 class="accordion-header " id="flush-headingOne">
            <button class="accordion-button collapsed bg-dark text-light" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
              <i class="fas fa-hand-holding-usd pe-2"></i>DONATIONS
            </button>
          </h2>
          <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
          <a class="text-decoration-none" href="addDonation.php"><div class="accordion-body bg-dark text-light ps-5">ADD DONATION</div></a>
          <a class="text-decoration-none" href="viewDonations.php">  <div class="accordion-body bg-dark text-light ps-5">VIEW DONATION</div></a>
          </div>
        </div>
        <div class="accordion-item  border-0">
          <h2 class="accordion-header " id="flush-headingTwo">
            <button class="accordion-button collapsed bg-dark text-light" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
              <i class="fas fa-child pe-2"></i>CHILD
            </button>
          </h2>
          <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
            <a class="text-decoration-none" href="addchild.php"> <div class="accordion-body bg-dark text-light ps-5">ADD CHILD</div></a>
            <a href="viewChild.php " class="text-decoration-none"><div class="accordion-body bg-dark text-light ps-5">View CHILD</div></a>
          </div>
        </div>
        <div class="accordion-item  border-0">
          <h2 class="accordion-header" id="flush-headingThree">
            <button class="accordion-button collapsed bg-dark text-light" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
              <i class="fas fa-user-friends pe-2"></i> STAFF
            </button>
          </h2>
          <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
          <a href="addStaff.php" class="text-decoration-none"><div class="accordion-body bg-dark text-light ps-5">ADD STAFF</div></a>
            <a href="viewStaff.php" class="text-decoration-none"><div class="accordion-body bg-dark text-light ps-5">View STAFF</div></a>
          </div>
        </div>



        <div class="accordion-item  border-0">
          <h2 class="accordion-header" id="flush-headingFour">
            <button class="accordion-button collapsed bg-dark text-light" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseThree">
              <i class="fas fa-male pe-2"></i>LABORS
            </button>
          </h2>
          <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
            <a class="text-decoration-none" href="addLabor.php"><div class="accordion-body bg-dark text-light ps-5">ADD LABORS</div></a>
            <a class="text-decoration-none" href="viewLabor.php"><div class="accordion-body bg-dark text-light ps-5">VIEW LABORS</div></a>
          </div>
        </div>

        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed bg-dark text-light" type="button" data-bs-toggle="collapse" aria-expanded="false">
              <a class="text-decoration-none text-white" href="logout.php"><i class="fas fa-power-off pe-2"></i>LOGOUT</a>
            </button>
          </h2>
        </div>

      </div>


    </div>
    <div class=" w-85 bg-light " style="overflow-y: scroll;">

      <div class="container-fluid ">
        <div class="row mt-3 mx-1">
          <div class="col-6 col-md-4 col-lg-3  ">

            <div class="card m-2 m-lg-0">
              <div class="card-header text-center bg-danger fw-bold text-light">
                TOTAL DONATIONS
              </div>
              <div class="card-body">
                <div class="card-title display-6 text-center bg-text-muted">
                  Rs.<?php echo $totalCash ?>
                </div>
              </div>
              <div class="card-footer">
                <div class="card-text d-flex justify-content-end">
                  <a href="viewDonations.php" class="text-decoration-none text-danger"> see more <i class="bi bi-arrow-right-circle"></i></a>
                </div>
              </div>
            </div>

          </div>

          <div class="col-6 col-md-4 col-lg-3  ">
            <div class="card m-2 m-lg-0">
              <div class="card-header text-center bg-success fw-bold text-light">
                CHILDERN
              </div>
              <div class="card-body">
                <div class="card-title display-6 text-center">
                  <?php echo $totalChild ?>
                </div>
              </div>
              <div class="card-footer">
                <div class="card-text d-flex justify-content-end">
                  <a href="viewChild.php" class="text-decoration-none text-success text-success"> see more <i class="bi bi-arrow-right-circle"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-6 col-md-4 col-lg-3  ">
            <div class="card m-2 m-lg-0">
              <div class="card-header text-center bg-info fw-bold text-light">
                STAFF
              </div>
              <div class="card-body">
                <div class="card-title display-6 text-center">
                  <?php echo $totalStaff ?>
                </div>
              </div>
              <div class="card-footer">
                <div class="card-text d-flex justify-content-end">
                  <a href="viewStaff.php" class="text-decoration-none text-info"> see more <i class="bi bi-arrow-right-circle"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-6 col-md-4 col-lg-3   ">
            <div class="card m-2 m-lg-0">
              <div class="card-header text-center bg-warning fw-bold text-light">
                LABORS
              </div>
              <div class="card-body">
                <div class="card-title display-6 text-center">
                  <?php echo $totalLabor ?>
                </div>
              </div>
              <div class="card-footer">
                <div class="card-text d-flex justify-content-end">
                  <a href="viewLabor.php" class="text-decoration-none text-warning"> see more <i class="bi bi-arrow-right-circle"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="container-fluid">

        <div class="row  mt-lg-4 mx-1">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header text-center bg-success text-white fs-3 ">
                Recent Donations
              </div>

              <div class="card-body " style="overflow-x:auto;">
                <table class="table table-striped ">
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
                        <td><?php echo $recentDonation['donorName'] ?></td>
                        <td><?php echo $recentDonation['contact'] ?></td>
                        <td><?php echo $recentDonation['type'] ?></td>
                        <td><?php echo $recentDonation['cashAmount'] ?></td>
                        <td><?php echo $recentDonation['quantity'] ?></td>
                        <td><?php echo $recentDonation['itemDetails'] ?></td>
                        <td class="d-none d-lg-block"><?php echo $recentDonation['date'] ?></td>
                      </tr>
                      <?php if ($count == 5) : ?>
                        <?php break ?>
                      <?php endif ?>
                      <?php $count++ ?>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

        <div class="row pt-4 mx-1">
          <div class="col-12 mb-5">
            <div class="card">
              <div class="card-header text-center bg-primary text-white fs-3">
                <div class="row">
                  <div class="col-8">
                    Monthlywise Total Number of Donations
                  </div>
                  <div class="col-2">
                      
                  <form action="home.php" method="POST">
                    <select class="form-select mt-1 mb-1" aria-label="Default select example" id="selectedYear" onchange="this.form.submit()" name="year">
                      <option>Select Year</option>
                      <option <?php if($year == 2021) echo "selected "?>value="2021">2021</option>
                      <option <?php if($year == 2020) echo "selected "?>value="2020">2020</option>
                      <option <?php if($year == 2019) echo "selected "?>value="2019">2019</option>
                      <option <?php if($year == 2018) echo "selected "?>value="2018">2018</option>
                    </select>
                  </form>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <canvas id="myChart"></canvas>
              </div>
            </div>

          </div>
        </div>


      </div>



    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.0/dist/chart.min.js"></script>
  <script>
    
    

    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
        datasets: [{
          label: '# of Donations',
          data: [<?php echo $donationCount['january'] ?>, <?php echo $donationCount['february'] ?>, <?php echo $donationCount['march'] ?>, <?php echo $donationCount['april'] ?>, <?php echo $donationCount['may'] ?>, <?php echo $donationCount['june'] ?>, <?php echo $donationCount['july'] ?>, <?php echo $donationCount['august'] ?>, <?php echo $donationCount['september'] ?>, <?php echo $donationCount['october'] ?>, <?php echo $donationCount['november'] ?>, <?php echo $donationCount['december'] ?>],
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)'
          ],
          borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)',
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });

  </script>

  <!--Font Awesome-->
  <script src="https://kit.fontawesome.com/e55b8f3938.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

</body>

</html>