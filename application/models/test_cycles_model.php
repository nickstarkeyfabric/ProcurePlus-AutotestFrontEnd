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
        $this->load->database();
    }
    
    public function getId() {
        return $this->test_cycle_id;
    }
    
    public function getMostRecentTestCycle() {
        $this->db->order_by("date_finish, time_finish", "desc"); 
        $this->db->limit(1);
        $query = $this->db->get('test_cycles');
        return $query->row();
    }
    
    public function getAllTestCycles() {
        $this->db->order_by("date_finish, time_finish", "desc");
        $query = $this->db->get('test_cycles');
        return $query->result_array();
    }
    
    public function getAllTestCyclesWithStatistics() {
        $this->db->select('test_cycle');
        $this->db->select('test_cycle_tags');
        $this->db->select('test_cycles.date_start');
        $this->db->select('test_cycles.time_start');
        $this->db->select('test_cycles.date_finish');
        $this->db->select('test_cycles.time_finish');
        $this->db->select_sum('passes');
        $this->db->select_sum('fails');
        $this->db->from('test_cycles');
        $this->db->join('test_runs', 'test_runs.test_cycle = test_cycles.test_cycle_id');
        $this->db->order_by("test_cycle_id", "desc");
        $this->db->group_by("test_cycle");
        
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function getTestGroupsStatisticsByTestCycleId($id) {
        //$this->db->select('test_cycles');
        $this->db->select('test_groups.id');
        $this->db->select('test_groups.group_name');
        $this->db->select('test_cycle_tags');
        $this->db->select('test_cycles.date_start');
        $this->db->select('test_cycles.time_start');
        $this->db->select_sum('passes');
        $this->db->select_sum('fails');
        $this->db->from('test_cycles');
        $this->db->join('test_runs', 'test_runs.test_cycle = test_cycles.test_cycle_id', 'left');
        $this->db->join('tests', 'test_runs.test_id = tests.test_id', 'left');
        $this->db->join('test_groups', 'tests.test_group_id = test_groups.id', 'left');
        $this->db->where('test_cycles.test_cycle_id',$id);
        $this->db->order_by("test_cycle_id", "desc");
        $this->db->group_by("test_cycle");
        
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function getAllTestCyclesWithStatisticsPage($limit, $start) {
        $this->db->limit($limit, $start);        
        $this->db->select('test_cycle');
        $this->db->select('test_cycle_tags');
        $this->db->select('test_cycles.date_start');
        $this->db->select('test_cycles.time_start');
        $this->db->select('test_cycles.date_finish');
        $this->db->select('test_cycles.time_finish');
        $this->db->select_sum('passes');
        $this->db->select_sum('fails');
        $this->db->from('test_cycles');
        $this->db->join('test_runs', 'test_runs.test_cycle = test_cycles.test_cycle_id');
        $this->db->order_by("test_cycle_id", "desc");
        $this->db->group_by("test_cycle");
        
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function getTheMostRecentTestCycleStatistics() {
        $this->db->limit(1);
        $this->db->select('test_cycle');
        $this->db->select('test_cycle_tags');
        $this->db->select('test_cycles.date_start');
        $this->db->select('test_cycles.time_start');
        $this->db->select('test_cycles.date_finish');
        $this->db->select('test_cycles.time_finish');
        $this->db->select_sum('passes');
        $this->db->select_sum('fails');
        $this->db->from('test_cycles');
        $this->db->join('test_runs', 'test_runs.test_cycle = test_cycles.test_cycle_id');
        $this->db->order_by("test_cycle_id", "desc");
        $this->db->group_by("test_cycle");
        
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getCount() {
        
    }
}