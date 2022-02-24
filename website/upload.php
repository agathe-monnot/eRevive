<?php
session_start();

$user = $_GET['username'];

/* display button in the form */
$message = '<input type="submit" class="btn btn-success wide_btn mb-4" value="ADD NEW PRODUCT" name="submit">';

include('includes/connx.php');
include 'includes/error.php';

// set up variable from form POST


// WOULD OBVIOUSLY IMPLEMENT IMAGE CHECK IF MORE TIME

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {

    $name = $_POST['name'];
    $brand = $_POST['brand'];
    $prod_condition = $_POST['prod_condition'];
    $age = $_POST['age'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    // target directory for images
    $target_dir = "uploaded_img/";
    // variable storing the file name
    $target_file = $target_dir . basename($_FILES["upload"]["name"]);

    move_uploaded_file($_FILES["upload"]["tmp_name"], $target_file);

    /* statement to insert data into the database */
    $sql = "INSERT INTO products (name, brand, prod_condition, age, description, image,  price, user_id)
                            VALUES ('$name', '$brand', '$prod_condition', '$age', '$description', '$target_file', '$price', (SELECT user_id FROM users WHERE username = '$user'))";
    /* grabs the user_id of the session user from the users table */

    if ($conn->query($sql) === TRUE) {
        header('Location: admin.php?username=' . $user);
        /*   $message = "<p class='text-success'>New record created successfully</p>
                            <a href='admin.php?username=$user' class='btn btn-success wide-btn'>BACK TO ADMIN</a>"; */
    } else {
        $message = '<p class="my-3">There was a problem uploading your product</p>
                            <input type="submit" class="btn btn-success wide_btn mb-4" value="ADD NEW PRODUCT" name="submit">';
    }
}
$conn->close();

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
    <title>Add a new product</title>



</head>

<body>
    <?php
    include 'parts/nav_session_on.php';
    ?>

    <div class="container py-5 mb-2">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 pb-4">
                <div class="text-center">
                    <h1 class="pb-3">Add a new product</h1>
                    <h5 class="pb-4">Enter the product's information, as precisely as possible:</h5>
                </div>


                <form action="#" method="POST" enctype="multipart/form-data">
                    <!-- name -->
                    <div class="mb-3">
                        <label class="form-label" for="name">Prod name:</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Ex: iPhone 12 pro" required>
                    </div>

                    <!-- brand -->
                    <div class="mb-3">
                        <label class="form-label" for="brand">Brand:</label>
                        <input type="text" class="form-control" id="brand" name="brand" placeholder="Ex: Apple" required>
                    </div>

                    <!-- condition -->
                    <label for="prod_condition" class="form-label">Condition:</label>
                    <select class="form-select mb-3" aria-label="Default select example" id="prod_condition" name="prod_condition" required>
                        <option selected>Select one option</option>
                        <option value="Like new">Like new</option>
                        <option value="Good">Good</option>
                        <option value="Ususal wear">Usual wear</option>
                        <option value="Poor">Poor</option>
                        <option value="For parts only">For parts only</option>
                    </select>

                    <!-- age -->
                    <label for="age" class="form-label">Product's age:</label>
                    <select class="form-select mb-3" aria-label="Default select example" id="age" name="age" required>
                        <option selected>Select one option</option>
                        <option value="New">New</option>
                        <option value="Less than 6 months">Less than 6 months</option>
                        <option value="Less than 1 year">Less than 1 year</option>
                        <option value="2 years">2 years</option>
                        <option value="More than 2 years">More than 2 years</option>
                    </select>

                    <!-- description -->
                    <div class="mb-3">
                        <label for="description" class="form-label">Description:</label>
                        <textarea class="form-control" id="description" name="description" rows="4" placeholder="Any extra valuable information..." required></textarea>
                    </div>

                    <!-- class -->
                    <div class="mb-3">
                        <label class="form-label" for="price">Price:</label>
                        <input type="text" class="form-control" id="price" name="price" placeholder="Ex: 120" required>
                    </div>

                    <!-- image -->
                    <div class="mb-4">
                        <label class="form-label" for="uploaded">Image:</label>
                        <input type="file" class="form-control" name="upload">
                    </div>

                    <?php


                    ?>

                    <!-- button -->
                    <div class="text-center">
                        <?php echo $message ?>
                        <!--  <input type="submit" class="btn btn-success wide_btn mb-4" value="ADD NEW PRODUCT" name='submit'> -->
                    </div>
                </form>
            </div>
        </div>
    </div>



    <?php
    include 'parts/footer.php';
    ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>