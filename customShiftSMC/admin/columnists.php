<?php
$title = 'Columnists Insert Table';
require_once 'header.php';
require_once 'sidebar.php';
require '../api/general.php';?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
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
        $sql        = 'SELECT id, name, location, thumbnail_image, description, data FROM ' . $general->columnists[$language]. ' order by id desc';
        $columnists = $link->query($sql);
        ?>
        <aside class="right-side">
            <div class="col-md-12">
                <br/><a href="?action_request=insert_records" class="btn btn-primary">Add Columnists</a><br/><br/>

                <?php
                if ($columnists)
                {
                    if ($columnists->num_rows > 0)
                    {
                        ?>
                        <div class="span12" style="overflow: auto; max-width: none">
                            <table id="records" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Photo</th>
                                        <th>Name</th>
                                        <th>Location</th>
                                        
                                        <!--<th>Extra Data</th>-->
                                        <th>Edit</th>
                                        <th>Delete</th>
                                        <!--<th>Edit Images</th> -->
                                    </tr>	
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($columnists as $columnist)
                                    {
                                        echo "<tr>";
                                        echo "<td><img width='100px' class='thumbnail' src='../images/thumbnails/" . $columnist['thumbnail_image'] . "' data-action='thumbnail' data-category='columnists' data-post_id='" . $columnist['id'] . "' data-post_type='" . $columnist['id'] . "'/></td>";
                                        echo "<td><span class='name'>" . $columnist['name'] . "</span></td>";
                                        echo "<td><span class='location'>" . $columnist['location'] . "</span></td>";
                                       // echo "<td><span class='description'>" . $columnist['description'] . "</span></td>";
                                       // echo "<td><span class='data'>" . $columnist['data'] . "</span></td>";
                                        echo "<td><a href='?action_request=edit_records&id=" . $columnist['id'] . "' class='btn btn-success' data-action='update' data-category='columnists' data-post_id='" . $columnist['id'] . "' data-post_type='" . $columnist['id'] . "'>Edit</a></td>";
                                        echo "<td><a href='#' class='btn btn-warning delete_row' data-action='delete' data-category='columnists' data-post_id='" . $columnist['id'] . "' data-post_type='" . $columnist['id'] . "'>Delete</a></td>";
                                       // echo "<td><a href='./images.php?id={$columnist['id']}&post_type=2' class='btn btn-warning edit_images'>Edit Images</a></td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Photo</th>
                                        <th>Title</th>
                                        <th>Location</th>
                                       
                                        <!--<th>Extra Data</th>-->
                                        <th>Edit</th>
                                        <th>Delete</th>
                                       <!-- <th>Edit Images</th> -->
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <?php
                    }
                }
                else
                {
                    echo "<p>There are no columnists exists...</p>";
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
                    <h2>Add New Columnists</h2>
                    <div id='loadingmessage' style='display:none'>
                        <img src='../images/loader.gif'/>
                    </div>
                    <div class="alert" style="display:none;"></div>
                    <form id="custom-form" role="form" method="post" enctype="multipart/form-data" accept-charset="ISO-8859-1">

                        <input type="hidden" name="action" value="insert"/>
                        <input type="hidden" name="category" value="columnists"/>

                        <div class="form-group">
                            <label for="name">Name:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-tumblr"></i>
                                </span>
                                <input type="text" class="validate[required] form-control" id="name" placeholder="Name" name="name" value="" required/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="location">Location:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                                <input type="text" class="validate[required] form-control" id="location" placeholder="Columnists location" name="location" value="" required/>
                            </div>
                        </div>

                        <!--<div class="form-group">
                            <label for="description">Description:</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-align-justify" style="font-size: 18px;"></i></span>
                                <textarea style="height:250px;" class="ckeditor form-control" placeholder="Columnists Description" name="description"></textarea>
                            </div>
                        </div> -->

                        <!--<div class="form-group">
                            <label for="columnists-data">Columinists Data (Optional):</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-database"></i>
                                </span>
                                <input type="text" class="form-control" id="columnists-data" placeholder="Columnists Data" name="columnists-data" value="">
                            </div>
                        </div>-->

                        <div class="form-group">
                            <label for="thumbnail">Select Columnists Photo (Size 200x220 Pixels, Max. size is 2MB)</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-file"></i>
                                </span>
                                <input type="file" id="thumbnail" class="validate[required] form-control" name="thumbnail" required/>
                            </div>
                        </div><br/>

                       <!-- <div id="dynamic_content" class="form-group">
                            <p>if Columinists have images, click on Add Image button to select images</p>
                            <button type="button"  id="btAdd" >Add Image</button>
                            <span class="help-inline msg-exceed display-hide">Maximum limit exceeded.</span>
                        </div><br/> -->

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" name="btn_submit" id="btn_submit">Add Columnist</button>
                           <!-- <button type="reset" class="btn btn-danger" name="reset" id="reset">Reset Form</button>-->
                            <a href="?action_request=show_records" class="btn btn-warning">View Columnists</a>
                        </div>
                    </form>
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
        $sql        = 'SELECT id, name, location, thumbnail_image, description, data FROM ' . $general->columnists[$language]. " where id=".$_GET['id'];
        $columnists = $link->query($sql);
        foreach ($columnists as $columnist)
        {
            ?>

            <aside class="right-side">
                <div class="col-md-9">
                    <h2>Update New Columnists</h2>
                    <div id='loadingmessage' style='display:none'>
                        <img src='../images/loader.gif'/>
                    </div>
                    <div class="alert" style="display:none;"></div>
                    <form id="custom-form" role="form" method="post" enctype="multipart/form-data" accept-charset="ISO-8859-1">

                        <input type="hidden" name="post_id" value="<?php echo $_GET['id'] ?>"/>
                        <input type="hidden" name="action" value="update"/>
                        <input type="hidden" name="category" value="columnists"/>

                        <div class="form-group">
                            <label for="name">Name:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-tumblr"></i>
                                </span>
                                <input value="<?php echo $columnist['name'] ?>" type="text" class="validate[required] form-control" id="name" placeholder="Name" name="name" value="" required/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="location">Location:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                                <input value="<?php echo $columnist['location'] ?>" type="text" class="validate[required] form-control" id="location" placeholder="Columnists location" name="location" value="" required/>
                            </div>
                        </div>

                       <!-- <div class="form-group">
                            <label for="description">Description:</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-align-justify" style="font-size: 18px;"></i></span>
                               // <textarea style="height:250px;" class="ckeditor form-control" placeholder="Columnists Description" name="description">//////<?php //echo $columnist['description'] ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="columnists-data">Columinists Data (Optional):</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-database"></i>
                                </span>
                                <input type="text" class="form-control" id="columnists-data" placeholder="Columnists Data" name="columnists-data" value="">
                            </div>
                        </div>-->

                        <div class="form-group">
                            <label for="thumbnail">Select Columnists Photo (Size 200x220 Pixels)</label>
                            <img width='100px' class='thumbnail' src='../images/thumbnails/<?php echo $columnist['thumbnail_image']; ?>' data-action='thumbnail' data-category='columnists1' data-post_id='<?php echo $columnist['id']; ?>' data-post_type='<?php echo $columnist['id']; ?>'/>
                            <!-- <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-file"></i>
                                </span>
                                <input type="file" id="thumbnail" class="validate[required] form-control" name="thumbnail" required/>
                            </div> -->
                        </div><br/>

                        <div id="dynamic_content" class="form-group">
                            <!-- <p>if Columinists have images, click on Add Image button to select images</p>
                            <button type="button"  id="btAdd" >Add Image</button>
                            <span class="help-inline msg-exceed display-hide">Maximum limit exceeded.</span> -->
                            <!--<a class="btn btn-warning" href="<?php echo base_url ?>images.php?id=<?php echo $columnist['id'] ?>&post_type=2">Edit Image(s)</a> -->
                        </div><br/>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" name="btn_submit" id="btn_submit">Update Columnist</button>
                            <!--<button type="reset" class="btn btn-danger" name="reset" id="reset">Reset Form</button>-->
                            <a href="?action_request=show_records" class="btn btn-warning">View Columnists</a>
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
 <script>   alert("Columist Record Updated Successfully");</script>
<?php
}elseif(isset($_REQUEST['msg']) && $_REQUEST['msg']=='1'){?>	
 <script>  alert("Columist Record Inserted Successfully");</script>
 <?php }elseif(isset($_REQUEST['msg']) && $_REQUEST['msg']=='3'){?>	
 <script>  alert("Columist Record Deleted Successfully");</script>
<?php } ?>
<?php
@$_REQUEST['msg']='';
require_once 'footer.php';
?>