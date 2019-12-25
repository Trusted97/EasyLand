<?php defined('BASEPATH') or exit('No direct script access allowed');

class Rulebook_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->ion_auth->in_group('admin')) {
            redirect('', 'refresh');
        } else {
            $this->load->database();
        }
    }

    /**
     * Function used for create a new rule inside the rulebook
     * @param [string] $rule_title [The title of rule]
     * @param [string] $rule_body  [The body of the rule]
     */
    public function create_new_rule($rule_title, $rule_body)
    {
        $title = $this->db->escape_str($rule_title);
        $body = $this->db->escape_str($rule_body);

        $data = array(
          'rule_title' => $title,
          'rule_text' => $body
        );

        $this->db->insert('rulebook', $data); //Insert the rule in db

        echo "VIVO_MODEL";
    }

    public function get_rules()
    {
        $query = $this->db->get('rulebook');
        return $query->result();
    }
}
