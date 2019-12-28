<?php defined('BASEPATH') or exit('No direct script access allowed');

class Races_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->load->database();
    }

    public function get_races()
    {
        $query = $this->db->get('races');
        return $query->result();
    }
}
