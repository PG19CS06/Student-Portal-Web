<?php

class Api_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function test_api($message)
    {
        return 'API_MODEL ' . $message;
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /*
     * PLEASE WRITE ALL NEW FUNCTIONS BELOW THIS LINE
     * ALSO, WRITE NEW FUNCTIONS AT THE TOP (BELOW THIS LINE)
     * */

    
    public function login($username, $password)
    {
        /*
        * WOLF, 2019 03 23, 12:04
        * */
        $this->db->where('username', $username);
        $this->db->where('password', sha1($password));
        // $this->db->where('password', $password);
        $roles = array(1,2,3);
        $this->db->where_in('role_id', $roles);
        $this->db->select('user_id,role_id, username');
        $user = $this->db->get('tbl_users')->row();
        
        return $user;
    }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /*
     * $ - HELPER FUNCTIONS -$
     * DO NOT WRITE API FUNCTIONS BELOW THIS AREA
     * USE THIS AREA FOR HELPER FUNCTIONS ONLY
     * */

    
}
