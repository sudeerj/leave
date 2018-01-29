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
        if($id!=''){
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
	        $this->db->order_by('SALE_NO','desc');
	        $this->db->limit(2,0);
	        
	         $result = $this->db->get();
	         
	        return $result->result_array();

    }
    
  
    
    





}