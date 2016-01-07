<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Test_Cycles_factory {
    var $CI;

    public function __construct($ci = null) {
        if ($ci == null) {
            //When the class is constructed get an instance of codeigniter so we can access it locally
            $this->CI =& get_instance();
            $this->CI->load->model("Test_Cycles_Model");
        }
        else {
            $this->CI = $ci;
        }
    }

    public function Test_Cycles_factory($ci = null)
    {
        if ($ci == null) {
            //When the class is constructed get an instance of codeigniter so we can access it locally
            $this->CI =& get_instance();
            $this->CI->load->model("Test_Cycles_Model");
        }
        else {
            $this->CI = $ci;
        }
    }

    public function getMostRecentTestCycle() {
        $test_cycle = new Test_Cycles_Model();
        return $test_cycle->getMostRecentTestCycle();
    }

    public function getAllTestCycles() {
        $all_test_cycles = new Test_Cycles_Model();
        return $all_test_cycles->getAllTestCycles();
    }
    public function getTestCycleById($id) {
        $test_cycles = new Test_Cycles_Model();
        return $test_cycles->getTestCycleById($id);
    }

    public function getAllTestCyclesWithStatistics() {
        $all_test_cycles = new Test_Cycles_Model();
        return $all_test_cycles->getAllTestCyclesWithStatistics();
    }

    public function getTestGroupsStatisticsByTestCycleId($id) {
        $statistics = new Test_Cycles_Model();
        return $statistics->getTestGroupsStatisticsByTestCycleId($id);
    }

    public function getAllTestCyclesWithStatisticsPage($limit, $start) {
        $all_test_cycles = new Test_Cycles_Model();
        return $all_test_cycles->getAllTestCyclesWithStatisticsPage($limit, $start);
    }

    public function countAllTestCyclesWithStatisticsPage() {
        $all_test_cycles = new Test_Cycles_Model();
        return $all_test_cycles->countAllTestCyclesWithStatisticsPage();
    }

    public function getAllTestCyclesWithStatisticsPageByDate($limit, $start, $date = null) {
        $all_test_cycles = new Test_Cycles_Model();
        return $all_test_cycles->getAllTestCyclesWithStatisticsPageByDate($limit, $start, $date);
    }

    public function countAllTestCyclesWithStatisticsPageByDate($date = null) {
        $all_test_cycles = new Test_Cycles_Model();
        return $all_test_cycles->countAllTestCyclesWithStatisticsPageByDate($date);
    }

    public function getTheMostRecentTestCycleStatistics() {
        $test_cycle = new Test_Cycles_Model();
        return $test_cycle->getTheMostRecentTestCycleStatistics();
    }

    public function getCount() {
        $all_test_cycles = new Test_Cycles_Model();
        return $all_test_cycles->getCount();
    }
}

