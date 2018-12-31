<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: hungna
 * Date: 3/22/2017
 * Time: 6:22 PM
 */
class TD_VAS_Based_model extends CI_Model
{
    /**
     * TD_VAS_Based_model constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->db          = $this->load->database('default', TRUE, TRUE);
        $this->tableName   = '';
        $this->primary_key = 'id';
        $this->is_not      = ' !=';
        $this->or_higher   = ' >=';
        $this->is_higher   = ' >';
        $this->or_smaller  = ' <=';
        $this->is_smaller  = ' <';
        $this->start_time  = ' 00:00:00';
        $this->end_time    = ' 23:59:59';
    }

    /**
     * Set Database
     *
     * @param string $db_group
     *
     * @return $this
     */
    public function setDb($db_group = '')
    {
        $this->db = $this->load->database($db_group, TRUE, TRUE);

        return $this;
    }

    /**
     * set Tables Name
     *
     * @param string $tableName
     *
     * @return $this
     */
    public function setTableName($tableName = '')
    {
        $this->tableName = $tableName;

        return $this;
    }

    /**
     * Close DB Connection
     *
     * @return mixed
     */
    public function close()
    {
        return $this->db->close();
    }

    /**
     * Phân trang
     *
     * @param int $size
     * @param int $page
     *
     * @return mixed
     *
     * @access        public
     * @author        Hung Nguyen <dev@nguyenanhung.com>
     * @version       1.0.1
     * @since         22/03/2017
     */
    public function page_limit($size = 500, $page = 0)
    {
        if ($size != 'no_limit') {
            if ($page != 0) {
                if (!$page || $page <= 0 || empty($page)) {
                    $page = 1;
                }
                $start = ($page - 1) * $size;
            } else {
                $start = $page;
            }

            return $this->db->limit($size, $start);
        }
    }

    /**
     * check_exists
     *
     * @access        public
     * @author        Hung Nguyen <dev@nguyenanhung.com>
     * @version       1.0.1
     * @since         22/03/2017
     */
    public function check_exists($value = '', $field = NULL)
    {
        $this->db->select('id');
        $this->db->from($this->tableName);
        if ($field === NULL) {
            $this->db->where($this->primary_key, $value);
        } else {
            $this->db->where($field, $value);
        }

        return (int) $this->db->count_all_results();
    }

    /**
     * get_info
     *
     * @access        public
     * @author        Hung Nguyen <dev@nguyenanhung.com>
     * @version       1.0.1
     * @since         22/03/2017
     */
    public function get_info($value = '', $field = NULL, $array = FALSE)
    {
        $this->db->from($this->tableName);
        if ($field === NULL) {
            $this->db->where($this->primary_key, $value);
        } else {
            $this->db->where($field, $value);
        }
        if ($array === TRUE) {
            return $this->db->get()->row_array();
        } else {
            return $this->db->get()->row();
        }
    }

    /**
     * get_value
     *
     * @access        public
     * @author        Hung Nguyen <dev@nguyenanhung.com>
     * @version       1.0.1
     * @since         22/03/2017
     */
    public function get_value($value_input = '', $field_input = NULL, $field_output = NULL)
    {
        if (NULL !== $field_output) {
            $this->db->select($field_output);
        }
        $this->db->from($this->tableName);
        if ($field_input === NULL) {
            $this->db->where($this->primary_key, $value_input);
        } else {
            $this->db->where($field_input, $value_input);
        }
        $query = $this->db->get();
        // Query
        if (NULL !== $field_output) {
            if (NULL === $query->row()) {
                return NULL;
            } else {
                return $query->row()->$field_output;
            }
        } else {
            return $query->row();
        }
    }

    /**
     * add
     *
     * @access        public
     * @author        Hung Nguyen <dev@nguyenanhung.com>
     * @version       1.0.1
     * @since         22/03/2017
     * @var add new Item to DB
     */
    public function add($data = array())
    {
        $this->db->insert($this->tableName, $data);

        return $this->db->insert_id();
    }

    /**
     * update
     *
     * @access        public
     * @author        Hung Nguyen <dev@nguyenanhung.com>
     * @version       1.0.1
     * @since         22/03/2017
     */
    public function update($id = '', $data = array())
    {
        $this->db->where($this->primary_key, $id);
        $this->db->update($this->tableName, $data);

        return $this->db->affected_rows();
    }

    /**
     * delete
     *
     * @access        public
     * @author        Hung Nguyen <dev@nguyenanhung.com>
     * @version       1.0.1
     * @since         22/03/2017
     */
    public function delete($id = '')
    {
        if (empty($id)) {
            return FALSE;
        }
        $this->db->where($this->primary_key, $id);
        $this->db->delete($this->tableName);

        return $this->db->affected_rows();
    }
}
/* End of file TD_VAS_Based_model.php */
/* Location: ./application/core/TD_VAS_Based_model.php */
