<?php require_once './includes/header.php'; ?>
<?php require_once './includes/config.php'; ?>

<div class="col-lg-12 text-center text-primary">
    <h3>Book Registration</h3>  
</div>

<div class="col-lg-12">

    <form method="post"action="registration.php" >
        <center>

            <?php
            if (isset($_POST['submit'])) {

                $Title = $_POST['Title'];
                $Author = $_POST['Author'];
                $Date_of_pub = $_POST['Date_of_pub'];
                $Publisher = $_POST['Publisher'];
                $Isbn = $_POST['Isbn'];
                $Shelf_num = $_POST['Shelf_num'];
                $Pagination = $_POST['Pagination'];

                $sql_one = "INSERT INTO books(title, author, date_of_pub, publisher, Isbn, shelf_num, pagination)"
                        . "VALUES('$Title','$Author','$Date_of_pub','$Publisher','$Isbn','$Shelf_num','$Pagination')";

                $run_sql_one = mysqli_query($conn, $sql_one);
                ?>


                <?php if ($run_sql_one) { ?>

                    <div class="bg-success text-center">
                        you have successfully registered <?php echo $Title; ?>
                    </div><br/>
                    <?php
                }
            }
            ?>
            
                <div class="col-lg-4 form-group input-group">
                    <label class="input-group-addon">Title</label><input type="text" class="form-control" name="Title" placeholder="Book title" required="required"/>
                </div>

                <div class="col-lg-4 form-group input-group">
                    <label class="input-group-addon">Author</label><input type="text" class="form-control" name="Author" placeholder="Author" required="required"/>
                </div>

                <div class="col-lg-4 form-group input-group">
                    <label class="input-group-addon">Date of Publication</label><input type="date" class="form-control" name="Date_of_pub" placeholder="Date of Publication" required="required"/>
                </div>

                <div class="col-lg-4 form-group input-group">
                    <label class="input-group-addon">Publisher</label><input tlype="text" class="form-control" name="Publisher" placeholder="Publisher" required="required"/>
                </div>

                <div class="col-lg-4 form-group input-group">
                    <label class="input-group-addon">ISBN</label><input type="text" class="form-control" name="Isbn" placeholder="ISBN" required="required"/>
                </div>

                <div class="col-lg-4 form-group input-group">
                    <label class="input-group-addon">Shelf Number</label><input type="number" class="form-control" name="Shelf_num" placeholder="Shelf Number" required="required"/>
                </div>

                <div class="col-lg-4 form-group input-group">
                    <label class="input-group-addon">pagination</label><input type="text" class="form-control" name="Pagination" placehoinatilder="pagination" required="required"/>
                </div>


        </center>
        <center>
            <div class="form-group input-group">
                <input type="submit"  name="submit" value="Validate" class="btn btn-success">
                <input type="reset"  value="Clear" class="btn btn-success">
                <a href="#" class="btn btn-success">Cancel</a>
            </div>
        </center>

    </form>

<div style="height: 100px;"></div>
</div>





<?php require_once './includes/footer.php'; ?>