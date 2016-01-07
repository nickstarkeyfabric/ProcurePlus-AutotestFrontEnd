<?php

class Test_Runs_Model extends CI_Model {

    private $test_cycle_id;
    private $total_tests_run;
    private $total_tests_passes;
    private $total_tests_fail;
    private $tags;
    private $total_run_time;

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getTestRunsByTestCycleId($id) {
        $this->db->order_by("date_finish, time_finish", "desc");
        $this->db->limit(1);

        $query = $this->db->get('test_cycles');
        return $query->row();
    }

    public function getStatisticsByCyclesId($ids = array()) {
        $this->db->join('tests', 'test_runs.test_id = tests.test_id', 'left');
        $this->db->join('test_groups', 'tests.test_group_id = test_groups.id', 'left');
        $this->db->where_in('test_cycle', $ids);
        $this->db->select('test_cycle');
        $this->db->select_sum('passes');
        $this->db->select_sum('fails');
        $this->db->group_by("test_cycle");

        $query = $this->db->get('test_runs');
        return $query->result_array();
    }

    public function getTestRunsByCyclesId($test_cycle_id, $test_group_id) {
        $this->db->join('tests', 'test_runs.test_id = tests.test_id', 'left');
        $this->db->join('test_groups', 'tests.test_group_id = test_groups.id', 'left');
        $this->db->where_in('test_cycle', $test_cycle_id);
        $this->db->where_in('tests.test_group_id', $test_group_id);

        $query = $this->db->get('test_runs');
        return $query->result_array();
    }
}
