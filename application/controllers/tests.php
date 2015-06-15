<?php

class Tests extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('Tests_factory');
        $this->load->library('Test_Groups_factory');
    }
    
    public function view($id = 0) {
        if ($id > 0) {
            $test_entity = $this->tests_factory->getTestById($id);
            $data['test'] = $test_entity;
            $this->load->view('tests/view', $data);
        }        
    }
    
    public function add() {
        if ($_POST) {
            $name = $_POST['data']['name'];
            $desc = $_POST['data']['desc'];
            $location = $_POST['data']['location'];
            $test_group_id = $_POST['data']['test_group_id'];            
            $priority = $_POST['data']['priority'];
            
            $tests_entity = $this->tests_factory->create_new_tests_entity(
                    $name, $desc, $location, $test_group_id, 1, $priority);
            $result = $tests_entity->commit();
            
            var_dump($tests_entity);
        }
        $testgroup_entity = $this->test_groups_factory->getAllTestGroups();
        $data['testgroups'] = $testgroup_entity;
        var_dump($data['testgroups']);
        $this->load->view('tests/add', $data);
    }
}
