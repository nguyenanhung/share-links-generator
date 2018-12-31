<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Dashboard
 *
 * @property object load
 * @property object input
 * @property object output
 * @property object session
 * @property object uri
 * @property object link_model
 */
class Dashboard extends CI_Controller
{
    /**
     * Dashboard constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'paginations'));
        $this->load->library('session');
        $this->load->model('link_model');
        $this->output->set_status_header(200);
        $user_info = $this->session->userdata('user_info');
        if ($user_info == NULL) {
            redirect('login/index');
        }
    }

    /**
     * Dashboard destructor.
     */
    public function __destruct()
    {
        $this->link_model->close();
    }

    /**
     * @param string $slug
     * @param string $page
     */
    public function index($slug = '', $page = '')
    {
        $data           = array();
        $page           = $this->input->get_post('page', TRUE);
        $seg_page       = $this->uri->segment(3);
        $page           = substr($seg_page, 6, 1);
        $data['result'] = $this->link_model->getAllRecord(10, $page);
        $count          = $this->link_model->countTotal();
        $data['paging'] = view_paginations('site_page', $count, 10, $page, site_url() . 'home/index', 3, 3);
        $data['title']  = 'Quản lý link';
        $this->load->view('layout/main', array(
            'sub'  => 'home/index',
            'data' => $data
        ));
    }

    /**
     * Create new Item
     */
    public function create()
    {
        $data = $this->input->post();
        if (!empty($data)) {
            $this->link_model->add($data);
            redirect('dashboard/index', 'location');
            exit();
        }
        $this->load->view('layout/main', array(
            'sub' => 'home/create'
        ));
    }

    /**
     * Delete Item
     */
    public function deleteItem()
    {
        $id = $this->input->post('id', TRUE);
        if ($id !== NULL) {
            $check = $this->link_model->check_exists($id);
            if ($check && $this->link_model->delete($id)) {
                echo $id;
            }
        }
    }

    /**
     * Change Status
     */
    public function changeRedirectId()
    {
        $id                  = $this->input->post('id', TRUE);
        $redirect_id         = $this->input->post('redirect_id', TRUE);
        $check               = $this->link_model->check_exists($id);
        $data                = array();
        $data['redirect_id'] = $redirect_id;
        if ($check && $this->link_model->update($id, $data)) {
            echo $id;
        }
    }

    /**
     * Change Status
     */
    public function changeStatus()
    {
        $id             = $this->input->post('id', TRUE);
        $status         = $this->input->post('status', TRUE);
        $status         = $status == 'Active' ? 'Inactive' : 'Active';
        $check          = $this->link_model->check_exists($id);
        $data           = array();
        $data['status'] = $status;
        if ($check && $this->link_model->update($id, $data)) {
            echo $status;
        }
    }

    /**
     * Ajax load Item
     */
    public function ajaxLoadItem()
    {
        $id    = $this->input->post('id', TRUE);
        $check = $this->link_model->check_exists($id);
        $data  = array();
        if ($check) {
            $result         = $this->link_model->get_info($id);
            $data['flag']   = 1;
            $data['result'] = $result;
        } else {
            $data['flag'] = 0;
        }
        echo json_encode($data);
    }

    /**
     * Ajax Update Item
     */
    public function ajaxUpdateItem()
    {
        $data = $this->input->post('data', TRUE);
        if ($data != NULL) {
            $id = $data['id'];
            if ($id != 0) {
                $this->link_model->update($data['id'], $data);
            } else {
                unset($data['id']);
                $data['uuid'] = uuid_v4();
                $this->link_model->add($data);
            }
            echo $id;
        }
    }

    /**
     * Ajax Check slugs
     */
    public function ajaxCheckSlugs()
    {
        $str_slug   = $this->input->post('slug', TRUE);
        $check_slug = $this->link_model->checkSlugs($str_slug);
        $id         = 0;
        if (!empty($check_slug)) {
            $id = $check_slug[0]->id;
        }
        echo $id;
    }
}
