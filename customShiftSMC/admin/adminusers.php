<style>
    .tableScroll{
        width:200px;
        max-width:200px;
        overflow-x:scroll;
    }
</style>
<?php
error_reporting(1);
ini_set('display_errors', 1);

$title = 'Welcome Admin in Aladiyat';
require_once 'header.php';
require_once 'sidebar.php';
require '../api/general.php';

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
            
if (isset($_SESSION['name']))
{
    $action = isset($_GET['action_request']) ? $_GET['action_request'] : 'show_records';

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
        $sql          = 'SELECT id, name, email FROM admin';
        ;
        $publications = $link->query($sql);
        ?>
        <aside class="right-side">
            <div class="col-md-12">
                <br/><a href="?action_request=insert_records" class="btn btn-warning">Add New Admin</a><br/><br/>

                <?php
                if ($publications->num_rows > 0)
                {
                    ?>
                    <div class="span12" style="overflow: auto;max-width: none">
                        <table id="records" class="table table-striped table-bordered tableScroll" >
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>	
                            </thead>
                            <tbody>
                                <?php
                                foreach ($publications as $publication)
                                {
                                    echo "<tr>";
                                    echo "<td><span class='name'>" . $publication['name'] . "</span></td>";
                                    echo "<td><span class='issue_date'>" . $publication['email'] . "</span></td>";
                                    echo "<td><a href='?action_request=edit_records&id=" . $publication['id'] . "' class='btn btn-success' data-action='update' data-category='publications' data-post_id='" . $publication['id'] . "' data-post_type='" . $publication['id'] . "'>Edit</a></td>";
                                    echo "<td><a href='#' class='btn btn-warning delete_row' data-action='delete' data-category='adminusers' data-post_id='" . $publication['id'] . "' data-post_type='" . $publication['id'] . "'>Delete</a></td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
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
                    echo "<p>There are no Aritcle exists...</p>";
                }
                ?>
            </div>

            <?php
        }
        else if ($action == 'insert_records')
        {
            ?>

            <aside class="right-side">
                <div class="col-md-9">
                    <h2>Add New Admin</h2>
                    <div id='loadingmessage' style='display:none'>
                        <img src='../images/loader.gif'/>
                    </div>
                    <div class="alert" style="display:none;"></div>
                    <form id="custom-form" role="form" method="post" enctype="multipart/form-data">

                        <input type="hidden" name="action" value="insert"/>
                        <input type="hidden" name="category" value="insertAdmin"/>

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
                        <br/><br/>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" name="btn_submit" id="btn_submit">Submit</button>
                            <button type="reset" class="btn btn-danger" name="reset" id="reset">Reset Form</button>
                            <a href="?action_request=show_records" class="btn btn-warning">View Admin Users</a>
                        </div>
                    </form>
                </div>
            </aside>
        </div>

        <?php
    }
        else if ($action == 'edit_records')
        {
        
        $sql          = 'SELECT id, name,email,password FROM admin where id='.$_GET['id'];
        $adminusers = $link->query($sql);
        foreach ($adminusers as $adminuser)
            {
            ?>

            <aside class="right-side">
                <div class="col-md-9">
                    <h2>Update Admin User</h2>
                    <div id='loadingmessage' style='display:none'>
                        <img src='../images/loader.gif'/>
                    </div>
                    <div class="alert" style="display:none;"></div>
                    <form id="custom-form" role="form" method="post" enctype="multipart/form-data">

                        <input type="hidden" name="post_id" value="<?php echo $_GET['id'] ?>"/>
                        <input type="hidden" name="action" value="update"/>
                        <input type="hidden" name="category" value="updateAdmin"/>

                        <div class="form-group">
                    <label for="name">Name:</label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-tumblr"></i>
                        </span>
                        <input value="<?php echo $adminuser["name"] ?>" type="text" class="validate[required] form-control" id="name" placeholder="Name" name="name" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </span>
                        <input value="<?php echo $adminuser["email"] ?>" type="email" class="validate[required] form-control" id="review-text" placeholder="Email" name="email" required/>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </span>
                        <input value="<?php echo $adminuser["password"] ?>" type="password" class="validate[required] form-control" id="review-text" placeholder="Password" name="password" required/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password">Conform Password:</label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </span>
                        <input value="<?php echo $adminuser["password"] ?>" type="password" class="validate[required] form-control" id="review-text" placeholder="Password" name="repassword" required/>
                    </div>
                </div>
                        <br/><br/>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" name="btn_submit" id="btn_submit">Submit</button>
                            <button type="reset" class="btn btn-danger" name="reset" id="reset">Reset Form</button>
                            <a href="?action_request=show_records" class="btn btn-warning">View Publications</a>
                        </div>
                    </form>
                </div>
            </aside>
        </div>

        <?php
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
<?php require_once 'footer.php';
?>