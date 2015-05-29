<?php
error_reporting(1);
ini_set('display_errors', 1);

$title = 'Add Race Course Races';
require_once 'header.php';
require_once 'sidebar.php';
require '../api/general.php';
if (isset($_SESSION['name']))
{
	

	
	
    $action = isset($_GET['action_request']) ? $_GET['action_request'] : 'show_records';
 if (isset($_SESSION['language']))
        {
            $language = $_SESSION['language'];
        }
		if (isset($_GET['rid']))
		{
			
			 $post_id   = $_GET['rid'];
			 $lan = $_SESSION['language'];
	
		if($lan==0){
			
			$sql1 = 'Select is_active from race WHERE id ="'.$post_id.'" LIMIT 1';
			$result    = $link->query($sql1);
			$values = "";
			foreach ($result as $r)
			
			
			if ($r['is_active']=="0"){
			$mainsql = 'UPDATE  race SET is_active="1" WHERE id ="'.$post_id.'"';
			$result    = $link->query($mainsql);}
			else{
			$mainsql = 'UPDATE  race SET is_active="0" WHERE id ="'.$post_id.'"';
			$result    = $link->query($mainsql);}
			
		}
		else
		{
			$sql1 = 'Select is_active from race_a WHERE id ="'.$post_id.'" LIMIT 1';
			$result    = $link->query($sql1);
			$values = "";
			foreach ($result as $r)
			
			
			if ($r['is_active']=="0")
			{
			$mainsql = 'UPDATE  race_a SET is_active="1" WHERE id ="'.$post_id.'"';
			$result    = $link->query($mainsql);
			}
			else{
			$mainsql = 'UPDATE  race_a SET is_active="0" WHERE id ="'.$post_id.'"';
			$result    = $link->query($mainsql);
			}
			
			}
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
		
		
			
		
	    
	  $sql   = 'SELECT id, race_course_id, race_title, description, race_start_time, race_end_time, race_held_date, weather, track_condition, safety_limit, rail_position, data, is_active FROM '
                .$general->race[$language]. ' order by race_held_date desc, id desc';
        $races = $link->query($sql);
		
		
		
		
		
		
        ?>
        <aside class="right-side">
            <div class="col-md-12">
                <br/><a href="?action_request=insert_records" class="btn btn-primary">Add Race Details</a><br/><br/>
                <div class="span12" style="overflow: auto; max-width: none">
                <?php
                if ($races->num_rows > 0)
                {
                    ?>
                    <table id="records" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Name</th>
                                <!--<th>End Time</th>-->
                                <th>Held Date</th>
                                <th>URL</th>
                                <!--<th>Track Condition</th>
                                <th>Safety Limit</th>-->
                                <th>Image</th>
                                 <th>Active/Deactive</th>
                               <!-- <th>Extra Data</th> -->
                                <th>Edit</th>
                                <th>Delete</th>
                                <th>Edit Images</th>
                            </tr>	
                        </thead>
                        <tbody>
                            <?php
                            foreach ($races as $race)
                            {
								 if (isset($_SESSION['language']))
        							{
           								 $language = $_SESSION['language'];
        							}
        							else
        							{
           							 $language = 0;
        							} 
								if($language==0){
								$sqls  = "SELECT `id`, `post_id`, `post_type`, `image` FROM `app_images` WHERE post_type=8 and post_id='{$race['id']}' LIMIT 1 ";
								}else{
			
								$sqls  = "SELECT `id`, `post_id`, `post_type`, `image` FROM `app_images_a` WHERE post_type=8 and post_id='{$race['id']}' LIMIT 1 ";
								}
		
						    $images = $link->query($sqls);
		                  	$img = $images->fetch_array(MYSQLI_ASSOC);
							
							if($language==0){
								$sql2  = "SELECT `name` FROM `race_course` WHERE id='{$race['race_course_id']}'";
								}else{
			
								$sql2  = "SELECT `name` FROM `race_course_a` WHERE id='{$race['race_course_id']}'";
								}
							
							$rname = $link->query($sql2);
		                  	
							foreach ( $rname as $n)
							$racecourse_name = $n;
                                echo "<tr>";
                                echo "<td><span class='race_title'>" . $race['race_title'] . "</span></td>";
                                echo "<td><span class='race_start_time'>" . $racecourse_name['name'] . "</span></td>";
                               // echo "<td><span class='race_end_time'>" . $race['race_end_time'] . "</span></td>";
                                echo "<td><span class='race_held_date'>" . $race['race_held_date'] . "</span></td>";
                                echo "<td><span class='weather'>" . $race['data'] . "</span></td>";
                                //echo "<td><span class='track_condition'>" . $race['track_condition'] . "</span></td>";
                                //echo "<td><span class='safety_limit'>" . $race['safety_limit'] . "</span></td>";
						
								   echo "<td><img width='150px' height='150px' src='../images/{$img['image']}'</td>";
						
                                 echo "<td><a href='?rid={$race['id']}&post_type=8' class='description' data-action='activate_race_row' data-category='activate_race_row' data-post_id='" . $race['id'] . "' data-post_type='activate_race_row'>";
								     if($race['is_active']==1){?>
									    <img src="on.png" width="25%" />	 
										<?php }else{?>
								          <img src="off.png" width="25%" /> 
								 <?php  }
								 echo "</a></td>";
                                // echo "<td><span class='data'>" . $race['data'] . "</span></td>";
								echo "<td><a href='?action_request=edit_records&id=" . $race['id'] . "' class='btn btn-success' data-action='update' data-category='race_course_races' data-post_id='" . $race['id'] . "' data-post_type='" . $race['race_course_id'] . "'>Edit</a></td>";
                                echo "<td><a href='#' class='btn btn-warning delete_row' data-action='delete' data-category='race_course_races' data-post_id='" . $race['id'] . "' data-post_type='" . $race['race_course_id'] . "'>Delete</a></td>";
                                echo "<td><a href='./raceimages.php?id={$race['id']}&post_type=8' class='btn btn-warning edit_images'>Edit Images</a></td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Title</th>
                                <th>Name</th>
                                <!--<th>End Time</th>-->
                                <th>Held Date</th>
                                <th>URL</th>
                                <!--<th>Track Condition</th>
                                <th>Safety Limit</th>-->
                                <th>Image</th>
                                <th>Active/Deactive</th>
                              <!--   <th>Extra Data</th> -->
                                <th>Edit</th>
                                <th>Delete</th>
                                <th>Edit Images</th>
                            </tr>
                        </tfoot>
                    </table>
                    <?php
                }
                else
                {
                    echo "<p>There are no Races Details exists yet!</p>";
                }
                ?>
                </div>
            </div>
    <?php
    }
    else if ($action == 'insert_records')
    {
		if($language==0){
            $sql          = "SELECT id, name from race_course";
		}else{
			$sql          = "SELECT id, name from race_course_a";
		}
            $race_courses = $link->query($sql);
            ?>
            <aside class="right-side">
                <div class="col-md-9">
                    <div class="alert" style="display:none;"></div>
                    <h2>Add Race Details:</h2>
                    <div id='loadingmessage' style='display:none'>
                        <img src='../images/loader.gif'/>
                    </div>
                    <form id="custom-form" role="form" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="action" value="insert"/>
                        <input type="hidden" name="category" value="race_course_races"/>

                        <div class="form-group">
                            <label for="race_course_id">Select Racecourse:</label>
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
                            <label for="title">Race Title:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-tumblr"></i>
                                </span>
                                <input type="text" class="validate[required] form-control" id="title" placeholder="Article Title" name="title" required/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="start_time">Start Time:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                                <input type="time" class="validate[required] form-control" id="start_time" placeholder="Article Date" name="start_time" required/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="end_time">End Time:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                                <input type="time" class="validate[required] form-control" id="end_time" placeholder="Race End Time" name="end_time" required/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="held_date">Race Held Date:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                                <input type="text" class="validate[required, custom[date]] form-control date-picker" id="held_date" min="1980-01-01" max="2050-12-31" placeholder="Race Held Date" name="held_date" required/>
                            </div>
                        </div>

                        <!--<div class="form-group">
                            <label for="weather">Weather Condtion:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-cloud"></i>
                                </span>
                                <input type="datetime" class="validate[required] form-control" id="weather" placeholder="Hows the Weather" name="weather">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="track_condition">Track Condtion:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-align-justify"></i>
                                </span>
                                <input type="datetime" class="validate[required] form-control" id="track_condition" placeholder="Hows the Track" name="track_condition">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="safety_limit">Safety Limit:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-align-justify"></i>
                                </span>
                                <input type="datetime" class="validate[required] form-control" id="safety_limit" placeholder="Safety Limit" name="safety_limit">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="rail_position">Rail Position:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-align-justify"></i>
                                </span>
                                <input type="datetime" class="validate[required] form-control" id="rail_position" placeholder="Rail Position" name="rail_position">
                            </div>
                        </div>-->

                        <div class="form-group">
                            <label for="news-description">Race Description:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-align-justify" style="font-size: 18px;"></i>
                                </span>
                                <textarea style="height:250px;" class="form-control" placeholder="Race Description" id="description" name="description"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="data">Race Pdf Link:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-database"></i>
                                </span>
                              <!--  <input type="text" id="data" class="validate[required] form-control" name="data" required/> -->
                                 <input type="text" class="form-control" id="data" placeholder="Race Pdf Link" name="data"/>
                            </div>
                        </div>

                        <div id="dynamic_content" class="form-group">
                            <p id="moreimages">Click on Add Image button to select image (Size 200x220 Pixels, Max Limit 2MB)</p>
                            <button type="button"  id="btAdd2" >Add Image</button>
                            <span class="help-inline msg-exceed display-hide">Maximum limit exceeded.</span>
                        </div><br/>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" name="submit" id="submit">Submit</button>
                            <!--<button type="reset" class="btn btn-danger" name="reset" id="reset">Reset Form</button>-->
                            <a href="?action_request=show_records" class="btn btn-warning">View Races</a>
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
		if($language==0){
        $sql = "SELECT id, name from race_course";
		}else{
			$sql = "SELECT id, name from race_course_a";
			}
        $race_courses = $link->query($sql);

        $sql1   = 'SELECT id, race_course_id, race_title, description, race_start_time, race_end_time, race_held_date, weather, track_condition, safety_limit, rail_position, data FROM '
                .$general->race[$language]. " where id=".$_GET['id'];
        $races = $link->query($sql1);

        foreach ($races as $race)
        {
            ?>
            <aside class="right-side">
                <div class="col-md-9">
                    <div class="alert" style="display:none;"></div>
                    <h2>Edit Race Details:</h2>
                    <div id='loadingmessage' style='display:none'>
                        <img src='../images/loader.gif'/>
                    </div>
                    <form id="custom-form" role="form" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="post_id" value="<?php echo $_GET['id'] ?>"/>
                        <input type="hidden" name="action" value="update"/>
                        <input type="hidden" name="category" value="race_course_races"/>

                        <div class="form-group">
                            <label for="race_course_id">Select Racecourse:</label>
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
                                            if ($race['race_course_id'] == $race_course['id']) { 
                                                $isselected = "selected";
                                            } 
                                            else 
                                            {
                                                $isselected = "";
                                            }
                                            echo "<option ".$isselected." value='" . $race_course['id'] . "'>" . $race_course['name'] . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="title">Race Title:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-tumblr"></i>
                                </span>
                                <input value="<?php echo $race['race_title']; ?>" type="text" class="validate[required] form-control" id="title" placeholder="Article Title" name="title" required/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="start_time">Start Time:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                                <input value="<?php echo $race['race_start_time']; ?>" type="time" class="validate[required] form-control" id="start_time" placeholder="Article Date" name="start_time" required/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="end_time">End Time:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                                <input value="<?php echo $race['race_end_time']; ?>" type="time" class="validate[required] form-control" id="end_time" placeholder="Race End Time" name="end_time" required/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="held_date">Race Held Date:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                                <input value="<?php echo $race['race_held_date']; ?>" type="text" class="validate[required, custom[date]] form-control date-picker" id="held_date" placeholder="Race Held Date" name="held_date" required/>
                            </div>
                        </div>
						

                        <!--<div class="form-group">
                            <label for="weather">Weather Condtion:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-cloud"></i>
                                </span>
                                <input value="<?php// echo $race['weather']; ?>" type="datetime" class="validate[required] form-control" id="weather" placeholder="Hows the Weather" name="weather">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="track_condition">Track Condtion:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-align-justify"></i>
                                </span>
                                <input value="<?php// echo $race['track_condition']; ?>" type="datetime" class="validate[required] form-control" id="track_condition" placeholder="Hows the Track" name="track_condition">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="safety_limit">Safety Limit:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-align-justify"></i>
                                </span>
                                <input value="<?php// echo $race['safety_limit']; ?>" type="datetime" class="validate[required] form-control" id="safety_limit" placeholder="Safety Limit" name="safety_limit">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="rail_position">Rail Position:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-align-justify"></i>
                                </span>
                                <input value="<?php// echo $race['rail_position']; ?>" type="datetime" class="validate[required] form-control" id="rail_position" placeholder="Rail Position" name="rail_position">
                            </div>
                        </div>-->

                        <div class="form-group">
                            <label for="news-description">Race Description:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-align-justify" style="font-size: 18px;"></i>
                                </span>
                                <textarea style="height:250px;" class="form-control" placeholder="Race Description" id="description" name="description"><?php echo $race['description']; ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="data">Race Pdf Link:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-database"></i>
                                </span>
                                
                                <input type="text" id="data" class="form-control" name="data" value="<?php echo $race['data'] ?>"/>
                                <!-- <input value="<?php echo $race['data']; ?>" type="text" class="form-control" id="data" placeholder="Race Pdf Link" name="data"> -->
                            </div>
                        </div>

                        <div id="dynamic_content" class="form-group">
                            <!-- <p>if Race have images, click on Add Image button to select images</p>
                            <button type="button"  id="btAdd" >Add Image</button>
                            <span class="help-inline msg-exceed display-hide">Maximum limit exceeded.</span> -->
                            <a class="btn btn-warning" href="<?php echo base_url ?>images.php?id=<?php echo $race['id'] ?>&post_type=8">Edit Image(s)</a>
                        </div><br/>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" name="submit" id="submit">Submit</button>
                            <!--<button type="reset" class="btn btn-danger" name="reset" id="reset">Reset Form</button>-->
                            <a href="?action_request=show_records" class="btn btn-warning">View Races</a>
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
 <script>   alert("Race Course Races Updated Successfully");</script>
<?php
}elseif(isset($_REQUEST['msg']) && $_REQUEST['msg']=='1'){?>	
 <script>  alert("Race Course Races Inserted Successfully");</script>
 <?php }elseif(isset($_REQUEST['msg']) && $_REQUEST['msg']=='3'){?>	
 <script>  alert("Race Course Races Deleted Successfully");</script>
<?php } ?>   
<?php
require_once 'footer.php';
?>