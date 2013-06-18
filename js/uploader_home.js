
function ajaxFileUpload() {
	
	console.log("ajaxFileUpload function called.");
	console.log("the base url is: " + baseurl);
	console.log("the image url is : " + image_base_url);
	
	$("#loading")
	.ajaxStart(function(){
		$(this).show();
	})
	.ajaxComplete(function(){
		$(this).hide();
	});

	$.ajaxFileUpload
	(
		{
			
			url: baseurl + "uploader/doajaxfileupload",
			secureuri:false,
			fileElementId:'fileToUpload',
			dataType: 'json',
			data:{name:'logan', id:'id'},
			success: function (data, status)
			{
				if(typeof(data.error) != 'undefined')
				{
					if(data.error != '')
					{
						alert(data.error);
					}else
					{
						 // alert("you made it");
						$("input#fileToUpload").attr("value", null);
						// alert(data.msg);
					}
				}
			},
			error: function (data, status, e)
			{
				alert(e);
			}
		}
	)

	return false;

}

function upload_manager_method() {
	
	var file_input = $("input#fileToUpload").val();
	
	var formated_file_url = image_base_url + "Upload_folder/" + file_input;
	//submitUploadFile(formated_file_url);
	return ajaxFileUpload();
	
	//alert("The uplaod_manager_method was called in the js file. " + file_input);
}
