<?php require_once("includes/session.php") ?>
<?php require_once("includes/connection.php") ?>
<?php require_once("includes/functions.php") ?>
<?php
if (isset($_SESSION["Admin_id"])) {
    $id = mysql_prep($_SESSION['Admin_id']);
    $query = "SELECT *
                FROM `admin_table`                
                WHERE `id`='{$id}' LIMIT 1";
    confirm_query($query);
    $resultset = mysqli_query($server, $query);
    if (mysqli_num_rows($resultset) == 1) {
        $result = mysqli_fetch_array($resultset);
    } else {
        echo 'Acees denied. invalid User id \n <a href=\"login.php\">click here to login again</a>' . mysql_error($server);
    }
} else {
    redirect_to("login.php");
}
?>
<?php require_once './includes/header.php'; ?>
<div class="row">
    <div class="col-md-12">
        <div class="well-lg"> 
            <div class="title_blue text-center">Welcome <?php echo $result["User_name"] . ' ;' ?> TO THIS LIBRARY MANAGER<br />
            </div><br />
            <div class="text-center  bg-info">Please Click View Reports Menu To View a Report</div>
        </div>
        <div id="selected_view" class="selected_view">
            <?php
            if (!empty($result)) {
                
            } else {
                redirect_to("login.php");
            }
            ?>
        </div> 
    </div>    
</div>
<div class="row">
    <div class="container">
        <div class="col-md-4"></div>
        <div class="well-lg  col-md-4 btn-group">
            <a class="bg-primary btn-lg" href="index.php">Home</a>
            <a class="bg-warning btn-lg" href="includes/logout.php">Sign Out</a>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>
<?php require_once './includes/footer.php'; ?>

