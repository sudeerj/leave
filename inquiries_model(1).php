<?php


class Inquiries_model extends CI_Model {

    /**
     * Constructor
     *
     */

    function __Construct()
    {
        parent::__Construct();
    }

    function getProfile($userData)
    {
        $this->db->select('username, full_name, DATE(created_at) as joining_date');
        $this->db->from('admin_user');
        if($userData['is_admin'] != 1){
            $this->db->where('admin_user.id',$userData['id']);
        }
        $result = $this->db->get();
        return $result->result_array();
    }
    // --------------------------------------------------------------------

    /**
     * Get Inquiries
     *
     * @access	private
     * @param	array	conditions to fetch data
     * @return	object	object with result set
     */
    function getInquiries($id='')
    {
        $this->db->select('enquiries.*,manufacturer.name as manuname,manufacturer.contact_number,products.name as prodname,countries.name as cname');
        $this->db->from('enquiries');
        $this->db->join('manufacturer','manufacturer.id=enquiries.manufacturer_id','left');
        $this->db->join('products','products.id=enquiries.product_id','left');
        $this->db->join('countries','countries.id=enquiries.country_id','left');
        $this->db->order_by("enquiries.id", "asc");
        $result = $this->db->get();
        return $result->result_array();
    }
    // --------------------------------------------------------------------

    /**
     * Get Inquiriy Details
     *
     * @access	private
     * @param	array	conditions to fetch data
     * @return	object	object with result set
     */
    function getInquiriedetails($id)
    {
        $this->db->select('enquiries.*,manufacturer.name as manuname,manufacturer.contact_number,products.name as prodname,countries.name as cname');
        $this->db->from('enquiries');
        $this->db->join('manufacturer','manufacturer.id=enquiries.manufacturer_id','left');
        $this->db->join('products','products.id=enquiries.product_id','left');
        $this->db->join('countries','countries.id=enquiries.country_id','left');
        $this->db->where('enquiries.id',$id);
        $this->db->limit(1);
        $result = $this->db->get();
        return $result->result_array();
    }
    // --------------------------------------------------------------------

    /**
     * Insert Inquiries
     *
     * @access	private
     * @param	array	conditions to fetch data
     * @return	object	object with result set
     */
    function insertInquiry()
    {
        $insertdata['name']  = $_POST['name'];
        $insertdata['email']  = $_POST['email'];
        $insertdata['country_id']  = $_POST['country_id'];
        $insertdata['business_type']  = $_POST['business_type'];
        $insertdata['message']  = $_POST['message'];
        $insertdata['manufacturer_id ']  = $_POST['manufacturer_id'];
        $result = $this->db->insert('enquiries',$insertdata);
        return $result;
    }
    // --------------------------------------------------------------------

    /**
     * Get Coutries
     *
     * @access	private
     * @param	array	conditions to fetch data
     * @return	object	object with result set
     */
    function getCountries($id='')
    {
        $this->db->select('*');
        if($id!='')
        {
            $this->db->where('id',$id);
        }
        $this->db->from('countries');
        $this->db->order_by("countries.id", "asc");
        $result = $this->db->get();
        return $result->result_array();
    }

  	function getTeaSales($saleyear,$saleno,$buyer_code)
    {
		$this->db->select('SALE_NO');
		$this->db->from('tea_sales');
		$this->db->where('SALE_YEAR',$saleyear);
		$this->db->where('SALE_NO',$saleno);
		$this->db->where('BUYER_CODE',$buyer_code);
        $this->db->where('do_email',0);
		$this->db->order_by('SALE_NO','desc');
		$this->db->limit(2,0);
		$result = $this->db->get();
		return $result->result_array();
    }
    
	
	function get_buyer_name($user_name)
    {
		$this->db->select('Name');
		$this->db->from('users');
		$this->db->where('UserName',$user_name);
		$data = $this->db->get();
		if($data->num_rows()>0)
		{
			$final_data = $data->result_array();
			return $final_data[0]['Name'];
		} 
		else
		{
			return false;
		}	 
	}
	
	function get_new_records_for_lot($aLot)
	{
		$lot_no = '';
		$sale_year = '';
		$sale_no = '';
		if(array_key_exists("lot_no",$aLot))
		{
		  $lot_no = $aLot['lot_no'];
		}

		if(array_key_exists("sale_year",$aLot))
		{
		 $sale_year = $aLot['sale_year'];
		}

		if(array_key_exists("sale_no",$aLot))
		{
		 $sale_no = $aLot['sale_no'];
		}

	    $this->db->select('*');
        $this->db->from('tea_sales');
		
		if($lot_no!="")
		{
		   $this->db->where('LOT_NO',$lot_no);	
		}	
		
		if($sale_no!="")
		{
		   $this->db->where('SALE_NO',$sale_no);	
		}
        
	    if($sale_year!="")
		{
		   $this->db->where('SALE_YEAR',$sale_year);	
		}
	 	
	    $result = $this->db->get();
		
		if($result->num_rows()>0)
		{
			return $result->result_array(); 
		}
        else{
			 return false;
		} 					
	}
	
	function check_old_password($user_id,$old_password)
	{
		$o_password = md5($old_password);
		$this->db->select("*");
		$this->db->from("admin_user");
		$this->db->where(array('id'=>$user_id,'password'=>$o_password));
		$data = $this->db->get();
		if($data->num_rows()>0)
		{
            $data = array();
		   $data->result_array(); 
           return $data['email'] =  $final_data[0]['email'];
		}
		else
		{
		   return false;  
		}	  
	}

    function update_do_email($lott_no)
    {

        $this->db->set('do_email', 1); //value that used to update column  
        $this->db->where('lot_no', $lott_no); //which row want to upgrade  
        $this->db->update('tea_sales');  //table name
    }
    function get_emails()
    {
        $this->db->select("email");
        $this->db->from("email_detail");
        $this->db->where('status',1);
        $data = $this->db->get();
        
        $this->db->last_query();

        if($data->num_rows()>0)
        {
           return $data->result_array(); 
        }
        else
        {
           return false;  
        }     
    }

}