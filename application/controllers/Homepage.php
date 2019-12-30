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
}
