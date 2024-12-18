<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$dbc = mysqli_connect("localhost", "root", "", "sales");
if (!$dbc) {
    echo mysqli_connect_error();
    exit();
}
if (isset($_REQUEST['reg_btn'])) {
    $title = $_REQUEST['title'];
    $description = $_REQUEST['description'];
    $sku = $_REQUEST['sku'];
    $price = $_REQUEST['price'];
    $quantity = $_REQUEST['quantity'];

    $file = $_FILES['image'];
    $file_name = $file['name'];
    $file_tmp_name = $file['tmp_name'];
    $path = "uploads/" . basename($file_name);

    if (move_uploaded_file($file_tmp_name, $path)) {
        $q = mysqli_query(
            $dbc,
            "INSERT INTO products (title, description, sku, price, quantity, image) VALUES ('$title', '$description', '$sku', '$price', '$quantity', '$file_name')"
        );
        if ($q) {
            $msg = "Saved";
            $sts = "success";
        } else {
            $msg = mysqli_error($dbc);
            $sts = "danger";
        }
    } else {
        $msg = "Error in uploading the file";
        $sts = "danger";
    }
}


if (isset($_REQUEST['login_btn'])) {
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $q = mysqli_query($dbc, "SELECT * FROM products WHERE email='$email' AND password='$password'");
    $count = mysqli_num_rows($q);
    if ($count == 0) {
        $msg = "Invalid Login Details";
        $sts = "danger";
    } else {
        $msg = "logging...";
        $sts = "success";
        $_SESSION['login_user'] = $email;
        ?>
        <script type="text/javascript">
            setTimeout(function () {
                window.location.href = "index.php";
            }, 2000);
        </script>
        <?php
    }
}
if (!empty($_REQUEST['student_del_id'])) {
    $id = $_REQUEST['student_del_id'];
    $q = mysqli_query($dbc, "DELETE FROM products WHERE id='$id'");
    if ($q) {
        $msg = "User record has been deleted....";
        $sts = "success";
    } else {
        $msg = mysqli_error($dbc);
        $sts = "danger";
    }
}

if (!empty($_REQUEST['student_edit_id'])) {
    $id = $_REQUEST['student_edit_id'];
    $q = mysqli_query($dbc, "SELECT * FROM products WHERE id='$id'");
    $fetchStudentData = mysqli_fetch_assoc($q);
}

if (!empty($_REQUEST['student_edit_id'])) {
    $id = $_REQUEST['student_edit_id'];
    $q = mysqli_query($dbc, "SELECT * FROM products WHERE id='$id'");
    $fetchStudentData = mysqli_fetch_assoc($q);
}

if (isset($_REQUEST['edit_student_btn'])) {
    $title = $_REQUEST['title'];
    $description = $_REQUEST['description'];
    $sku = $_REQUEST['sku'];
    $price = $_REQUEST['price'];
    $quantity = $_REQUEST['quantity'];
    $file = $_FILES['image'];
    $file_name = isset($file['name']) ? basename($file['name']) : null;
    $file_tmp_name = isset($file['tmp_name']) ? $file['tmp_name'] : null;

    if (!empty($file_tmp_name)) {
        $path = "uploads/" . $file_name;
        if (move_uploaded_file($file_tmp_name, $path)) {
            $image_sql = ", image='$file_name'";
        } else {
            $msg = "Error in uploading the file";
            $sts = "danger";
        }
    } else {
        $image_sql = "";
    }
    $q = mysqli_query($dbc, "UPDATE products SET title ='$title', description ='$description', sku ='$sku', price = '$price', quantity = '$quantity' $image_sql WHERE id='$id'");
    if ($q) {
        $msg = "Updated";
        $sts = "success";
    } else {
        $msg = mysqli_error($dbc);
        $sts = "danger";
    }
}


?>