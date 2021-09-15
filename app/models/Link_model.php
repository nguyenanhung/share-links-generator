<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Class Link_model
 *
 * @author    713uk13m <dev@nguyenanhung.com>
 * @copyright 713uk13m <dev@nguyenanhung.com>
 *
 * @property \CI_DB_query_builder $db
 */
class Link_model extends HungNG_Custom_Based_model
{
    /**
     * Link_model constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->db          = $this->load->database('default', true, true);
        $this->tableName   = 'links';
        $this->primary_key = 'id';
        $this->field       = [
            'id'          => 'id',
            'uuid'        => 'uuid',
            'name'        => 'name',
            'website_url' => 'website_url',
            'fake_domain' => 'fake_domain',
            'status'      => 'status',
            'updated_at'  => 'updated_at',
        ];
    }

    /**
     * Function getAllRecord
     *
     * @param int $size
     * @param int $page
     *
     * @return array|array[]|object|object[]
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/15/2021 16:35
     */
    public function getAllRecord($size = 5, $page = 0)
    {
        $this->db->from($this->tableName);
        $this->db->order_by($this->primary_key, 'DESC');
        self::page_limit($size, $page);

        return $this->db->get()->result();
    }

    /**
     * Function countTotal
     *
     * @return int
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/15/2021 16:37
     */
    public function countTotal()
    {
        return $this->db->count_all($this->tableName);
    }

    /**
     * Function checkSlugs
     *
     * @param string $slugs
     *
     * @return array|mixed|object|null
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/15/2021 44:31
     */
    public function checkSlugs($slugs = '')
    {
        $this->db->select();
        $this->db->from($this->tableName);
        $this->db->where($this->field['uuid'], $slugs);

        return $this->db->get()->row();
    }
}
