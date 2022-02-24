<?php session_start();

if (!isset($_GET['username'])) {
    header('Location:login.php');
} else {
    // get username from url
    $user = $_GET['username'];
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
    <title>Admin page</title>

</head>

<body class="d-flex flex-column min-vh-100">

    <!-- navbar always the same -  ADMIN and LOG OUT links -->
    <?php
    include 'parts/nav_session_on.php';
    ?>

    <!-- green box intro -->
    <div class="container-fluid intro text-white">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="text-center">
                        <!-- personalised message to user with their name -->
                        <h1 class="pb-3 text-white"><?php echo $user ?>, this is YOUR page!</h1>
                        <h5 class="pb-4">Add new products to sell or update your exisiting ones.</h5>
                        <!-- pass username to upload page -->
                        <a href="upload.php?username=<?php echo $user ?>" class="btn btn-outline-light wide_btn on_green">ADD A NEW PRODUCT</a>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <!-- registered user already for sale list of products  -->
    <div class="container pt-5">
        <div class="row text-center">
            <h3 class="pb-3 ">Your products</h3>

            <?php

            /* connect to db */
            include('includes/connx.php');

            /* select the products uploaded ONLY by the user registered for this session */
            $sql = "SELECT * FROM products WHERE user_id = (SELECT user_id FROM users WHERE username = '$user')";
            $result = $conn->query($sql);

            //if maches in the database
            if ($result->num_rows > 0) {

                /* display number of item already uploaded by the registered user */
                $items_num = $result->num_rows;
                echo '<h5 class="mb-5">You have <span class="text-success">' . $items_num . '</span> products for sale:</h5>';

                /* display products in grid */
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="col-sm-6 col-lg-4 col-xl-3 mb-3">';
                    echo '<div class="card h-100 ">';
                    echo '<img alt="" class="card-img-top" src="' . $row["image"] . '" alt="product image">';
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
                    /* passing prod_id in the url */
                    echo '<a href="update.php?id=' . $row['prod_id'] . '&username=' . $user . '" class="btn btn-outline-success wide_btn mb-2">UPDATE THIS PRODUCT</a>';
                    /* passing prod_id and username in the url */
                    echo '<a href="delete.php?id=' . $row['prod_id'] . '&username=' . $user . '" class="btn btn-success wide_btn ">DELETE THIS PRODUCT</a>';
                    echo '</div>'; // end mt-auto div
                    echo '</div>'; // ends card body div
                    echo '</div>'; //endc card div
                    echo '</div>'; //end col div
                }
            } else {
                /* if user has no items in the db yet */
                echo "<p class='mb-5 warning'>You don't have any product to sell yet</p>";
            }

            ?>
        </div>
    </div>

    <!-- other actions -->
    <div class="container-fluid bg-light mt-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 pb-4">
                    <div class="text-center">
                        <h3 class="pb-3">Other actions</h3>
                        <div class="row">
                            <!-- pass username in both urls -->
                            <div class="col-12 mb-2"><a href="pwd_update.php?username=<?php echo $user ?>" class="btn btn-success wide_btn">UPDATE PASSWORD</a></div>
                            <div class="col-12"><a href="logout.php?username=<?php echo $user ?>" class="btn btn-outline-success wide_btn">LOG OUT</a></div>
                        </div>
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