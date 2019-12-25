<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Homepage extends CI_Controller
{
    public function index()
    {
        $this->load->view('parts/header');
        $this->load->view('homepage');
        $this->load->view('parts/footer');
    }
}
