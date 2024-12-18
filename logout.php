<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
session_destroy();
?>
<p>Please Wait</p>
<script type="text/javascript">
    setTimeout(function () {
        window.location.href = "login.php";
    }, 2000);
</script>