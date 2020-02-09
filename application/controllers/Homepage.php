<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Homepage extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
    }

    public function index()
    {
        $success = $this->session->flashdata('success');

        $data['title'] = 'EasyLand';
        $data['success'] = $success;
        $this->load->view('parts/header', $data);
        $this->load->view('homepage');
        $this->load->view('parts/footer');
    }

    public function index_register()
    {
        $this->load->model('races_model');

        $error = $this->session->flashdata('error');

        $data['title'] = 'Registrazione';
        $data['races_array'] = $this->races_model->get_array_races();
        $data['error'] = $error;

        $this->load->view('parts/header', $data);
        $this->load->view('public_register');
        $this->load->view('parts/footer');
    }

    public function register_player()
    {
        $this->load->library('form_validation');
        $this->load->model('player_model');

        $this->form_validation->set_rules('email_address', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('name', 'Nome', 'required');
        $this->form_validation->set_rules('surname', 'Cognome', 'required');
        $this->form_validation->set_rules('name_character', 'Nome personaggio', 'required');
        $this->form_validation->set_rules('surname_character', 'Cognome personaggio', 'required');
        $this->form_validation->set_rules('races', 'Razza', 'required');
        $this->form_validation->set_rules('str_point', 'Punteggio Forza', 'required');
        $this->form_validation->set_rules('con_point', 'Punteggio Costituzione', 'required');
        $this->form_validation->set_rules('dex_point', 'Punteggio Destrezza', 'required');
        $this->form_validation->set_rules('int_point', 'Punteggio Intelligenza', 'required');
        $this->form_validation->set_rules('wis_point', 'Punteggio Saggezza', 'required');
        $this->form_validation->set_rules('cha_point', 'Punteggio Carisma', 'required');


        if ($this->form_validation->run() == false) {
            redirect('registrazione');
        } else {
            $email = $this->input->post('email_address');
            $password = $this->input->post('password');
            $name = $this->input->post('name');
            $surname = $this->input->post('surname');
            $name_character = $this->input->post('name_character');
            $surname_character = $this->input->post('surname_character');
            $race_id = $this->input->post('races');

            $str_point = $this->input->post('str_point');
            $con_point = $this->input->post('con_point');
            $dex_point = $this->input->post('dex_point');
            $int_point = $this->input->post('int_point');
            $wis_point = $this->input->post('wis_point');
            $cha_point = $this->input->post('cha_point');



            $stat_point = array(
            'str' => $str_point,
            'con' => $con_point,
            'dex' => $dex_point,
            'int' => $int_point,
            'wis' => $wis_point,
            'cha' => $cha_point
          );

            $additional_data = array(
            'first_name' => $name,
            'last_name' => $surname,
          );

            $group = array('2'); // Set users as player.

            $tot_point = $str_point + $con_point + $dex_point + $int_point + $wis_point + $cha_point;

            if ($tot_point > 40) {
                $this->session->set_flashdata('error', 'La somma dei punteggi non può superare 40!');
                redirect('registrazione');
            } else {
                $user_id = $this->ion_auth->register($email, $password, $email, $additional_data, $group);

                $this->player_model->insert_player($user_id, $race_id, $name_character, $stat_point);
            }
        }
    }
}
