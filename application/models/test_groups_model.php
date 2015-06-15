<?php

class Test_Groups_Model extends CI_Model {
    private $id;
    private $group_name;
    private $group_desc;
    private $group_tags;
    private $active;
    private $priority;
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function getId() {
        return $this->id;
    }
    
    public function setId($value) {
        $this->id = $value;
    }
    
    public function setGroupName($value) {
        $this->group_name = $value;
    }
    
    public function setGroupDesc($value) {
        $this->group_desc = $value;
    }
    
    public function setGroupTags($value) {
        $this->group_tags = $value;
    }
    
    public function setActive($value) {
        $this->active = $value;
    }
    
    public function setPriority($value) {
        $this->priority = $value;
    }
    
    public function getAllTestGroups() {
        //$query = $this->db->get('test_groups');
        //$this->db->select('id, group_name');
        $query = $this->db->get_where('test_groups', array('active' => 1));
        return $query->result_array();
    }
    
    public function getTestGroup($id) {
        $query = $this->db->get_where('test_groups', array('id' => $id));
        return $query->row();
    }
    
    public function commit() {
        $data = array(
            'group_name' => $this->group_name,
            'group_desc' => $this->group_desc,
            'group_tags' => $this->group_tags,
            'active' => $this->active,
            'priority' => $this->priority
        );
        return ($this->id > 0) ? $this->update($data) : $this->insert($data);
    }
    
    private function update($data) {
        return ($this->db->update("test_groups", $data, array("id" => $this->id))) == true;
    }
    
    private function insert($data) {   
        $this->db->trans_start();
        if ($this->db->insert("test_groups", $data)) {
            $this->id = $this->db->insert_id();
            $this->db->trans_complete();
            return true;
        }
        $this->db->trans_complete();
        return false;
    }
}
