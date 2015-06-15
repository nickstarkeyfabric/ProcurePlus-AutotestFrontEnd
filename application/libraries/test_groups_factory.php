<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Test_Groups_factory {
    var $CI;
    
    public function __construct($ci = null) {
        if ($ci == null) {
            //When the class is constructed get an instance of codeigniter so we can access it locally
            $this->CI =& get_instance();
            $this->CI->load->model("Test_Groups_Model");
        }
        else {
            $this->CI = $ci; 
        }
    }
    
    public function Test_Groups_factory($ci = null)
    {
        if ($ci == null) {
            //When the class is constructed get an instance of codeigniter so we can access it locally
            $this->CI =& get_instance();
            $this->CI->load->model("Test_Groups_Model");
        }
        else {
            $this->CI = $ci; 
        }
    }
    
    public function create_new_test_groups_entity($name, $tags, $priority, 
            $desc, $active) {
        $test_group = new Test_Groups_Model();
        $test_group->setId(0);
        $test_group->setGroupName($name);
        $test_group->setGroupTags($tags);
        $test_group->setPriority($priority);
        $test_group->setGroupDesc($desc);
        $test_group->setActive($active);
    	return $test_group;
    }
    
    public function getAllTestGroups() {
        $test_group = new Test_Groups_Model();
        return $test_group->getAllTestGroups();
    }
    
    public function getTestGroup($id) {
        $test_group = new Test_Groups_Model();
        return $test_group->getTestGroup($id);
    }
}

