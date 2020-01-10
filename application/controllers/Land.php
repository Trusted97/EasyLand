<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Land extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('land_model');
    }

    public function index()
    {
        $data['title'] = 'EasyLand - Land';
        $data['player_online'] = $this->land_model->get_player_online();
        $this->load->view('land/land_header', $data);
        $this->load->view('land/land_main');
        $this->load->view('land/land_footer');
    }
}
