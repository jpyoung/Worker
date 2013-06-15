<?php

class Upload extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	function index()
	{
		// $this->load->view('admin/admin_home_view', array('error' => ' ' ));
		$this->load->view('uploader_view');
	}

	function do_upload()
	{
		$config['upload_path'] = './upload/';
		$config['allowed_types'] = 'gif|jpg|png|zip|avi';
		/*$config['max_size']	= '1000';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';*/

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			echo '<div id="status">error</div>';
			echo '<div id="message">'. $this->upload->display_errors() .'  You must do better next time</div>';
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			
			$sout = '';
			
			$sout .= '<p>Start Date: ' . $_POST['start_date'] . '</p>';
			$sout .= '<p>Start Date: ' . $_POST['stop_date'] . '</p>';
			
			//Checking which radio button was clicked on the file upload page.
			$bool = "1";
		
			if($_POST["selection"] == 'corporate'){
				// echo '<h1>The Radio button was Corporate</h1>';
				$bool = "1";

			} else if ($_POST["selection"] == 'franchise'){
				// echo '<h1>The Radio button was Franchise</h1>';
					$bool = "0";
			}
			
			$sout .= '<p>Campaign Type: ' . $bool . '</p>';
			
			$fakeURL = "http://imvix.com/test/GFG/MVIX_SITE_GFG/upload/" . $data['upload_data']['file_name'];
			
			$sendData = array('FILE_PATH'=> $fakeURL, 'START_DATE'=> $_POST['start_date'], 'STOP_DATE'=> $_POST['stop_date'], 'PERMANENT'=> $bool, 'TYPE'=> $data['upload_data']['image_type']);
			
			
			$sout .= '<p>File name: ' . $data['upload_data']['file_name'] . '</p>';
			$sout .= '<p>File Path: ' . $data['upload_data']['full_path'] . '</p>';
			$sout .= '<p>File Type: ' . $data['upload_data']['file_type'] . '</p>';
			$sout .= '<p>File Size: ' . $data['upload_data']['file_size'] . '</p>';
		    $sout .= '<p>Image Type: ' . $data['upload_data']['image_type'] . '</p>';	
			
			 // echo $sout;
			$this->save_the_uploaded_file($sendData);
			// $this->load->view('admin/admin_home');
			 redirect('admin/admin_home');
			
			// echo '<div id="status">successful file upload</div>';
			// 	//then output your message (optional)
			// 	echo '<div id="message">'. $data['upload_data']['file_name'] .' Successfully uploaded.</div>';
			// 	//pass the data to js
			// 	echo '<div id="upload_data">'. json_encode($data) . '</div>';
			
		}
	}
	
	
	
	
	function save_the_uploaded_file($data)
	{
		
			$info = array(
				 'FILE_ID'=> null,
				 'FILE_PATH' => $data['FILE_PATH'],
				 'START_DATE'=> $data['START_DATE'],
				 'STOP_DATE'=> $data['STOP_DATE'],
				 'PERMANENT'=> $data['PERMANENT'],
				 'TYPE'=> $data['TYPE']
				);

			$this->load->model('file_table_model');
			$r = $this->file_table_model->insert_new_file($info);
			//echo $r;
		
	}
	
	
	
}
?>