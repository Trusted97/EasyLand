<?php defined('BASEPATH') or exit('No direct script access allowed');

class Chat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper('url');
        $this->load->library('ion_auth');
        $this->load->model('chat_model');

        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        }
    }

    public function get_messages()
    {
        $chat_message_array = $this->chat_model->get_last_messages();
        echo $chat_message_array;
    }

    public function get_messages_id()
    {
        $chat_message_array = $this->chat_model->get_last_messages_id();
        echo $chat_message_array;
    }

    public function get_message_by_id()
    {
        $messageId = $this->input->post('messageId');
        $chat_message_array = $this->chat_model->get_messages_from_id($messageId);
        echo $chat_message_array;
    }

    public function insert_message()
    {
        $user_id = $this->ion_auth->user()->row()->id;
        $chat_message = $this->input->post('message');

        $this->chat_model->add_message_to_chatroom($chat_message, $user_id);
    }

    public function insert_dice_message()
    {
        $this->load->library('dice');

        $user_id = $this->ion_auth->user()->row()->id;
        $dice_message = $this->input->post('dice_message');

        $calculed_dice_message = $this->dice->calc_dice($dice_message);

        $this->chat_model->add_message_to_chatroom($calculed_dice_message, $user_id);
    }
}
