<?php
session_start();
include_once 'inc/code.php'; ?>
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['login_user'])): ?>
    <script type="text/javascript">window.location.href = "index.php";</script>
<?php endif; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <?php include_once 'inc/head.php' ?>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <div class="card mt-3">
                    <div class="card-body">
                        <?php if (!empty($msg)): ?>
                            <div class="alert alert-<?= $sts ?>"><?= $msg ?></div>
                        <?php endif; ?>
                        <form action="login.php" method="post">
                            <h2>Login</h2>
                            <hr>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" placeholder="example@domain.com"
                                    required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="**********"
                                    required>
                            </div>
                            <div class="mt-3">
                                <button class="btn btn-success" name="login_btn" type="submit">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>