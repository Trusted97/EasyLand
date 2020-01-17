<?php defined('BASEPATH') or exit('No direct script access allowed');

class Room_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_chatroom()
    {
        $query = $this->db->get('land_chatroom');
        return $query->result();
    }

    public function get_chatroom_by_id($chatroom_id)
    {
        $sql = "SELECT * FROM land_chatroom WHERE chatroom_id = ?;";
        $query = $this->db->query($sql, array($chatroom_id));
        return $query->result();
    }
}
