<?php session_start();

//grab username that we need for sql statement
$user = $_GET['username'];

// original feedback message
$message = '<p class="warning">The previous password can not be retrived once changed.</p>
    <input type="submit" id="submit" name="submit" class="btn btn-success wide_btn mb-2 wide_btn" value="CHANGE PASSWORD"><br>
    <a href="admin.php?username=' . $user . '" class="btn btn-outline-success wide_btn">BACK TO ADMIN</a>';

include('includes/connx.php');
include 'includes/error.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {

    /* sanitize user input */
    $confirmed_username_trim = trim($_POST['confirmed_username']);
    $confirmed_username_strip = strip_tags($confirmed_username_trim);
    $confirmed_username_htmlspecialchars = htmlspecialchars($confirmed_username_strip);

    /* hashed new password */
    $new_pwd = $_POST['new_pwd'];
    $hashed_new_pwd_md5 = md5($new_pwd);

    // if typed username = username stored in db
    if ($confirmed_username_htmlspecialchars === $user) {
        // update pwd in db 
        $sql = "UPDATE users SET password = '$hashed_new_pwd_md5' WHERE username = '$confirmed_username_htmlspecialchars'";
        if (mysqli_query($conn, $sql)) {
            $message = '<p class="text-success">Record updated successfully</p>
                <a href="admin.php?username=' . $user . '" class="btn btn-success wide_btn">BACK TO ADMIN</a>';
        } else {
            $message = '<p class="text-success">Error updating password</p>';
        }

        mysqli_close($conn);
    }

    // if typed username doesnt match username in db
    else {
        $message = '<p class="text-warning">Your username is not correct.</p>
            <input type="submit" id="submit" name="submit" class="btn btn-success wide_btn mb-2 wide_btn" value="CHANGE PASSWORD"><br>
            <a href="admin.php?username=' . $user . '" class="btn btn-outline-success wide_btn">BACK TO ADMIN</a>';
    }
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
    <title>Update password</title>

</head>

<body class="d-flex flex-column min-vh-100">

    <!-- navbar -->
    <?php
    include 'parts/nav_session_on.php';
    ?>

    <div class="container py-5 mb-2">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 pb-4">
                <div class="text-center">
                    <h1 class="pb-3">Change your password</h1>
                    <h5 class="pb-4">Confirm your username and your new password:</h5>
                </div>

                <!-- form -->
                <form action="#" method="POST">
                    <div class="mb-3">
                        <label class="form-label" for="username">Username:</label>
                        <input type="text" class="form-control" id="confirmed_username" name="confirmed_username" placeholder="Enter your username">
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="pwd">New password:</label>
                        <input type="password" class="form-control" id="new_pwd" name="new_pwd" placeholder="Enter your password">
                    </div>
                    <div class="text-center">
                        <div class="text-center">
                            <!-- feedback message that changes with user action -->
                            <?php echo $message ?>
                        </div>
                    </div>
                </form>





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
<!-- 080f651e3fcca17df3a47c2cecfcb880 -->
d41d8cd98f00b204e9800998ecf8427e