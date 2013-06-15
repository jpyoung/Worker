
function ajaxFileUpload() {
	
	console.log("ajaxFileUpload function called.");
	
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
			//http://localhost/~youngbuck14188/FPM/index.php/admin/admin_home/doajaxfileupload
			url: "http://localhost/~youngbuck14188/Worker/index.php/uploader/doajaxfileupload",
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
	
	var formated_file_url = "http://localhost/~youngbuck14188/Worker/Upload_folder/" + file_input;
	//submitUploadFile(formated_file_url);
	return ajaxFileUpload();
	
	//alert("The uplaod_manager_method was called in the js file. " + file_input);
}
