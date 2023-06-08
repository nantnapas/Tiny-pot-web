<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
session_destroy();

$expire = time() - 3600;
setcookie('user', '', $expire);
setcookie('pswd', '', $expire);


header("refresh: 1; url=index.php");
?>

<!DOCTYPE html>
<html>
<body class="hold-transition login-page">
<section class="content">
<div class="login-box">

  <div class="login-box-body">
    <p class="login-box-msg"> Please wait ... </p>



  </div>
</div>


<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</section>
</body>
</html>
