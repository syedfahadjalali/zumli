<?php
$title = 'view News Details';
require_once 'header.php';
require_once 'sidebar.php';
if (isset($_SESSION['name']))
{
    ?>

    <div class="col-md-9">
        <h1 class="main_title">Search</h1>
        <form role="form">
            <div class="label_div">Search by News Title: </div>
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-search"></i>
                </span>
                <input type="text" id="search_id" class="form-control" name="search_news">
            </div>
            <ul id="search_list_id" class="list-group" style="position:absolute;z-index:9;background:#f3f3f3;"></ul>
        </form>

        <div id="response_data">
        </div>

        <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&amp;times;</button>
                        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                    </div>
                    <div class="modal-body">
                        <h3>Modal Body</h3>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <?php
}
else
{
?>
<script>    window.location.replace("<?php echo base_url?>");</script>
<?php
}
    require_once 'footer.php';
    ?>