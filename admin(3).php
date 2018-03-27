<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

//require APPPATH . '/libraries/REST_Controller.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Sudeera
 * @version : 1.1
 * @since : 8/2/2017
 */
class Admin extends CI_Controller
{
		/**
		 * This is default constructor of the class
		 */
		public function __construct()
		{
			parent::__construct();
			$this->load->model('login_model');
			$this->load->model('inquiries_model');
			//$this->load->model('blog_model');;
			//echo $this->uri->segment(3);exit;
			/*if($this->uri->segment(3)!='login') {
					$this->isLoggedIn();
			}*/
		}
		/**
		 * This function is used to login admin
		 */
		public function login()
		{
			if($_POST) 
			{
				if(!isset($_POST['username']) || $_POST['username']==''){
						echo json_encode(array('status'=>false,'message'=>'Please Enter Username.'));
						return;
				}
				if(!isset($_POST['password']) || $_POST['password']==''){
						echo json_encode(array('status'=>false,'message'=>'Please Enter Password.'));
						return;
				}
				$username = $_POST['username'];
				$password = $_POST['password'];
				$result = $this->login_model->loginMe($username, $password);
				if (count($result) > 0) {
						$token = md5(uniqid($result['id'], true));
						$update = $this->db->where('id',$result['id'])->update('admin_user',array('token'=>$token));
						if($update) {
								echo json_encode(array('status' => true,'token'=>$token));
						}else{
								echo json_encode(array('status'=>false,'message'=>'Incorrect Username or Password 1'));
						}
				}else{
						echo json_encode(array('status'=>false,'message'=>'Incorrect Username or Password 2'));

				}
			}else{
					echo json_encode(array('status'=>false,'message'=>'Please Enter Username and Password.'));

			}
		}

		/**
		 * This function is used to get all inquiries
		 */
		public function getProfile()
		{

				$headers  = getallheaders();
				if(!empty($headers)){
						$hdrs = array();
						foreach ($headers as $name => $value) {
								$hdrs[$name] = $value;
						}
						//if(isset($hdrs['token']) && $hdrs['token']!=''){
						if((isset($hdrs['token']) && $hdrs['token']!='') ||  (isset($hdrs['Token']) && $hdrs['Token']!='')){
							 $hdrs['token'] = (isset($hdrs['token'])) ? $hdrs['token'] : $hdrs['Token'];
							 $user = $this->db->select('id, is_admin')->from('admin_user')->where('token',$hdrs['token'])->get()->result_array();
								if(!empty($user)){
										
										$result = $this->inquiries_model->getProfile($user[0]);
										if(count($result)){
												echo json_encode(array('status'=>true,'data'=>$result));
										}else{
												echo json_encode(array('status'=>false,'message'=>'No Inquiries Found.'));
										}

								}
						}
				}

				

		}


 /**
		 * This function is used to get tea_sales
		 */
 /*   public function getTeaSales()
		{

				$headers  = getallheaders();
				if(!empty($headers)){
						$hdrs = array();
						foreach ($headers as $name => $value) {
								$hdrs[$name] = $value;
						}


				 //   $saleyear = $_POST['saleyear'];
				 //   $saleno = $_POST['saleno'];
				 $username = $_POST['username'];

					$saleyear = 2017;
					$saleno = 48;

				//    if(isset($hdrs['token']) && $hdrs['token']!=''){

						if((isset($hdrs['token']) && $hdrs['token']!='') ||  (isset($hdrs['Token']) && $hdrs['Token']!='')){
							 $hdrs['token'] = (isset($hdrs['token'])) ? $hdrs['token'] : $hdrs['Token'];
						//   $user = $this->db->select('id, is_admin')->from('admin_user')->where('token',$hdrs['token'])->get()->result_array();
$user = $this->db->select('id, is_admin')->from('admin_user')->where('token',$hdrs['token'])->get()->result_array();
								if(!empty($user)){
										
									 $result = $this->inquiries_model->getTeaSales($user[0],$saleyear,$saleno,$username);

										if(count($result)){
												echo json_encode(array('status'=>true,'data'=>$result));
										}else{
												echo json_encode(array('status'=>false,'message'=>'No Inquiries Found.'));
										}

								}
						}
				}

		}
	 */ 
		
		
		public function getTeaSales()
		{
			$saleyear = $_POST['saleyear'];
			$saleno = $_POST['saleno'];
			$buyer_code= $_POST['buyer_code'];         
			$token = trim($_POST['token']); 
			if($_POST['saleyear']=='')
			{
				echo json_encode(array('status'=>false,'message'=>'sale year required'));exit;	
			}
			$user_token = $this->db->select('id')->from('admin_user')->where('token',$token)->get()->num_rows();			
			if($user_token >0)
			{
				$this->db->select('id,is_admin,username');
				$this->db->from('admin_user');
				$this->db->where('token',$token);
				$data =  $this->db->get();  
				if($data->num_rows()>0)
				{
					$record = $data->result_array();
					$result = $this->inquiries_model->getTeaSales($saleyear,$saleno,$buyer_code);
												
					if($result){
						echo json_encode(array('status'=>true,'data'=>$result));
					}else{
						echo json_encode(array('status'=>false,'message'=>'No Inquiries Found.'));
					}
				}  
				else
				{
					echo json_encode(array('status'=>false,'message'=>'No Inquiries Found.'));
				} 	 
			}
			else
			{
				echo json_encode(array('status'=>false,'message'=>'Token Not Valid')); exit;
			}
						 
		}
				
		public function bank_list()
		{
				
			$token_no = trim($_POST['token']);
			$user = $this->db->select('id')->from('admin_user')->where('token',$token_no)->get()->num_rows();			 
			if($user>0)
			{
				$this->db->select('*');
				$this->db->from('tbl_bank');
				$data = $this->db->get();
				// $result = $data->result_array();
				if($data->num_rows()>0)
				{ 
					$result = $data->result_array();
					echo json_encode(array('status'=>true,'data'=>$result));
				}
			 	else
			 	{	
					echo json_encode(array('status'=>false,'message'=>'No Bank Found.'));	
			 	}
			}
			else
			{ 
				echo json_encode(array('status'=>false,'message'=>'Token Not Valid')); exit;
			}
		}
			
		/**
		 * This function is used to get all inquiries
		 */
		public function getAllInquiries()
		{

			$result = $this->inquiries_model->getInquiries();
			if(count($result)){
					echo json_encode(array('status'=>true,'data'=>$result));
			}else{
					echo json_encode(array('status'=>false,'message'=>'No Inquiries Found.'));
			}

		}

		private function isLoggedIn()
		{
			if($this->uri->segment(3)=='upload_user_pic' || $this->uri->segment(3)=='getTeaSales' || $this->uri->segment(3)=='bank_list')
			{
				return true;
			}
			$headers  = getallheaders();
				
			if(!empty($headers))
			{
				$hdrs = array();
				foreach ($headers as $name => $value) 
				{
					$hdrs[$name] = $value;
				}
				//    if(isset($hdrs['token']) && $hdrs['token']!=''){
				if((isset($hdrs['token']) && $hdrs['token']!='') ||  (isset($hdrs['Token']) && $hdrs['Token']!=''))
				{
					$hdrs['token'] = (isset($hdrs['token'])) ? $hdrs['token'] : $hdrs['Token'];
					$user = $this->db->select('id')->from('admin_user')->where('token',$hdrs['token'])->get()->num_rows();
					if($user>0){
						return true;
					}else{
					echo json_encode(array('status'=>false,'message'=>'Invalid Credentials.')); exit;
					}
				}
				else
				{
					echo json_encode(array('status'=>false,'message'=>'Please Login First.')); exit;
				}
			}
			else
			{
				echo json_encode(array('status'=>false,'message'=>'Please Login First.')); exit;
			}
		}
	 
		public function upload_user_pic()
		{
			$token_no = trim($_POST['token']);
			$user = $this->db->select('id')->from('admin_user')->where('token',$token_no)->get()->num_rows();
				 
			if($user>0)
			{
				if($_POST['user_id']=='')
				{
					echo json_encode(array('status'=>false,'message'=>'Please enter user id')); exit;              
				}
				else if (empty($_FILES['file']['name']))
				{
					echo json_encode(array('status'=>false,'message'=>'Please upload admin profile.')); exit; 
				}
				else 
				{
					$fname=$_FILES['file']['name'];
					$time = time();
					$new_file_name = $time.preg_replace('/[^a-zA-Z0-9.]/', '', basename($fname));
					$id = $this->input->post('user_id');
					$config['upload_path']   = "./uploads/user_profile/";
					$config['allowed_types'] = 'gif|jpg|png|jpeg';
					$config['overwrite']     = false;
					$config['file_name']=$new_file_name;
					$this->load->library('upload', $config);
					$this->upload->initialize($config);			
					if (!$this->upload->do_upload('file'))
					{
						echo json_encode(array('status'=>false,'message'=>'Please upload only gif,jpg,png,jpeg image for admin profile')); exit;	        	
					}
					else
					{	
						$image_link = base_url()."/uploads/user_profile/".$new_file_name; 
						$this->login_model->update_profile_name($id,$new_file_name);
						echo json_encode(array('status'=>true,'message'=>'Image Upload Successfullly','profile_link'=>$image_link)); exit;
					}
				}
			} 
			else
			{
				echo json_encode(array('status'=>false,'message'=>'Token Not Valid')); exit;
			} 
		}

	 	public function user_send_email()
	 	{

	 
	 		$jsonData = json_decode($_POST['jsonData']);
			$username = $jsonData->username;
			$to_email = $jsonData->to_email;
			$sale_year =$jsonData->sale_year;
			$sale_no = $jsonData->sale_no;
			$bank_name = $jsonData->bank_name;
			$amount = $jsonData->amount;	  
			$cum_proceeds = $jsonData->cum_proceeds;
			$balance = $jsonData->balance;	
			$reference_details = $jsonData->reference_details;
			$buyer_name = $this->inquiries_model->get_buyer_name($username);
			$aEmails =$this->inquiries_model->get_emails();
			$sEmails =  implode(', ', array_map(function ($entry) {
			return $entry['email'];

			}, $aEmails));
			$aLot = array("sale_no"=>$jsonData->sale_no,"lot_no"=>$jsonData->lot_no,"sale_year"=>$jsonData->sale_year);
			
	 		$table = '';	
			$table.="Buyer :$buyer_name \n";    
			$table.="Sale No :$sale_no \n";
			$table.="Sale Year :$sale_year <br/>";
			$table.="Bank Name :$bank_name \n";
			$table.="Amount :$amount \n";
			$table.="Cum Proceeds :$cum_proceeds \n";
			$table.="Balance :$balance \n";
			$table.="Reference Details :$reference_details \n";
			$table.="<br/>";
			$table.="<table border='1'>
				<tr>
					<th>Lot No</th>
					<th>Qty</th>
				</tr>";
	
				foreach($aLot['lot_no'] as $d)
				{
					$aLot = array("sale_no"=>$jsonData->sale_no,"lot_no"=>$d,"sale_year"=>$jsonData->sale_year);
					$table_records = $this->inquiries_model->get_new_records_for_lot($aLot);
					$lott_no = $d;
					$no_of_chests = $table_records[0]['NO_OF_CHESTS'];
					$table.="<tr>
						<td>$lott_no</td>
						<td>$no_of_chests</td>
						</tr>";
				}
 				$table.='</table>';
 				$config['protocol']    = 'smtp';
				$config['smtp_host']    = 'ssl://smtp.googlemail.com';
				$config['smtp_port']   = '465';
				$config['smtp_user']    = 'manoj.456690.kumar@gmail.com';
				$config['smtp_pass']    = 'mobiletv';
				$config['charset']    = 'utf-8';
				$config['newline']    = "\r\n";
				$config['mailtype'] = 'text'; // or html
				//$config['validation'] = FALSE;

				
				$this->load->library('email',$config); 
				$this->email->from('manoj.456690.kumar@gmail.com', 'manoj kumar');
				$this->email->to($to_email); //array of receiver user
				 $this->email->cc($sEmails);
				$this->email->subject('Buyer Information');
				$this->email->message($table);
				if($this->email->send())
				{ 	
					if (is_array($aLot['lot_no']) || is_object($aLot['lot_no']))
					{
						foreach($aLot['lot_no'] as $d)
						{
							$lott_no = $d;
							$this->inquiries_model->update_do_email($lott_no);
						}
					}
					return true; 
					echo json_encode(array('status'=>true,'message'=>'email send successfully.')); 

				}
				else
				{ 
					if(mail("$to_email","Buyer Information",$table))
					{
						echo json_encode(array('status'=>true,'message'=>'email send successfully.')); 
					}		
					else
					{
						//echo $this->email->print_debugger();
						echo json_encode(array('status'=>false,'message'=>$this->email->print_debugger())); 		
					}
				}
		 exit;
	 	}
	 
		public function reset_password_api()
		{
			$token_no = trim($_POST['token']);
			$user_id = $_POST['id'];
			$reset_password = $_POST['new_password'];
			$old_password = $_POST['old_password'];
			$user = $this->db->select('id')->from('admin_user')->where('token',$token_no)->get()->num_rows(); 
			if($user > 0)
			{
				$checked_old_password  = $this->inquiries_model->check_old_password($user_id,$old_password);	
				if($checked_old_password)
				{
					$reset_password_array = array('password'=>md5($reset_password));
					$this->db->where('id',$user_id);
					$this->db->update('admin_user',$reset_password_array);
					echo json_encode(array('status'=>true,'message'=>'Password Reset Successfully.')); exit;	 
				}
				else
				{
					echo json_encode(array('status'=>false,'message'=>'Old Password Not Match.')); exit;
				}	
			}
			else
			{	
				echo json_encode(array('status'=>false,'message'=>'Token Not Valid')); exit;
			}
		}
	}
?>