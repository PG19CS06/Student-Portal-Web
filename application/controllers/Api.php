<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Api extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        error_reporting(E_ALL & ~E_NOTICE);
        $this->load->database();
        $this->load->model('Api_model');
        $this->load->helper('form');
    }
    /*************** This file is for department admin and teacher's app ********************/
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /*
     * PLEASE WRITE ALL NEW FUNCTIONS BELOW THIS LINE
     * ALSO, WRITE NEW FUNCTIONS AT THE TOP (BELOW THIS LINE)
     * */

    
    public function login()
    {
        /*
         * WOLF, 2019 03 23, 12:10
         * */
        $username = $this->get('username'); // Use $this->get('param'); to get parameters. Don't use $_GET['param'] or $_POST['param'] or $_REQUEST['param']
        $password = $this->get('password');
        $user = $this->Api_model->login($username, $password);
        $status = $user->user_id > 0; // If invalid user, user id is -1, so status false. Else userid will be greater than 0 so status will be true
        $message = $status ? "Success" : "Invalid username or password";
        $this->send_response($user, $status, $message);
    }


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /*
     * $ - HELPER FUNCTIONS -$
     * DO NOT WRITE API FUNCTIONS BELOW THIS AREA
     * USE THIS AREA FOR HELPER FUNCTIONS ONLY
     * */

    public
    function send_response($data, $status = true, $message = "")
    {
        //DO NOT CHANGE THIS FORMAT
        $response['status'] = $status;
        $response['message'] = $message;
        $response['data'] = $data;
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    private
    function get($key)
    {
        if (isset($_REQUEST[$key])) {
            return $_REQUEST[$key];
        } else {
            return null;
        }
    }

    public
    function index()
    {
        $this->send_response(date('H:i:s d-m-Y'), true, 'Login2 School Admin :)');
    }

    public
    function test()
    {
        $name = $this->get('name');
        $this->send_response($this->Api_model->test_api($name));
    }

    private
    function get_ymd($date)
    {
        if (null != $date && "" != $date) {
            $date = date('Y-m-d', strtotime(str_replace("/", "-", $date)));
        } else {
            $date = null;
        }
        return $date;
    }

}
