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
    <title>Contact</title>
</head>

<body>

    <!-- image header -->
    <div class="container-fluid">
        <img src="images/header_contact.jpg" alt="hands holding together">
    </div>

    <!-- content -->
    <div class="container py-5">
        <h1 class="text-center">Get in touch</h1>
        <div class="container question p-4 col-lg-8 offset-lg-2">
            <!-- form -->
            <form>
                <!-- name input -->
                <div class="mb-3">
                    <label class="form-label">Name:</label>
                    <input type="text" class="form-control" id="nameInput" aria-describedby="nameInput" placeholder="First name, last name">
                </div>
                <!-- registered or not? -->
                <div class="mb-3">
                    <label>Are you registered with us?</label><br>
                    <input type="checkbox" id="yes">
                    <label for="yes" class="me-3">yes</label>
                    <input type="checkbox" id="no">
                    <label for="no">not yet</label><br>
                </div>
                <!-- email input -->
                <div class="mb-3">
                    <label for="emailInput" class="form-label">Email address:</label>
                    <input type="email" class="form-control" id="emailInput" aria-describedby="emailInput" placeholder="name@example.com">
                </div>
                <!-- dropdown menu -->
                <label for="dropdownInput" class="form-label">Reason for contacting:</label>
                <select class="form-select mb-3" aria-label="Default select example" id="dropdownInput">
                    <option selected>Select one option</option>
                    <option value="1">Can I sell my device?</option>
                    <option value="2">Returns and refunds</option>
                    <option value="3">How to get involved?</option>
                    <option value="4">Work for us</option>
                </select>
                <!-- text area -->
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Comments</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" placeholder="Your comment here..."></textarea>
                </div>
                <!-- submit buttom -->
                <div class="text-center">
                    <a href="#" class="btn btn-success wide_btn">SEND MESSAGE</a>
                </div>
            </form>
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