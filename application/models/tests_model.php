<?php

class Tests_Model extends CI_Model {
 
    private $test_id;
    private $test_name;
    private $test_description;
    private $file_location;
    private $test_group_id;
    private $active;
    private $priority;
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function setId($value) {
        $this->test_id = $value;
    }
    
    public function setTestName($value) {
        $this->test_name = $value;
    }
    
    public function setTestDesc($value) {
        $this->test_description = $value;
    }
    
    public function setFileLocation($value) {
        $this->file_location = $value;
    }
    
    public function setTestGroupId($value) {
        $this->test_group_id = $value;
    }
    
    public function setActive($value) {
        $this->active = $value;
    }
    
    public function setPriority($value) {
        $this->priority = $value;
    }
    
    public function getId() {
        return $this->test_id;
    }
    
    public function commit() {
        $data = array(
            'test_name' => $this->test_name,
            'test_description' => $this->test_description,
            'file_location' => $this->file_location,
            'test_group_id' => $this->test_group_id,
            'active' => $this->active,
            'priority' => $this->priority
        );
        return ($this->test_id > 0) ? $this->update($data) : $this->insert($data);
    }
    
    private function update($data) {
        return ($this->db->update("tests", $data, array("tests_id" => $this->tests_id))) == true;
    }
    
    private function insert($data) {
        if ($this->db->insert("tests", $data)) {
            $this->tests_id = $this->db->insert_id();
            return true;
        }
        return false;
    }
}