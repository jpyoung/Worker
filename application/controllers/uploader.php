<?php
class Uploader extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
	}
	
	
	function index() {
		
		$this->gather_db_files();
		
		//$data["all_files"] = $this->gather_files_in_upload_directory();
		$this->gather_files_in_upload_directory();
		$this->load->view('uploader_view');
	}
	
	
	
	function gather_db_files() {
		$r = $this->db->get('files');
		
		print_r($r);
	}
	
	
	function gather_files_in_upload_directory() {
		
		
		
		echo "mehtod was called";
		
		$dir    = 'http://localhost/~youngbuck14188/Worker/Upload_folder/';
	
	if (is_dir($dir)) {
		
	echo "<p>Its a directory</p>";	
	} else {
		echo "<p>not a directory</p>";
	}
	
	
		// $files1 = scandir($dir);
		// 	
		// 	print_r($files1);
		
		//$this->load->helper('directory');
		
		//$map = directory_map($this->config->config["base_url"] . "Upload_folder");
		
		//$map = directory_map('/Worker/Upload_folder/', FALSE, TRUE);
		
		
		//print_r($map);
		
		//return $map;
		
		// $dir = "http://localhost/~youngbuck14188/Worker/Upload_folder/";
		// 
		// $dd =  $this->config->config["base_url"] . "Upload_folder/";
		// 	
		// opendir($dd);		
		// $files1 = scandir($dd);
		// closedir($dd);
		// 
		// 
		// return $files1;
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