<?php defined('BASEPATH') or exit('No direct script access allowed');

class Story_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_story()
    {
        $query = $this->db->get('land_story');
        return $query->result();
    }
}
