<?php

class Test_Cycles_Model extends CI_Model {
    
    private $test_cycle_id;
    private $test_cycle_tags;
    private $test_cycle_name;
    private $xml_link;
    private $date_start;
    private $date_finish;
    private $time_start;
    private $time_finish;
    private $mode;
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getId() {
        return $this->test_cycle_id;
    }
    
    public function commit() {
        $data = array();
        return ($this->test_cycle_id > 0) ? $this->update($data) : $this->insert($data);
    }
    
    private function update($data) {
        return ($this->db->update("test_cycles", $data, array("id" => $this->test_cycles_id))) == true;
    }
    
    private function insert($data) {
        
    }
}