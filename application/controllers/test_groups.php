<?php

class Test_groups extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('Test_Groups_factory');
    }
    //public function view() {
    //    $this->load->view('test_groups/create');
    //}
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
