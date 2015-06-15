<?php

class Test_groups extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('Test_Groups_factory');
        $this->load->library('Tests_factory');
    }
    
    public function view($id = -1) {
        if ($id == -1) {
            $testgroup_entity = $this->test_groups_factory->getAllTestGroups();
            $data['testgroups'] = $testgroup_entity;
            $this->load->view('test_groups/view_all', $data);
        }
        else {
            $testgroup_entity = $this->test_groups_factory->getTestGroup($id);
            $test_entity = $this->tests_factory->getAllTestsByGroupId($id);
            $data['testgroups'] = $testgroup_entity;
            $data['tests'] = $test_entity;
            $this->load->view('test_groups/view', $data);
        }
    }
    
    public function add() {
        if ($_POST) {
            $name = $_POST['data']['name'];
            $tags = $_POST['data']['tags'];
            $priority = $_POST['data']['priority'];
            $desc = $_POST['data']['desc'];
            $testgroup_entity = $this->test_groups_factory->create_new_test_groups_entity(
                    $name, $tags, $priority, $desc, 1);
            $result = $testgroup_entity->commit();
            
            var_dump($testgroup_entity);
        }
        $this->load->view('test_groups/add');
    }
}
