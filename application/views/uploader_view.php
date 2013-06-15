<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">

<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Uploader View </title>
	<meta name="generator" content="TextMate http://macromates.com/">
	<meta name="author" content="jack young">
	<!-- Date: 2013-06-15 -->
	
	<script type="text/javascript" src="<?php echo base_url(); ?>js/uploader_home.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	
		<script type="text/javascript" src="<?php echo base_url(); ?>js/ajaxfileupload.js"></script>
		
</head>
<body>
	
	<h3>Welcome to Uploader View</h3>
	
<input size="40" class="file" type="file" id="fileToUpload" name="fileToUpload"/>	
<button type="submitNewFile" onclick="upload_manager_method();">Submit</button>

</body>
</html>
