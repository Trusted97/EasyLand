<?php defined('BASEPATH') or exit('No direct script access allowed');

class Chat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper('url');
        $this->load->library('ion_auth');
        $this->load->model('chat_model');
    }

    public function get_messages()
    {
        $chat_message_array = $this->chat_model->get_last_messages();
        echo $chat_message_array;
    }

    public function insert_message()
    {
        $user_id = $this->ion_auth->user()->row()->id;
        $chat_message = $this->input->post('message');
        $chatroom_id = $this->session->userdata('chatroom_id'); //Add to session in Land Controller function chatroom

        $this->chat_model->add_message_to_chatroom($chat_message, $chatroom_id, $user_id);
    }
}
