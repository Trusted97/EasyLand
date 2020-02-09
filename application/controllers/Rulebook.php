<?php defined('BASEPATH') or exit('No direct script access allowed');

class Rulebook extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper('url');
        $this->load->model('rulebook_model');
        $this->load->library('grocery_CRUD', 'ion_auth');
    }

    public function public_rulebook()
    {
        $data['title'] = 'Regolamento';
        $data['rules_array'] = $this->rulebook_model->get_rules();
        $this->load->view('parts/header', $data);
        $this->load->view('public_rulebook');
        $this->load->view('parts/footer');
    }

    public function manage()
    {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        } elseif (!$this->ion_auth->is_admin()) { // remove this elseif if you want to enable this for non-admins
            // redirect them to the home page because they must be an administrator to view this
            show_error('You must be an administrator to view this page.');
        }

        $crud = new grocery_CRUD();

        $crud->set_table('land_rulebook')
        ->set_subject('Regole')
        ->columns('rule_title', 'rule_text')
        ->display_as('rule_title', 'Nome regola')
        ->display_as('rule_text', 'Corpo Regola');

        $crud->fields('rule_title', 'rule_text');
        $crud->required_fields('rule_title', 'rule_text');

        $output = $crud->render();

        $this->_rulebook_output($output);
    }

    public function _rulebook_output($output = null)
    {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        } elseif (!$this->ion_auth->is_admin()) { // remove this elseif if you want to enable this for non-admins
            // redirect them to the home page because they must be an administrator to view this
            show_error('You must be an administrator to view this page.');
        }
        $data['title'] = 'Gestione regolamento';
        $data['files'] = (array)$output;

        $this->load->view('parts/admin_header', $data);
        $this->load->view('admin/rulebook');
        $this->load->view('parts/footer');
    }
}
