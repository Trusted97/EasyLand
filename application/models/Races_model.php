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
        $query = $this->db->get('land_races');
        return $query->result();
    }

    public function get_array_races()
    {
        $query = $this->db->query("SELECT races_id,races_name FROM land_races;");
        return $query->result();
    }
}
