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
        $chatroom_id = $this->session->userdata('chatroom_id');

        $sql = "SELECT * FROM land_chatroom_message WHERE message_chatroom_id = ?";
        $query = $this->db->query($sql, array($chatroom_id));
        $chat_message_array = json_encode($query->result());

        return $chat_message_array;
    }

    public function get_last_messages_id()
    {
        $chatroom_id = $this->session->userdata('chatroom_id');

        $sql = "SELECT message_id FROM land_chatroom_message WHERE message_chatroom_id = ?";
        $query = $this->db->query($sql, array($chatroom_id));
        $chat_message_array = json_encode($query->result());

        return $chat_message_array;
    }

    public function get_messages_from_id($messageId)
    {
        $chatroom_id = $this->session->userdata('chatroom_id');

        $sql = "SELECT message_id,message_content FROM land_chatroom_message WHERE message_id = ? AND message_chatroom_id = ?";
        $query = $this->db->query($sql, array($messageId,$chatroom_id));
        $chat_message_array = json_encode($query->result());

        return $chat_message_array;
    }

    public function add_message_to_chatroom($message, $user_id)
    {
        $escaped_message = $this->db->escape_str($message);

        $chatroom_id = $this->session->userdata('chatroom_id');

        $data = array(
          'message_user_id' => $user_id,
          'message_chatroom_id' => $chatroom_id,
          'message_content' => $message
        );

        $this->db->insert('land_chatroom_message', $data);

        $message_id = $this->db->insert_id();
        $q = $this->db->get_where('land_chatroom_message', array('message_id' => $message_id));
        return json_encode($q->row());
    }
}
