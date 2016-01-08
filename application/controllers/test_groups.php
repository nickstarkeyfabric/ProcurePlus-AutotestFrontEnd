<?php

class Test_groups extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('Test_Groups_factory');
        $this->load->library('Tests_factory');
        $this->load->library('Test_Cycles_factory');
        $this->load->library('Test_Runs_factory');
    }

    public function view($id = null)
    {
        if (!$id) {
            $testgroup_entity = $this->test_groups_factory->getAllTestGroups();
            $data['testgroups'] = $testgroup_entity;

            $data['scripts'] = array('assets/js/pages/test_groups/view_all.js');

            $this->show_view('test_groups/view_all', $data);
        }
        else {
            $testgroup_entity = $this->test_groups_factory->getTestGroup($id);
            $test_entity = $this->tests_factory->getAllTestsByGroupId($id);
            $data['testgroups'] = $testgroup_entity;
            $data['tests'] = $test_entity;

            $data['scripts'] = array('assets/js/pages/test_groups/view.js');

            $this->show_view('test_groups/view', $data);
        }
    }

    public function add()
    {
        if ($_POST) {
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');
            if ($this->form_validation->run('test_groups') == true) {
                $testgroup_entity = $this->test_groups_factory->create_new_test_groups_entity(
                    $_POST['data']['group_name'],
                    $_POST['data']['group_tags'],
                    $_POST['data']['priority'],
                    $_POST['data']['group_desc'],
                    1
                );
                $result = $testgroup_entity->commit();
                //redirect('/test_groups/view/' . $_POST['data']['testgroups'], 'refresh');
            }
        }
        $this->show_view('test_groups/add');
    }

    public function edit($id = null)
    {
        if ($_POST) {
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');
            if ($this->form_validation->run('test_groups') == true) {
                $testgroup_entity = $this->test_groups_factory->create_new_test_groups_entity(
                    $_POST['data']['group_name'],
                    $_POST['data']['group_tags'],
                    $_POST['data']['priority'],
                    $_POST['data']['group_desc'],
                    1
                );
                $testgroup_entity->setId($_POST['data']['id']);
                $result = $testgroup_entity->commit();
                //redirect('/test_groups/view/' . $_POST['data']['testgroups'], 'refresh');
            }
        }
        $test_group_entity = $this->test_groups_factory->getTestGroup($id);
        $data['testgroup'] = $test_group_entity;
        $this->show_view('test_groups/edit', $data);
    }

    public function executed($test_cycle_id = null, $test_group_id = null)
    {
        if (empty($test_cycle_id) || empty($test_group_id)) {
            show_404();
        }

        $test_cycle = $this->test_cycles_factory->getTestCycleById($test_cycle_id);
        $data['test_cycle'] = $test_cycle;

        $testgroup_entity = $this->test_groups_factory->getTestGroup($test_group_id);
        $data['testgroup'] = $testgroup_entity;

        $run_tests = $this->test_runs_factory->getTestRunsByCyclesId($test_cycle_id, $test_group_id);
        $data['run_tests'] = $run_tests;

        $this->show_view('test_groups/executed', $data);
    }

    /**
     *  Method for toggling test groups on and off via Ajax
     *
     *  @param $id  ID of the test group to toggle
     */
    public function ajax_toggle_group_active($id = null) {
        if(!$this->input->is_ajax_request()) {
            show_404();
        }

        $json['success'] = false;
        $json['message'] = "Unable to update test group";

        if(empty($id)) {
            echo json_encode($json);
            die;
        }

        if($this->test_groups_factory->ajax_toggle_group_active($id)) {
            $json['success'] = true;
            $json['message'] = "Test group updated";
        }

        echo json_encode($json);
        die;
    }

    /**
     *  Method for toggling individual tests on and off via Ajax
     *
     *  @param $id  ID of the test to toggle
     */
    public function ajax_toggle_test_active($id = null) {
        if(!$this->input->is_ajax_request()) {
            show_404();
        }

        $json['success'] = false;
        $json['message'] = "Unable to update test";

        if(empty($id)) {
            echo json_encode($json);
            die;
        }

        if($this->tests_factory->ajax_toggle_test_active($id)) {
            $json['success'] = true;
            $json['message'] = "Test updated";
        }

        echo json_encode($json);
        die;
    }
}
