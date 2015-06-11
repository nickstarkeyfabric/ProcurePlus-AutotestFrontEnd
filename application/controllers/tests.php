<?php

class Tests extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('Tests_factory');
    }
    
    public function view() {
        $this->load->view('tests/view');
    }
    
    public function create() {
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
        $this->load->view('tests/create');
    }
}
