<?php

session_start();

include('includes/connx.php');
include 'includes/error.php';

if (isset($_GET['username']))    
{    
    $user = $_GET['username'];   
} 

/* if SESSION, display nav WITH ADMIN links */
if (isset($user) && $_SESSION['userLogged'] === $user) {
    include 'parts/nav_session_on.php';

    /* in order to keep admin navbar displayed after search, if session is on,
     form action link will re-pass the username in the url when page reloads with results */
    $form_action = 'index.php?username=' . $user . '#results';
}
/* if NO SESSION , display nav WITHOUT ADMIN links */ else {
    include 'parts/nav.php';
  
    /* if no session, form action will send back to simple url with no data inside */
    $form_action = 'index.php#results';
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
    <title>eRevive Home Page</title>

</head>

<body>

    <!-- HERO HEADER -->
    <div class="container-fluid">
        <!-- display on size medium and above -->
        <img src="images/header.jpg" alt="hero header" class="d-none d-md-inline">
        <!-- display on small size until md breakdown -->
        <img src="images/header_small.jpg" alt="hero header" class="d-inline d-md-none">
    </div>

    <div class="container-fluid intro text-white">
        <div class="container text-center py-5">
            <!-- intro -->
            <h1 class="pb-3 text-white">Reduce, reuse and recycle with eRevive</h1>
            <div class="row pb-3">
                <div class="col-12 col-lg-8 offset-lg-2">
                    <h5 class="pb-4 pb-md-5">The amount of electronic waste that we produce is growing everyday. eRevive mission is to allow you to find the device that you need: second-hand, working and ready to be (re)used. Help the planet with us. Reduce, reuse, recycle! </h5>
                    <p>Register and log in to start selling!</p>
                    <a href="login.php" class="btn btn-outline-light wide_btn on_green">LOG IN</a>
                </div>
            </div>
        </div>
    </div>

    <!-- search-->
    <div class="container text-center py-5">
        <h3 class="mb-3" id="results">Find the product you need</h3>
        <p class="mb-4">Browse our catalogue of second-hand devices and give them another life!</p>


        <form action="<?php echo $form_action ?>" method="POST">
            <div class="row">
                <div class="col-lg-5 offset-lg-3 mb-3 mb-lg-0">
                    <input type="text" class="form-control me-0" placeholder="Product name, brand, age, condition..." id="prod_search" name="prod_search" required>
                </div>
                <div class="col-lg-1">
                    <input type="submit" class="btn btn-success ms-0 wide_btn" id="submit" name="submit" value="SEARCH">
                </div>
            </div>
        </form>


        <div class="row pt-5 pb-1">

            <?php

            /* if form submitted */
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit']) && isset($_POST['prod_search'])) {

                /* user input */
                $prod_search  = $_POST['prod_search'];

                /* search database */
                $sql =  "SELECT * FROM products
                    WHERE name LIKE '%$prod_search%' 
                    OR brand LIKE '%$prod_search%' 
                    OR prod_condition LIKE '%$prod_search%' 
                    OR age LIKE '%$prod_search%'
                    OR description LIKE '%$prod_search%'
                    ORDER BY name";

                $result = $conn->query($sql);

                /* if match in the db */
                if ($result->num_rows > 0) {

                    /* display number of result for this specific search */
                    $items_num = $result->num_rows;

                    if (isset($prod_search)) {
                        echo '<h5 class="prod_title mb-4">' . $items_num . ' results for "' . $prod_search . '":</h5>';
                    }

                    /* display results in a grid */
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="col-sm-6 col-lg-4 col-xl-3 mb-3">';
                        echo '<div class="card h-100 ">';
                        echo '<img alt="" class="card-img-top" src="' . $row["image"] . '">';
                        echo '<div class="card-body d-flex flex-column">';
                        echo '<h5 class="prod_title">' . $row['name'] . '</h5>';
                        echo '<div class=text-start>';
                        echo '<p class="description">' . $row['description'] . '</p>';
                        echo '<p><span class="rows">Brand: </span>' . $row['brand'] . '</p>';
                        echo '<p><span class="rows">Condition: </span>' . $row['prod_condition'] . '</p>';
                        echo '<p><span class="rows">Age: </span>' . $row['age'] . '</p>';
                        echo '</div>'; // end text-start div
                        echo '<div class="mt-auto">';
                        echo '<p class="price">£' . $row['price'] . '</p>';
                        // different buttons if user logged in or not
                        if ($_SESSION['userLogged'] === $user) {
                            echo '<a href="single_prod.php?id=' . $row['prod_id'] . '&username=' . $user . '" class="btn btn-success wide_btn ">BUY THIS PRODUCT</a>';
                        } else {
                            echo '<a href="single_prod.php?id=' . $row['prod_id'] . '" class="btn btn-success wide_btn ">BUY THIS PRODUCT</a>';
                        }
                        echo '</div>'; // end mt-auto div
                        echo '</div>'; // ends card body div
                        echo '</div>'; //endc card div
                        echo '</div>'; //end col div
                    }
                    /* button to refresh page - all products displayed */
                    echo '<div class="mt-5">';
                    if (isset($user) && $_SESSION['userLogged'] === $user) {
                        echo '<a href="index.php?username=' . $user . '" class="btn btn-outline-success wide_btn ">VIEW ALL PRODUCTS</a>';
                    } else {
                        echo '<a href="index.php" class="btn btn-outline-success wide_btn ">VIEW ALL PRODUCTS</a>';
                    }

                    echo  '</div>';
                } else {
                    echo "<h5 class='prod_title mb-4'>Sorry, we couldn't find a match.</h5>";
                }
            }

            /* displays ALL PRODUCT BEFORE SEARCH IS MADE */ else {

                // sql statement
                $sql =  "SELECT prod_id, name, brand, prod_condition, description, age, image, price FROM products";
                $result_all = $conn->query($sql);

                //matches in db
                if ($result_all->num_rows > 0) {
                    // output data of each row
                    while ($row = $result_all->fetch_assoc()) {
                        echo '<div class="col-sm-6 col-lg-4 col-xl-3 mb-3">';
                        echo '<div class="card h-100 ">';
                        echo '<img alt="" class="card-img-top" src="' . $row["image"] . '">';;
                        echo '<div class="card-body d-flex flex-column">';
                        echo '<h5 class="prod_title">' . $row['name'] . '</h5>';
                        echo '<div class=text-start>';
                        echo '<p class="description">' . $row['description'] . '</p>';
                        echo '<p><span class="rows">Brand: </span>' . $row['brand'] . '</p>';
                        echo '<p><span class="rows">Condition: </span>' . $row['prod_condition'] . '</p>';
                        echo '<p><span class="rows">Age: </span>' . $row['age'] . '</p>';
                        echo '</div>'; // end text-start div
                        echo '<div class="mt-auto">';
                        echo '<p class="price">£' . $row['price'] . '</p>';
                        // different buttons if user logged in or not
                        if (isset($user)) {
                            echo '<a href="single_prod.php?id=' . $row['prod_id'] . '&username=' . $user . '" class="btn btn-success wide_btn ">BUY THIS PRODUCT</a>';
                        } else {
                            echo '<a href="single_prod.php?id=' . $row['prod_id'] . '" class="btn btn-success wide_btn ">BUY THIS PRODUCT</a>';
                        }
                        echo '</div>'; // end mt-auto div
                        echo '</div>'; // ends card body div
                        echo '</div>'; //endc card div
                        echo '</div>'; //end col div
                    }
                }
            }
            ?>
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