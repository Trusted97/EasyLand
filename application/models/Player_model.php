<?php defined('BASEPATH') or exit('No direct script access allowed');

class Player_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_player()
    {
        $query = $this->db->get('land_player');
        return $query->result();
    }

    public function set_player_logged($logged, $user_id)
    {
        //Check if user own a playable player
        $check_sql = "SELECT player_id FROM land_player WHERE player_users_id = ?";
        $check_query = $this->db->query($check_sql, array($user_id));

        if (!empty($check_query->result())) { //Is possible that an admin don't have a player
            $sql = "UPDATE land_player SET player_logged = ? WHERE player_users_id = ?";
            $this->db->query($sql, array($logged,$user_id));
        }
    }
}
