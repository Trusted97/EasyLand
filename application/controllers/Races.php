<?php defined('BASEPATH') or exit('No direct script access allowed');

class Races extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('races_model');
        $this->load->helper('url');
        $this->load->library('grocery_CRUD');
    }

    public function public_races()
    {
        $data['title'] = 'Razze';
        $data['races_array'] = $this->races_model->get_races();
        $this->load->view('parts/header', $data);
        $this->load->view('public_races');
        $this->load->view('parts/footer');
    }

    public function manage()
    {
        $this->load->library('ion_auth');

        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        } elseif (!$this->ion_auth->is_admin()) { // remove this elseif if you want to enable this for non-admins
            // redirect them to the home page because they must be an administrator to view this
            show_error('You must be an administrator to view this page.');
        }

        $crud = new grocery_CRUD();

        $crud->set_table('land_races')
        ->set_subject('Razze')
        ->columns('races_name', 'races_description', 'races_str', 'races_dex', 'races_con', 'races_int', 'races_wis', 'races_cha', 'races_image')
        ->display_as('races_name', 'Nome razza')
        ->display_as('races_description', 'Descrizione razza')
        ->display_as('races_str', 'Bonus/Malus Forza razza')
        ->display_as('races_dex', 'Bonus/Malus Destrezza razza')
        ->display_as('races_con', 'Bonus/Malus Constituzione razza')
        ->display_as('races_int', 'Bonus/Malus Intelligenza razza')
        ->display_as('races_wis', 'Bonus/Malus Sagezza razza')
        ->display_as('races_cha', 'Bonus/Malus Carisma razza')
        ->display_as('races_image', 'Immagine razza');

        $crud->set_field_upload('races_image', 'assets/uploads/files/races_image');

        $crud->fields('races_name', 'races_description', 'races_str', 'races_dex', 'races_con', 'races_int', 'races_wis', 'races_cha', 'races_image');
        $crud->required_fields('races_name', 'races_description', 'races_str', 'races_dex', 'races_con', 'races_int', 'races_wis', 'races_cha', 'races_image');

        $output = $crud->render();

        $this->_races_output($output);
    }

    public function _races_output($output = null)
    {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        } elseif (!$this->ion_auth->is_admin()) { // remove this elseif if you want to enable this for non-admins
            // redirect them to the home page because they must be an administrator to view this
            show_error('You must be an administrator to view this page.');
        }
        
        $data['title'] = 'Gestione razze';
        $data['files'] = (array)$output;

        $this->load->view('parts/admin_header', $data);
        $this->load->view('admin/races');
        $this->load->view('parts/footer');
    }
}
