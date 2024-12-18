<?php include_once 'inc/code.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Products</title>
    <?php include_once 'inc/head.php'; ?>
</head>

<body>
    <?php include_once 'inc/nav.php' ?>
    <div class="container">
        <h2>Add Products</h2>
        <hr>
        <div class="container">
            <?php if (!empty($msg)): ?>
                <div class="alert alert-<?= $sts ?>"><?= $msg ?></div>
            <?php endif; ?>
        </div>
        <form action="add.php" method="post" enctype="multipart/form-data">
            <div class="form-group mt-2">
                <label>Upload your image</label>
                <input type="file" name="image" required class="form-control mt-1" accept=".jpg, .png">
            </div>
            <div class="form-group mt-2">
                <label>Title</label>
                <input type="text" name="title" required class="form-control">
            </div>
            <div class="form-group mt-2">
                <label>Description</label>
                <input type="text" name="description" required class="form-control">
            </div>
            <div class="form-group mt-2">
                <label>SKU</label>
                <input type="text" name="sku" required class="form-control">
            </div>
            <div class="form-group mt-2">
                <label>Price</label>
                <input type="number" name="price" required class="form-control">
            </div>
            <div class="form-group mt-2">
                <label>Quantity</label>
                <input type="number" name="quantity" required class="form-control">
            </div>
            <div>
                <button class="btn btn-success mt-3" name="reg_btn" type="submit">Submit</button>
            </div>
        </form>
    </div>

</body>

</html>