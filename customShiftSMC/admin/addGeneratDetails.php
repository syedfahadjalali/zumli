<?php
$title = 'Welcome Admin in Aladiyat';
require_once 'header.php';
require_once 'sidebar.php';
require '../api/general.php';
if (isset($_SESSION['name']))
{

    $action = isset($_GET['action_request']) ? $_GET['action_request'] : 'show_records';
    echo $action;
    if ($action == 'show_records')
    {
        $general = new General();
        if (isset($_SESSION['language']))
        {
            $language = $_SESSION['language'];
        }
        else
        {
            $language = 0;
        }
        if ($language == 1)
        {
            $sql = "SELECT g.`id`, g.`a_about`,g.`a_copyright`,g.`a_credits`,g.`website` FROM generaldetails g";
        }
        else
        {
            $sql = "SELECT g.`id`,g.`e_about`,g.`e_copyright`,g.`e_credits`,g.`website` FROM generaldetails g";
        }
        $genraldata = $link->query($sql);
        ?>
        <aside class="right-side">
            <div class="col-md-12">
                <?php
                if ($genraldata->num_rows > 0)
                {
                    ?>
                    <br/><br/>
                    <div class="span12" style="overflow: auto; max-width: none">
                        <table id="records" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>About</th>
                                    <th>Website</th>
                                    <th>Credits</th>
                                    <th>Copyrights</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>	
                            </thead>
                            <tbody>
                                <?php
                                if ($language == 0)
                                {
                                    foreach ($genraldata as $single)
                                    {
                                        echo "<tr>";
                                        echo "<td><span class='about'>" . $single['e_about'] . "</span></td>";
                                        echo "<td><span class='website'>" . $single['website'] . "</span></td>";
                                        echo "<td><span class='credits'>" . $single['e_credits'] . "</span></td>";
                                        echo "<td><span class='copyrights'>" . $single['e_copyright'] . "</span></td>";
                                        echo "<td><a href='#' class='btn btn-success edit_row' data-action='update' data-category='generaldetails' data-post_id='" . $single['id'] . "' data-post_type='" . $single['id'] . "'>Edit</a></td>";
                                        echo "<td><a href='#' class='btn btn-warning delete_row' data-action='delete' data-category='generaldetails' data-post_id='" . $single['id'] . "' data-post_type='" . $single['id'] . "'>Delete</a></td>";
                                        echo "</tr>";
                                    }
                                }
                                else
                                {
                                    foreach ($genraldata as $single)
                                    {
                                        echo "<tr>";
                                        echo "<td><span class='about'>" . $single['a_about'] . "</span></td>";
                                        echo "<td><span class='website'>" . $single['website'] . "</span></td>";
                                        echo "<td><span class='credits'>" . $single['a_credits'] . "</span></td>";
                                        echo "<td><span class='copyrights'>" . $single['a_copyright'] . "</span></td>";
                                        echo "<td><a href='#' class='btn btn-success edit_row' data-action='update' data-category='generaldetails' data-post_id='" . $single['id'] . "' data-post_type='" . $single['id'] . "'>Edit</a></td>";
                                        echo "<td><a href='#' class='btn btn-warning delete_row' data-action='delete' data-category='generaldetails' data-post_id='" . $single['id'] . "' data-post_type='" . $single['id'] . "'>Delete</a></td>";
                                        echo "</tr>";
                                    }
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>About</th>
                                    <th>Website</th>
                                    <th>Credits</th>
                                    <th>Copyrights</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <?php
                }
                else
                {
                    ?>
                    <br/><a href="?action_request=insert_records" class="btn btn-primary">Add General Data</a><br/><br/>
                    <?php
                    echo "<p>There are no General Details information exists...</p>";
                }
                ?>
            </div>

            <?php
        }
    if ($action == 'insert_records')
    {
        ?>

        <aside class="right-side">
            <div class="col-md-9">
                <h2>Add General Details</h2>
                <div class="alert" style="display:none;"></div>
                <form  action="processData.php" role="form" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="language">Language:</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-tumblr"></i>
                            </span>
                            <select name="languge" id="language">
                                <option value="0">English</option>
                                <option value="1">Arabic</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="about">About:</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-tumblr"></i>
                            </span>
                            <input type="text" class="validate[required] form-control" id="about" placeholder="About" name="about" required/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="website">Website:</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </span>
                            <input type="url" class="validate[required] form-control" id="review-text" placeholder="website" name="website" required/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="credits">Credits:</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </span>
                            <input type="text" class="validate[required] form-control" id="review-text" placeholder="credits" name="credits">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="copyrights">Copyrights:</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </span>
                            <input type="text" class="validate[required] form-control" id="review-text" placeholder="copyrights" name="copyrights">
                        </div>
                    </div>
                    <input type="hidden" name="action" value="insert">
                    <input type="hidden" name="category" value="insertGeneralDetails">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="submit" id="submit">Submit</button>
                        <!--<button type="reset" class="btn btn-danger" name="reset" id="reset">Reset Form</button>-->
                    </div>
                </form>
            </div>
            <?php
    }
    if ($action == 'edit_records')
    {
    $general = new General();
    if (isset($_SESSION['language'])) {
        $language = $_SESSION['language'];
    }
    else {
        $language = 0;
    }
    if ($language == 1) {
        $sql = "SELECT g.`id`, g.`a_about`,g.`a_copyright`,g.`a_credits`,g.`website` FROM generaldetails g";
    }
    else {
        $sql = "SELECT g.`id`,g.`e_about`,g.`e_copyright`,g.`e_credits`,g.`website` FROM generaldetails g";
    }
    $genraldata = $link->query($sql);
    foreach ($genraldata as $single)
    {
        if ($language == 1)
        {
            $about = $single['a_about'];
            $credits = $single['a_credits'];
            $copyrights = $single['a_copyright'];
        }
        else
        {
            $about = $single['e_about'];
            $credits = $single['e_credits'];
            $copyrights = $single['e_copyright'];
        }
        $sid = $single['id'];
        $website = $single['website'];
    }
        ?>

        <aside class="right-side">
            <div class="col-md-9">
                <h2>Edit General Details</h2>
                <div class="alert" style="display:none;"></div>
                <form  action="processData.php" role="form" method="post" enctype="multipart/form-data">
                    
                    <input type="hidden" name="post_id" value="<?php echo $sid; ?>"/>
                    <input type="hidden" name="action" value="update"/>
                    <input type="hidden" name="category" value="generaldetails"/>
                    
                    <!-- <div class="form-group">
                        <label for="language">Language:</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-tumblr"></i>
                            </span>
                            <select name="languge" id="language">
                                <option value="0">English</option>
                                <option value="1">Arabic</option>
                            </select>
                        </div>
                    </div> -->

                    <div class="form-group">
                        <label for="about">About:</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-tumblr"></i>
                            </span>
                            <textarea class="validate[required, custom[date]] form-control" style="height:250px;" id="about" placeholder="Description" name="about"><?php echo $about; ?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="website">Website:</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </span>
                            <input value="<?php echo $website; ?>" type="url" class="validate[required] form-control" id="review-text" placeholder="website" name="website" required/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="credits">Credits:</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </span>
                            <input value="<?php echo $credits; ?>" type="text" class="validate[required] form-control" id="review-text" placeholder="credits" name="credits">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="copyrights">Copyrights:</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </span>
                            <input value="<?php echo $copyrights; ?>" type="text" class="validate[required] form-control" id="review-text" placeholder="copyrights" name="copyrights">
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="submit" id="submit">Submit</button>
                        <!--<button type="reset" class="btn btn-danger" name="reset" id="reset">Reset Form</button>-->
                    </div>
                </form>
            </div>
            <?php
    if (isset($_GET['id'])) {
        if($_GET['id'] != "") {
           echo "<script>alert('Record Successfully Update');</script>";
        }
    }
            
        }
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