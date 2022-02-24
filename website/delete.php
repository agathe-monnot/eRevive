<?php session_start();

/* passed values that we will need */
$single_prod = $_GET['id'];
$user = $_GET['username'];

include 'includes/connx.php';

/* if form is submited */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {

    /* if id of product passed in url */
    if (isset($single_prod) || !empty($single_prod)) {

        /* select product row with that id */
        $sql = "DELETE FROM products WHERE prod_id = '$single_prod'";

        /* if row found, delete and back to admin of the reigstered user */
        if ($conn->query($sql) === TRUE) {
            header('Location: admin.php?username=' . $user);
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    }
    $conn->close();
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
    <title>Delete</title>

</head>

<body class="d-flex flex-column min-vh-100">

    <!-- navbar user ALWAYS logged in-->
    <?php
    include 'parts/nav_session_on.php';
    ?>

    <div class="container py-5">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 pb-4">
                <div class="text-center">
                    <h1 class="pb-3">Delete this product?</h1>
                    <h5 class="pb-4 warning">The information can not be retrived once deleted.</h5>
                </div>

                <div class="text-center">
                    <!-- delete button -->
                    <form action="" method="POST">
                        <div class="mb-3">
                            <input type="submit" class="btn btn-success wide_btn" id="submit" name="submit" value="DELETE RECORD">
                        </div>
                    </form>
                    <!-- back to admin page of the registered user, using GET['username'] -->
                    <a href="admin.php?username=<?php echo $user ?>" class="btn btn-outline-success wide_btn">BACK TO ADMIN</a>
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