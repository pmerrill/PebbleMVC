<?php require APPROOT . '/views/inc/header.php'; ?>
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="card card-body bg-light mt-5">

                <h1><?php echo $data['title']; ?></h1>
                <p><?php echo $data['description']; ?></p>

                <?php if(isset($_SESSION['user_id'])) { ?>
                <p>
                    You are logged in. <a href="<?php echo URLROOT . '/users/account'; ?>">View account</a>
                </p>
                <?php } ?>

            </div>
        </div>
    </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>