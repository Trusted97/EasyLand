<?php defined('BASEPATH') or exit('No direct script access allowed');

class Player extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper('url');
        $this->load->library('grocery_CRUD', 'ion_auth');

        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        } elseif (!$this->ion_auth->is_admin()) { // remove this elseif if you want to enable this for non-admins
            // redirect them to the home page because they must be an administrator to view this
            show_error('You must be an administrator to view this page.');
        }
    }

    public function manage()
    {
        $crud = new grocery_CRUD();

        $crud->set_table('land_player')
          ->set_subject('Giocatori')
          ->columns('player_nicename', 'player_description', 'player_race', 'player_pics')
          ->display_as('player_nicename', 'Nome Giocatore')
          ->display_as('player_users_id', 'ID Utente')
          ->display_as('player_description', 'Descrizione Giocatore')
          ->display_as('player_race', 'Razza Giocatore')
          ->display_as('player_pics', 'Immagine Giocatore');

        $crud->set_field_upload('player_pics', 'assets/uploads/files/player_image');

        $crud->fields('player_nicename', 'player_users_id', 'player_description', 'player_race', 'player_pics');
        $crud->required_fields('player_nicename', 'player_users_id', 'player_description', 'player_race');

        $crud->set_relation('player_race', 'land_races', 'races_name');
        $crud->set_relation('player_users_id', 'users', '{id} - {username}');

        $output = $crud->render();

        $this->_player_output($output);
    }

    public function _player_output($output = null)
    {
        $data['title'] = 'Gestione giocatori';
        $data['files'] = (array)$output;

        $this->load->view('parts/admin_header', $data);
        $this->load->view('admin/player');
        $this->load->view('parts/footer');
    }
}
