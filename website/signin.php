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

    <title>Sign In</title>

    <?php

    /* feedback message when page opens */
    $message = '<p>Already registered? <a href="login.php" class="text_link">LOG IN</a></p>';

    /* if form submit button is pressed */
    if (isset($_POST['submit'])) {

        include 'includes/error.php';

        /* if connect to db if fields exits */
        if (isset($_POST['username']) && isset($_POST['pwd'])) {

            /* sanitize username */
            $user = $_POST['username'];
            $user_trim = trim($_POST['username']);
            $user_strip = strip_tags($user_trim);
            $user_htmlspecialchars = htmlspecialchars($user_strip);

            $email = $_POST['email'];

            /* hashed password */
            $pwd = $_POST['pwd'];
            $hashed_pwd_md5 = md5($pwd);

            /* connects to database */
            include 'includes/connx.php';
        }

        /* check if username already in db */
        $checkUser = "SELECT * FROM users WHERE username = '$user_htmlspecialchars'";
        $result = $conn->query($checkUser);
        if ($result->num_rows > 0) {
            /* if username already exists, feedback message */
            $message = '<p class="text-center">A this username already exist, please choose something else</p>';
        }

        /* if not, send data to db */ else {
            $sql = "INSERT INTO users (username, email, password)VALUES ('$user_htmlspecialchars', '$email', '$hashed_pwd_md5')";
            if ($conn->query($sql) === TRUE) {
                /* login link in feedback message */
                $message = '<p class="text-center text-success">Signed in successfully! <a href="login.php" class="text_link">LOG IN</a></p>';
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
        }
    }
    ?>

</head>

<body class="d-flex flex-column min-vh-100">

    <!-- nav include -->
    <?php
    include 'parts/nav.php';
    ?>

    <div class="container py-5 mb-2">
        <!-- intro -->
        <div class="row">
            <div class="col-lg-8 offset-lg-2 pb-4">
                <div class="text-center">
                    <h1 class="pb-3">Sign In</h1>
                    <h5 class="pb-4">Enter a username and password and start selling!</h5>
                </div>


                <!-- form posts to itself, page doesnt change when submit button is clicked -->
                <form action="" method="POST">
                    <!-- username -->
                    <div class="mb-3">
                        <label class="form-label" for="username">Username:</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Enter your username" required>
                    </div>
                    <!-- email -->
                    <div class="mb-3">
                        <label class="form-label" for="email">Email address:</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Ex: name@example.com" required>
                    </div>
                    <!-- password -->
                    <div class="mb-4">
                        <label class="form-label" for="pwd">Password:</label>
                        <input type="password" class="form-control" name="pwd" id="pwd" placeholder="Enter your password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                        <p class="mt-1 warning">Must contain 8 or more characters that are of at least one number, and one uppercase and lowercase letter</p>
                    </div>
                    <!-- submit button -->
                    <div class="text-center">
                        <input type="submit" class="btn btn-success wide_btn mb-4" value="SIGN IN" id="submit" name="submit"></a>
                    </div>
                </form>

                <!-- feedback message that changes with conditions -->
                <div class="text-center mt-2">
                    <?php echo $message ?>
                </div>
            </div>
        </div>
    </div>

    <!-- footer include -->
    <?php
    include 'parts/footer.php';
    ?>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>

