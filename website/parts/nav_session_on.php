<!-- nav displayed when uer is logged in -->

<div class="container-fluid pb-3 nav_bg">

    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container pt-3">

            <!-- logo -->
            <a class="navbar-brand" id="title" href="index.php">eRevive</a>

            <!-- toggle button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- collapsible part of the nav -->
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                <div class="navbar-nav text-center mt-4 mt-lg-0">

                    <!-- nav links -->
                    <a class="nav-link mx-3" aria-current="page" href="index.php?username=<?php echo $user ?>">Home</a>
                    <a class="nav-link mx-3" href="about.php?username=<?php echo $user ?>">About us</a>
                    <a class="nav-link mx-3" href="contact.php?username=<?php echo $user ?>">Contact</a>
                    <a class="nav-link mx-3" href="admin.php?username=<?php echo $user ?>">Admin</a>
                    <a class="nav-link mx-3" href="logout.php?username=<?php echo $user ?>">Log out</a>
                </div>
            </div>
        </div>
    </nav>
    
    <!-- log in message to user -->
    <div class="container">
        <p class="text-end text-white me-4 fs-6">You are logged in</p>
    </div>
</div>