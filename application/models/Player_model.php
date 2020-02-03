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

    public function insert_player($user_id, $race_id, $username, $stats_point)
    {
        var_dump($stats_point);
        var_dump($stats_point['int']);
        $data = array(
          'player_users_id' => $user_id,
          'player_nicename' => $username,
          'player_description' => '',
          'player_race' => $race_id,
          'player_equipment' => '',
          'player_strength' => $stats_point['str'],
          'player_constitution' => $stats_point['con'],
          'player_dexterity' => $stats_point['dex'],
          'player_wisdom' => $stats_point['wis'],
          'player_intelligence' => $stats_point['int'],
          'player_charisma' => $stats_point['cha'],
          'player_health' => 100,
          'player_health_max' => 100,
          'player_salary' => 0,
          'player_pics' => '',
          'player_logged' => 0
        );

        $this->db->insert('land_player', $data);
    }
}
