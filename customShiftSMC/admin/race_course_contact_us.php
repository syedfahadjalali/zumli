<?php
header("Content-Type: text/html;charset=UTF-8");
error_reporting(1);
ini_set('display_errors', 1);

$title = 'Add Race Course Races';
require_once 'header.php';
require_once 'sidebar.php';
require '../api/general.php';
if (isset($_SESSION['name']))
{
    $action = isset($_GET['action_request']) ? $_GET['action_request'] : 'show_records';
	$language = $_SESSION['language'];
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
        $sql        = 'SELECT id, race_course_id, address, phone, fax, email_address, web_address, latitude, longitude FROM '.$general->race_course_contact[$language];
        $contact_us = $link->query($sql);
        ?>

        <aside class="right-side">
            <div class="col-md-12">
                <br/><a href="?action_request=insert_records" class="btn btn-warning">Add RaceCourses Contact</a><br/><br/>

                <?php
                if ($contact_us->num_rows > 0)
                {
                    ?>
                    <div class="span12" style="overflow: auto; max-width: none">
                        <table id="records" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Post Office</th>
                                    <th>Phone</th>
                                    <th>Fax</th>
                                    <th>Email Address</th>
                                    <th>Latitude</th>
                                    <th>Longitude</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>	
                            </thead>
                            <tbody>
                                <?php
                                foreach ($contact_us as $contact)
                                {
                                    echo "<tr>";
                                    echo "<td><span class='address'>" . $contact['address'] . "</span></td>";
                                    echo "<td><span class='phone'>" . $contact['phone'] . "</span></td>";
                                    echo "<td><span class='fax'>" . $contact['fax'] . "</span></td>";
                                    echo "<td><span class='email_address'>" . $contact['email_address'] . "</span></td>";
                                    // echo "<td><span class='web_address'>" . $contact['web_address'] . "</span></td>";
                                     echo "<td><span class='latitude'>" . $contact['latitude'] . "</span></td>";
                                     echo "<td><span class='longitude'>" . $contact['longitude'] . "</span></td>";
                                    echo "<td><a href='?action_request=edit_records&id=" . $contact['id'] . "' class='btn btn-success' data-action='update' data-category='race_course_contact' data-post_id='" . $contact['id'] . "' data-post_type='" . $contact['race_course_id'] . "'>Edit</a></td>";
                                    echo "<td><a href='#' class='btn btn-warning delete_row' data-action='delete' data-category='race_course_contact' data-post_id='" . $contact['id'] . "' data-post_type='" . $contact['race_course_id'] . "'>Delete</a></td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Post Office</th>
                                    <th>Phone</th>
                                    <th>Fax</th>
                                    <th>Email Address</th>
                                     <th>Latitude</th>
                                    <th>Longitude</th> 
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
                    echo "<p>There are no Races coure Tracks Details exists yet!</p>";
                }
                ?>
            </div>

            <?php
        }
        else if ($action == 'insert_records')
        {
			if($language==0){
            $sql          = "SELECT id, name from race_course";
			}else
			{
			$sql          = "SELECT id, name from race_course_a";
			}
            $race_courses = $link->query($sql);
            ?>
            <aside class="right-side">
                <div class="col-md-9">
                    <div class="alert" style="display:none;"></div>
                    <h2>Add Race Course Contact Details:</h2>
                    <div id='loadingmessage' style='display:none'>
                        <img src='../images/loader.gif'/>
                    </div>
                    <form id="custom-form" role="form" method="post" enctype="multipart/form-data">

                        <input type="hidden" name="action" value="insert"/>
                        <input type="hidden" name="category" value="race_course_contact"/>

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
                            <label for="post_office">Address:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-tumblr"></i>
                                </span>
                                <input type="text" class="validate[required] form-control" id="post_office" placeholder="Address" name="post_office">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-tumblr"></i>
                                </span>
                                <input type="tel" class="validate[required] form-control" id="phone" placeholder="Phone Number" name="phone" pattern="^(?:\+971|00971|0)(?: |)(?:2|3|4|6|7|9|50|51|52|55|56)(?: |)[0-9]{7}$">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="fax">Fax:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-tumblr"></i>
                                </span>
                                <input type="tel" class="validate[required] form-control" id="fax" placeholder="Fax Number" name="fax" pattern="^(?:\+971|00971|0)(?: |)(?:2|3|4|6|7|9|50|51|52|55|56)(?: |)[0-9]{7}$">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email_address">Email Address:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-tumblr"></i>
                                </span>
                                <input type="email" class="validate[required] form-control" id="email_address" placeholder="Email Address" name="email_address">
                            </div>
                        </div>

                        <!-- <div class="form-group">
                            <label for="web_address">Web Address:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-tumblr"></i>
                                </span>
                                <input type="url" class="validate[required] form-control" id="web_address" placeholder="Website URL" name="web_address">
                            </div>
                        </div> -->

                        <div class="form-group">
                            <label for="title">Latitude:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-tumblr"></i>
                                </span>
                                <input type="text" class="validate[required] form-control" id="title" placeholder="Latitude" name="title">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="sub_title">Longitude:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-tumblr"></i>
                                </span>
                                <input type="text" class="validate[required] form-control" id="sub_title" placeholder="Longitude" name="sub_title">
                            </div>
                        </div><br/>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" name="submit" id="submit">Submit</button>
                            <!--<button type="reset" class="btn btn-danger" name="reset" id="reset">Reset Form</button>-->
                            <a href="?action_request=show_records" class="btn btn-warning">View Contact us</a>
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
            $sql          = "SELECT id, name from race_course";
			}else
			{
			$sql          = "SELECT id, name from race_course_a";
			}
            $race_courses = $link->query($sql);

            $sql        = 'SELECT id, race_course_id, address, phone, fax, email_address, web_address, latitude, longitude FROM '.$general->race_course_contact[$language]. " where id=".$_GET['id'];
            $contacts = $link->query($sql);

            foreach ($contacts as $contact)
            {
            ?>
            <aside class="right-side">
                <div class="col-md-9">
                    <div class="alert" style="display:none;"></div>
                    <h2>Edit Race Course Contact Details:</h2>
                    <div id='loadingmessage' style='display:none'>
                        <img src='../images/loader.gif'/>
                    </div>
                    <form id="custom-form" role="form" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="post_id" value="<?php echo $_GET['id'] ?>"/>
                        <input type="hidden" name="action" value="update"/>
                        <input type="hidden" name="category" value="race_course_contact"/>

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
                                            if ($contact['race_course_id'] == $race_course['id']) { 
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
                            <label for="post_office">Address:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-tumblr"></i>
                                </span>
                                <input value="<?php echo $contact['address']; ?>" type="text" class="validate[required] form-control" id="post_office" placeholder="Address" name="post_office">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-tumblr"></i>
                                </span>
                                <input value="<?php echo $contact['phone']; ?>" type="text" class="validate[required] form-control" id="phone" placeholder="Phone Number" name="phone" pattern="^(?:\+971|00971|0)(?: |)(?:2|3|4|6|7|9|50|51|52|55|56)(?: |)[0-9]{7}$">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="fax">Fax:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-tumblr"></i>
                                </span>
                                <input value="<?php echo $contact['fax']; ?>" type="text" class="validate[required] form-control" id="fax" placeholder="Fax Number" name="fax" pattern="^(?:\+971|00971|0)(?: |)(?:2|3|4|6|7|9|50|51|52|55|56)(?: |)[0-9]{7}$">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email_address">Email Address:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-tumblr"></i>
                                </span>
                                <input value="<?php echo $contact['email_address']; ?>" type="email" class="validate[required] form-control" id="email_address" placeholder="Email Address" name="email_address">
                            </div>
                        </div>

                        <!-- <div class="form-group">
                            <label for="web_address">Web Address:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-tumblr"></i>
                                </span>
                                <input type="url" class="validate[required] form-control" id="web_address" placeholder="Website URL" name="web_address">
                            </div>
                        </div> -->

                        <div class="form-group">
                            <label for="title">Latitude:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-tumblr"></i>
                                </span>
                                <input value="<?php echo $contact['latitude']; ?>" type="text" class="validate[required] form-control" id="title" placeholder="Latitude" name="title">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="sub_title">Longitude:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-tumblr"></i>
                                </span>
                                <input value="<?php echo $contact['longitude']; ?>" type="text" class="validate[required] form-control" id="sub_title" placeholder="Longitude" name="sub_title">
                            </div>
                        </div><br>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" name="submit" id="submit">Submit</button>
                            <!--<button type="reset" class="btn btn-danger" name="reset" id="reset">Reset Form</button>-->
                            <a href="?action_request=show_records" class="btn btn-warning">View Contact us</a>
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
 <script>   alert("Race Course Contact Us Updated Successfully");</script>
<?php
}elseif(isset($_REQUEST['msg']) && $_REQUEST['msg']=='1'){?>	
 <script>  alert("Race Course Contact Us Inserted Successfully");</script>
 <?php }elseif(isset($_REQUEST['msg']) && $_REQUEST['msg']=='3'){?>	
 <script>  alert("Race Course Contact Us Deleted Successfully");</script>
<?php } 
require_once 'footer.php';
?>