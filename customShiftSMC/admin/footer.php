<footer class="row" style="height:40px;background-color:#e10e1f;text-align: center;color:white">
    <p>Copyrights © 2014 Al Adiyat. All rights reserved</p>
</footer>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script src='calendar/lib/fullcalendar.min.js'></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="../extensions/admin-lte/js/AdminLTE/app.js" type="text/javascript"></script>
<!-- AdminLTE for demo purposes -->
<!--<script src="../extensions/admin-lte/js/AdminLTE/demo.js" type="text/javascript"></script>
<!-- Include jquery.validationEngine and its locale -->
<script src="../extensions/jquery-form-validation-engine/js/languages/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
<script src="../extensions/jquery-form-validation-engine/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>

<!-- Include jquery.dataTables --> 
<script type="text/javascript" src="../extensions/datatables/js/jquery.dataTables.min.js"></script> 

<!-- here is my custome javascript -->
<script type="text/javascript" src="../scripts/custom-script.js"></script>
<script type="text/javascript" src="../scripts/validation.js"></script>
<div class="modal" id="myModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal">×</button>
                <h3 class="modal-title"></h3>
            </div>
            <div class="modal-body">
                <form  method="post" action="processData.php" enctype="multipart/form-data">
                	<input id="act" type="hidden" value="" name="action"/>
                	<input id="cat" type="hidden" value="" name="category"/>
                    <input id="id" type="hidden" value="" name="post_id"/>
                    <input id="type" type="hidden" value="" name="post_type"/>
                    <input type="hidden"  value="<?php echo'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>" id="CurrentUrl" name="CurrentUrl"  />
                    <input id="nameimage" type="hidden" value="" name="post_name"/>
                    <input id="src" type="hidden" value="" name="src"/><!--filename with path to delete-->
                    
                    <div class="form-group">
					    <label for="thumbnail">Select Thumbnail</label>
					    <div class="input-group">
					    	<span class="input-group-addon">
					    		<i class="fa fa-file"></i>
					    	</span>
					    	<input type="file" id="thumbnail" class="form-control" name="thumbnail">
					  	</div>
				  	</div>
                    <input type="submit" id="close_thumbnails" class="btn btn-warning" style="margin-left:20px;"/>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="dialogModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myModalLabel">Please Wait</h4>
      </div>
      <div class="modal-body center-block">
        <div class="progress">
          <div class="progress-bar bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
            
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



</body>
</html>