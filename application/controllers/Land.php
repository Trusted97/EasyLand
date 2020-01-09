<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Land extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'EasyLand - Land';
        $this->load->view('land/land_header', $data);
        $this->load->view('land/land_main');
        $this->load->view('land/land_footer');
    }
}
