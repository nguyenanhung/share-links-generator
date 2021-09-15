<?php
/**
 * Created by PhpStorm.
 * User: hungna
 * Date: 10/3/2017
 * Time: 2:15 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Redirect_link
 *
 * @property object load
 * @property object input
 * @property object output
 * @property object session
 * @property object cache
 * @property object link_model
 */
class Redirect_link extends CI_Controller
{
    /**
     * Redirect_link constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Function index
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 2019-01-01 05:19
     *
     * @param $uuid
     *
     * Viết lại ngày 10/10/2017
     *
     * @link  /post/uuid.html
     */
    public function index($uuid)
    {
        $this->load->driver('cache', array('adapter' => 'file'));
        $cache_file_name = 'link_' . $uuid . '_' . md5($uuid);
        $cache_file_ttl  = 3600; // 1 hour
        if (!$info = $this->cache->get($cache_file_name)) {
            $this->load->model('link_model');
            $info = $this->link_model->get_info($uuid, 'uuid');
            if ($info !== NULL) {
                $this->cache->save($cache_file_name, $info, $cache_file_ttl);
            }
            $this->link_model->close();
        }
        if (!$info) {
            redirect('welcome', 'location', 301);
        }
        $data         = array();
        $data['info'] = $info;
        $this->load->view('redirect_link', array(
            'data' => $data
        ));
    }
}
