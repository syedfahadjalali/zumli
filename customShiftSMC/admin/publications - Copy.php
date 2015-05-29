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

$title = 'Publications Insert Table';
require_once 'header.php';
require_once 'sidebar.php';
require '../api/general.php';
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
        $sql          = 'SELECT id, name, issue_date, pdf_link, cover_image FROM ' . $general->publications[$language];
        ;
        $publications = $link->query($sql);
        ?>
        <aside class="right-side">
            <div class="col-md-12">
                <br/><a href="?action_request=insert_records" class="btn btn-warning">Add New Publications</a><br/><br/>

                <?php
                if ($publications->num_rows > 0)
                {
                    ?>
                    <div class="span12" style="overflow: auto;max-width: none">
                        <table id="records" class="table table-striped table-bordered tableScroll" >
                            <thead>
                                <tr>
                                    <th>Cover</th>
                                    <th>Name</th>
                                    <th>Issue Date</th>
                                    <th>PDF Link</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>	
                            </thead>
                            <tbody>
                                <?php
                                foreach ($publications as $publication)
                                {
                                    $pdflinkshow = $publication['pdf_link'] == '' ? '#' : $publication['pdf_link'];
                                    echo "<tr>";
                                    echo "<td><img width='100px' class='thumbnail' src='../images/thumbnails/" . $publication['cover_image'] . "' data-action='cover_image' data-category='publications' data-post_id='" . $publication['id'] . "' data-post_type='" . $publication['id'] . "'/></td>";
                                    echo "<td><span class='name'>" . $publication['name'] . "</span></td>";
                                    echo "<td><span class='issue_date'>" . $publication['issue_date'] . "</span></td>";
                                    echo "<td><span class='pdf_link'><a href='".$pdflinkshow."'>PDF Link</a></span></td>";
                                    echo "<td><a href='?action_request=edit_records&id=" . $publication['id'] . "' class='btn btn-success' data-action='update' data-category='publications' data-post_id='" . $publication['id'] . "' data-post_type='" . $publication['id'] . "'>Edit</a></td>";
                                    echo "<td><a href='javascript://' class='btn btn-warning delete_row' data-action='delete' data-category='publications' data-post_id='" . $publication['id'] . "' data-post_type='" . $publication['id'] . "'>Delete</a></td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Cover</th>
                                    <th>Name</th>
                                    <th>Issue Date</th>
                                    <th>PDF Link</th>
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
                    <h2>Publications</h2>
                    <div id='loadingmessage' style='display:none'>
                        <img src='../images/loader.gif'/>
                    </div>
                    <div class="alert" style="display:none;"></div>
                    <form id="custom-form" role="form" method="post" enctype="multipart/form-data">

                        <input type="hidden" name="action" value="insert"/>
                        <input type="hidden" name="category" value="publications"/>


                        <div class="form-group">
                            <label for="cover_photo">Select Cover Photo:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-file"></i>
                                </span>
                                <input type="file" id="cover_photo" class="validate[required] form-control" name="cover_photo" required/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name">Name:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-tumblr"></i>
                                </span>
                                <input type="text" class="validate[required] form-control" id="name" placeholder="Name" name="name" required/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="issue_date">Issue Date:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                                <input type="date" class="validate[required, custom[date]] form-control" id="issue_date" placeholder="Publication issue date" name="issue_date" required/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="pdf_link">PDF Link:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-database"></i>
                                </span>
                                 <input type="file" id="pdf_link1" class="validate[required] form-control" name="pdf_link1" required/>
                                <!--<input type="url" class="validate[required] form-control" id="pdf_link1" placeholder="PDF link" name="pdf_link1" /> -->
                            </div>
                        </div>

                        <br/><br/>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" name="btn_submit" id="btn_submit">Add Publication</button>
                            <button type="reset" class="btn btn-danger" name="reset" id="reset">Reset Form</button>
                            <a href="?action_request=show_records" class="btn btn-warning">View Publications</a>
                        </div>
                    </form>
                </div>
            </aside>
        </div>

        <?php
    }
        else if ($action == 'edit_records')
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
        $sql          = 'SELECT id, name, issue_date, pdf_link, cover_image FROM ' . $general->publications[$language]. ' where id='.$_GET['id'];
        ;
        $publications = $link->query($sql);
        foreach ($publications as $publication)
            {
            ?>

            <aside class="right-side">
                <div class="col-md-9">
                    <h2>Publications</h2>
                    <div id='loadingmessage' style='display:none'>
                        <img src='../images/loader.gif'/>
                    </div>
                    <div class="alert" style="display:none;"></div>
                    <form id="custom-form" role="form" method="post" enctype="multipart/form-data">

                        <input type="hidden" name="post_id" value="<?php echo $_GET['id'] ?>"/>
                        <input type="hidden" name="action" value="update"/>
                        <input type="hidden" name="category" value="publications"/>

                        <div class="form-group">
                            <label for="name">Name:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-tumblr"></i>
                                </span>
                                <input value="<?php echo $publication['name'] ?>" type="text" class="validate[required] form-control" id="name" placeholder="Name" name="name" required/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="issue_date">Issue Date:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                                <input value="<?php echo $publication['issue_date'] ?>" type="date" class="validate[required, custom[date]] form-control" id="issue_date" placeholder="Publication issue date" name="issue_date" required/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="pdf_link">PDF Link:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-database"></i>
                                </span>
                                <a href="<?php echo $publication['pdf_link'] ?>" target="_blank"><?php echo $publication['pdf_link'] ?></a>
                                <!-- <input type="hidden" name="epdf_link" value="<?php echo $publication['pdf_link'] ?>"> -->
                               <input type="file" id="pdf_link1" class="validate[required] form-control" name="pdf_link1"/>
                               <!--  <input type="url" class="form-control" id="pdf_link1" placeholder="PDF link" name="pdf_link1" /> -->
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="cover_photo">Select Cover Photo:</label>
                            <img width='100px' class='thumbnail' src='../images/thumbnails/<?php echo $publication['cover_image']; ?>' data-action='cover_image' data-category='publications1' data-post_id='<?php echo $publication['id']; ?>' data-post_type='<?php echo $publication['id']; ?>'/>
                            <!-- <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-file"></i>
                                </span>
                                <?php echo "<img width='100px' class='thumbnail' src='../images/thumbnails/" . $publication['thumbnail_image'] . "' data-action='thumbnail' data-category='race_courses' data-post_id='" . $race_course['id'] . "' data-post_type='" . $publication['id'] . "'/>"; ?>
                                <input type="file" id="cover_photo" class="validate[required] form-control" name="cover_photo" required/>
                            </div> -->
                        </div>

                        <br/><br/>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" name="btn_submit" id="btn_submit">Update Publication</button>
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