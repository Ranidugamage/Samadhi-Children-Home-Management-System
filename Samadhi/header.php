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
              <h2 class="accordion-header" >
                <button class="accordion-button collapsed bg-dark text-light" type="button" data-bs-toggle="collapse" aria-expanded="false">
                <a class="text-decoration-none" href="home.php"> <i class="fas fa-tachometer-alt pe-2"></i> OVERVIEW</a>
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
              <a class="text-decoration-none" href="viewDonations.php"><div class="accordion-body bg-dark text-light ps-5">VIEW DONATION</div></a>
              </div>
            </div>
            <div class="accordion-item  border-0">
              <h2 class="accordion-header " id="flush-headingTwo">
                <button class="accordion-button collapsed bg-dark text-light" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                  <i class="fas fa-child pe-2"></i>CHILD
                </button>
              </h2>
              <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body bg-dark text-light ps-5">ADD CHILD</div>
                <div class="accordion-body bg-dark text-light ps-5">View CHILD</div>
              </div>
            </div>
            <div class="accordion-item  border-0">
              <h2 class="accordion-header" id="flush-headingThree">
                <button class="accordion-button collapsed bg-dark text-light" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                  <i class="fas fa-user-friends pe-2"></i> STAFF
                </button>
              </h2>
              <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                <a href=""><div class="accordion-body bg-dark text-light ps-5">ADD STAFF</div></a>
                <a href="viewStaff.php"><div class="accordion-body bg-dark text-light ps-5">View STAFF</div></a>
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
            <a href="index.php" class="text-decoration-none text-white"><h2 class="accordion-header">
              <button class="accordion-button collapsed bg-dark text-light" type="button" data-bs-toggle="collapse" aria-expanded="false">
              <i class="fas fa-power-off pe-2"></i>LOGOUT
              </h2>
                </button>
            </div></a>

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
            <button class="accordion-button collapsed bg-dark text-light" type="button" data-bs-toggle="collapse" aria-expanded="false">
            <a class="text-decoration-none text-white" href="home.php"> <div><i class="fas fa-tachometer-alt pe-2"></i> OVERVIEW</div></a>
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
            <a class="text-decoration-none" href="viewDonations.php"><div class="accordion-body bg-dark text-light ps-5">VIEW DONATION</div></a>
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
          <a class="text-decoration-none" href="viewLabor.php"> <div class="accordion-body bg-dark text-light ps-5">VIEW LABORS</div></a>
          </div>
        </div>

        <a href="index.php" class="text-decoration-none text-white"><div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed bg-dark text-light" type="button" data-bs-toggle="collapse" aria-expanded="false">
            <i class="fas fa-power-off pe-2"></i>LOGOUT</a>
            </button>
          </h2>
        </div></a>

      </div>


    </div>
    <div class=" w-85 bg-light " style="overflow-y: scroll;">