<?php require_once 'includes/connection.php'; ?>
<?php require_once 'includes/functions.php'; ?>
<?php require_once 'includes/session.php'; ?>
<?php
if (isset($_POST["login"])) {
    $erors = array();
    $required_fields = array('Username', 'Password');
    $erors = array_merge($erors, required_fields($required_fields));
    if (empty($erors)) {
        $Username = mysql_prep($_POST['Username']);
        $password = mysql_prep($_POST['Password']);
        $query = "SELECT `id`,`User_name`
 FROM `admin_table` 
 WHERE `User_name`='{$Username}'
 AND `password`='{$password}' LIMIT 1";
        $resultset = mysqli_query($server, $query);
        if (mysqli_num_rows($resultset) == 1) {
            $foundstudent = mysqli_fetch_array($resultset);
            $_SESSION['Admin_id'] = $foundstudent['id'];
            $_SESSION['User_name'] = $foundstudent['User_name'];
            redirect_to("Admin.php");
        } else {
            $message = "Wrong Username or Password" . mysql_error();
        }
    } else {
        $message = "There were " . count($erors) . " error(s) in the form";
    }
} elseif (isset($_SESSION['Admin_id'])) {
    redirect_to("Admin.php");
}//end: if (isset($_POST['login'])) {
?>
<?php require_once("includes/header.php") ?>
    <div class="container">
            <?php
    if (!empty($message)) {
        echo "<div class=\"row\">"
        . "<div class=\"col-md-2\"></div>"
        . " <div class=\"well col-md-8 text-center\">"
        . "<span class=\"text-danger\">"
                 . $message;
    }
    if (!empty($erors)) {
        display_errors($erors);
        echo"<span></div>"
        . "<div class=\"col-md-2\"></div>"
        . "</div>";
    }
    ?>

        <div class="row">
            <div class="col-md-3"></div>
            <div class="jumbotron col-md-6 text-center">
                <div class="row">
                    <h3 class="text-info">Enter Your Details to Login</h3>
                    <div class="col-md-12">
                        <form role="form" action="<?php $_PHP_SELF; ?>" method="post">
                            <div class="form-group input-group">
                                <span class="input-group-addon">Username <span class="glyphicon glyphicon-user"></span></span>
                                <input type="text"  name="Username" class="form-control" placeholder="Username" required>
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon">Password  <span class="glyphicon glyphicon-lock"></span></span>
                                <input type="password"  name="Password" class="form-control" placeholder="Password" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="login" class="form-control btn btn-primary">Sign in</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-3"></div> 
        </div>

        <div class="row">  
            <div class="col-md-12">
                <p>&nbsp;</p>
            </div>
        </div>
        <div class="row">  
            <div class="col-md-12">
                <p>&nbsp;</p>
            </div>
        </div>
        <div class="row">  
            <div class="col-md-12">
                <p></p>
            </div>
        </div>



        <div class="row">  
            <div class="col-md-4"></div>   
        </div>
    </div>
    <!-- end of content  -->
    <?php include("includes/footer.php") ?>
