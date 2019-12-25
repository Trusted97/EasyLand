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
            $this->load->model('rulebook_model');
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
        $rule_title = $this->input->post('rule_title');
        $rule_body = $this->input->post('rule_body');

        $this->rulebook_model->create_new_rule($rule_title, $rule_body);
    }
}
