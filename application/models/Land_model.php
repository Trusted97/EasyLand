<?php defined('BASEPATH') or exit('No direct script access allowed');

class Land_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_player_online()
    {
        $sql = "SELECT player_nicename FROM land_player WHERE player_logged = ?;";
        $query = $this->db->query($sql, array(1));
        return $query->result();
    }
}
