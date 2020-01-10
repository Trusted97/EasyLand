<?php defined('BASEPATH') or exit('No direct script access allowed');

class Rulebook_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_rules()
    {
        $query = $this->db->get('land_rulebook');
        return $query->result();
    }
}
