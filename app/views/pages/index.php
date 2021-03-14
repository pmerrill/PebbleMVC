<?php require APPROOT . '/views/inc/header.php'; ?>

<h1><?php echo $data['title']; ?></h1>

<?php echo json_encode($data['posts']) ?>

<?php require APPROOT . '/views/inc/footer.php'; ?>