<?php

class Tests_Model extends CI_Model {
    /*
      `test_id` int(11) NOT NULL,
  `test_name` char(50) NOT NULL,
  `test_description` longtext,
  `file_location` char(255) NOT NULL,
  `test_group_id` int(11) DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
      */    
    private $test_id;
    private $test_name;
    private $test_description;
    private $file_location;
    private $test_group_id;
    private $active;
    
    public function __construct() {
        parent::__construct();
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
            'active' => $this->active
        );
        return ($this->test_cycle_id > 0) ? $this->update($data) : $this->insert($data);
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