<?php require APPROOT . '/views/inc/header.php'; ?>
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body bg-light mt-5">

                <h2>My Account</h2>
                <ul>
                    <li>User ID: <?php echo $_SESSION['user_id']; ?></li>
                    <li>Name: <?php echo $_SESSION['user_name']; ?></li>
                    <li>Email: <?php echo $_SESSION['user_email']; ?></li>
                    <li><a href="<?php echo URLROOT . '/users/logout'; ?>">Log out</a></li>
                </ul>

            </div>
        </div>
    </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>