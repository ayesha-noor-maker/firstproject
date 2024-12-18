<?php
session_start();
include_once 'inc/code.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['login_user'])): ?>
    <script type="text/javascript">
        window.location.href = "login.php";
    </script>
<?php endif; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <?php include_once 'inc/head.php' ?>
</head>

<body>
    <?php include_once 'inc/nav.php' ?>
    <?php $q = mysqli_query($dbc, "SELECT * FROM products"); ?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <button type="button" class="btn btn-primary position-relative">
                    Products
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        <?php echo mysqli_num_rows($q) ?>
                        <span class="visually-hidden">unread messages</span>
                    </span>
                </button>
                <table class="table myTable">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>SKU</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($r = mysqli_fetch_assoc($q)):
                            $path = "uploads/" . $r['image'];
                            ?>
                            <tr>
                                <td> <img src="<?= $path ?>" style="width: 50px; height: auto;"></td>
                                <td><?= $r['title'] ?></td>
                                <td><?= $r['description'] ?></td>
                                <td><?= $r['sku'] ?></td>
                                <td><?= $r['price'] ?></td>
                                <td><?= $r['quantity'] ?></td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a class="btn btn-primary"
                                            href="edit_student.php?student_edit_id=<?= $r['id'] ?>"><i
                                                class="fas fa-pencil"></i></a>
                                        <a class="btn btn-danger"
                                            onclick="if(!confirm('do you want to delete product')){return false;}"
                                            href="index.php?student_del_id=<?= $r['id'] ?>"><i
                                                class="fas fa-remove"></i></a>
                                    </div>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div>
    </div>
    </div>
    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <script type="text/javascript" src="assets/js/dt.js"></script>
    <script type="text/javascript">
        let table = new DataTable('.myTable');
    </script>
</body>

</html>