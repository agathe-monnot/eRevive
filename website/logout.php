<?php session_start();

$user = $_GET['username'];

/* kills session on click */
if (isset($_POST['submit'])) {

    session_start();
    session_destroy();
    header('Location:index.php');
    die();
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
    <title>Log out confirmation</title>

</head>

<body class="d-flex flex-column min-vh-100">

    <!-- navbar -->
    <?php
    include 'parts/nav_session_on.php';
    ?>

    <div class="container py-5">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 pb-4">
                <div class="text-center">
                    <h1 class="pb-3">Log out</h1>
                    <!-- warning personalised message -->
                    <h5 class="pb-2"><span class="text-success"><?php echo $user ?></span>, do you want to log out?</h5>
                    <p class="warning pb-4">You will need to log back in to access your page again.</p>
                </div>

                <div class="text-center">
                    <!-- delete button -->
                    <form action="index.php" method="POST">
                        <div class="mb-3">
                            <input type="submit" name="submit" id="submit" class="btn btn-success wide_btn" value="LOG OUT">
                        </div>
                    </form>
                    <!-- back to admin button -->
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