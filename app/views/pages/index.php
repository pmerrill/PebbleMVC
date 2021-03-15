<?php require APPROOT . '/views/inc/header.php'; ?>
    
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <div class="display-3"><?php echo $data['title']; ?></div>
            <div class="lead"><?php echo $data['description']; ?></div>
        </div>
    </div>

<?php require APPROOT . '/views/inc/footer.php'; ?>