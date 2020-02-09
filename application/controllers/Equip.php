<?php defined('BASEPATH') or exit('No direct script access allowed');

class Equip extends CI_Controller
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

        $crud->set_table('land_object')
          ->set_subject('Oggetti')
          ->columns('object_type', 'object_market_id', 'object_name', 'object_maker', 'object_creation_date', 'object_description', 'object_price', 'object_bonus_def', 'object_bonus_atk', 'object_charge', 'object_bonus_str', 'object_bonus_dex', 'object_bonus_con', 'object_bonus_int', 'object_bonus_wis', 'object_bonus_cha', 'object_image')
          ->display_as('object_type', 'Tipo')
          ->display_as('object_market_id', 'Mercato')
          ->display_as('object_name', 'Nome')
          ->display_as('object_maker', 'Creatore')
          ->display_as('object_creation_date', 'Data inserimento')
          ->display_as('object_description', 'Descrizione')
          ->display_as('object_price', 'Prezzo')
          ->display_as('object_bonus_def', 'Bonus / Malus Difesa')
          ->display_as('object_bonus_atk', 'Bonus / Malus Attacco')
          ->display_as('object_charge', 'Cariche oggetto')
          ->display_as('object_bonus_str', 'Bonus / Malus Forza')
          ->display_as('object_bonus_dex', 'Bonus / Malus Destrezza')
          ->display_as('object_bonus_con', 'Bonus / Malus Costituzione')
          ->display_as('object_bonus_int', 'Bonus / Malus Intelligenza')
          ->display_as('object_bonus_wis', 'Bonus / Malus Saggezza')
          ->display_as('object_bonus_cha', 'Bonus / Malus Carisma')
          ->display_as('object_image', 'Immagine');

        $crud->set_field_upload('object_image', 'assets/uploads/files/player_image');

        $crud->fields('object_type', 'object_name', 'object_market_id', 'object_maker', 'object_creation_date', 'object_description', 'object_price', 'object_bonus_def', 'object_bonus_atk', 'object_charge', 'object_bonus_str', 'object_bonus_dex', 'object_bonus_con', 'object_bonus_int', 'object_bonus_wis', 'object_bonus_cha', 'object_image');
        $crud->required_fields('object_type', 'object_name', 'object_maker', 'object_creation_date', 'object_description', 'object_price');

        $crud->set_relation('object_maker', 'users', '{id} - {username}');
        $crud->set_relation('object_market_id', 'land_market', '{market_id} - {market_name}');

        $output = $crud->render();

        $this->_equip_output($output);
    }

    public function _equip_output($output = null)
    {
        $data['title'] = 'Gestione ogetti';
        $data['files'] = (array)$output;

        $this->load->view('parts/admin_header', $data);
        $this->load->view('admin/equip');
        $this->load->view('parts/footer');
    }
}
