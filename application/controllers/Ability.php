<?php defined('BASEPATH') or exit('No direct script access allowed');

class Ability extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // $this->load->model('player_model');
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

        $crud->set_table('land_ability')
          ->set_subject('Abilità')
          ->columns('ability_name', 'ability_char_name')
          ->display_as('ability_name', 'Nome')
          ->display_as('ability_char_id', 'ID')
          ->display_as('ability_description', 'Descrizione')
          ->display_as('ability_char_name', 'Caratteristica');

        $crud->fields('ability_name', 'ability_char_id', 'ability_char_name', 'ability_description');
        $crud->required_fields('ability_name', 'ability_char_name', 'ability_description');

        $crud->change_field_type('ability_char_id', 'invisible');

        $crud->callback_before_insert(array($this,'callback_ability'));
        $crud->callback_before_update(array($this,'callback_ability'));

        $output = $crud->render();

        $this->_ability_output($output);
    }

    public function callback_ability($post_array)
    {
        $post_array['ability_char_id'] = $this->get_ability_id_from_name($post_array["ability_char_name"]);
        return $post_array;
    }


    public function get_ability_id_from_name($char_name)
    {
        $char_id = 0;

        switch ($char_name) {
          case 'Forza':
            $char_id = 1;
            break;
          case 'Constituzione':
            $char_id = 2;
            break;
          case 'Destrezza':
            $char_id = 3;
            break;
          case 'Saggezza':
            $char_id = 4;
            break;
          case 'Intelligenza':
            $char_id = 5;
            break;
          case 'Carisma':
            $char_id = 6;
            break;
      }

        return $char_id;
    }

    public function _ability_output($output = null)
    {
        $data['title'] = 'Gestione abilità';
        $data['files'] = (array)$output;

        $this->load->view('parts/admin_header', $data);
        $this->load->view('admin/ability');
        $this->load->view('parts/footer');
    }
}
