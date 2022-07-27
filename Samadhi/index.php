<?php
session_start();

include("./sql.php");
$warning = "";
if (isset($_POST['submit'])) {
    if (isset($_POST["email"]) && isset($_POST["password"])) {
        $email = mysqli_real_escape_string($connection, $_POST["email"]);
        $password = mysqli_real_escape_string($connection, $_POST["password"]);
        $query = "SELECT * FROM staff WHERE username='$email' AND password ='$password'";
        $result = mysqli_query($connection, $query);
        if (mysqli_num_rows($result) == 1) {
            session_start();

            // Store data in session variables
            $_SESSION["loggedin"] = true;
            $_SESSION["id"] = $id;
            $_SESSION["username"] = $username;
            header("location:home.php");
        } else {
            $warning = "Username or password is incorrect";
        }
    }
} else {
}

?>
















<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="styles-login.css">
    <title>Document</title>
</head>

<body>
    <div class=" container-fluid">
        <div class="row vh-100 align-items-center ">


            <div class="col-lg-8 d-none d-lg-block g-0 vh-100 bg-img" style="background-image: url(login.jpg); background-repeat: no-repeat ;background-size: cover ;">




            </div>


            <div class="col-12 col-lg-4 ">

                <p class="text-center display-4">SAMADHI</p>
                <p class="text-center display-6"> CHILDEREN'S HOME</p>

                <form class="m-lg-5 border p-2 " action="index.php" method="POST">
                    <div class="">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input autocomplete="false" type="email" class="form-control" id="exampleInputEmail1" name="email">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input autocomplete="false" type="password" class="form-control" id="exampleInputPassword1" name="password">
                    </div>
                    <div class="col-12">
                        <button type="submit" name="submit" class="btn btn-primary px-5 my-2">LOGIN</button>
                    </div>

                    <p class="text-danger"><?php echo $warning ?></p>
                </form>


            </div>


        </div>
    </div>

    <!--Font Awesome-->
    <script src="https://kit.fontawesome.com/e55b8f3938.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

</body>

</html>