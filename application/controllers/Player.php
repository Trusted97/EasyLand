<?php defined('BASEPATH') or exit('No direct script access allowed');

class Player extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // $this->load->model('player_model');
        $this->load->helper('url');
        $this->load->library('grocery_CRUD');
    }

    // public function public_races()
    // {
    //     $data['title'] = 'Razze';
    //     $data['races_array'] = $this->races_model->get_races();
    //     $this->load->view('parts/header', $data);
    //     $this->load->view('public_races');
    //     $this->load->view('parts/footer');
    // }

    public function manage()
    {
        $crud = new grocery_CRUD();

        $crud->set_table('player')
        ->set_subject('Giocatori')
        ->columns('player_nicename', 'player_description', 'player_race', 'player_equipment', 'player_pics')
        ->display_as('player_nicename', 'Nome Giocatore')
        ->display_as('player_users_id', 'ID Utente')
        ->display_as('player_description', 'Descrizione Giocatore')
        ->display_as('player_race', 'Razza Giocatore')
        ->display_as('player_equipment', 'Equip Giocatore')
        ->display_as('player_pics', 'Immagine Giocatore');

        $crud->set_field_upload('player_pics', 'assets/uploads/files/player_image');

        $crud->fields('player_nicename', 'player_users_id', 'player_description', 'player_race', 'player_equipment', 'player_pics');
        $crud->required_fields('player_nicename', 'player_users_id', 'player_description', 'player_race', 'player_equipment');

        $crud->set_relation('player_race', 'races', 'races_name');
        $crud->set_relation('player_users_id', 'users', 'id');

        $output = $crud->render();

        $this->_player_output($output);
    }

    public function _player_output($output = null)
    {
        $data['title'] = 'Gestione utenti';
        $data['files'] = (array)$output;

        $this->load->view('parts/admin_header', $data);
        $this->load->view('admin/player');
        $this->load->view('parts/footer');
    }
}
