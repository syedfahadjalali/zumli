
$(document).ready(function() {
    var form = $('#custom-form'); // contact form
    var submit = $('#submit'); // submit button
    var msgShowContainer = $('.alert'); // alert div for show alert message

    var iCnt = 0;
    var count = 0;
    var total_images = 3;
    //apply data tables...
   // var oTable = $('table#records').DataTable({"pagingType": "full_numbers"});
	
    $('#records').dataTable( {
        "order": [[ 2, "desc" ]]
    } );

    //add image buttons...
    $('#btAdd').click(function() {
        var image_count = $("button[id^='remove-']").length;
        if (image_count < total_images)
        {
            var element = '<div class="form-group" id="img-' + iCnt + '">';
            element += '<label for="image">Select Image ' + iCnt + ':</label>';
            element += '<div class="input-group">';
            element += '<span class="input-group-addon">';
            element += '<i class="fa fa-file"></i>';
            element += '</span>';
            element += '<input type="file" id="image_file-' + iCnt + '" class="form-control" name="app_image[]">';
            element += '</div><br/><button type="button" id="remove-' + iCnt + '">Remove Image</button>';
            element += '</div>';
            $('#dynamic_content').before(element);
            form.on('change', '#image_file-' + iCnt, function() {
                imageUploadByAjax($(this));
            });
            form.on('click', '#remove-' + iCnt++, function() {   // REMOVE ELEMENTS ONE PER CLICK.
                $(this).parent().remove();
            });
        }
        else
        {
            $('#dynamic_content').find('span.help-inline').slideDown(500).delay(3000).slideUp(500);
        }
    });
	
	
	$('#btAdd2').click(function() {
        var image_count = $("button[id^='remove-']").length;
        if (image_count < total_images-2)
        {
            var element = '<div class="form-group" id="img-' + iCnt + '">';
            element += '<label for="image">Select Image ' + iCnt + ':</label>';
            element += '<div class="input-group">';
            element += '<span class="input-group-addon">';
            element += '<i class="fa fa-file"></i>';
            element += '</span>';
            element += '<input type="file" id="image_file-' + iCnt + '" class="form-control" name="app_image[]">';
            element += '</div><br/><button type="button" id="remove-' + iCnt + '">Remove Image</button>';
            element += '</div>';
            $('#dynamic_content').before(element);
            form.on('change', '#image_file-' + iCnt, function() {
                imageUploadByAjax($(this));
            });
            form.on('click', '#remove-' + iCnt++, function() {   // REMOVE ELEMENTS ONE PER CLICK.
                $(this).parent().remove();
            });
			$('#btAdd2').hide();
			$('#moreimages').hide();
        }
        else
        {
            $('#dynamic_content').find('span.help-inline').slideDown(500).delay(3000).slideUp(500);
        }
    });
	$('#btAdd5').click(function() {
        var image_count = $("button[id^='remove-']").length;
        if (image_count < total_images+2)
        {
            var element = '<div class="form-group" id="img-' + iCnt + '">';
            element += '<label for="image">Select Image ' + iCnt + ':</label>';
            element += '<div class="input-group">';
            element += '<span class="input-group-addon">';
            element += '<i class="fa fa-file"></i>';
            element += '</span>';
            element += '<input type="file" id="image_file-' + iCnt + '" class="form-control" name="app_image[]">';
            element += '</div><br/><button type="button" id="remove-' + iCnt + '">Remove Image</button>';
            element += '</div>';
            $('#dynamic_content').before(element);
            form.on('change', '#image_file-' + iCnt, function() {
                imageUploadByAjax($(this));
            });
            form.on('click', '#remove-' + iCnt++, function() {   // REMOVE ELEMENTS ONE PER CLICK.
                $(this).parent().remove();
            });
			$('#btAdd2').hide();
			$('#moreimages').hide();
        }
        else
        {
            $('#dynamic_content').find('span.help-inline').slideDown(500).delay(3000).slideUp(500);
        }
    });
	$('#btAdd8').click(function() {
        var image_count = $("button[id^='remove-']").length;
        if (image_count < total_images+5)
        {
            var element = '<div class="form-group" id="img-' + iCnt + '">';
            element += '<label for="image">Select Banner Image (Must be 420X150) ' + iCnt + ':</label>';
            element += '<div class="input-group">';
            element += '<span class="input-group-addon">';
            element += '<i class="fa fa-file"></i>';
            element += '</span>';
            element += '<input type="file" id="image_file-' + iCnt + '" class="form-control" name="app_image[]">';
            element += '</div><br/><button type="button" id="remove-' + iCnt + '">Remove Image</button>';
            element += '</div>';
            $('#dynamic_content').before(element);
            form.on('change', '#image_file-' + iCnt, function() {
                imageUploadByAjax($(this));
            });
            form.on('click', '#remove-' + iCnt++, function() {   // REMOVE ELEMENTS ONE PER CLICK.
                $(this).parent().remove();
            });
			$('#btAdd2').hide();
			$('#moreimages').hide();
        }
        else
        {
            $('#dynamic_content').find('span.help-inline').slideDown(500).delay(3000).slideUp(500);
        }
    });
    //on file select validate file...
    $('#thumbnail').on('change', function(event) {
        imageUploadByAjax($(this));
    });
    //validate locally files...
    function imageUploadByAjax(ufile)
    {
        ufile.validationEngine('hide');
        //check whether browser fully supports all File API
        if (!window.File && !window.FileReader && !window.FileList && !window.Blob)
        {
            $(".alert").html("Please upgrade your browser, because your current browser lacks some new features we need!");
            $('.alert').show();
            return false;
        }

        ufile.validationEngine('showPrompt', 'This a custom msg');
        //check empty input filed
        if (!ufile.val())
        {
            ufile.validationEngine('showPrompt', 'Please Select an Image!', 'fail');
            return false;
        }

        var file = ufile[0].files[0];
        var fileName = file.name;
        var fileSize = file.size;
        var fileType = file.type;
        console.log('fileName: ' + fileName);
        console.log('fileSize: ' + fileSize);
        console.log('fileType: ' + fileType);
        //allow only valid image file types 
        switch (fileType)
        {
            case 'image/png':
            case 'image/gif':
            case 'image/jpeg':
            case 'image/pjpeg':
                break;
            default:
                ufile.validationEngine('showPrompt', 'Unsupported file type!', 'fail');
                return false;
        }

        //Allowed file size is less than 2 MB (2097152 byes)
        if (fileSize > 2 * 1024 * 1024)
        {
            ufile.validationEngine('showPrompt', 'Image is Larg, allowed only 2 MB sized Images!', 'fail');
            return false;
        }

        ufile.validationEngine('showPrompt', 'Success', 'pass');
        return true;
    }

    //submit news etc form...
    form.submit(function(event)
    {

        event.preventDefault();
        var form_data = new FormData(form[0]);
        $('#loadingmessage').show();
        $.ajax({
            type: 'POST',
            url: 'processData.php',
            data: form_data,
            processData: false,
            cache: false,
            contentType: false,
            success: function(response)
            {
                $('#loadingmessage').hide();
                $('#myModal').modal('hide');
                
				window.location.href = response;
				//document.location.reload(true);
            },
            error: function(xhr, error, errorString)
            {
                console.log(xhr + '' + error + '' + errorString);
            }
        });
    });
    $('.thumbnail').on('click', function(event) {
        $('#myModal').modal('show');
        if ($(this).data('action') == 'thumbnail')
        {
            $('.modal-title').html('Change Thumbnail Image');
        }
        else if ($(this).data('action') == 'map')
        {
            $('.modal-title').html('Change Path Map');
        }
        else
        {
            $('.modal-title').html('Change Cover Photo');
        }

        $('#act').val($(this).data('action'));
        $('#cat').val($(this).data('category'));
        $('#id').val($(this).data('post_id'));
        $('#type').val($(this).data('post_type'));
        $('#nameimage').val($(this).data('post_name'));
    });
    
    
    $('.uploadnewImages').on('click', function(event) {
        $('#myModal').modal('show');
        if ($(this).data('action') == 'thumbnail')
        {
            $('.modal-title').html('Change Thumbnail Image');
        }
        else if ($(this).data('action') == 'map')
        {
            $('.modal-title').html('Change Path Map');
        }
        else if ($(this).data('action') == 'uploadnewImages') 
        {
            $('.modal-title').html('Upload New Image');
        }
        else
        {
            $('.modal-title').html('Change Cover Photo');
        }

        $('#act').val($(this).data('action'));
        $('#cat').val($(this).data('category'));
        $('#id').val($(this).data('post_id'));
        $('#type').val($(this).data('post_type'));
        $('#nameimage').val($(this).data('post_name'));
    });
    
    
    $('.deletethumbnail').on('click', function(event) {
        var s=$(this).parents('tr').find(".deletethumbnail").val();
        var obj = {action: "delete_images", id:s};
        $.ajax({
            url: 'processData.php',
            type: 'POST',
            data: obj,
            cache: false,
            success: function(data) {
                document.location.reload(true);
            }
        });
    });
    $('#close_thumbnails').on('click', function(event) {
        $('#myModal').modal('hide');
    });
    /*  //bring input controls for update records...
     $('.edit_row').on('click', function(event){
     $(this).addClass('update_row').removeClass('edit_row').text('Update');
     $tr = $(this).parents('tr');
     $tr.addClass('modified');
     
     $tr.find('span').each(function()
     {
     $(this).hide(function()
     {
     $(this).after( '<input name="' + $(this).attr('class') + '" value="' + $(this).text() + '" maxlength="30"/>' );
     });
     });
     });
     //bring input controls for update records...
     
     //update record...
     $('.update_row').on('click', function(event){
     var tr = $(this).parents('tr');
     if( tr.hasClass('modified') )   
     {
     var data = tr.find('input:text').serializeArray();
     data.push({name: 'action', value: $(this).data('action')});
     data.push({name: 'category', value: $(this).data('category')});
     data.push({name: 'post_id', value: $(this).data('post_id')});
     data.push({name: 'post_type', value: $(this).data('post_type')});
     tr.find('input:text').hide();
     
     $.ajax({
     url: 'processData.php',
     type: 'POST',
     data: data,
     cache: false,
     success:function(data){
     console.log(data);
     tr.find('span').show(function(){
     $(this).text($(this).next('input').val()).next('input').remove();
     });
     tr.find('a.update_row').removeClass('modified').removeClass('update_row').addClass('edit_row').text('Edit');
     }
     });
     }
     });
     //update record...
     */

    $('.edit_row').on('click', function(event) {
        if (count == 0)
        {
            $(this).removeClass('edit_row').addClass('update_row').text('Update');
            $tr = $(this).parents('tr');
            $tr.addClass('modified');
            $tr.find('span').each(function()
            {
                $(this).hide(function()
                {
                    $(this).after('<input name="' + $(this).attr('class') + '" value="' + $(this).text() + '"/>');
                    $(".color_code")
                            .replaceWith('<select id="color_code" name="color_code" class="color_code">' +
                                    '<option value="#0000FF">Blue</option>' +
                                    '<option value="#008000">Green</option>' +
                                    '<option value="#FFFF00">Yellow</option>' +
                                    '<option value="#FF0000">Red</option>' +
                                    '<option value="#800080">Purple</option>' +
                                    '</select>');
                });
            });
            count++
        }
        else
        {

            var tr = $(this).parents('tr');
            if (tr.hasClass('modified'))
            {
                var data = tr.find('input:text').serializeArray();
                data.push({name: 'color_code', value: tr.find('#color_code').val()});
                data.push({name: 'action', value: $(this).data('action')});
                data.push({name: 'category', value: $(this).data('category')});
                data.push({name: 'post_id', value: $(this).data('post_id')});
                data.push({name: 'post_type', value: $(this).data('post_type')});
                tr.find('input:text').hide();
                tr.find('.color_code').hide();
                $.ajax({
                    url: 'processData.php',
                    type: 'POST',
                    data: data,
                    cache: false,
                    success: function(data) {
                        alert(data);
                        tr.find('span').show(function() {
                            //$(".color_code").replaceWith('<input name="colors" class="color_code" id="colors" >');
                            $(this).text($(this).next('input').val()).next('input').remove();
                            $(this).text($(this).next('select').val()).next('select').remove();
                        });
                        tr.find('a.update_row').removeClass('modified').removeClass('update_row').addClass('edit_row').text('Edit');
                        document.location.reload(true);
                    }
                });
            }
            count = 0;
        }
    });
    //delete record...
    /*$('.delete_row').on('click', function(event) {
        if (window.confirm('Do u really want to delte the record'))
        {
            var action = $(this).data('action');
            var category = $(this).data('category');
            var post_id = $(this).data('post_id');
            var post_type = $(this).data('post_type');
            $.ajax({
                url: 'processData.php',
                type: 'POST',
                data: {'action': action, 'category': category, 'post_id': post_id, 'post_type': post_type},
                cache: false,
                success: function(data) {
                    //alert(data);
                    //$('body').load('signin.php');
                    document.location.reload(true);
                }
            });
        }
    });*/
    //delete record...
    /////////////////////////////////

});
