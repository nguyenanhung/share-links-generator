<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Login
 *
 * @property object load
 * @property object input
 * @property object output
 * @property object session
 */
class Login extends CI_Controller
{
    /**
     * Login constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url', 'form', 'paginations'));
        $this->load->library(array('session'));
    }

    /**
     * Function index
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 2019-01-01 05:17
     * @link  /login/index.html
     *
     */
    public function index()
    {
        $config['users'] = array(
            1 => array(
                'username' => 'hungna',
                'password' => 'IYmAEWKcU2YnI0mGJPQw5N0X1VxIk4hZ'
            )
        );
        $data            = array();
        $data['message'] = "";
        $username        = $this->input->get_post('username', TRUE);
        $password        = $this->input->get_post('password', TRUE);
        /*
         *	check data with users config list and get info user
         */
        $check_user = FALSE;
        if (!empty($username) && !empty($password)) {
            foreach ($config['users'] as $key => $value) {
                if ($value['username'] == $username && $value['password'] = $password) {
                    $check_user = $config['users'][$key];
                }
            }
            if ($check_user != FALSE) {
                $this->session->set_userdata('user_info', $check_user);
                redirect(site_url());
            } else {
                $data['message'] = '* Thông tin đăng nhập không chính xác';
            }
        }
        $data['username'] = $username;
        $data['title']    = 'Đăng nhập';
        $this->load->view('layout/main', array(
            'sub'  => 'login/index',
            'data' => $data
        ));
    }

    /**
     * Function logout
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 2019-01-01 05:17
     * @link  /login/logout.html
     *
     */
    public function logout()
    {
        $user_info = $this->session->userdata('user_info');
        if ($user_info != NULL) {
            $this->session->sess_destroy();
        }
        redirect(site_url());
    }
}
