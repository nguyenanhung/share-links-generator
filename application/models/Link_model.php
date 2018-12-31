<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: hungna
 * Date: 10/3/2017
 * Time: 2:11 PM
 */
require_once APPPATH . 'core/TD_VAS_Based_model.php';

class Link_model extends TD_VAS_Based_model
{
    public $tableName;
    public $primary_key;

    /**
     * Link_model constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->db                = $this->load->database('default', TRUE, TRUE);
        $this->tableName         = 'links';
        $this->primary_key       = 'id';
        $this->field_uuid        = 'uuid';
        $this->field_name        = 'name';
        $this->field_website_url = 'website_url';
        $this->field_fake_domain = 'fake_domain';
        $this->field_status      = 'status';
        $this->field_updated_at  = 'updated_at';
    }

    /**
     * @param int $size
     * @param int $page
     *
     * @return mixed
     */
    public function getAllRecord($size = 5, $page = 0)
    {
        $this->db->from($this->tableName);
        $this->db->order_by($this->primary_key, 'DESC');
        self::page_limit($size, $page);

        return $this->db->get()->result();
    }

    /**
     * @return mixed
     */
    public function countTotal()
    {
        return $this->db->count_all($this->tableName);
    }
}
