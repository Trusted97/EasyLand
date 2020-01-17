<?php defined('BASEPATH') or exit('No direct script access allowed');

class Room extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper('url');
        $this->load->model('room_model');
        $this->load->library('grocery_CRUD');
    }

    public function manage()
    {
        $crud = new grocery_CRUD();

        $crud->set_table('land_chatroom')
          ->set_subject('Stanze')
          ->columns('chatroom_name', 'chatroom_description', 'chatroom_weather', 'chatroom_img')
          ->display_as('chatroom_name', 'Nome stanza')
          ->display_as('chatroom_description', 'Descrizione stanza')
          ->display_as('chatroom_weather', 'Meteo stanza')
          ->display_as('chatroom_img', 'Immagine stanza');

        $crud->set_field_upload('chatroom_img', 'assets/uploads/files/chatroom_image');

        $crud->fields('chatroom_name', 'chatroom_description', 'chatroom_weather', 'chatroom_img');
        $crud->required_fields('chatroom_name', 'chatroom_description', 'chatroom_weather');

        // $crud->set_relation('player_race', 'land_races', 'races_name');
        // $crud->set_relation('player_users_id', 'users', '{id} - {username}');

        $output = $crud->render();

        $this->_chatroom_output($output);
    }

    public function _chatroom_output($output = null)
    {
        $data['title'] = 'Gestione stanze';
        $data['files'] = (array)$output;

        $this->load->view('parts/admin_header', $data);
        $this->load->view('admin/chatroom');
        $this->load->view('parts/footer');
    }
}
