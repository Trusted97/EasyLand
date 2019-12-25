<?php defined('BASEPATH') or exit('No direct script access allowed');

class Rulebook extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->ion_auth->in_group('admin')) {
            redirect('', 'refresh');
        } else {
            $this->load->model('rulebook_model');
            $this->load->library('form_validation');
            $this->load->helper('form');
        }
    }

    public function admin_rulebook()
    {
        $data['title'] = 'Gestione regolamento';
        $data['rules_array'] = $this->rulebook_model->get_rules();

        $this->load->view('parts/admin_header', $data);
        $this->load->view('admin/rulebook');
        $this->load->view('parts/footer');
    }

    public function add_new_rule()
    {
        $this->form_validation->set_rules('rule_title', 'Nome della regola', 'required');
        $this->form_validation->set_rules('rule_body', 'Contenuto della regola', 'required');

        if ($this->form_validation->run() === true) {
            $rule_title = $this->input->post('rule_title');
            $rule_body = $this->input->post('rule_body');

            $this->rulebook_model->create_new_rule($rule_title, $rule_body);

            redirect('rulebook/admin_rulebook', 'refresh');
        } else {
            redirect('rulebook/admin_rulebook', 'refresh');
        }
    }
}
