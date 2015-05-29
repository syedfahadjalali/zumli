
<?php
error_reporting(1);
ini_set('display_errors', 1);

$title = 'Add Race Course Races';
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
if (isset($_SESSION['language']))
        {
            $language = $_SESSION['language'];
        }
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
        $sql    = 'SELECT id, race_course_id, track_title, thumbnail_image, track_specification, data FROM  '.
        $general->race_course_track[$language];
        $tracks = $link->query($sql);
        ?>

        <aside class="right-side">
            <div class="col-md-12">
                <br/><a href="?action_request=insert_records" class="btn btn-primary">Add Track Details</a><br/><br/>

                <?php
                if ($tracks->num_rows > 0)
                {
                    ?>
                <div class="span12" style="overflow: auto; max-width: none">
                    <table id="records" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Track Image</th>
                                <th>Title</th>
                                <th>Specification</th>
                                <!--<th>Extra Data</th>-->
                                <th>Edit</th>
                                <th>Delete</th>
                                <th>Edit Images</th>
                            </tr>	
                        </thead>
                        <tbody>
                            <?php
                            foreach ($tracks as $track)
                            {
                                echo "<tr>";
                                echo "<td><img width='100px' class='thumbnail' src='../images/thumbnails/" . $track['thumbnail_image'] . "' data-action='thumbnail' data-category='race_course_track' data-post_id='" . $track['id'] . "' data-post_type='" . $track['race_course_id'] . "'/></td>";
                                echo "<td><span class='track_title'>" . $track['track_title'] . "</span></td>";
                                echo "<td><span class='track_specification'>" . $track['track_specification'] . "</span></td>";
                                //echo "<td><span class='data'>" . $track['data'] . "</span></td>";
                                echo "<td><a href='?action_request=edit_records&id=" . $track['id'] . "' class='btn btn-success' data-action='update' data-category='race_course_track' data-post_id='" . $track['id'] . "' data-post_type='" . $track['race_course_id'] . "'>Edit</a></td>";
                                echo "<td><a href='#' class='btn btn-warning delete_row' data-action='delete' data-category='race_course_track' data-post_id='" . $track['id'] . "' data-post_type='" . $track['race_course_id'] . "'>Delete</a></td>";
                                echo "<td><a href='./images.php?id={$track['id']}&post_type=12' class='btn btn-warning edit_images'>Edit Images</a></td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Track Image</th>
                                <th>Title</th>
                                <th>Specification</th>
                                <!--<th>Extra Data</th>-->
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
                    echo "<p>There are no Races coure Tracks Details exists yet!</p>";
                }
                ?>
            </div>

            <?php
        }
        else if ($action == 'insert_records')
        {
			if($language == 0)
            $sql          = "SELECT id, name from race_course";
			else
			$sql          = "SELECT id, name from race_course_a";
            $race_courses = $link->query($sql);
            ?>
            <aside class="right-side">
                <div class="col-md-9">
                    <div class="alert" style="display:none;"></div>
                    <h2>Add Race Course Track Details:</h2>
                    <div id='loadingmessage' style='display:none'>
                        <img src='../images/loader.gif'/>
                    </div>
                    <form id="custom-form" role="form" method="post" enctype="multipart/form-data" accept-charset="ISO-8859-1"> 

                        <input type="hidden" name="action" value="insert"/>
                        <input type="hidden" name="category" value="race_course_track"/>

                        <div class="form-group">
                            <label for="race_course_id">Select Race Course:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-tumblr"></i>
                                </span>
                                <select id="race_course_id" name="race_course_id" class="form-control">
                                    <?php
                                    if ($race_courses)
                                    {
                                        foreach ($race_courses as $race_course)
                                        {
                                            echo "<option value='" . $race_course['id'] . "'>" . $race_course['name'] . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="title">Track Title:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-tumblr"></i>
                                </span>
                                <input type="text" class="validate[required] form-control" id="title" placeholder="Track Title" name="title" required/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="news-description">Race Course Track Description:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-align-justify" style="font-size: 18px;"></i>
                                </span>
                                <textarea style="height:250px;" class="form-control ckeditor" placeholder="Track Description" id="description" name="description"></textarea>
                            </div>
                        </div>

                        <!--<div class="form-group">
                            <label for="data">Article Data (optional):</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-database"></i>
                                </span>
                                <input type="text" class="form-control" id="data" placeholder="Track Data" name="data">
                            </div>
                        </div>-->

                        <div class="form-group">
                            <label for="thumbnail">Select Track Thumbnail: (Size 200x220 Pixels, Max. size is 2MB)</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-file"></i>
                                </span>
                                <input type="file" id="thumbnail" class="validate[required] form-control" name="thumbnail" required/>
                            </div>
                        </div><br/>

                        <div id="dynamic_content" class="form-group">
                            <p>if Race Course Track have images, click on Add Image button to select images</p>
                            <button type="button"  id="btAdd" >Add Image</button>
                            <span class="help-inline msg-exceed display-hide">Maximum limit exceeded.</span>
                        </div><br/>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" name="submit" id="submit">Submit</button>
                            <!--<button type="reset" class="btn btn-danger" name="reset" id="reset">Reset Form</button>-->
                            <a href="?action_request=show_records" class="btn btn-warning">View Tracks</a>
                        </div>
                    </form>
                </div>

                <?php
            }
        else if ($action == 'edit_records')
        {
			if($language==0)
            $sql          = "SELECT id, name from race_course";
			else
			$sql          = "SELECT id, name from race_course_a";
            $race_courses = $link->query($sql);

            $general = new General();
            if (isset($_SESSION['language']))
            {
                $language = $_SESSION['language'];
            }
            else
            {
                $language = 0;
            }
            $sql    = 'SELECT id, race_course_id, track_title, thumbnail_image, track_specification, data FROM  '.
            $general->race_course_track[$language]. " where id=".$_GET['id'];
            $tracks = $link->query($sql);
            foreach ($tracks as $track)
            {
            ?>
            <aside class="right-side">
                <div class="col-md-9">
                    <div class="alert" style="display:none;"></div>
                    <h2>Edit Race Course Track Details:</h2>
                    <div id='loadingmessage' style='display:none'>
                        <img src='../images/loader.gif'/>
                    </div>
                    <form id="custom-form" role="form" method="post" enctype="multipart/form-data" accept-charset="ISO-8859-1">

                        <input type="hidden" name="post_id" value="<?php echo $_GET['id'] ?>"/>
                        <input type="hidden" name="action" value="update"/>
                        <input type="hidden" name="category" value="race_course_track"/>

                        <div class="form-group">
                            <label for="race_course_id">Select Race Course:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-tumblr"></i>
                                </span>
                                <select id="race_course_id" name="race_course_id" class="form-control">
                                    <?php
                                    if ($race_courses)
                                    {
                                        foreach ($race_courses as $race_course)
                                        {
                                            if($race_course['id'] == $track['race_course_id']) { $isselected = "selected";} else { $isselected = ""; }
                                            echo "<option $isselected value='" . $race_course['id'] . "'>" . $race_course['name'] . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="title">Track Title:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-tumblr"></i>
                                </span>
                                <input value="<?php echo $track['track_title']; ?>" type="text" class="validate[required] form-control" id="title" placeholder="Track Title" name="title" required/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="news-description">Race Course Track Description:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-align-justify" style="font-size: 18px;"></i>
                                </span>
                                <textarea style="height:250px;" class="form-control ckeditor" placeholder="Track Description" id="description" name="description"><?php echo $track['track_specification']; ?></textarea>
                            </div>
                        </div>

                        <!--<div class="form-group">
                            <label for="data">Article Data (optional):</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-database"></i>
                                </span>
                                <input type="text" class="form-control" id="data" placeholder="Track Data" name="data">
                            </div>
                        </div>-->

                        <div class="form-group">
                            <label for="thumbnail">Select Track Thumbnail: (Size 200x220 Pixels)</label>
                            <img width='100px' class='thumbnail' src='../images/thumbnails/<?php echo $track['thumbnail_image']; ?>' data-action='thumbnail' data-category='race_course_track1' data-post_id='<?php echo $track['id']; ?>' data-post_type='<?php echo $track['id']; ?>'/>
                            <!-- <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-file"></i>
                                </span>
                                <input type="file" id="thumbnail" class="validate[required] form-control" name="thumbnail" required/>
                            </div> -->
                        </div><br/>

                        <div id="dynamic_content" class="form-group">
                            <!-- <p>if Race Course Track have images, click on Add Image button to select images</p>
                            <button type="button"  id="btAdd" >Add Image</button>
                            <span class="help-inline msg-exceed display-hide">Maximum limit exceeded.</span> -->
                            <a class="btn btn-warning" href="<?php echo base_url ?>images.php?id=<?php echo $track['id'] ?>&post_type=12">Edit Image(s)</a>
                        </div><br/>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" name="submit" id="submit">Submit</button>
                            <!--<button type="reset" class="btn btn-danger" name="reset" id="reset">Reset Form</button>-->
                            <a href="?action_request=show_records" class="btn btn-warning">View Tracks</a>
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
    </aside>
</div>
<?php
 if(isset($_REQUEST['msg']) && $_REQUEST['msg']=='2'){ ?>	
 <script>   alert("Race Course track Updated Successfully");</script>
<?php
}elseif(isset($_REQUEST['msg']) && $_REQUEST['msg']=='1'){?>	
 <script>  alert("Race Course track Inserted Successfully");</script>
 <?php }elseif(isset($_REQUEST['msg']) && $_REQUEST['msg']=='3'){?>	
 <script>  alert("Race Course track Deleted Successfully");</script>
<?php } 
require_once 'footer.php';
?>