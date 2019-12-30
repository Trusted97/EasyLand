<?php defined('BASEPATH') or exit('No direct script access allowed');

class Story extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper('url');
        $this->load->model('story_model');
        $this->load->library('grocery_CRUD');
    }

    public function public_story()
    {
        $data['title'] = 'Ambientazione';
        $data['story_array'] = $this->story_model->get_story();
        $this->load->view('parts/header', $data);
        $this->load->view('public_story');
        $this->load->view('parts/footer');
    }

    public function manage()
    {
        $crud = new grocery_CRUD();

        $crud->set_table('land_story')
          ->set_subject('Capitoli Ambientazione')
          ->columns('land_story_title', 'land_story_text')
          ->display_as('land_story_title', 'Titolo capitolo')
          ->display_as('land_story_text', 'Testo capitolo');

        $crud->fields('land_story_title', 'land_story_text');
        $crud->required_fields('land_story_title', 'land_story_text');

        $output = $crud->render();

        $this->_rulebook_output($output);
    }

    public function _rulebook_output($output = null)
    {
        $data['title'] = 'Gestione Ambientazione';
        $data['files'] = (array)$output;

        $this->load->view('parts/admin_header', $data);
        $this->load->view('admin/story');
        $this->load->view('parts/footer');
    }
}
