<?php defined('BASEPATH') or exit('No direct script access allowed');

class Rulebook extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->ion_auth->in_group('admin')) {
            redirect('', 'refresh');
        } else {
            $this->load->database();
            $this->load->helper('url');
            $this->load->library('grocery_CRUD');
        }
    }

    public function manage()
    {
        $crud = new grocery_CRUD();

        $crud->set_table('rulebook')
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
        $data['title'] = 'Gestione regolamento';
        $data['files'] = (array)$output;

        $this->load->view('parts/admin_header', $data);
        $this->load->view('admin/rulebook');
        $this->load->view('parts/footer');
    }
}
