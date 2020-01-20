<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Land extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('room_model');
        $this->load->model('land_model');
    }

    public function index()
    {
        $data['title'] = 'EasyLand - Land';
        $data['player_online'] = $this->land_model->get_player_online();
        $data['chatroom_array'] = $this->room_model->get_chatroom();
        $this->load->view('land/land_header', $data);
        $this->load->view('land/land_main');
        $this->load->view('land/land_footer');
    }

    public function chatroom($chatroom_id)
    {
        if (count($this->room_model->get_chatroom_by_id($chatroom_id)) == 0) { //If not is a good chatroom id redirect to land page
            redirect('land', 'refresh');
        }
        
        $data['title'] = 'EasyLand - Chat';
        $data['player_online'] = $this->land_model->get_player_online();
        $data['room_info'] = $this->room_model->get_chatroom_by_id($chatroom_id);
        $data['chatroom_id'] = $chatroom_id;

        $chatroom_data = array(
          'chatroom_id'  => $chatroom_id
        );
        $this->session->set_userdata($chatroom_data);


        $this->load->view('land/land_header', $data);
        $this->load->view('land/land_chat');
        $this->load->view('land/land_footer');
    }

    public function playersheet()
    {
        $data['title'] = 'EasyLand - Scheda utente';
        $data['player_online'] = $this->land_model->get_player_online();
        $this->load->view('land/land_header', $data);
        $this->load->view('land/land_playersheet');
        $this->load->view('land/land_footer');
    }
}
