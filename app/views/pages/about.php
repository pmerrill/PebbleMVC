<?php require APPROOT . '/views/inc/header.php'; ?>

<h1><?php echo $data['title']; ?></h1>
<p><?php echo SITENAME; ?> is a lightweight object-oriented PHP MVC with basic user registration and authentication.</p>
<p>The core code is based on the MVC created in <a href="https://www.udemy.com/course/object-oriented-php-mvc/" target="_blank">Brad Traversy's Udemy course</a>. I highly recommend enrolling if you are new to PHP OOP, or want to get a better understanding for how the core components of this repository were put together.</p>
<p>Feel free to get in touch with me <a href="https://twitter.com/petemerrill" target="_blank">@PeteMerrill</a> on Twitter if you want to talk about this project a little more.</p>
<p>Version: <?php echo APPVERSION; ?></p>

<?php require APPROOT . '/views/inc/footer.php'; ?>