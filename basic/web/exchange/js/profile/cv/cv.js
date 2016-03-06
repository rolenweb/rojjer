$(function() {
	//load file
	$( '#profile-settings' ).on('submit', 'form[name = "form-load-cv-file"]',function( event ) {	
		
		var block_parent = $(this).parents('#profile-settings');
		var block_error = block_parent.find('#block-cv-error');
		var files = event.currentTarget[2]['files'];
		
		if (files[0]['type'] === 'image/png' || files[0]['type'] === 'application/vnd.oasis.opendocument.text' || files[0]['type'] === 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' || files[0]['type'] === 'image/jpeg' || files[0]['type'] === 'application/pdf') {
			var user_id = $(this).find('input[name = "user"]').val();
	    	var obj = $(this);
	    	handleFileUpload(files,user_id);
		}
		else{
			block_error.text('Supported formats: PNG, OPT, DOCX, JPEG, PDF').show().fadeOut(2000);
		}
		
		
	    event.preventDefault();
	}); 
	//load file

	function handleFileUpload(files,user_id)
	{   
	    
	    if (window.FormData === undefined) {
	        console.log("FUCK");
	    }
	   for (var i = 0; i < files.length; i++) 
	   {

	        var fd = new FormData();

	        fd.append('imageFiles', files[i]);
	        fd.append('user_id', user_id);
	        
	        
	        //var status = new createStatusbar(obj); //Using this we can set progress.
	        //status.setFileNameSize(files[i].name,files[i].size);
	        sendFileToServer(fd);
	 
	   }
	   //console.log(fd);
	}
	
	

	function sendFileToServer(formData)
	{   
		var spinner = $("#block-spinner").show();
	    var block_result = $('#block-result');
	    var uploadURL ="index.php?r=exchange/default/load-file-cv"; //Upload URL
	    var extraData ={}; //Extra Data.
	    var jqXHR=$.ajax({
	            xhr: function() {
	            var xhrobj = $.ajaxSettings.xhr();
	            if (xhrobj.upload) {
	                    xhrobj.upload.addEventListener('progress', function(event) {
	                        var percent = 0;
	                        var position = event.loaded || event.position;
	                        var total = event.total;
	                        if (event.lengthComputable) {
	                            percent = Math.ceil(position / total * 100);
	                        }
	                        //console.log(percent);
	                        //Set progress
	                        //status.setProgress(percent);
	                    }, false);
	                }
	            return xhrobj;
	        },
	        url: uploadURL,
	        type: "POST",
	        contentType:false,
	        processData: false,
	        cache: false,
	        data: formData,
	        success: function(data){
	            block_result.html(data);
	            block_result.show().fadeOut(2000);
	            spinner.hide();
	            
	        }
	    }); 
	 
	    //status.setAbort(jqXHR);
	}
	

	
});