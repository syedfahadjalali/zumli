<?php
error_reporting(1);
ini_set('display_errors', 1);

$title = 'Add Columnists Articles';
require_once 'header.php';
require_once 'sidebar2.php';
require '../api/general.php';

if (isset($_SESSION['name']))
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

    $sql    = "SELECT id, name from " . $general->race_course[$language];
    $result = $link->query($sql);
    ?>
    <aside class="right-side">
        <div class="col-md-9">
            <div class="alert" style="display:none;"></div>
            <h2>Add Race Course Offers:</h2>
            <div id='loadingmessage' style='display:none'>
                <img src='../images/loader.gif'/>
            </div>
            <form id="custom-form" role="form" method="post" enctype="multipart/form-data">

                <input type="hidden" name="action" value="insert"/>
                <input type="hidden" name="category" value="race_course_offers"/>

                <div class="form-group">
                    <label for="race_course_id">Select Race Course:</label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-tumblr"></i>
                        </span>
                        <select id="race_course_id" name="race_course_id" class="form-control">
                            <?php
                            if ($result)
                            {
                                foreach ($result as $columnist)
                                {
                                    echo "<option value='" . $columnist['id'] . "'>" . $columnist['name'] . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="name">Offer Name:</label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-tumblr"></i>
                        </span>
                        <input type="text" class="validate[required] form-control" id="name" placeholder="Race Course Offer Name" name="name" required/>
                    </div>
                </div>

                <div class="form-group">
                    <label for="offer_start_date">Offer Start Date:</label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </span>
                        <input type="date" class="validate[required, custom[date]] form-control" id="offer_start_date" placeholder="Offer Start Date" name="offer_start_date" required/>
                    </div>
                </div>

                <div class="form-group">
                    <label for="offer_valid_date">Offer Valid Date:</label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </span>
                        <input type="date" class="validate[required, custom[date]] form-control" id="offer_valid_date" placeholder="Offer Valid Date" name="offer_valid_date" required/>
                    </div>
                </div>

                <div class="form-group">
                    <label for="description">Race Cousre Offer Description:</label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-align-justify" style="font-size: 18px;"></i>
                        </span>
                        <textarea class="form-control" id="description" placeholder="Race Cousre Offer Description" name="description"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="thumbnail">Select Offer Thumbnail:</label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-file"></i>
                        </span>
                        <input type="file" id="thumbnail" class="validate[required] form-control" name="thumbnail" >
                    </div>
                </div><br/>

                <div id="dynamic_content" class="form-group">
                    <p>If Race Course Offer have images, click on Add Image button to add more Images!</p>
                    <button type="button"  id="btAdd" >Add Image</button>
                    <span class="help-inline msg-exceed display-hide">Maximum limit exceeded.</span>
                </div><br/>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary" name="submit" id="submit">Add Race Course</button>
                </div>
            </form>
        </div>
    </aside>
    </div>
    <?php
}
else
{
    ?>
    <script>    window.location.replace("<?php echo base_url ?>");</script>
    <?php
}


 if(isset($_REQUEST['msg']) && $_REQUEST['msg']=='2'){ ?>	
 <script>   alert("Race Course Offer Updated Successfully");</script>
<?php
}elseif(isset($_REQUEST['msg']) && $_REQUEST['msg']=='1'){?>	
 <script>  alert("Race Course Offer Inserted Successfully");</script>
 <?php }elseif(isset($_REQUEST['msg']) && $_REQUEST['msg']=='3'){?>	
 <script>  alert("Race Course Offer Deleted Successfully");</script>
<?php } 
require_once 'footer.php';
?>