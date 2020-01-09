<?php defined('BASEPATH') or exit('No direct script access allowed');

class Market extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper('url');
        //$this->load->model('rulebook_model');
        $this->load->library('grocery_CRUD');
    }

    // public function public_rulebook()
    // {
    //     $data['title'] = 'Regolamento';
    //     $data['rules_array'] = $this->rulebook_model->get_rules();
    //     $this->load->view('parts/header', $data);
    //     $this->load->view('public_rulebook');
    //     $this->load->view('parts/footer');
    // }

    public function manage()
    {
        $crud = new grocery_CRUD();

        $crud->set_table('land_market')
        ->set_subject('Mercato')
        ->columns('market_name', 'market_small_description', 'market_image')
        ->display_as('market_name', 'Nome mercato')
        ->display_as('market_small_description', 'Descrizione breve mercato')
        ->display_as('market_image', 'Immagine mercato');

        $crud->fields('market_name', 'market_small_description', 'market_image');
        $crud->required_fields('market_name', 'market_small_description');

        $output = $crud->render();

        $this->_market_output($output);
    }

    public function _market_output($output = null)
    {
        $data['title'] = 'Gestione mercati';
        $data['files'] = (array)$output;

        $this->load->view('parts/admin_header', $data);
        $this->load->view('admin/market');
        $this->load->view('parts/footer');
    }
}
