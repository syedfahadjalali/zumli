<?php
$title = 'Welcome Admin in Aladiyat';
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
        $sql       = 'SELECT id,phone,fax,email,address,thumbnail_image,latitude,longitude,sender_email,sender_password,reciver_email,smtp FROM ' . $general->contact_us[$language];
        $contactus = $link->query($sql);
        ?>
        <aside class="right-side">
            <div class="col-md-12">
                <?php
                    if ($contactus->num_rows > 0)
                    {
                        ?>
                        <br/><br/>
                        <div class="span12" style="overflow: auto; max-width: none">
                            <table id="records" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Logo</th>
                                        <th>Phone Number</th>
                                        <th>Fax Number</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Latitude</th>
                                        <th>Longitude</th>
                                        <th>Company Name</th>
                                        <th>Website</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>	
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($contactus as $single)
                                    {
                                        echo "<tr>";
                                        echo "<td><img width='100px' class='thumbnail' src='../images/thumbnails/" . $single['thumbnail_image'] . "' data-action='thumbnail' data-category='contact_us' data-post_id='" . $single['id'] . "' data-post_type='" . $single['id'] . "'/></td>";
                                        echo "<td><span class='phone'>" . $single['phone'] . "</span></td>";
                                        echo "<td><span class='fax'>" . $single['fax'] . "</span></td>";
                                        echo "<td><span class='email'>" . $single['email'] . "</span></td>";
                                        echo "<td><span class='address'>" . $single['address'] . "</span></td>";
                                        echo "<td><span class='latitude'>" . $single['latitude'] . "</span></td>";
                                        echo "<td><span class='longitude'>" . $single['longitude'] . "</span></td>";
                                        echo "<td><span class='sender_email'>" . $single['sender_email'] . "</span></td>";
                                        echo "<td><span class='sender_password'>" . $single['sender_password'] . "</span></td>";
                                       // echo "<td><span class='reciver_email'>" . $single['reciver_email'] . "</span></td>";
                                       // echo "<td><span class='smtp'>" . $single['smtp'] . "</span></td>";
                                        echo "<td><a href='#' class='btn btn-success edit_row' data-action='update' data-category='contactus' data-post_id='" . $single['id'] . "' data-post_type='" . $single['id'] . "'>Edit</a></td>";
                                        echo "<td><a href='#' class='btn btn-warning delete_row' data-action='delete' data-category='contactus' data-post_id='" . $single['id'] . "' data-post_type='" . $single['id'] . "'>Delete</a></td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Logo</th>
                                        <th>Phone Number</th>
                                        <th>Fax Number</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Latitude</th>
                                        <th>Longitude</th>
                                        <th>Company Name</th>
                                        <th>Website</th>
                                        
										
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <?php
                        //echo "<img width='100px' class='thumbnail' src='../images/thumbnails/" . $single['thumbnail_image'] . "' data-action='thumbnail' data-category='contact_us' data-post_id='" . $single['id'] . "' data-post_type='" . $single['id'] . "'/>";
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
                    <h2>Add Contact Us Information</h2>
                    <div id='loadingmessage' style='display:none'>
                        <img src='../images/loader.gif'/>
                    </div>
                    <div class="alert" style="display:none;"></div>
                    <form id="custom-form" role="form" method="post" enctype="multipart/form-data">

                        <input type="hidden" name="action" value="insert"/>
                        <input type="hidden" name="category" value="insertContactUs"/>

                        <div class="form-group">
                            <label for="phone">Phone Number:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-tumblr"></i>
                                </span>
                                <input type="tel" class="validate[required] form-control" id="phone" placeholder="Phone Number" name="phone" pattern="^(?:\+971|00971|0)(?: |)(?:2|3|4|6|7|9|50|51|52|55|56)(?: |)[0-9]{7}$" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="fax">Fax Number:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                                <input type="tel" class="validate[required, custom[date]] form-control" id="fax" placeholder="Fax Number" name="fax" pattern="^(?:\+971|00971|0)(?: |)(?:2|3|4|6|7|9|50|51|52|55|56)(?: |)[0-9]{7}$"  required/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-align-justify" style="font-size: 18px;"></i>
                                </span>
                                <input type="email" class="form-control" placeholder="Email Address" name="email" required/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="address">Address:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-database"></i>
                                </span>
                                <input type="text" class="form-control" id="address" placeholder="address" name="address" required/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="latitude">Latitude:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                                <input type="text" class="validate[required, custom[date]] form-control" id="email" placeholder="Latitude" name="latitude" required/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="longitude">Longitude:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                                <input type="text" class="validate[required, custom[date]] form-control" id="longitude" placeholder="longitude" name="longitude" required/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="sender_email">Company Name:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                                <input class="validate[required, custom[date]] form-control" id="sender_email" placeholder="Sender Email" name="sender_email" required=""/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="sender_password">Website:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                                <input type="text" class="validate[required, custom[date]] form-control" id="sender_password" placeholder="Sender Password" name="sender_password" required=""/>
                            </div>
                        </div>

                       <!-- <div class="form-group">
                            <label for="reciver_email">Reciver Email:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                                <input type="email" class="validate[required, custom[date]] form-control" id="reciver_email" placeholder="Reciver Email" name="reciver_email" required=""/>
                            </div>
                        </div>-->

                        <!--<div class="form-group">
                            <label for="smtp">SMTP:Port:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                                <input type="text" class="validate[required, custom[date]] form-control" id="smtp" placeholder="SMTP" name="smtp" required=""/>
                            </div>
                        </div>-->
                        <div class="form-group">
                            <label for="thumbnail">Company Logo :</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-file"></i>
                                </span>
                                <input type="file" id="thumbnail" class="validate[required] form-control" name="thumbnail">
                            </div>
                        </div><br/>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" name="submit" id="submit">Submit</button>
                            <!--<button type="reset" class="btn btn-danger" name="reset" id="reset">Reset Form</button>-->
                            <a href="?action_request=show_records" class="btn btn-warning">View Contact Us</a>
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
        $sql       = 'SELECT id,phone,fax,email,address,thumbnail_image,latitude,longitude,sender_email,sender_password,reciver_email,smtp FROM ' . $general->contact_us[$language];
        $contactus = $link->query($sql);

        foreach ($contactus as $single)
                                    {

            ?>

            <aside class="right-side">
                <div class="col-md-9">
                    <h2>Update Contact Us Information</h2>
                    <div id='loadingmessage' style='display:none'>
                        <img src='../images/loader.gif'/>
                    </div>
                    <div class="alert" style="display:none;"></div>
                    <form id="custom-form" role="form" method="post" enctype="multipart/form-data">

                        <input type="hidden" name="post_id" value="<?php echo $single['id']; ?>"/>
                        <input type="hidden" name="action" value="update"/>
                        <input type="hidden" name="category" value="contactus"/>

                        <div class="form-group">
                            <label for="phone">Phone Number:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-tumblr"></i>
                                </span>
                                <input value="<?php echo $single['phone']; ?>" type="tel" class="validate[required] form-control" id="phone" placeholder="Phone Number" name="phone" pattern="^(?:\+971|00971|0)(?: |)(?:2|3|4|6|7|9|50|51|52|55|56)(?: |)[0-9]{7}$" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="fax">Fax Number:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                                <input value="<?php echo $single['fax']; ?>" type="tel" class="validate[required, custom[date]] form-control" id="fax" placeholder="Fax Number" name="fax" pattern="^(?:\+971|00971|0)(?: |)(?:2|3|4|6|7|9|50|51|52|55|56)(?: |)[0-9]{7}$" required/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-align-justify" style="font-size: 18px;"></i>
                                </span>
                                <input value="<?php echo $single['email']; ?>" type="email" class="form-control" placeholder="Email Address" name="email" required/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="address">Address:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-database"></i>
                                </span>
                                <input value="<?php echo $single['address']; ?>" type="text" class="form-control" id="address" placeholder="address" name="address" required/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="latitude">Latitude:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                                <input value="<?php echo $single['latitude']; ?>" type="text" class="validate[required, custom[date]] form-control" id="email" placeholder="Latitude" name="latitude" required/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="longitude">Longitude:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                                <input value="<?php echo $single['longitude']; ?>" type="text" class="validate[required, custom[date]] form-control" id="longitude" placeholder="longitude" name="longitude" required/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="sender_email">Company Name:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                                <input value="<?php echo $single['sender_email']; ?>" class="validate[required, custom[date]] form-control" id="sender_email" placeholder="Sender Email" name="sender_email" required=""/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="sender_password">Website:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                                <input value="<?php echo $single['sender_password']; ?>" type="text" class="validate[required, custom[date]] form-control" id="sender_password" placeholder="Sender Password" name="sender_password" required=""/>
                            </div>
                        </div>

                        <!--<div class="form-group">
                            <label for="reciver_email">Reciver Email:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                                <input value="<?php //echo $single['reciver_email']; ?>" type="email" class="validate[required, custom[date]] form-control" id="reciver_email" placeholder="Reciver Email" name="reciver_email" required=""/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="smtp">SMTP:Port:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                                <input value="<?php //echo $single['smtp']; ?>" type="text" class="validate[required, custom[date]] form-control" id="smtp" placeholder="SMTP" name="smtp" required=""/>
                            </div>
                        </div>-->
                        <div class="form-group">
                            <label for="thumbnail">Select Company Logo: (Size 200X200 Pixels)</label>
                            <img width='100px' class='thumbnail' src='../images/thumbnails/<?php echo $single['thumbnail_image']; ?>' data-action='thumbnail' data-category='contactus' data-post_id='<?php echo $single['id']; ?>' data-post_type='<?php echo $single['id']; ?>'/>
                            <!-- <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-file"></i>
                                </span>
                                <input type="file" id="thumbnail" class="validate[required] form-control" name="thumbnail">
                            </div> -->
                        </div><br/>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" name="submit" id="submit">Submit</button>
                            <!--<button type="reset" class="btn btn-danger" name="reset" id="reset">Reset Form</button>-->
                            <!-- <a href="?action_request=show_records" class="btn btn-warning">View Contact Us</a> -->
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
 <script>   alert("Contact Details Updated Successfully");</script>
<?php }
require_once 'footer.php';
?>