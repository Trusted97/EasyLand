<?php defined('BASEPATH') or exit('No direct script access allowed');

class Market extends CI_Controller
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
