<?php

session_start();

$single_prod = $_GET['id'];

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

    <title>Product page</title>

</head>

<body class="d-flex flex-column min-vh-100">

    <div class="container py-5 mb-2">
        <div class="text-center">
            <div class="row gx-5">

                <?php

                include('includes/connx.php');

                // select prod in db whose ID = id passed in URL
                $sql = "SELECT * FROM products WHERE prod_id = '$single_prod'";
                $result = $conn->query($sql);

                // if match in db
                if ($result->num_rows === 1) {

                    // display products
                    while ($row = $result->fetch_assoc()) {
                        echo '<h1 class="prod_title pb-4">' . $row['name'] . '</h1>';
                        echo '<div class="col-md-6 col-lg-5 offset-lg-1 col-xl-4 offset-xl-2">';
                        echo '<img class="mb-3 mb-md-0 "alt="" src="' . $row["image"] . '">';
                        echo '</div>'; // end image col
                        echo '<div class="col-md-6 col-lg-5 col-xl-4 pt-2">';
                        echo '<div class=text-start>';
                        echo '<p class="description">' . $row['description'] . '</p>';
                        echo '<p><span class="rows">Brand: </span>' . $row['brand'] . '</p>';
                        echo '<p><span class="rows">Condition: </span>' . $row['prod_condition'] . '</p>';
                        echo '<p><span class="rows">Age: </span>' . $row['age'] . '</p>';
                        echo '<div class="text-center text-md-start">';
                        echo '<a href="#" class="btn btn-success wide_btn mt-3">BUY THIS PRODUCT</a><br>';
                        if ($_SESSION['userLogged'] === $user) {
                            echo '<a href="index.php?username=' . $user . '" class="btn btn-outline-success wide_btn mt-3">BACK TO HOME PAGE</a>';
                        } else {
                            echo '<a href="index.php" class="btn btn-outline-success wide_btn mt-3">BACK TO HOME PAGE</a>';
                        }
                        echo '</div>'; // end text-start div
                        echo '</div>'; // end text col
                        echo '</div>'; // end text col
                    }
                } else {
                    echo "<p>We couldn't find what you are looking for</p>";
                }
                ?>
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