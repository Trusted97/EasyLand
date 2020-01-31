<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Homepage extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'EasyLand';
        $this->load->view('parts/header', $data);
        $this->load->view('homepage');
        $this->load->view('parts/footer');
    }

    public function index_register()
    {
        $this->load->model('races_model');

        $data['title'] = 'Registrazione';
        $data['races_array'] = $this->races_model->get_array_races();

        $this->load->view('parts/header', $data);
        $this->load->view('public_register');
        $this->load->view('parts/footer');
    }
}
