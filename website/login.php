<?php

session_start();

/* feedback message when page opens */
$message = '<p>Not registered yet? <a href="signin.php" class="text_link">SIGN IN</a></p>';

/* if form submit button is pressed */
if (isset($_POST['submit'])) {

    include('includes/connx.php');
    include('includes/error.php');

    /* sanitize username */
    $user = $_POST['username'];
    $user_trim = trim($_POST['username']);
    $user_strip = strip_tags($user_trim);
    $user_htmlspecialchars = htmlspecialchars($user_strip);

    /* hashed password */
    $pwd = $_POST['pwd'];
    $hashed_pwd_md5 = md5($pwd);

    /* search database for existing username */
    $sql = "SELECT username, password FROM users WHERE username = '$user_htmlspecialchars'";
    $result = $conn->query($sql); //bind dbase connection to query
    $row = $result->fetch_assoc(); // gather each matching row

    /* if username match AND password match, go to admin page */
    if ($result->num_rows === 1  && $hashed_pwd_md5 === $row['password']) {
        $_SESSION['userLogged'] =  $user_htmlspecialchars;
        header('location:admin.php?username=' . $user_htmlspecialchars);
        die();
    }
    /* if no match, feedback message to user */ else {
        $message = "<p class='text-center text-warning'>The username and password don't match</p>
            <p>Not registered yet? <a href='signin.php' class='text_link'>SIGN IN</a></p>";
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

    <title>Log In</title>

    <?php

    ?>

</head>

<body class="d-flex flex-column min-vh-100">

    <!-- navbar - user never logged in at that point -->
    <?php
    include 'parts/nav.php';
    ?>

    <div class="container py-5 mb-2">
        <!-- intro -->
        <div class="row">
            <div class="col-lg-8 offset-lg-2 pb-4">
                <div class="text-center">
                    <h1 class="pb-3">Log In</h1>
                    <h5 class="pb-4">Enter your username and password:</h5>
                </div>


                <form method="POST">
                    <!-- username -->
                    <div class="mb-3">
                        <label class="form-label" for="username">Username:</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" required>
                    </div>
                    <!-- password -->
                    <div class="mb-4">
                        <label class="form-label" for="pwd">Password:</label>
                        <input type="password" class="form-control" name="pwd" id="pwd" placeholder="Enter your password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                        <p class="mt-1 warning">You password contains 8 or more characters that are of at least one number, and one uppercase and lowercase letter</p>
                    </div>
                    <!-- submit button -->
                    <div class="text-center">
                        <input type="submit" class="btn btn-success wide_btn mb-4" name="submit" id="submit" value="LOG IN">
                    </div>
                </form>

                <!-- feedback message that changes with conditions -->
                <div class="text-center mt-2">
                    <?php echo $message ?>
                </div>
            </div>
        </div>
    </div>

    <!-- footer includes -->
    <?php
    include 'parts/footer.php';
    ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>