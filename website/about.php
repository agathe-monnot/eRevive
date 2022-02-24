<?php 
session_start();

if (isset($_GET['username'])) {
    $user = $_GET['username'];
}

/*  if SESSION ON, display nav WITH ADMIN and LOG OUT link */
if (isset($user)) {
    include 'parts/nav_session_on.php';
}
/* if NO SESSION, display nav without ADMIN links*/ else {
    include 'parts/nav.php';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Adobe fonts -->
    <link rel="stylesheet" href="https://use.typekit.net/jah2euc.css">
    <!-- custom CSS -->
    <link href="css/stylesheet.css" rel="stylesheet">

    <title>About</title>
</head>

<body>

    <!-- header image -->
    <div class="container-fluid">
        <img src="images/header_about.jpg" alt="hands holding a small plant">
    </div>

    <!-- content -->
    <div class="container py-5 mb-2 text-center">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 pb-4">
                <h1 class="pb-3">About Us</h1>
                <h5 class="pb-4">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Assumenda sunt corrupti voluptates adipisci autem quam eius eos aut ab sint.</h5>
            </div>

            <div class="row">
                <!-- col 1 -->
                <div class="col-md-6 col-lg-5 offset-lg-1">
                    <img src="images/group.jpg" alt="" class="mb-4">
                    <h3 class="pb-2">Our story</h3>
                    <p class="pb-5 pb-md-0 line_height">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam dolorem distinctio minus quos repellendus. Tempore dolorem culpa fugiat, distinctio eius corrupti natus dolor ipsum aspernatur. Animi et ipsam repellat tempore.</p>
                </div>
                <!-- col 2 -->
                <div class="col-md-6 col-lg-5">
                    <img src="images/mission.jpg" alt="" class="mb-4">
                    <h3 class="pb-2">Our mission</h3>
                    <p class="line_height">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam dolorem distinctio minus quos repellendus. Tempore dolorem culpa fugiat, distinctio eius corrupti natus dolor ipsum aspernatur. Animi et ipsam repellat tempore.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- green box for contact  -->
    <div class="container-fluid intro">
        <div class="container text-white">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 py-5">
                    <div class="text-center">
                        <h5 class="pb-3">Do you like our values? Do you want to work with us? Get in touch !</h5>
                        <!-- different buttons if session or not -->
                        <?php
                        if ($_SESSION['userLogged'] === $user) {
                            echo '<a href="contact.php?username=' . $user . '" class="btn btn-outline-light on_green wide_btn">GET IN TOUCH</a>';
                        } else {
                            echo '<a href="contact.php" class="btn btn-outline-light on_green wide_btn">GET IN TOUCH</a>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- footer -->
    <?php
    include 'parts/footer.php';
    ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>

</html>