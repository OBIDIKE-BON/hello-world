<?php require_once './includes/header.php'; ?>
<?php require_once './includes/config.php'; ?>
<div class="row">
    <div class="col-md-3"></div>
    <div class="jumbotron col-md-6 text-center">
        <div class="row">
            <h3 class="text-primary">Enter The Details Of The Book you Need</h3>
            <div class="col-md-12">
                <form role="form" action="<?php $_PHP_SELF; ?>" method="post">
                    <div class="form-group input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span>Author</span>
                        <input type="text" name="Author" class="form-control" placeholder="Author" >
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-text-size"></span>Title</span>
                        <input type="text"  name="Title" class="form-control" placeholder="Title">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="Search" class="form-control btn btn-success">Search <span class="glyphicon glyphicon-search"></span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-4"></div> 
</div>

<?php
if (isset($_POST['Search'])) {

    $Author = $_POST['Author'];
    $Title = $_POST['Title'];

    $sql_three = "SELECT * FROM books WHERE author = '$Author' OR title = '$Title'";

    $run_sql_three = mysqli_query($conn, $sql_three);
    $count = 1;
    ?>

    <table class="table table-bordered table-responsive table-hover table-striped table-condensed">
        <thead>
        <th>S/N</th><th>TITLE</th><th>AUTHOR</th><th>DATE OF PUBLICATION</th><th>PUBLISHER</th><th>ISBN</th><th>PAGINATION</th><th>SHELF NUMBER</th>
    </thead>
    </thead>
    <?php while ($row = mysqli_fetch_assoc($run_sql_three)) { ?>
        <tr>
            <td>
               <?php echo $count; ?>
            </td>
            <td>
                <?php echo strtoupper($row['title']); ?>
            </td>
            <td>
                <?php echo strtoupper($row['author']); ?>
            </td>
            
            <td>
                <?php echo strtoupper($row['date_of_pub']); ?>
            </td>
            
            <td>
                <?php echo strtoupper($row['publisher']); ?>
            </td>
            
            <td>
                <?php echo strtoupper($row['isbn']); ?>
            </td>
            
            <td>
                <?php echo strtoupper($row['pagination']); ?>
            </td>
            
            <td>
                <?php echo strtoupper($row['shelf_num']); ?>
            </td>
        </tr>

       
        <?php $count++; }?>
         </table>
<?php
}
?>


<?php require_once './includes/footer.php'; ?>