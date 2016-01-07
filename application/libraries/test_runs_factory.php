<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Test_Runs_factory {
    var $CI;

    public function __construct($ci = null) {
        if ($ci == null) {
            //When the class is constructed get an instance of codeigniter so we can access it locally
            $this->CI =& get_instance();
            $this->CI->load->model("Test_Runs_Model");
        }
        else {
            $this->CI = $ci;
        }
    }

    public function Test_Runs_factory($ci = null)
    {
        if ($ci == null) {
            //When the class is constructed get an instance of codeigniter so we can access it locally
            $this->CI =& get_instance();
            $this->CI->load->model("Test_Runs_Model");
        }
        else {
            $this->CI = $ci;
        }
    }

    public function getStatisticsByCyclesId($test_cycle_id, $test_group_id) {
        $statistics = new Test_Runs_Model();
        return $statistics->getStatisticsByCyclesId($test_cycle_id, $test_group_id);
    }

    public function getTestRunsByCyclesId($test_cycle_id, $test_group_id) {
        $statistics = new Test_Runs_Model();
        return $statistics->getTestRunsByCyclesId($test_cycle_id, $test_group_id);
    }
}
