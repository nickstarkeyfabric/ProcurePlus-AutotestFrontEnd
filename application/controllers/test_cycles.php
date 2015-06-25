<?php

class Test_cycles extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('Test_Cycles_factory');
        //$this->load->library('Test_Runs_factory');
        $this->load->library("pagination");
        $this->load->helper("url");
    }
    
    public function view() {
        $config = array();
        $config["base_url"] = base_url() . "test_cycles/view";
        $config["per_page"] = 2;
        $config["uri_segment"] = 3;        
        
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        
        //$statistics = $this->test_cycles_factory->getAllTestCyclesWithStatistics();
        $statistics = $this->test_cycles_factory->getAllTestCyclesWithStatisticsPage($config["per_page"], $page);
        
        $config["total_rows"] = 5;
        $this->pagination->initialize($config);
        
        foreach ($statistics as &$stat) {
            $datetime1 = strtotime($stat['date_start'] . ' ' . $stat['time_start']);
            $datetime2 = strtotime($stat['date_finish'] . ' ' . $stat['time_finish']);
            $interval = abs($datetime2 - $datetime1);            
            array_push($stat, strftime("%M:%S", $interval));
        }
        $data['statistics'] = $statistics;        
        $data['links'] = $this->pagination->create_links();
        $this->load->view('front/index', $data);
    }
    
    public function extended($id) {
        $test_group_statistics = $this->test_cycles_factory->getTestGroupsStatisticsByTestCycleId($id);
        $data['id'] = $id;
        $data['test_group_statistics'] = $test_group_statistics;
        $this->load->view('front/extended', $data);
    }
}
