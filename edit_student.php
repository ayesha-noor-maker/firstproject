<?php include_once 'inc/code.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <?php include_once 'inc/head.php'; ?>

</head>

<body>
    <?php include_once 'inc/nav.php'; ?>
    <div class="container">
        <h2 class="mt-4">Edit Product</h2>
        <div class="container">
            <?php if (!empty($msg)): ?>
                <div class="alert alert-<?= $sts ?>"><?= $msg ?></div>
            <?php endif; ?>
        </div>
        <hr>
        <form method="post" enctype="multipart/form-data">
            <input type="hidden" value="<?= $fetchStudentData['id'] ?>" name="id">
            <div class="form-group mt-2">
                <label>Upload your image</label>
                <input type="file" name="image" class="form-control mt-1" accept=".jpg, .png">
                <?php if (!empty($fetchStudentData['image'])): ?>
                <?php endif; ?>
            </div>
            <div class="form-group mt-2">
                <label>Title</label>
                <input type="text" name="title" value="<?= $fetchStudentData['title'] ?>" required class="form-control">
            </div>
            <div class="form-group mt-2">
                <label>Description</label>
                <input type="text" name="description" value="<?= $fetchStudentData['description'] ?>" required
                    class="form-control">
            </div>
            <div class="form-group mt-2">
                <label>SKU</label>
                <input type="text" name="sku" value="<?= $fetchStudentData['sku'] ?>" required class="form-control">
            </div>
            <div class="form-group mt-2">
                <label>Price</label>
                <input type="number" name="price" value="<?= $fetchStudentData['price'] ?>" required
                    class="form-control">
            </div>
            <div class="form-group mt-2">
                <label>Quantity</label>
                <input type="number" name="quantity" value="<?= $fetchStudentData['quantity'] ?>" required
                    class="form-control">
            </div>
            <div>
                <button class="btn btn-success mt-3" name="edit_student_btn" type="submit">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>

</body>

</html>