<?php
$title = 'Welcome Admin in Aladiyat';
require_once 'header.php';
require_once 'sidebar.php';
require '../api/general.php';
?>
<script type='text/javascript' src='../scripts/ckeditor/ckeditor.js'></script>


<script>
    $(document).ready(function() {

       $("#custom-form").submit(function(){
         for (instance in CKEDITOR.instances)
              CKEDITOR.instances[instance].updateElement();
           return true;
        });
});
</script>

<?php

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
        $sql     = 'SELECT id,title, thumbnail_image, phone_number,fax_number,email,web,po_box,description FROM ' . $general->about_us[$language];
        $aboutus = $link->query($sql);
        ?>
        <aside class="right-side">
            <div class="col-md-12">
                <?php
                if ($aboutus->num_rows > 0)
                {
                    ?>
                    <br/><br/>
                    <div class="span12" style="overflow: auto; max-width: none">
                        <table id="records" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Logo</th>
                                    <th>Title</th>
                                    <th>Phone Number</th>
                                    <th>Fax Number</th>
                                    <th>Email</th>
                                    <th>Web</th>
                                    <th>POBox</th>
                                    <th>Description</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    <th>Edit Images</th>
                                </tr>	
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($aboutus as $single)
                                    {
                                        echo "<tr>";
                                        echo "<td><img width='100px' class='thumbnail' src='../images/thumbnails/" . $single['thumbnail_image'] . "' data-action='thumbnail' data-category='about_us' data-post_id='" . $single['id'] . "' data-post_type='" . $single['id'] . "'/></td>";
                                        echo "<td><span class='title'>" . $single['title'] . "</span></td>";
                                        echo "<td><span class='phone_number'>" . $single['phone_number'] . "</span></td>";
                                        echo "<td><span class='fax_number'>" . $single['fax_number'] . "</span></td>";
                                        echo "<td><span class='email'>" . $single['email'] . "</span></td>";
                                        echo "<td><span class='web'>" . $single['web'] . "</span></td>";
                                        echo "<td><span class='po_box'>" . $single['po_box'] . "</span></td>";
                                        echo "<td><span class='description'>" . $single['description'] . "</span></td>";
                                        echo "<td><a href='#' class='btn btn-success edit_row' data-action='update' data-category='aboutus' data-post_id='" . $single['id'] . "' data-post_type='" . $single['id'] . "'>Edit</a></td>";
                                        echo "<td><a href='#' class='btn btn-warning delete_row' data-action='delete' data-category='aboutus' data-post_id='" . $single['id'] . "' data-post_type='" . $single['id'] . "'>Delete</a></td>";
                                        echo "<td><a href='./images.php?id={$single['id']}&post_type=11' class='btn btn-warning edit_images'>Edit Images</a></td>";
                                        echo "</tr>";
                                    }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Logo</th>
                                    <th>Title</th>
                                    <th>Phone Number</th>
                                    <th>Fax Number</th>
                                    <th>Email</th>
                                    <th>Web</th>
                                    <th>POBox</th>
                                    <th>Description</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    <th>Edit Images</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <?php
                }
                else
                {
                    ?>
                    <br/><a href="?action_request=insert_records" class="btn btn-primary">Add About Us</a><br/><br/>
                    <?php
                    echo "<p>There are no About Us Information exists...</p>";
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
                    <h2>Add About Us Information</h2>
                    <div id='loadingmessage' style='display:none'>
                        <img src='../images/loader.gif'/>
                    </div>
                    <div class="alert" style="display:none;"></div>
                    <form id="custom-form" role="form" method="post" enctype="multipart/form-data" accept-charset="ISO-8859-1">

                        <input type="hidden" name="action" value="insert"/>
                        <input type="hidden" name="category" value="insertAboutUs"/>

                        <div class="form-group">
                            <label for="title">Title:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-tumblr"></i>
                                </span>
                                <input type="text" class="validate[required] form-control" id="title" placeholder="Title" name="title" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="phone_number">Phone Number:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                                <input type="tel" class="validate[required] form-control" id="phone_number" name="phone_number" required/>
                            </div>
                            <p id="phone_numbererror" style="color: red"></p>
                        </div>

                        <div class="form-group">
                            <label for="fax_number">Fax Number:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                                <input type="tel" class="validate[required, custom[date]] form-control" id="fax_number" placeholder="" name="fax_number" required/>
                            </div>
                            <p id="fax_numbererror" style="color: red"></p>
                        </div>

                        <div class="form-group">
                            <label for="po_box">POBox:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-align-justify" style="font-size: 18px;"></i>
                                </span>
                                <input type="text" class="form-control" placeholder="Po Box" name="po_box" required/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="web">Web:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-database"></i>
                                </span>
                                <input type="url" class="form-control" id="web" placeholder="web link" name="web" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                                <input type="email" class="validate[required, custom[date]] form-control" id="email" placeholder="Email" name="email" required/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description">Description:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                                <textarea class="validate[required, custom[date]] form-control" id="description" placeholder="Description" name="description"></textarea>
                            </div>
                        </div>
                        <div id="dynamic_content" class="form-group">
                            <p>if About Us have images, click on Add Image button to Add images</p>
                            <button type="button"  id="btAdd" >Add Image</button>
                            <span class="help-inline msg-exceed display-hide">Maximum limit exceeded.</span>
                        </div><br/>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" name="submit" id="submit">Submit</button>
                            <!--<button type="reset" class="btn btn-danger" name="reset" id="reset">Reset Form</button>-->
                            <a href="?action_request=show_records" class="btn btn-warning">View About Us</a>
                        </div>
                    </form>
                </div>
                <?php
        }
        if ($action == 'edit_records')
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
        $sql     = 'SELECT id,title, thumbnail_image, phone_number,fax_number,email,web,po_box,description FROM ' . $general->about_us[$language];
        $aboutuss = $link->query($sql);
        
        foreach ($aboutuss as $aboutus)
            {
                    ?>

            <aside class="right-side">
                <div class="col-md-9">
                    <h2>Update About Us Information</h2>
                    <div id='loadingmessage' style='display:none'>
                        <img src='../images/loader.gif'/>
                    </div>
                    <div class="alert" style="display:none;"></div>
                    <form id="custom-form" role="form" method="post" enctype="multipart/form-data" accept-charset="ISO-8859-1">

                        <input type="hidden" name="post_id" value="<?php echo $aboutus['id']; ?>"/>
                        <input type="hidden" name="action" value="update"/>
                        <input type="hidden" name="category" value="aboutus"/>

                        <div class="form-group">
                            <label for="title">Title:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-tumblr"></i>
                                </span>
                                <input value="<?php echo $aboutus['title']; ?>" type="text" class="validate[required] form-control" id="title" placeholder="Title" name="title" required>
                            </div>
                        </div>

                       <!-- <div class="form-group">
                            <label for="phone_number">Phone Number:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                                <input value="<?php// echo $aboutus['phone_number']; ?>" type="tel" class="validate[required] form-control" id="phone_number" name="phone_number" required/>
                            </div>
                            <p id="phone_numbererror" style="color: red"></p>
                        </div>

                        <div class="form-group">
                            <label for="fax_number">Fax Number:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                                <input value="<?php// echo $aboutus['fax_number']; ?>" type="tel" class="validate[required, custom[date]] form-control" id="fax_number" placeholder="" name="fax_number" required/>
                            </div>
                            <p id="fax_numbererror" style="color: red"></p>
                        </div>

                        <div class="form-group">
                            <label for="po_box">POBox:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-align-justify" style="font-size: 18px;"></i>
                                </span>
                                <input value="<?php// //echo trim($aboutus['po_box']); ?>" type="text" class="form-control" placeholder="Po Box" name="po_box" required/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="web">Web:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-database"></i>
                                </span>
                                <input value="<?php//echo trim($aboutus['web']); ?>" type="url" class="form-control" id="web" placeholder="web link" name="web" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                                <input value="<?php// echo $aboutus['email']; ?>" type="email" class="validate[required, custom[date]] form-control" id="email" placeholder="Email" name="email" required/>
                            </div>
                        </div>-->

                        <div class="form-group">
                            <label for="description">Description:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                                <textarea class="validate[required, custom[date]] form-control ckeditor" style="height:250px;" id="description" placeholder="Description" name="description"><?php echo $aboutus['description']; ?></textarea>

                            </div>
                        </div>
                        <div id="dynamic_content" class="form-group">
                            <p>Click on Add Image button to Add/Edit images (Size 420X150 Pixels, Max. size is 2MB)</p>
                            <a class="btn btn-warning" href="<?php echo base_url ?>images.php?id=1&post_type=11">Edit Image(s)</a>
                            <!-- <span class="help-inline msg-exceed display-hide">Maximum limit exceeded.</span> -->
                        </div><br/>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" name="submit" id="submit">Submit</button>
                            <!--<button type="reset" class="btn btn-danger" name="reset" id="reset">Reset Form</button>-->
                            <!-- <a href="?action_request=show_records" class="btn btn-warning">View About Us</a> -->
                        </div>
                    </form>
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
<?php
 if(isset($_REQUEST['msg']) && $_REQUEST['msg']=='2'){ ?>	
 <script>   alert("About Details Updated Successfully");</script>
<?php }
require_once 'footer.php';
?>