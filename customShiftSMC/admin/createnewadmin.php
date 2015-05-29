<?php
$title = 'Welcome Admin in Aladiyat';
require_once 'header.php';
require_once 'sidebar.php';
if (isset($_SESSION['name']) && isset($_SESSION['admin_type']))
{
    ?>

    <aside class="right-side">
        <div class="col-md-9">
            <h2>Enter Admin Info</h2>
            <?php
            if (isset($_GET['error']))
            {
                if ($_GET['error'] == 0)
                {
                    ?>
            <p style="background-color: #0075b0; color: red">Successfully Record Insert</p>
                    <?php
                }
                if ($_GET['error'] == 1)
                {
                    ?>
            <p style="background-color: #0075b0; color: red">Error in  Record Insertion</p>
                    <?php
                }
                if ($_GET['error'] == 2)
                {
                    ?>
            <p style="background-color: #0075b0; color: red">Password does not Match</p>
                    <?php
                }
            }
            ?>
            <div class="alert" style="display:none;"></div>
            <form action="processData.php" role="form" method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="name">Name:</label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-tumblr"></i>
                        </span>
                        <input type="text" class="validate[required] form-control" id="name" placeholder="Name" name="name" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </span>
                        <input type="email" class="validate[required] form-control" id="review-text" placeholder="Email" name="email" required/>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </span>
                        <input type="password" class="validate[required] form-control" id="review-text" placeholder="Password" name="password" required/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password">Conform Password:</label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </span>
                        <input type="password" class="validate[required] form-control" id="review-text" placeholder="Password" name="repassword" required/>
                    </div>
                </div>
                <input type="hidden" name="action" value="insert">
                <input type="hidden" name="category" value="insertAdmin">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" name="submit" id="submit">Submit</button>
                    <button type="reset" class="btn btn-danger" name="reset" id="reset">Reset Form</button>
                </div>
            </form>
        </div>
        <?php
    }
    else
    {
        ?>
        <script>    window.location.replace("<?php echo base_url ?>");</script>
        <?php
    }
    ?>
</aside></div>
<?php
require_once 'footer.php';
?>