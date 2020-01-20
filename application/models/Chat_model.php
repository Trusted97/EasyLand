<?php defined('BASEPATH') or exit('No direct script access allowed');

class Chat_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_last_messages()
    {
        // $sql = "SELECT * FROM some_table WHERE id = ? AND status = ? AND author = ?";
        // $this->db->query($sql, array(3, 'live', 'Rick'));
        $query = $this->db->get('land_chatroom_message');
        $chat_message_array = json_encode($query->result());
        return $chat_message_array;
    }

    public function add_message_to_chatroom($message, $chatroom_id, $user_id)
    {
        $escaped_message = $this->db->escape_str($message);

        $data = array(
          'message_user_id' => $user_id,
          'message_chatroom_id' => $chatroom_id,
          'message_content' => $message
        );

        $this->db->insert('land_chatroom_message', $data);
    }
}
