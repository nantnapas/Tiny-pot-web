
<?php
    include "connect.php";
    if (isset($_COOKIE['user']) && isset($_COOKIE['pswd'])) {
    $_POST['user'] = $_COOKIE['user'];
    $_POST['pswd'] = $_COOKIE['pswd'];
  
    }
    if ($_POST) {
    $user = $_POST['user'];
    $pswd = $_POST['pswd'];
  

    $sql = "SELECT * FROM member WHERE user = '$user' AND password = '$pswd'";
    $rs = mysqli_query($c, $sql);
    $data = mysqli_fetch_array($rs);
    $address = $data['address'];

    if (mysqli_num_rows($rs) == 0) {
    $err = '<span class="err">NOT FOUND</span>';
    } else {
    if (!empty($data['verify'])) {
    mysqli_close($link);
    header("location: verify.php");
    ob_end_flush();
    exit;
    }

    if (@$_POST['save_account']) {
    $expire = time() + 30 * 24 * 60 * 60;
    setcookie("user", "$user");
    setcookie("pswd", "$pswd");
    }

    $_SESSION['id'] = $data['id'];
    $_SESSION['user'] = $data['name'];
    $_SESSION['codeuser'] = $data['user'];
    }
    }
    mysqli_close($c);
 ?>


<?php
if (!isset($_SESSION['user'])) {
?>
    
    <div class="col-lg-12">
    <?php echo @$err; ?>
    </div>
    <form class="form-control-sm has-feedback" id="login" method="post">
        <div class="col-lg-12">
            <div class="form-control-sm has-feedback">
                <input class="form-control-sm" type="text" name="user" autocomplete="off"  placeholder="ชื่อผู้ใช้" required>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                <br>
                <input class="form-control-sm" type="password" name="pswd" autocomplete="off"  placeholder="รหัสผ่าน" required>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
                <div class="col-lg-12">
                    <button type="submit" class="btn-sm btn-info">Sign In</button>
                    <button type="reset" class="btn-sm btn-danger">Reset</button>
                </div>
            </div> 
        </div>          
    </form>
   
    <?php
        } 
        else {
            echo "<div class='col-lg-12 bg-info  text-center'>";
            echo "<b class='text-white'> $_SESSION[user] </b>";
            echo "</div>";
            echo "<div class='col-lg-12 mt-1'>";          
            echo "<span class='lnr lnr-cart'></span><a href='basket_add.php' ><span class='hidden-xs'>BASKET<span></a> "; 
            echo "<BR>";
            echo "<span class='lnr lnr-power-switch'></span><a href='logout.php' ><span class='hidden-xs'>Sign out<span></a> ";         
            echo "</div>";
        }
    ?>