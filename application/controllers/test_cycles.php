<?php

class Test_cycles extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('Test_Cycles_factory');
        //$this->load->library('Test_Runs_factory');
    }
    
    public function view() {
        $statistics = $this->test_cycles_factory->getAllTestCyclesWithStatistics();
        $data['statistics'] = $statistics;
        $this->load->view('front/index', $data);      
    }
    
    public function extended($id) {
        $test_group_statistics = $this->test_cycles_factory->getTestGroupsStatisticsByTestCycleId($id);
        $data['test_group_statistics'] = $test_group_statistics;
        $this->load->view('front/extended', $data);
    }
}
