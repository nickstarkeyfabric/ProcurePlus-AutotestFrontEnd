<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Tests_factory {
    var $CI;
    
    public function __construct($ci = null) {
        if ($ci == null) {
            //When the class is constructed get an instance of codeigniter so we can access it locally
            $this->CI =& get_instance();
            $this->CI->load->model("Tests_Model");
        }
        else {
            $this->CI = $ci; 
        }
    }
    
    public function Tests_factory($ci = null)
    {
        if ($ci == null) {
            //When the class is constructed get an instance of codeigniter so we can access it locally
            $this->CI =& get_instance();
            $this->CI->load->model("Tests_Model");
        }
        else {
            $this->CI = $ci; 
        }
    }
    
    public function create_new_tests_entity($name, $desc, $location, 
            $test_group_id, $active, $priority) {
        $tests = new Tests_Model();
        $tests->setId(0);
        $tests->setTestName($name);
        $tests->setTestDesc($desc);
        $tests->setFileLocation($location);
        $tests->setTestGroupId($test_group_id);
        $tests->setActive($active);
        $tests->setPriority($priority);
    	return $tests;
    } 
}