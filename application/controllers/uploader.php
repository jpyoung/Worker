<?php
class Uploader extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
	}
	
	
	function index() {
		
		$this->load->view('uploader_view');
	}
	

	function doajaxfileupload() {

		//echo "<p>Do ajax file upload method was called</p>";
		echo "The file name is : " . $fileElementName;
			$error = "";
			$msg = "";
			$fileElementName = 'fileToUpload';
			if(!empty($_FILES[$fileElementName]['error']))
			{
				switch($_FILES[$fileElementName]['error'])
				{

					case '1':
						$error = 'The uploaded file exceeds the upload_max_filesize directive in php.ini';
						break;
					case '2':
						$error = 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form';
						break;
					case '3':
						$error = 'The uploaded file was only partially uploaded';
						break;
					case '4':
						$error = 'No file was uploaded.';
						break;

					case '6':
						$error = 'Missing a temporary folder';
						break;
					case '7':
						$error = 'Failed to write file to disk';
						break;
					case '8':
						$error = 'File upload stopped by extension';
						break;
					case '999':
					default:
						$error = 'No error code avaiable';
				}
			}elseif(empty($_FILES['fileToUpload']['tmp_name']) || $_FILES['fileToUpload']['tmp_name'] == 'none')
			{
				$error = 'No file was uploaded..';
			}else 
			{
					$msg .= " File Name: " . $_FILES['fileToUpload']['name'] . ", ";
					$msg .= " File Size: " . @filesize($_FILES['fileToUpload']['tmp_name']);
					$msg .= " File temp name: " . $_FILES["fileToUpload"]["tmp_name"] . ", ";

					move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],"Upload_folder/" . $_FILES["fileToUpload"]["name"]);
					$address = "uploader/" . $_FILES["fileToUpload"]["name"];

					//executeFileQuery($address);
					//for security reason, we force to remove all uploaded file
					//@unlink($_FILES['fileToUpload']);		
			}		
			echo "{";
			echo				"error: '" . $error . "',\n";
			echo				"msg: '" . $msg . "'\n";
			echo "}";
		}

	
	
}
?>