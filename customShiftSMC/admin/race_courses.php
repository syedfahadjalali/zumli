
<?php
$title = 'Add Racecourse';
error_reporting(1);
ini_set('display_errors', 1);
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

    $sql = "SELECT id, color_name, color_code from race_course_colors";
        $rc_colors = $link->query($sql);

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
        $sql          = 'SELECT id, name, color_code, thumbnail_image, latitude, longitude, city, country, cover_image, description, data FROM '
                . $general->race_course[$language]. ' order by id desc';
        $race_courses = $link->query($sql);
        ?>

        <aside class="right-side">
            <div class="col-md-12">
                <br/><h2 style="text-align: center;">Racecourses</h2>
                <a href="?action_request=insert_records" class="btn btn-primary">Add Race Courses</a><br/><br/>

                <?php
                if ($race_courses->num_rows > 0)
                {
                    ?>
                    <div class="span12" style="overflow: auto; max-width: none">
                        <table id="records" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Thumbnail</th>
                                    <th>Cover</th>
                                    <th>Name</th>
                                    <th>Color</th>
                                   <!-- <th>Latitude</th>
                                    <th>Longitude</th>-->
                                    <th>City</th>
                                    <th>Country</th>
                                    <!-- <th>Description</th> -->
                                    <th>Extra Data</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                <!--    <th>Edit Images</th>-->
                                </tr>	
                            </thead>
                            <tbody>
                                <?php
                                foreach ($race_courses as $race_course)
                                {
                                    echo "<tr>";
                                    echo "<td><img width='100px' class='thumbnail' src='../images/thumbnails/" . $race_course['thumbnail_image'] . "' data-action='thumbnail' data-category='race_courses' data-post_id='" . $race_course['id'] . "' data-post_type='" . $race_course['id'] . "'/></td>";
                                    echo "<td><img width='100px' class='image' src='../images/thumbnails/" . $race_course['cover_image'] . "' data-action='cover_image' data-category='race_courses' data-post_id='" . $race_course['id'] . "' data-post_type='" . $race_course['id'] . "'/></td>";
                                    echo "<td><span class='name'>" . $race_course['name'] . "</span></td>";
                                    echo "<td><span class='color_code'>" . $race_course['color_code'] . "</span></td>";
                                   // echo "<td><span class='latitude'>" . $race_course['latitude'] . "</span></td>";
                                   // echo "<td><span class='longitude'>" . $race_course['longitude'] . "</span></td>";
                                    echo "<td><span class='city'>" . $race_course['city'] . "</span></td>";
                                    echo "<td><span class='country'>" . $race_course['country'] . "</span></td>";
                                    // echo "<td><span class='description'>" . $race_course['description'] . "</span></td>";
                                    echo "<td><span class='data'>" . $race_course['data'] . "</span></td>";
                                    echo "<td><a href='?action_request=edit_records&id=" . $race_course['id'] . "' class='btn btn-success' data-action='update' data-category='race_courses' data-post_id='" . $race_course['id'] . "' data-post_type='" . $race_course['id'] . "'>Edit</a></td>";
                                    echo "<td><a href='javascript://' class='btn btn-warning delete_row' data-action='delete' data-category='race_courses' data-post_id='" . $race_course['id'] . "' data-post_type='" . $race_course['id'] . "'>Delete</a></td>";
                                    //echo "<td><a href='./images.php?id={$race_course['id']}&post_type=4' class='btn btn-warning edit_images'>Edit Images</a></td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Thumbnail</th>
                                    <th>Cover</th>
                                    <th>Name</th>
                                    <th>Color</th>
                                    <!--<th>Latitude</th>
                                    <th>Longitude</th>-->
                                    <th>City</th>
                                    <th>Country</th>
                                    <!-- <th>Description</th> -->
                                    <th>Extra Data</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                <!--    <th>Edit Images</th>-->
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <?php
                }
                else
                {
                    echo "<p>There are no Race Courses Exists Yet...</p>";
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
                    <div class="alert" style="display:none;"></div>
                    <h2>Add New Racecourse:</h2>
                    <div id='loadingmessage' style='display:none'>
                        <img src='../images/loader.gif'/>
                    </div>
                    <form id="custom-form" role="form" method="post" enctype="multipart/form-data">

                        <input type="hidden" name="action" value="insert"/>
                        <input type="hidden" name="category" value="race_courses"/>
                        <div class="form-group">
                            <label for="name">Racecourse Name:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-tumblr"></i>
                                </span>
                                <input type="text" class="validate[required] form-control" id="name" placeholder="Race Course Name" name="name" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="colors">Racecourse Color:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-tumblr"></i>
                                </span>
                                <select id="colors" name="colors" class="form-control">
                                   <?php
                                    #if ($rc_colors)
                                    #{
                                     #   foreach ($rc_colors as $rc_color)
                                      #  {
                                      #      echo "<option value='" . $rc_color['color_code'] . "'>" . $rc_color['color_name'] . "</option>";
                                      #  }
                                   # }
                                    ?> 
									<option>Blue</option>
									<option>Green</option>
									<option>Yellow</option>
									<option>Red</option>
									<option>Purple</option>
									<option>Gray</option>
                                </select>
                            </div>
                        </div>

                        <!--<div class="form-group">
                            <label for="latitude">Latitude:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-tumblr"></i>
                                </span>
                                <input type="text" class="form-control" id="latitude" placeholder="Latitude" name="latitude" required/>
                            </div>
                            <p id="latituderror" style="color: red"></p>
                        </div>
                        
                        <div class="form-group">
                            <label for="longitude">Longitude:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-tumblr"></i>
                                </span>
                                <input type="text" class="form-control" id="longitude" placeholder="Longitude" name="longitude" required/>
                            </div>
                            <p id="longituderror" style="color: red"></p>
                        </div>-->

                        <div class="form-group">
                            <label for="city">City:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-tumblr"></i>
                                </span>
                                <input type="text" class="validate[required] form-control" id="city" placeholder="City" name="city" required/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="country">Country:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-tumblr"></i>
                                </span>
                                <input type="text" class="validate[required] form-control" id="country" placeholder="Country" name="country" required/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description">Racecourse Description:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-align-justify" style="font-size: 18px;"></i>
                                </span>
                                <textarea class="form-control ckeditor" style="height:100px;" id="description" placeholder="Race Cousre Description" name="description"></textarea>
                                
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="cover_photo">Select Cover Photo: (Size 420x150 Pixels, Max. size is 2MB)</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-file"></i>
                                </span>
                                <input type="file" id="cover_photo" class="validate[required] form-control" name="cover_photo" required/>
                            </div>
                        </div><br/>

                        <div class="form-group">
                            <label for="thumbnail">Select Racecourse Thumbnail: (Size 200x220 Pixels, Max. size is 2MB)</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-file"></i>
                                </span>
                                <input type="file" id="thumbnail" class="validate[required] form-control" name="thumbnail" required/>
                            </div>
                        </div><br/>

                        <!--<div id="dynamic_content" class="form-group">
                            <p>If Racecourse have images, click on Add Image button to add more Images!</p>
                            <button type="button"  id="btAdd" >Add Image</button>
                            <span class="help-inline msg-exceed display-hide">Maximum limit exceeded.</span>
                        </div> --><br/>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" name="submit" id="submit" >Add Racecourse</button>
                            <!--<button type="reset" class="btn btn-danger" name="reset" id="reset">Reset Form</button>-->
                            <a href="?action_request=show_records" class="btn btn-warning">View RaceCourses</a>
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
        $sql          = 'SELECT id, name, color_code, thumbnail_image, latitude, longitude, city, country, cover_image, description, data FROM '
                . $general->race_course[$language]. " where id=".$_GET['id'];
        $race_courses = $link->query($sql);
        
        

        foreach ($race_courses as $race_course)
            {
            ?>

            <aside class="right-side">
                <div class="col-md-9">
                    <div class="alert" style="display:none;"></div>
                    <h2>Edit Racecourse:</h2>
                    <div id='loadingmessage' style='display:none'>
                        <img src='../images/loader.gif'/>
                    </div>
                    <form id="custom-form" role="form" method="post" enctype="multipart/form-data">

                        <input type="hidden" name="post_id" value="<?php echo $_GET['id'] ?>"/>
                        <input type="hidden" name="action" value="update"/>
                        <input type="hidden" name="category" value="race_courses"/>
                        <div class="form-group">
                            <label for="name">Racecourse Name: </label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-tumblr"></i>
                                </span>
                                <input type="text" class="validate[required] form-control" id="name" placeholder="Race Course Name" name="name" value="<?php echo $race_course['name']; ?>" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="colors">Racecourse Color:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-tumblr"></i>
                                </span>
                                <select id="colors" name="colors" class="form-control">
                                    <?php
                                    #if ($rc_colors)
                                    #{
                                      #  foreach ($rc_colors as $rc_color)
                                      #  {
                                      #      if($race_course['color_code'] == $rc_color['color_code']) { $isselected = "selected";} else {$isselected = "";}
                                       #     echo "<option value='" . $rc_color['color_code'] . "' ".$isselected.">" . $rc_color['color_name'] . "</option>";
                                       # }
                                   # }
                                    ?>
									<option <?php
									if($race_course['color_code']=="Blue")
									echo "Selected";
									?>
									>Blue</option>
									<option 
									<?php
									if($race_course['color_code']=="Green")
									echo "Selected";
									?>
									>Green</option>
									<option 
									<?php
									if($race_course['color_code']=="Yellow")
									echo "Selected";
									?>
									>Yellow</option>
									<option 
									<?php
									if($race_course['color_code']=="Red")
									echo "Selected";
									?>
									>Red</option>
									<option <?php
									if($race_course['color_code']=="Purple")
									echo "Selected";
									?>
									>Purple</option>
									<option <?php
									if($race_course['color_code']=="Gray")
									echo "Selected";
									?>
									>Gray</option>
                                </select>
                            </div>
                        </div>

                       <!-- <div class="form-group">
                            <label for="latitude">Latitude:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-tumblr"></i>
                                </span>
                                <input type="text" class="form-control" id="latitude" placeholder="Latitude" name="latitude" value="<?php// echo $race_course['latitude']; ?>" required/>
                            </div>
                            <p id="latituderror" style="color: red"></p>
                        </div>
                        
                        <div class="form-group">
                            <label for="longitude">Longitude:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-tumblr"></i>
                                </span>
                                <input type="text" class="form-control" id="longitude" placeholder="Longitude" name="longitude" value="<?php// echo $race_course['longitude']; ?>" required/>
                            </div>
                            <p id="longituderror" style="color: red"></p>
                        </div>-->

                        <div class="form-group">
                            <label for="city">City:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-tumblr"></i>
                                </span>
                                <input type="text" class="validate[required] form-control" id="city" placeholder="City" name="city" value="<?php echo $race_course['city']; ?>" required/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="country">Country:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-tumblr"></i>
                                </span>
                                <input type="text" class="validate[required] form-control" id="country" placeholder="Country" name="country" value="<?php echo $race_course['country']; ?>" required/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description">Racecourse Description:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-align-justify" style="font-size: 18px;"></i>
                                </span>
                                <textarea class="ckeditor form-control" style="height:100px;" id="description" placeholder="Race Cousre Description" name="description"><?php echo $race_course['description']; ?></textarea>
                                
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="cover_photo">Select Cover Photo: (Size 420x150 Pixels)</label>
                            <img width='100px' class='thumbnail' src='../images/thumbnails/<?php echo $race_course['cover_image']; ?>' data-action='cover_image' data-category='race_courses1' data-post_id='<?php echo $race_course['id']; ?>' data-post_type='<?php echo $race_course['id']; ?>'/>
                            <!-- <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-file"></i>
                                </span>
                                <?php echo "<img width='100px' class='thumbnail' src='../images/thumbnails/" . $race_course['thumbnail_image'] . "' data-action='thumbnail' data-category='race_courses' data-post_id='" . $race_course['id'] . "' data-post_type='" . $race_course['id'] . "'/>"; ?>
                                <input type="file" id="cover_photo" class="validate[required] form-control" name="cover_photo" required/>
                            </div> -->
                        </div><br/>

                        <div class="form-group">
                            <label for="thumbnail">Select Racecourse Thumbnail: (Size 200x220 Pixels)</label>
                            <img width='100px' class='thumbnail' src='../images/thumbnails/<?php echo $race_course['thumbnail_image']; ?>' data-action='thumbnail' data-category='race_courses1' data-post_id='<?php echo $race_course['id']; ?>' data-post_type='<?php echo $race_course['id']; ?>'/>
                            <!-- <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-file"></i>
                                </span>
                                <?php echo "<img width='100px' class='thumbnail' src='../images/thumbnails/" . $race_course['cover_image'] . "' data-action='thumbnail' data-category='race_courses' data-post_id='" . $race_course['id'] . "' data-post_type='" . $race_course['id'] . "'/>"; ?>
                                <input type="file" id="thumbnail" class="validate[required] form-control" name="thumbnail" required/>
                            </div> -->
                        </div><br/>

                        <div id="dynamic_content" class="form-group">
                            <!-- <p>If Racecourse have images, click on Add Image button to add more Images!</p>
                            <button type="button"  id="btAdd" >Add Image</button>
                            <span class="help-inline msg-exceed display-hide">Maximum limit exceeded.</span> -->
                            <a class="btn btn-warning" href="<?php echo base_url ?>images.php?id=<?php echo $race_course['id'] ?>&post_type=4">Edit Image(s)</a>
                        </div><br/>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" name="submit" id="submit">Update Racecourse</button>
                            <a href="?action_request=show_records" class="btn btn-warning">View RaceCourses</a>
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
 <script>   alert("Race courses Updated Successfully");</script>
<?php
}elseif(isset($_REQUEST['msg']) && $_REQUEST['msg']=='1'){?>	
 <script>  alert("Race courses Inserted Successfully");</script>
 <?php }elseif(isset($_REQUEST['msg']) && $_REQUEST['msg']=='3'){?>	
 <script>  alert("Race courses Deleted Successfully");</script>
<?php } ?>   
    
    
<?php
require_once 'footer.php';
?>