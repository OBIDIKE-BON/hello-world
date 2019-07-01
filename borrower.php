<?php require_once './includes/header.php'; ?>
<?php require_once './includes/config.php'; ?>

<div class="col-lg-12 text-center text-primary">
    <h3>Borrower Registration</h3>  
</div>

<?php
if (isset($_POST['submit'])) {

    $Lib_num = $_POST['Lib_num'];
    $Book_number = $_POST['Book_number'];
    $Date = $_POST['Date'];

    $sql_two = "INSERT INTO borrower(lib_num, bk_call_num, date)"
            . "VALUES('$Lib_num', '$Book_number', '$Date')";

    $run_sql_two = mysqli_query($conn, $sql_two);
    ?>

    <?php if ($run_sql_two) { ?>
        <div class="bg-success text-center">
            you have successfully registered this borrower
        </div>
    <?php } ?>

    <?php
}
?>

<center>
    <form method="post" action="borrower.php">
        <div class="col-lg-4 form-group input-group">
            <label class="input-group-addon">Lib Number</label><input type="number" class="form-control" name="Lib_num" placeholder="Lib Number" required="required"/>
        </div>

        <div class="col-lg-4 form-group input-group">
            <label class="input-group-addon">Book Number</label><input type="text" class="form-control" name="Book_number" placeholder="Book Number" required="required"/>
        </div>

        <div class="col-lg-4 form-group input-group">
            <label class="input-group-addon">Date</label><input type="date" class="form-control" name="Date" placeholder="Date" required="required"/>
        </div>
</center>

<center>
    <div class="form-group input-group">
        <input type="submit"  name="submit" value="Submit" class="btn btn-success">
        <input type="reset"  value="Clear" class="btn btn-success">

    </div>
</center>

</form>

<?php require_once './includes/footer.php'; ?>

